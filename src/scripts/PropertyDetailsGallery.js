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
    thumbnails: '.property-gallery__thumbnails',
    thumbnail: '[data-gallery-thumb]',
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

    const thumbnailsElement =
      rootElement.querySelector(
        this.selectors.thumbnails
      )

    const thumbnailElements = [
      ...rootElement.querySelectorAll(
        this.selectors.thumbnail
      ),
    ]

    if (
      !swiperElement ||
      !previousButtonElement ||
      !nextButtonElement ||
      !paginationElement ||
      !thumbnailElements.length
    ) {
      return
    }

    if (
      swiperElement.swiper &&
      !swiperElement.swiper.destroyed
    ) {
      return
    }

    const reducedMotion = window.matchMedia(
      '(prefers-reduced-motion: reduce)'
    )

    const scrollToThumbnail = (thumbnailElement) => {
      if (
        !thumbnailsElement ||
        thumbnailsElement.scrollWidth <=
        thumbnailsElement.clientWidth
      ) {
        return
      }

      const containerRect =
        thumbnailsElement.getBoundingClientRect()

      const thumbnailRect =
        thumbnailElement.getBoundingClientRect()

      const isFullyVisible =
        thumbnailRect.left >= containerRect.left &&
        thumbnailRect.right <= containerRect.right

      if (isFullyVisible) {
        return
      }

      const targetLeft =
        thumbnailsElement.scrollLeft +
        thumbnailRect.left -
        containerRect.left -
        (thumbnailsElement.clientWidth -
          thumbnailRect.width) /
        2

      thumbnailsElement.scrollTo({
        left: targetLeft,
        behavior: reducedMotion.matches
          ? 'instant'
          : 'smooth',
      })
    }

    const updateThumbnails = (
      activeIndex,
      shouldScroll = false
    ) => {
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

        if (isActive && shouldScroll) {
          scrollToThumbnail(thumbnailElement)
        }
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
      speed: reducedMotion.matches ? 0 : 550,
      loop: false,
      watchOverflow: false,
      observer: true,
      observeParents: true,

      keyboard: {
        enabled: true,
        onlyInViewport: true,
        pageUpDown: false,
      },

      a11y: {
        enabled: true,
        prevSlideMessage:
          'Previous property gallery slide',
        nextSlideMessage:
          'Next property gallery slide',
        firstSlideMessage:
          'This is the first property gallery slide',
        lastSlideMessage:
          'This is the last property gallery slide',
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
        },

        slideChange: (instance) => {
          updateThumbnails(
            instance.activeIndex,
            true
          )
        },
      },
    })

    thumbnailElements.forEach((thumbnailElement) => {
      thumbnailElement.addEventListener(
        'click',
        () => {
          const rawIndex =
            thumbnailElement.dataset.galleryThumb

          if (
            rawIndex === undefined ||
            rawIndex.trim() === ''
          ) {
            return
          }

          const targetIndex = Number(rawIndex)

          if (
            !Number.isInteger(targetIndex) ||
            targetIndex < 0 ||
            targetIndex >= swiper.slides.length
          ) {
            return
          }

          swiper.slideTo(
            targetIndex,
            reducedMotion.matches ? 0 : 550
          )
        }
      )
    })
  }
}

export default PropertyDetailsGallery