const DEFAULT_CENTER = [34.0259, -118.7798];

const escapeHtml = (value) =>
  String(value).replace(/[&<>"']/g, (character) => ({
    '&': '&amp;',
    '<': '&lt;',
    '>': '&gt;',
    '"': '&quot;',
    "'": '&#39;',
  }[character]));

const parseCoordinate = (value, minimum, maximum) => {
  const normalized = String(value ?? '')
    .trim()
    .replace(',', '.');

  if (
    !/^[+-]?(?:\d+(?:\.\d+)?|\.\d+)$/.test(normalized)
  ) {
    return null;
  }

  const coordinate = Number(normalized);

  if (
    !Number.isFinite(coordinate)
    || coordinate < minimum
    || coordinate > maximum
  ) {
    return null;
  }

  return coordinate;
};

class PropertyMapSupport {
  constructor({
    containerId,
    getCards,
    onSelect,
    isVisible,
  }) {
    this.containerId = containerId;
    this.getCards = getCards;
    this.onSelect = onSelect;
    this.isVisible = isVisible;

    this.map = null;
    this.points = null;
    this.circle = null;
    this.pending = null;

    this.items = new Map();
    this.markers = new Map();
    this.selectedId = '';
    this.statusElement = null;
  }

  readItems() {
    const items = new Map();

    this.getCards().forEach((card) => {
      const id = String(
        card.dataset.propertyId ?? ''
      ).trim();

      if (!id || items.has(id)) {
        return;
      }

      const latitude = parseCoordinate(
        card.dataset.propertyLatitude,
        -90,
        90
      );

      const longitude = parseCoordinate(
        card.dataset.propertyLongitude,
        -180,
        180
      );

      const title = (
        card.querySelector('.property-card__title')
          ?.textContent ?? ''
      ).trim();

      items.set(id, {
        id,
        title,
        location: (
          card.dataset.propertyLocation ?? ''
        ).trim(),
        coords:
          latitude !== null && longitude !== null
            ? [latitude, longitude]
            : null,
      });
    });

    return items;
  }

  setStatus(message = '') {
    if (!this.statusElement) {
      const container = document.getElementById(
        this.containerId
      );

      const host = container?.parentElement;

      if (!host) {
        return;
      }

      host.classList.add('estatein-map-host');

      this.statusElement = document.createElement('p');
      this.statusElement.className = 'estatein-map-status';
      this.statusElement.setAttribute('role', 'status');
      this.statusElement.setAttribute('aria-live', 'polite');

      host.appendChild(this.statusElement);
    }

    this.statusElement.textContent = message;
    this.statusElement.hidden = !message;
  }

  async ready() {
    if (this.map) {
      return true;
    }

    if (this.pending) {
      return this.pending;
    }

    const api = window.ymaps;

    if (!api || typeof api.ready !== 'function') {
      this.setStatus(
        'The map is unavailable. Please try again later.'
      );

      return false;
    }

    this.pending = new Promise((resolve) => {
      api.ready(() => {
        if (!this.isVisible()) {
          resolve(false);
          return;
        }

        try {
          this.map = new api.Map(
            this.containerId,
            {
              center: DEFAULT_CENTER,
              zoom: 11,
              controls: [
                'zoomControl',
                'fullscreenControl',
              ],
            },
            {
              autoFitToViewport: 'always',
            }
          );

          const container = document.getElementById(
            this.containerId
          );

          if (container) {
            container.style.filter =
              'invert(100%) hue-rotate(180deg) '
              + 'brightness(95%) contrast(90%)';
          }

          this.points = new api.GeoObjectCollection();

          this.map.geoObjects.add(this.points);

          this.circle = new api.Circle(
            [
              DEFAULT_CENTER,
              window.innerWidth < 768 ? 1500 : 5000,
            ],
            {},
            {
              fillColor: 'rgba(112, 59, 247, 0.12)',
              strokeColor: '#703bf7',
              strokeOpacity: 0.7,
              strokeWidth: 2,
              interactivityModel: 'default#transparent',
            }
          );

          this.map.geoObjects.add(this.circle);

          this.map.events.add('click', (event) => {
            if (event.get('target') !== this.map) {
              return;
            }

            const coords = event.get('coords');

            if (!coords) {
              return;
            }

            this.circle.geometry.setCoordinates(coords);

            this.map.setCenter(
              coords,
              this.map.getZoom(),
              { duration: 300 }
            );
          });

          this.setStatus();
          this.resize();

          resolve(true);
        } catch (error) {
          try {
            this.map?.destroy();
          } catch {

          }

          this.map = null;
          this.points = null;
          this.circle = null;

          this.setStatus(
            'The map could not be loaded. Please try again later.'
          );

          console.error(
            '[PropertyMapSupport] Initialization error:',
            error
          );

          resolve(false);
        }
      });
    });

    const result = await this.pending;
    this.pending = null;

    return result;
  }

