class PropertiesMap {
  constructor() {
    this.toggleBtn = document.querySelector('[data-js-map-toggle]');
    this.mapWrapper = document.querySelector('[data-js-map-wrapper]');
    this.propertiesList = document.querySelector('[data-js-properties-list]');
    this.mapContainerId = 'estatein-yandex-map';
    this.mapInstance = null;
    this.searchCircleMarker = null;
    this.savedSwiperParams = null;

    if (!this.toggleBtn || !this.mapWrapper || !this.propertiesList) {
      return;
    }
    this.bindEvents();
  }

  toggleInterface(event) {
    if (event) {
      event.preventDefault();
    }

    const isMapActive = this.propertiesList.classList.contains('is-map-active');
    const swiperContainer = this.propertiesList.querySelector('.swiper');

    if (!isMapActive) {
      this.propertiesList.classList.add('is-map-active');
      this.mapWrapper.classList.add('is-active');
      this.toggleBtn.textContent = 'Show List Only';

      if (swiperContainer && swiperContainer.swiper) {
        const swiperInstance = swiperContainer.swiper;

        if (!this.savedSwiperParams) {
          this.savedSwiperParams = {
            slidesPerView: swiperInstance.params.slidesPerView,
            slidesPerGroup: swiperInstance.params.slidesPerGroup,
            breakpoints: JSON.parse(JSON.stringify(swiperInstance.params.breakpoints || {}))
          };
        }

        setTimeout(() => {
          swiperInstance.params.slidesPerView = 1;
          swiperInstance.params.slidesPerGroup = 1;
          swiperInstance.params.breakpoints = {};
          
          swiperInstance.update();
          swiperInstance.slideTo(0, 0);
          this.adjustMapHeight();
        }, 100);
      }

      if (!this.mapInstance && typeof ymaps !== 'undefined') {
        setTimeout(() => {
          ymaps.ready(() => {
            this.initMap();
            if (this.mapInstance) {
              this.mapInstance.container.fitToViewport();
              this.autoScaleMap();
              this.adjustMapHeight();
            }
          });
        }, 150);
      } else if (this.mapInstance) {
        setTimeout(() => {
          this.mapInstance.container.fitToViewport();
          this.autoScaleMap();
          this.adjustMapHeight();
        }, 150);
      }

    } else {
      this.propertiesList.classList.remove('is-map-active');
      this.mapWrapper.classList.remove('is-active');
      this.toggleBtn.textContent = 'Show on Map';

      const mapBody = this.mapWrapper ? this.mapWrapper.querySelector('.properties-map-wrapper__body') : null;
      if (mapBody) {
        mapBody.style.height = '';
      }

      if (swiperContainer && swiperContainer.swiper) {
        const swiperInstance = swiperContainer.swiper;

        setTimeout(() => {
          if (this.savedSwiperParams) {
            swiperInstance.params.slidesPerView = this.savedSwiperParams.slidesPerView;
            swiperInstance.params.slidesPerGroup = this.savedSwiperParams.slidesPerGroup;
            swiperInstance.params.breakpoints = Object.assign({}, this.savedSwiperParams.breakpoints);
          } else {
            const section = this.propertiesList.querySelector('.properties-listings');
            const desktopSlides = section ? parseInt(section.getAttribute('data-slider-slides-desktop')) || 3 : 3;
            const tabletSlides = section ? parseInt(section.getAttribute('data-slider-slides-tablet')) || 2 : 2;
            
            swiperInstance.params.breakpoints = {
              768: { slidesPerView: tabletSlides, slidesPerGroup: 1 },
              1200: { slidesPerView: desktopSlides, slidesPerGroup: 1 }
            };
          }

          if (typeof swiperInstance.emit === 'function') {
            swiperInstance.emit('breakpoint'); 
          }
          
          swiperInstance.update();
        }, 100);
      }
    }
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
      console.error('[PropertiesMap] Error:', e);
    }
  }

  adjustMapHeight() {
    const activeCard = this.propertiesList.querySelector('.swiper-slide-active .property-card') || 
      this.propertiesList.querySelector('.property-card');
    const mapBody = this.mapWrapper ? this.mapWrapper.querySelector('.properties-map-wrapper__body') : null;

    if (window.innerWidth >= 768 && activeCard && mapBody) {
      const cardHeight = activeCard.offsetHeight;
      mapBody.style.height = `${cardHeight}px`;
      if (this.mapInstance) {
        this.mapInstance.container.fitToViewport();
      }
    } else if (window.innerWidth < 768 && mapBody) {
      mapBody.style.height = '';
      if (this.mapInstance) {
        this.mapInstance.container.fitToViewport();
      }
    }
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
    this.toggleBtn.addEventListener('click', (e) => this.toggleInterface(e));
    
    window.addEventListener('resize', () => {
      if (this.mapInstance) {
        setTimeout(() => {
          this.adjustMapHeight();
          this.autoScaleMap();
        }, 50);
      }
    });

    const swiperContainer = this.propertiesList.querySelector('.swiper');
    if (swiperContainer && swiperContainer.swiper) {
      swiperContainer.swiper.on('slideChange', () => {
        if (this.propertiesList.classList.contains('is-map-active')) {
          setTimeout(() => this.adjustMapHeight(), 50);
        }
      });
    }
  }
}

export default PropertiesMap;