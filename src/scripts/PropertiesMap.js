import PropertyMapSupport from './PropertyMapSupport.js';

class PropertiesMap {
  constructor() {
    this.toggleBtn = document.querySelector(
      '[data-js-map-toggle]'
    );

    this.mapWrapper = document.querySelector(
      '[data-js-map-wrapper]'
    );

    this.propertiesList = document.querySelector(
      '[data-js-properties-list]'
    );

    this.swiperSnapshots = new WeakMap();
    this.connectedSwipers = new WeakSet();

    this.isSwitching = false;
    this.dataChanged = true;
    this.hasSyncedMap = false;
    this.resizeFrame = null;

    if (
      !this.toggleBtn
      || !this.mapWrapper
      || !this.propertiesList
    ) {
      return;
    }

    this.mapView = new PropertyMapSupport({
      containerId: 'estatein-yandex-map',

      getCards: () => [
        ...this.propertiesList.querySelectorAll(
          '.property-card'
        ),
      ],

      onSelect: (id) => this.activateCard(id),

      isVisible: () => this.isMapActive(),
    });

    this.bindEvents();
  }

  isMapActive() {
    return this.propertiesList.classList.contains(
      'is-map-active'
    );
  }

  getSwiper() {
    const element = this.propertiesList.querySelector(
      '[data-js-slider-swiper], .swiper'
    );

    const swiper = element?.swiper;

    return swiper && !swiper.destroyed
      ? swiper
      : null;
  }

  getActiveCard() {
    return this.propertiesList.querySelector(
      '.swiper-slide-active .property-card'
    ) || this.propertiesList.querySelector(
      '.property-card'
    );
  }

  selectActiveCard({ pan = false } = {}) {
    const card = this.getActiveCard();

    this.mapView.select(
      card?.dataset.propertyId ?? '',
      { pan }
    );
  }

  activateCard(id) {
    const swiper = this.getSwiper();

    if (swiper) {
      const slides = Array.from(swiper.slides);

      const index = slides.findIndex((slide) => {
        const card = slide.querySelector(
          '.property-card'
        );

        return card?.dataset.propertyId === String(id);
      });

      if (index >= 0) {
        const logicalIndex = Number(
          slides[index].dataset.swiperSlideIndex
        );

        if (
          swiper.params.loop
          && Number.isInteger(logicalIndex)
        ) {
          swiper.slideToLoop(logicalIndex, 400);
        } else {
          swiper.slideTo(index, 400);
        }
      }
    }

    this.mapView.select(id);

    requestAnimationFrame(() => {
      this.adjustMapHeight();
    });
  }

  toggleInterface(event) {
    event?.preventDefault();

    if (this.isSwitching) {
      return;
    }

    this.connectSwiper();

    const isOpening = !this.isMapActive();
    const swiper = this.getSwiper();

    const mapBody = this.mapWrapper.querySelector(
      '.properties-map-wrapper__body'
    );

    this.isSwitching = true;

    this.propertiesList.classList.add(
      'is-map-switching'
    );

    this.mapWrapper.classList.add(
      'is-map-switching'
    );

    const finishSwitching = () => {
      this.propertiesList.classList.remove(
        'is-map-switching'
      );

      this.mapWrapper.classList.remove(
        'is-map-switching'
      );

      this.isSwitching = false;
    };

    try {
      if (swiper) {
        swiper.setTransition(0);
        this.setSwiperMode(swiper, isOpening);
      }

      this.propertiesList.classList.toggle(
        'is-map-active',
        isOpening
      );

      this.mapWrapper.classList.toggle(
        'is-active',
        isOpening
      );

      this.mapWrapper.setAttribute(
        'aria-hidden',
        String(!isOpening)
      );

      this.toggleBtn.textContent = isOpening
        ? 'Show List Only'
        : 'Show on Map';

      this.toggleBtn.setAttribute(
        'aria-expanded',
        String(isOpening)
      );

      if (!isOpening && mapBody) {
        mapBody.style.height = '';
      }

      if (swiper) {
        swiper.update();

        if (isOpening && !this.hasSyncedMap) {
          swiper.slideTo(0, 0);
        }
      }

      requestAnimationFrame(() => {
        try {
          if (swiper && !swiper.destroyed) {
            swiper.update();
          }

          if (isOpening) {
            this.adjustMapHeight();
            this.refreshMapView();
          }
        } finally {
          requestAnimationFrame(finishSwitching);
        }
      });
    } catch (error) {
      finishSwitching();

      console.error(
        '[PropertiesMap] Interface switching error:',
        error
      );
    }
  }