  sync({ fit = false } = {}) {
    if (!this.map || !this.points) {
      return;
    }

    this.items = this.readItems();

    if (!this.items.has(this.selectedId)) {
      this.selectedId = '';
    }

    this.points.removeAll();
    this.markers.clear();

    this.items.forEach((item) => {
      if (!item.coords) {
        return;
      }

      const placemark = new window.ymaps.Placemark(
        item.coords,
        {
          balloonContentHeader:
            `<b style="color:#141414;">`
            + `${escapeHtml(item.title)}</b>`,

          balloonContentBody:
            `<span style="color:#666;">`
            + `${escapeHtml(item.location)}</span>`,

          hintContent: escapeHtml(item.title),
        },
        {
          preset: 'islands#violetDotIcon',
        }
      );

      placemark.events.add('click', () => {
        this.onSelect(item.id);
      });

      this.points.add(placemark);
      this.markers.set(item.id, placemark);
    });

    this.select(this.selectedId);

    if (fit) {
      this.fit();
    }
  }

  select(id, { pan = false } = {}) {
    const normalizedId = String(id ?? '').trim();

    this.selectedId = this.items.has(normalizedId)
      ? normalizedId
      : '';

    this.getCards().forEach((card) => {
      const cardId = String(
        card.dataset.propertyId ?? ''
      ).trim();

      card.classList.toggle(
        'property-card--highlighted',
        Boolean(this.selectedId)
          && cardId === this.selectedId
      );
    });

    this.markers.forEach((marker, markerId) => {
      marker.options.set(
        'preset',
        markerId === this.selectedId
          ? 'islands#redDotIcon'
          : 'islands#violetDotIcon'
      );
    });

    const selectedItem = this.items.get(
      this.selectedId
    );

    if (!this.items.size) {
      this.setStatus('No properties found.');
    } else if (selectedItem && !selectedItem.coords) {
      this.setStatus(
        'The location of this property is not specified.'
      );
    } else if (!this.markers.size) {
      this.setStatus(
        'Locations are not specified for these properties.'
      );
    } else {
      this.setStatus();
    }

    if (
      pan
      && this.map
      && selectedItem?.coords
    ) {
      this.map.setCenter(
        selectedItem.coords,
        Math.max(this.map.getZoom(), 12),
        { duration: 250 }
      );
    }
  }

  fit() {
    if (!this.map || !this.points) {
      return;
    }

    const bounds = this.points.getBounds();

    if (!bounds) {
      this.map.setCenter(DEFAULT_CENTER, 11);
      return;
    }

    const isSinglePosition =
      bounds[0][0] === bounds[1][0]
      && bounds[0][1] === bounds[1][1];

    if (isSinglePosition) {
      this.map.setCenter(bounds[0], 13);
      return;
    }

    this.map.setBounds(bounds, {
      checkZoomRange: true,
      zoomMargin: [40, 40, 40, 40],
      duration: 0,
    });
  }

  resize() {
    if (!this.map) {
      return;
    }

    this.map.container.fitToViewport();

    this.circle?.geometry.setRadius(
      window.innerWidth < 768 ? 1500 : 5000
    );
  }
}

export default PropertyMapSupport;
