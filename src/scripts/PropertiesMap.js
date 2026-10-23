class PropertiesMap {
  constructor() {
    this.toggleBtn = document.querySelector('[data-js-map-toggle]');
    this.mapWrapper = document.querySelector('[data-js-map-wrapper]');
    this.propertiesList = document.querySelector('[data-js-properties-list]');
    this.mapContainerId = 'estatein-yandex-map';
    this.mapInstance = null;
    this.searchCircleMarker = null;
    this.swiperSnapshots = new WeakMap();
    this.connectedSwipers = new WeakSet();
    this.markerItems = [];
    this.isSwitching = false;
    this.isMapReadyPending = false;

    if (!this.toggleBtn || !this.mapWrapper || !this.propertiesList) {
      return;
    }
    this.bindEvents();
  }

  toggleInterface(event) {
    event?.preventDefault();

    if (this.isSwitching) {
      return;
    }

    const isOpening = !this.propertiesList.classList.contains(
      'is-map-active'
    );

    const swiperContainer = this.propertiesList.querySelector(
      '[data-js-slider-swiper], .swiper'
    );

    const swiperInstance = swiperContainer?.swiper;
    const hasSwiper = swiperInstance && !swiperInstance.destroyed;

    const mapBody = this.mapWrapper.querySelector(
      '.properties-map-wrapper__body'
    );

    this.isSwitching = true;

    this.propertiesList.classList.add('is-map-switching');
    this.mapWrapper.classList.add('is-map-switching');

    const finishSwitching = () => {
      this.propertiesList.classList.remove('is-map-switching');
      this.mapWrapper.classList.remove('is-map-switching');
      this.isSwitching = false;
    };

    try {
      if (hasSwiper) {
        swiperInstance.setTransition(0);

        this.setSwiperMode(
          swiperInstance,
          isOpening
        );
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

      if (hasSwiper) {
        swiperInstance.update();

        if (isOpening) {
          swiperInstance.slideTo(0, 0);
        }
      }

      requestAnimationFrame(() => {
        try {
          if (hasSwiper && !swiperInstance.destroyed) {
            swiperInstance.update();
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

  syncMapMarkers() {
    if (!this.mapInstance) return;

    const normalizeName = (value) =>
      value
        .replace(/\s+/g, ' ')
        .trim()
        .toLowerCase();

    const visibleNames = new Set(
      [
        ...this.propertiesList.querySelectorAll(
          '.swiper-slide .property-card__title'
        ),
      ].map((element) =>
        normalizeName(element.textContent)
      )
    );

    this.markerItems.forEach((markerItem) => {
      const shouldBeVisible =
        visibleNames.has(
          normalizeName(markerItem.name)
        );

      if (
        shouldBeVisible === markerItem.visible
      ) {
        return;
      }

      if (shouldBeVisible) {
        this.mapInstance.geoObjects.add(
          markerItem.placemark
        );
      } else {
        this.mapInstance.geoObjects.remove(
          markerItem.placemark
        );
      }

      markerItem.visible = shouldBeVisible;
    });
  }

  setSwiperMode(swiper, isMapActive) {
    if (!swiper || swiper.destroyed) return;

    const keys = [
      'slidesPerView',
      'slidesPerGroup',
      'spaceBetween',
      'breakpoints',
    ];

    if (isMapActive) {
      if (!this.swiperSnapshots.has(swiper)) {
        const snapshot = {
          params: {},
          originalParams: {},
        };

        keys.forEach((key) => {
          snapshot.params[key] =
            swiper.params[key];

          snapshot.originalParams[key] =
            swiper.originalParams[key];
        });

        this.swiperSnapshots.set(
          swiper,
          snapshot
        );
      }

      const mapParams = {
        slidesPerView: 1,
        slidesPerGroup: 1,
        spaceBetween: 0,
        breakpoints: {},
      };

      Object.assign(
        swiper.params,
        mapParams
      );

      Object.assign(
        swiper.originalParams,
        mapParams
      );
    } else {
      const snapshot =
        this.swiperSnapshots.get(swiper);

      if (!snapshot) return;

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
    const swiperElement =
      this.propertiesList.querySelector(
        '[data-js-slider-swiper]'
      );

    const swiper = swiperElement?.swiper;

    if (!swiper || swiper.destroyed) return;

    if (!this.connectedSwipers.has(swiper)) {
      const updateHeight = () => {
        if (
          !this.propertiesList.classList.contains(
            'is-map-active'
          )
        ) {
          return;
        }

        requestAnimationFrame(() => {
          this.adjustMapHeight();
        });
      };

      swiper.on(
        'slideChange',
        updateHeight
      );

      swiper.on(
        'slideChangeTransitionEnd',
        updateHeight
      );

      this.connectedSwipers.add(swiper);
    }

    this.setSwiperMode(
      swiper,
      this.propertiesList.classList.contains(
        'is-map-active'
      )
    );
  }

  refreshMapView() {
    const updateMap = () => {
      if (
        !this.propertiesList.classList.contains('is-map-active')
      ) {
        return;
      }

      if (!this.mapInstance) {
        this.initMap();
      }

      if (!this.mapInstance) {
        return;
      }

      this.adjustMapHeight();
      this.mapInstance.container.fitToViewport();
      this.autoScaleMap();
    };

    if (
      !this.propertiesList.classList.contains('is-map-active')
    ) {
      return;
    }

    if (this.mapInstance) {
      updateMap();
      return;
    }

    if (
      typeof ymaps === 'undefined' ||
      this.isMapReadyPending
    ) {
      return;
    }

    this.isMapReadyPending = true;

    ymaps.ready(() => {
      this.isMapReadyPending = false;
      updateMap();
    });
  }

  initMap() {
    if (this.mapInstance) return;
    try {
      const defaultCenter = [34.0259, -118.7798];
      this.mapInstance = new ymaps.Map(this.mapContainerId, {
        center: defaultCenter,
        zoom: 11,
        controls: ['zoomControl', 'fullscreenControl']
      }, {
        autoFitToViewport: 'always'
      });

      const mapElement = document.getElementById(this.mapContainerId);
      if (mapElement) {
        mapElement.style.filter = 'invert(100%) hue-rotate(180deg) brightness(95%) contrast(90%)';
      }

      const properties = [
        { name: 'Seaside Serenity Villa', coords: [34.0259, -118.7798], desc: 'Malibu, California' },
        { name: 'Metropolitan Haven', coords: [34.0400, -118.6500], desc: 'Los Angeles Area' },
        { name: 'Rustic Retreat Cottage', coords: [34.0120, -118.8200], desc: 'Premium Sea View' },
        { name: 'Seaside Serenity Villa', coords: [34.0380, -118.7610], desc: 'Downtown Los Angeles Area' }
      ];

      properties.forEach(item => {
        const placemark = new ymaps.Placemark(item.coords, {
          balloonContentHeader: `<b style="color: #141414;">${item.name}</b>`,
          balloonContentBody: `<span style="color: #666;">${item.desc}</span>`,
          hintContent: item.name
        }, {
          preset: 'islands#violetDotIcon'
        });

        placemark.events.add('click', () => {
          const slides = this.propertiesList.querySelectorAll('.swiper-slide');
          const swiperContainer = this.propertiesList.querySelector('.swiper');

          slides.forEach((slide, index) => {
            const title = slide.querySelector('.property-card__title');

            if (title && title.textContent.trim().toLowerCase().includes(item.name.toLowerCase())) {
              const card = slide.querySelector('.property-card');

              this.propertiesList.querySelectorAll('.property-card--highlighted').forEach(el => el.classList.remove('property-card--highlighted'));

              if (card) card.classList.add('property-card--highlighted');

              if (swiperContainer && swiperContainer.swiper) {
                swiperContainer.swiper.slideTo(index, 400);
              }
            }
          });
        });

        this.mapInstance.geoObjects.add(placemark);

        this.markerItems.push({
          name: item.name,
          placemark,
          visible: true,
        });
      });

      const initialRadius = window.innerWidth < 768 ? 1500 : 5000;

      this.searchCircleMarker = new ymaps.Circle([defaultCenter, initialRadius], {
        balloonContent: 'Search Radius'
      }, {
        fillColor: 'rgba(112, 59, 247, 0.12)',
        strokeColor: '#703bf7',
        strokeOpacity: 0.7,
        strokeWidth: 2
      });

      this.mapInstance.geoObjects.add(this.searchCircleMarker);

      this.mapInstance.events.add('click', (e) => {
        const clickCoords = e.get('coords');
        if (this.searchCircleMarker) {
          this.searchCircleMarker.geometry.setCoordinates(clickCoords);
        }
        this.mapInstance.setCenter(clickCoords, this.mapInstance.getZoom(), { duration: 300 });
      });

      this.syncMapMarkers();
      this.mapInstance.container.fitToViewport();
      this.autoScaleMap();
    } catch (e) {
      console.error('[PropertiesMap] Error:', e);
    }
  }

  adjustMapHeight() {
    const mapBody =
      this.mapWrapper.querySelector(
        '.properties-map-wrapper__body'
      );

    if (!mapBody) return;

    if (
      !this.propertiesList.classList.contains(
        'is-map-active'
      )
    ) {
      mapBody.style.height = '';
      return;
    }

    if (window.innerWidth < 768) {
      mapBody.style.height = '';
    } else {
      const referenceElement =
        this.propertiesList.querySelector(
          '.swiper-slide-active .property-card'
        ) ||
        this.propertiesList.querySelector(
          '.property-card'
        ) ||
        this.propertiesList.querySelector(
          '.properties-listings__empty'
        );

      const height =
        referenceElement?.offsetHeight || 360;

      mapBody.style.height = `${height}px`;
    }

    this.mapInstance?.container.fitToViewport();
  }

  autoScaleMap() {
    if (!this.mapInstance || !this.searchCircleMarker) return;
    try {
      const defaultCenter = [34.0259, -118.7798];

      if (window.innerWidth < 768) {
        this.searchCircleMarker.geometry.setCoordinates(defaultCenter);
        this.searchCircleMarker.geometry.setRadius(1500);
        this.mapInstance.setCenter(defaultCenter);
        this.mapInstance.setZoom(11.2, { preciseZoom: true });
      } else {
        const targetZoom = window.innerWidth <= 1024 ? 10 : 11;
        this.searchCircleMarker.geometry.setCoordinates(defaultCenter);
        this.searchCircleMarker.geometry.setRadius(5000);
        this.mapInstance.setCenter(defaultCenter, targetZoom);
      }
    } catch (e) {
      console.error(e);
    }
  }

  bindEvents() {
    this.toggleBtn.addEventListener(
      'click',
      (event) => this.toggleInterface(event)
    );

    this.connectSwiper();

    window.addEventListener('resize', () => {
      if (
        !this.propertiesList.classList.contains(
          'is-map-active'
        )
      ) {
        return;
      }

      requestAnimationFrame(() => {
        this.connectSwiper();
        this.adjustMapHeight();
        this.autoScaleMap();
      });
    });

    document.addEventListener(
      'estatein:property-listings-updated',
      (event) => {
        const rootElement =
          event.detail?.rootElement;

        if (
          !(rootElement instanceof Element) ||
          !rootElement.matches(
            '#property-listings'
          )
        ) {
          return;
        }

        this.connectSwiper();
        this.syncMapMarkers();

        if (
          this.propertiesList.classList.contains(
            'is-map-active'
          )
        ) {
          requestAnimationFrame(() => {
            this.adjustMapHeight();
          });
        }
      }
    );
  }
}

export default PropertiesMap;

