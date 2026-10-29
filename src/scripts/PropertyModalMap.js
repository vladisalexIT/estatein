import PropertyMapSupport from './PropertyMapSupport.js';

class PropertyModalMap {
  constructor() {
    this.openBtn = document.querySelector(
      '[data-js-map-open]'
    );

    this.dialog = document.querySelector(
      '[data-js-map-dialog]'
    );

    if (!this.openBtn || !this.dialog) {
      return;
    }

    this.closeBtn = this.dialog.querySelector(
      '[data-js-map-close]'
    );

    this.sidePanelList = this.dialog.querySelector(
      '[data-js-modal-cards-list]'
    );

    if (!this.closeBtn || !this.sidePanelList) {
      return;
    }

    this.isOpening = false;
    this.cardsLoaded = false;
    this.hasSyncedMap = false;
    this.resizeFrame = null;

    this.mapView = new PropertyMapSupport({
      containerId: 'estatein-modal-yandex-map',

      getCards: () => [
        ...this.sidePanelList.querySelectorAll(
          '.property-card'
        ),
      ],

      onSelect: (id) => this.activateCard(id),

      isVisible: () => this.dialog.open,
    });

    this.bindEvents();
  }

  async openModal() {
    if (this.isOpening || this.dialog.open) {
      return;
    }

    this.isOpening = true;

    try {
      const cardsLoaded =
        await this.loadCardsFromCatalog();

      this.dialog.style.backgroundColor =
        'var(--color-dark, #141414)';

      const sidePanel = this.dialog.querySelector(
        '.property-map-modal__side-panel'
      );

      if (sidePanel) {
        sidePanel.style.backgroundColor =
          'var(--color-dark-10, #1a1a1a)';
      }

      this.dialog.showModal();

      document.body.classList.add('is-locked');

      await new Promise((resolve) => {
        requestAnimationFrame(() => {
          requestAnimationFrame(resolve);
        });
      });

      const ready = await this.mapView.ready();

      if (!this.dialog.open) {
        return;
      }

      if (ready) {
        this.mapView.resize();

        this.mapView.sync({
          fit: !this.hasSyncedMap,
        });

        this.hasSyncedMap = true;
        const selected = this.openBtn.dataset.propertyId;
        if (selected) this.activateCard(selected);
      }

      if (!cardsLoaded) {
        this.mapView.setStatus(
          'Properties could not be loaded. '
          + 'Close the map and try again.'
        );
      }
    } catch (error) {
      console.error(
        '[PropertyModalMap] Opening error:',
        error
      );

      if (!this.dialog.open) {
        document.body.classList.remove('is-locked');
      }
    } finally {
      this.isOpening = false;
    }
  }

  closeModal() {
    if (this.dialog.open) {
      this.dialog.close();
    }

    document.body.classList.remove('is-locked');
  }