  setSwiperMode(swiper, isMapActive) {
    if (!swiper || swiper.destroyed) {
      return;
    }

    const keys = [
      'slidesPerView',
      'slidesPerGroup',
      'spaceBetween',
      'breakpoints',
    ];

    if (isMapActive) {
      if (this.swiperSnapshots.has(swiper)) {
        return;
      }

      const snapshot = {
        params: {},
        originalParams: {},
      };

      keys.forEach((key) => {
        snapshot.params[key] = swiper.params[key];

        snapshot.originalParams[key] =
          swiper.originalParams[key];
      });

      this.swiperSnapshots.set(swiper, snapshot);

      const mapParams = {
        slidesPerView: 1,
        slidesPerGroup: 1,
        spaceBetween: 0,
        breakpoints: {},
      };

      Object.assign(swiper.params, mapParams);
      Object.assign(swiper.originalParams, mapParams);
    } else {
      const snapshot = this.swiperSnapshots.get(
        swiper
      );

      if (!snapshot) {
        return;
      }

      Object.assign(
        swiper.params,
        snapshot.params
      );

      Object.assign(
        swiper.originalParams,
        snapshot.originalParams
      );

      this.swiperSnapshots.delete(swiper);
    }

    swiper.currentBreakpoint = undefined;
    swiper.update();
  }

  connectSwiper() {
    const swiper = this.getSwiper();

    if (!swiper) {
      return;
    }

    if (!this.connectedSwipers.has(swiper)) {
      const updateSelection = () => {
        if (
          !this.isMapActive()
          || this.isSwitching
          || swiper !== this.getSwiper()
        ) {
          return;
        }

        requestAnimationFrame(() => {
          if (
            !this.isMapActive()
            || swiper !== this.getSwiper()
          ) {
            return;
          }

          this.adjustMapHeight();

          this.selectActiveCard({
            pan: true,
          });
        });
      };

      swiper.on(
        'slideChange',
        updateSelection
      );

      swiper.on(
        'slideChangeTransitionEnd',
        updateSelection
      );

      this.connectedSwipers.add(swiper);
    }

    this.setSwiperMode(
      swiper,
      this.isMapActive()
    );
  }

  async refreshMapView({ fit = false } = {}) {
    if (!this.isMapActive()) {
      return;
    }

    try {
      const ready = await this.mapView.ready();

      if (!ready || !this.isMapActive()) {
        return;
      }

      this.adjustMapHeight();
      this.mapView.resize();

      this.mapView.sync({
        fit:
          fit
          || this.dataChanged
          || !this.hasSyncedMap,
      });

      this.dataChanged = false;
      this.hasSyncedMap = true;

      this.selectActiveCard();
    } catch (error) {
      this.mapView.setStatus(
        'The map could not be updated.'
      );

      console.error(
        '[PropertiesMap] Update error:',
        error
      );
    }
  }

  adjustMapHeight() {
    const mapBody = this.mapWrapper.querySelector(
      '.properties-map-wrapper__body'
    );

    if (!mapBody) {
      return;
    }

    if (!this.isMapActive()) {
      mapBody.style.height = '';
      return;
    }

    if (window.innerWidth <= 1440.98) {
      mapBody.style.height = '';
    } else {
      const referenceElement =
        this.getActiveCard()
        || this.propertiesList.querySelector(
          '.properties-listings__empty'
        );

      const height =
        referenceElement?.offsetHeight || 360;

      mapBody.style.height = `${height}px`;
    }

    this.mapView.resize();
  }

  bindEvents() {
    this.toggleBtn.addEventListener(
      'click',
      (event) => this.toggleInterface(event)
    );

    this.connectSwiper();

    window.addEventListener('resize', () => {
      if (!this.isMapActive()) {
        return;
      }

      cancelAnimationFrame(this.resizeFrame);

      this.resizeFrame = requestAnimationFrame(() => {
        this.connectSwiper();
        this.adjustMapHeight();
      });
    });

    window.addEventListener('load', () => {
      this.connectSwiper();

      if (this.isMapActive()) {
        this.refreshMapView();
      }
    });

    document.addEventListener(
      'estatein:property-listings-updated',
      (event) => {
        const rootElement =
          event.detail?.rootElement;

        if (
          !(rootElement instanceof Element)
          || !rootElement.matches('#property-listings')
        ) {
          return;
        }

        const updatedList = rootElement.matches(
          '[data-js-properties-list]'
        )
          ? rootElement
          : rootElement.querySelector(
            '[data-js-properties-list]'
          );

        if (updatedList) {
          this.propertiesList = updatedList;
        } else if (
          !this.propertiesList.contains(rootElement)
        ) {
          return;
        }

        this.dataChanged = true;
        this.connectSwiper();

        if (this.isMapActive()) {
          requestAnimationFrame(() => {
            this.refreshMapView({
              fit: true,
            });
          });
        }
      }
    );
  }
}

export default PropertiesMap;

