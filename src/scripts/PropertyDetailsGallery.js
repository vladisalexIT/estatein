import Swiper from 'swiper'
import {
  A11y,
  Keyboard,
  Navigation,
  Pagination,
} from 'swiper/modules'

class PropertyDetailsGallery {
  selectors = {
    root: '[data-property-gallery]',
    swiper: '[data-gallery-swiper]',
    previousButton: '[data-gallery-prev]',
    nextButton: '[data-gallery-next]',
    pagination: '[data-gallery-pagination]',
    thumbnail: '[data-gallery-thumb]',
    infoPanel: '[data-gallery-info]',
  }

  constructor() {
    document
      .querySelectorAll(this.selectors.root)
      .forEach((rootElement) => {
        this.init(rootElement)
      })
  }

  init(rootElement) {
    const swiperElement = rootElement.querySelector(
      this.selectors.swiper
    )

    const previousButtonElement =
      rootElement.querySelector(
        this.selectors.previousButton
      )

    const nextButtonElement =
      rootElement.querySelector(
        this.selectors.nextButton
      )

    const paginationElement =
      rootElement.querySelector(
        this.selectors.pagination
      )

    const thumbnailElements = [
      ...rootElement.querySelectorAll(
        this.selectors.thumbnail
      ),
    ]

    const infoPanelElements = [
      ...rootElement.querySelectorAll(
        this.selectors.infoPanel
      ),
    ]

    if (
      !swiperElement ||
      !previousButtonElement ||
      !nextButtonElement ||
      !paginationElement ||
      !thumbnailElements.length ||
      !infoPanelElements.length
    ) {
      return
    }

    const updateThumbnails = (activeIndex) => {
      thumbnailElements.forEach((thumbnailElement) => {
        const thumbnailIndex = Number(
          thumbnailElement.dataset.galleryThumb
        )

        const isActive =
          thumbnailIndex === activeIndex

        thumbnailElement.classList.toggle(
          'is-active',
          isActive
        )

        thumbnailElement.setAttribute(
          'aria-current',
          String(isActive)
        )

        if (isActive) {
          thumbnailElement.scrollIntoView({
            behavior: 'smooth',
            block: 'nearest',
            inline: 'center',
          })
        }
      })
    }

    const updateInfoPanel = (activeIndex) => {
      infoPanelElements.forEach((panelElement) => {
        const panelIndex = Number(
          panelElement.dataset.galleryInfo
        )

        const isActive =
          panelIndex === activeIndex

        panelElement.hidden = !isActive
        panelElement.classList.remove('is-active')
        panelElement.setAttribute(
          'aria-hidden',
          String(!isActive)
        )
      })

      const activePanel = infoPanelElements.find(
        (panelElement) =>
          Number(panelElement.dataset.galleryInfo) ===
          activeIndex
      )

      if (!activePanel) {
        return
      }

      requestAnimationFrame(() => {
        activePanel.classList.add('is-active')
      })
    }

    const swiper = new Swiper(swiperElement, {
      modules: [
        A11y,
        Keyboard,
        Navigation,
        Pagination,
      ],

      slidesPerView: 1,
      slidesPerGroup: 1,
      spaceBetween: 0,
      speed: 550,
      loop: false,
      watchOverflow: false,
      observer: true,
      observeParents: true,

      keyboard: {
        enabled: true,
        onlyInViewport: true,
      },

      a11y: {
        enabled: true,
        prevSlideMessage: 'Previous property gallery slide',
        nextSlideMessage: 'Next property gallery slide',
        firstSlideMessage: 'This is the first property gallery slide',
        lastSlideMessage: 'This is the last property gallery slide',
      },

      navigation: {
        prevEl: previousButtonElement,
        nextEl: nextButtonElement,
      },

      pagination: {
        el: paginationElement,
        clickable: true,
        bulletClass: 'property-gallery__bullet',
        bulletActiveClass: 'is-active',
      },

      on: {
        init: (instance) => {
          updateThumbnails(instance.activeIndex)
          updateInfoPanel(instance.activeIndex)
        },

        slideChange: (instance) => {
          updateThumbnails(instance.activeIndex)
        },

        slideChangeTransitionEnd: (instance) => {
          updateInfoPanel(instance.activeIndex)
        },
      },
    })

    thumbnailElements.forEach((thumbnailElement) => {
      thumbnailElement.addEventListener(
        'click',
        () => {
          const targetIndex = Number(
            thumbnailElement.dataset.galleryThumb
          )

          if (!Number.isInteger(targetIndex)) {
            return
          }

          swiper.slideTo(targetIndex)
        }
      )
    })
  }
}

export default PropertyDetailsGallery