import Swiper from 'swiper'
import {
    A11y,
    Keyboard,
    Navigation,
    Pagination,
} from 'swiper/modules'

class Slider {
    selectors = {
        root: '[data-js-slider]',
        swiper: '[data-js-slider-swiper]',
        previousButton: '[data-js-slider-prev]',
        nextButton: '[data-js-slider-next]',
        pagination: '[data-js-slider-pagination]',
        current: '[data-js-slider-current]',
        total: '[data-js-slider-total]',
    }

    constructor(rootElement) {
        this.rootElement = rootElement

        this.swiperElement = this.rootElement.querySelector(
            this.selectors.swiper
        )

        if (!this.swiperElement) {
            return
        }

        this.slidesCount =
            this.swiperElement.querySelectorAll(
                '.swiper-slide'
            ).length

        this.previousButtonElement =
            this.rootElement.querySelector(
                this.selectors.previousButton
            )

        this.nextButtonElement =
            this.rootElement.querySelector(
                this.selectors.nextButton
            )

        this.paginationElement =
            this.rootElement.querySelector(
                this.selectors.pagination
            )

        this.currentElement =
            this.rootElement.querySelector(
                this.selectors.current
            )

        this.totalElement =
            this.rootElement.querySelector(
                this.selectors.total
            )

        this.init()
    }

    getNumberData(attributeName, fallbackValue) {
        const value = Number(
            this.rootElement.dataset[attributeName]
        )

        return Number.isFinite(value)
            ? value
            : fallbackValue
    }

    getBooleanData(attributeName, fallbackValue) {
        const value =
            this.rootElement.dataset[attributeName]

        if (value === undefined) {
            return fallbackValue
        }

        return value === 'true'
    }

    formatNumber(value) {
        return String(value).padStart(2, '0')
    }

    updateCounter(swiper) {
        if (!this.currentElement || !this.totalElement) {
            return
        }

        const currentSlideIndex =
            swiper.realIndex + 1

        const totalSlides = this.slidesCount

        this.currentElement.textContent =
            this.formatNumber(currentSlideIndex)

        this.totalElement.textContent =
            this.formatNumber(totalSlides)
    }

    init() {
        const slidesDesktop =
            this.getNumberData(
                'sliderSlidesDesktop',
                3
            )

        const slidesTablet =
            this.getNumberData(
                'sliderSlidesTablet',
                2
            )

        const slidesMobile =
            this.getNumberData(
                'sliderSlidesMobile',
                1
            )

        const groupDesktop =
            this.getNumberData(
                'sliderGroupDesktop',
                1
            )

        const groupTablet =
            this.getNumberData(
                'sliderGroupTablet',
                1
            )

        const groupMobile =
            this.getNumberData(
                'sliderGroupMobile',
                1
            )

        const shouldLoop =
            this.getBooleanData(
                'sliderLoop',
                true
            )

        this.swiper = new Swiper(
            this.swiperElement,
            {
                modules: [
                    A11y,
                    Keyboard,
                    Navigation,
                    Pagination,
                ],

                slidesPerView: slidesMobile,
                slidesPerGroup: groupMobile,
                spaceBetween: 16,
                speed: 500,
                loop: shouldLoop,
                watchOverflow: true,

                keyboard: {
                    enabled: true,
                    onlyInViewport: true,
                },

                a11y: {
                    enabled: true,
                },

                navigation: {
                    prevEl: this.previousButtonElement,
                    nextEl: this.nextButtonElement,
                },

                pagination: this.paginationElement
                    ? {
                        el: this.paginationElement,
                        clickable: true,
                    }
                    : false,

                breakpoints: {
                    768: {
                        slidesPerView: slidesTablet,
                        slidesPerGroup: groupTablet,
                        spaceBetween: 20,
                    },

                    1024: {
                        slidesPerView: slidesDesktop,
                        slidesPerGroup: groupDesktop,
                        spaceBetween: 20,
                    },

                    1441: {
                        slidesPerView: slidesDesktop,
                        slidesPerGroup: groupDesktop,
                        spaceBetween: 30,
                    },
                },

                on: {
                    init: (swiper) => {
                        this.updateCounter(swiper)
                    },

                    slideChange: (swiper) => {
                        this.updateCounter(swiper)
                    },
                },
            }
        )
    }
}

class SliderCollection {
    constructor() {
        document
            .querySelectorAll('[data-js-slider]')
            .forEach((rootElement) => {
                new Slider(rootElement)
            })
    }
}

export default SliderCollection