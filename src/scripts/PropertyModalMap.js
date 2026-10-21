class PropertyModalMap {
  constructor() {
    this.openBtn = document.querySelector('[data-js-map-open]');
    this.dialog = document.querySelector('[data-js-map-dialog]');
    this.mapContainerId = 'estatein-modal-yandex-map';
    this.mapInstance = null;
    this.searchCircleMarker = null;

    if (!this.openBtn || !this.dialog) {
      return;
    }

    this.closeBtn = this.dialog.querySelector('[data-js-map-close]');
    if (!this.closeBtn) {
      return;
    }

    this.bindEvents();
  }

  async openModal() {
    document.body.classList.add('is-locked');
    
    await this.loadCardsFromCatalog();

    this.dialog.style.backgroundColor = 'var(--color-dark, #141414)';
    
    const sidePanel = this.dialog.querySelector('.property-map-modal__side-panel');
    if (sidePanel) {
      sidePanel.style.backgroundColor = 'var(--color-dark-10, #1a1a1a)';
    }
    
    this.dialog.showModal();

    if (!this.mapInstance && typeof ymaps !== 'undefined') {
      setTimeout(() => {
        ymaps.ready(() => {
          this.initMap();
          if (this.mapInstance) {
            this.mapInstance.container.fitToViewport();
            this.autoScaleMap();
          }
        });
      }, 150);
    } else if (this.mapInstance) {
      setTimeout(() => {
        this.mapInstance.container.fitToViewport();
        this.autoScaleMap();
      }, 150);
    }
  }

  closeModal() {
    this.dialog.close();
    document.body.classList.remove('is-locked');
  }

  async loadCardsFromCatalog() {
    const sidePanelList = this.dialog.querySelector('[data-js-modal-cards-list]');
    if (!sidePanelList || sidePanelList.children.length > 0) return;

    try {
      const response = await fetch('/properties.html');
      if (!response.ok) throw new Error('Catalog page response error');
      
      const htmlText = await response.text();
      const parser = new DOMParser();
      const doc = parser.parseFromString(htmlText, 'text/html');
      const catalogCards = doc.querySelectorAll('.properties-listings .property-card, [data-js-properties-list] .property-card');

      sidePanelList.classList.add('properties-listings');

      catalogCards.forEach((card, index) => {
        const listItem = document.createElement('li');
        listItem.className = 'property-map-modal__item';

        const clonedCard = card.cloneNode(true);
        clonedCard.removeAttribute('style'); 

        clonedCard.classList.remove('swiper-slide', 'swiper-slide-active', 'swiper-slide-next', 'swiper-slide-prev');

        const titleElement = clonedCard.querySelector('.property-card__title') || clonedCard.querySelector('h3');
        if (titleElement) {
          const uniqueId = `modal-card-title-${index}`;
          titleElement.id = uniqueId;
          clonedCard.setAttribute('aria-labelledby', uniqueId);
        }

        listItem.appendChild(clonedCard);
        sidePanelList.appendChild(listItem);
      });
    } catch (error) {
      console.error('[PropertyModalMap] Error fetching ready cards from catalog:', error);
    }
  }

  initMap() {
    if (this.mapInstance) return;

    try {
      const defaultCenter = [34.0259, -118.7798]; 

      this.mapInstance = new ymaps.Map(this.mapContainerId, {
        center: defaultCenter,
        zoom: 12,
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
        { name: 'Rustic Retreat Cottage', coords: [34.0120, -118.8200], desc: 'Premium Sea View' }
      ];

      properties.forEach(item => {
        const placemark = new ymaps.Placemark(item.coords, {
          balloonContentHeader: `<b style="color: #141414;">${item.name}</b>`,
          balloonContentBody: `<span style="color: #141414;">${item.desc}</span>`,
          hintContent: item.name
        }, {
          preset: 'islands#violetDotIcon'
        });

        placemark.events.add('click', () => {
          const sidePanelList = this.dialog.querySelector('[data-js-modal-cards-list]');
          if (!sidePanelList) return;

          const cardsTitles = sidePanelList.querySelectorAll('.property-card__title, h3');
          cardsTitles.forEach(titleElement => {
            if (titleElement.textContent.trim().toLowerCase().includes(item.name.toLowerCase())) {
              const cardContainer = titleElement.closest('.property-card');
              
              if (cardContainer) {
                sidePanelList.querySelectorAll('.property-card--highlighted').forEach(el => el.classList.remove('property-card--highlighted'));
                cardContainer.classList.add('property-card--highlighted');
                
                const sidebarWrapper = sidePanelList.closest('.property-map-modal__side-panel') || sidePanelList;
                const topPos = cardContainer.getBoundingClientRect().top - sidebarWrapper.getBoundingClientRect().top + sidebarWrapper.scrollTop - 20;
                
                sidebarWrapper.scrollTo({ top: topPos, behavior: 'smooth' });
              }
            }
          });
        });

        this.mapInstance.geoObjects.add(placemark);
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

      this.mapInstance.container.fitToViewport();
      this.autoScaleMap();

    } catch (e) {
      console.error('[PropertyModalMap] Error initializing Yandex Maps:', e);
    }
  }

  autoScaleMap() {
    if (!this.mapInstance || !this.searchCircleMarker) return;
    try {
      const defaultCenter = [34.0259, -118.7798];
      if (window.innerWidth < 768) {
        this.searchCircleMarker.geometry.setCoordinates(defaultCenter);
        this.searchCircleMarker.geometry.setRadius(1500);
        this.mapInstance.setCenter(defaultCenter, 12, { duration: 200 });
      } else {
        this.searchCircleMarker.geometry.setCoordinates(defaultCenter);
        this.searchCircleMarker.geometry.setRadius(5000);
        this.mapInstance.setCenter(defaultCenter, 11, { duration: 200 });
      }
    } catch (e) {
      console.error('[PropertyModalMap] AutoScale Error:', e);
    }
  }

  bindEvents() {
    this.openBtn.addEventListener('click', () => this.openModal());
    this.closeBtn.addEventListener('click', () => this.closeModal());

    this.dialog.addEventListener('click', (e) => {
      if (e.target === this.dialog) {
        this.closeModal();
      }
    });

    window.addEventListener('resize', () => {
      if (this.dialog.hasAttribute('open')) {
        setTimeout(() => this.autoScaleMap(), 150);
      }
    });
  }
}

export default PropertyModalMap;