  async loadCardsFromCatalog() {
    if (this.cardsLoaded) {
      return true;
    }

    if (
      this.sidePanelList.querySelector('.property-card')
    ) {
      this.cardsLoaded = true;
      return true;
    }

    try {
      const catalogUrl = new URL(
        this.dialog.dataset.catalogUrl
          || '/properties.html',
        window.location.href
      );

      if (catalogUrl.origin !== window.location.origin) {
        throw new Error(
          'The catalog must use the same origin.'
        );
      }

      const response = await fetch(
        catalogUrl.href,
        {
          credentials: 'same-origin',
        }
      );

      if (!response.ok) {
        throw new Error(
          `Catalog response: ${response.status}`
        );
      }

      const htmlText = await response.text();

      const doc = new DOMParser().parseFromString(
        htmlText,
        'text/html'
      );

      const catalogCards = doc.querySelectorAll(
        '.properties-listings .property-card, '
        + '[data-js-properties-list] .property-card'
      );

      const fragment = document.createDocumentFragment();

      catalogCards.forEach((card, index) => {
        const listItem = document.createElement('li');

        listItem.className =
          'property-map-modal__item';

        const clonedCard = card.cloneNode(true);

        clonedCard.removeAttribute('style');
        clonedCard.removeAttribute('id');

        clonedCard.classList.remove(
          'swiper-slide',
          'swiper-slide-active',
          'swiper-slide-next',
          'swiper-slide-prev',
          'property-card--highlighted'
        );

        clonedCard.querySelectorAll('[id]').forEach(
          (element) => element.removeAttribute('id')
        );

        const titleElement = clonedCard.querySelector(
          '.property-card__title'
        );

        if (titleElement) {
          const uniqueId =
            `modal-card-title-${index}`;

          titleElement.id = uniqueId;

          clonedCard.setAttribute(
            'aria-labelledby',
            uniqueId
          );
        }

        clonedCard.querySelectorAll(
          '[href], [src]'
        ).forEach((element) => {
          ['href', 'src'].forEach((attribute) => {
            const value = element.getAttribute(
              attribute
            );

            if (
              !value
              || value.startsWith('#')
            ) {
              return;
            }

            element.setAttribute(
              attribute,
              new URL(value, response.url).href
            );
          });
        });

        listItem.appendChild(clonedCard);
        fragment.appendChild(listItem);
      });

      this.sidePanelList.classList.add(
        'properties-listings'
      );

      this.sidePanelList.replaceChildren(fragment);

      this.cardsLoaded = true;
      this.hasSyncedMap = false;

      return true;
    } catch (error) {
      this.cardsLoaded = false;

      console.error(
        '[PropertyModalMap] Catalog loading error:',
        error
      );

      return false;
    }
  }

  activateCard(id) {
    const card = [
      ...this.sidePanelList.querySelectorAll(
        '.property-card'
      ),
    ].find((element) =>
      element.dataset.propertyId === String(id)
    );

    if (!card) {
      return;
    }

    this.mapView.select(id);

    const sidebarWrapper = card.closest(
      '.property-map-modal__side-panel'
    ) || this.sidePanelList;

    const top =
      card.getBoundingClientRect().top
      - sidebarWrapper.getBoundingClientRect().top
      + sidebarWrapper.scrollTop
      - 20;

    sidebarWrapper.scrollTo({
      top,
      behavior: 'smooth',
    });
  }

  selectCardFromEvent(event) {
    if (!(event.target instanceof Element)) {
      return;
    }

    const card = event.target.closest(
      '.property-card'
    );

    if (
      !card
      || !this.sidePanelList.contains(card)
    ) {
      return;
    }

    this.mapView.select(
      card.dataset.propertyId ?? '',
      { pan: true }
    );
  }

  bindEvents() {
    this.openBtn.addEventListener(
      'click',
      (event) => {
        event.preventDefault();
        this.openModal();
      }
    );

    this.closeBtn.addEventListener(
      'click',
      (event) => {
        event.preventDefault();
        this.closeModal();
      }
    );

    this.dialog.addEventListener('close', () => {
      document.body.classList.remove('is-locked');
    });

    this.dialog.addEventListener('click', (event) => {
      if (event.target === this.dialog) {
        this.closeModal();
      }
    });

    this.sidePanelList.addEventListener(
      'click',
      (event) => this.selectCardFromEvent(event)
    );

    this.sidePanelList.addEventListener(
      'focusin',
      (event) => this.selectCardFromEvent(event)
    );

    window.addEventListener('resize', () => {
      if (!this.dialog.open) {
        return;
      }

      cancelAnimationFrame(this.resizeFrame);

      this.resizeFrame = requestAnimationFrame(() => {
        this.mapView.resize();
      });
    });

    window.addEventListener('load', () => {
      if (
        this.dialog.open
        && !this.mapView.map
      ) {
        this.mapView.ready().then((ready) => {
          if (!ready || !this.dialog.open) {
            return;
          }

          this.mapView.sync({
            fit: true,
          });

          this.hasSyncedMap = true;
        const selected = this.openBtn.dataset.propertyId;
        if (selected) this.activateCard(selected);
        });
      }
    });
  }
}

export default PropertyModalMap;

