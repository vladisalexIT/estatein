import Swiper from 'swiper'
import {
    A11y,
    Keyboard,
    Navigation,
    Pagination,
} from 'swiper/modules'

class Slider {
    selectors = {
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

        this.counterMode =
            this.rootElement.dataset.sliderCounterMode ||
            'pages'

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

    getNumberData(name, fallback) {
        const rawValue = this.rootElement.dataset[name]

        if (rawValue === undefined || rawValue === '') {
            return fallback
        }

        const value = Number(rawValue)

        return Number.isFinite(value) && value > 0
            ? value
            : fallback
    }

    getBooleanData(name, fallback) {
        const value = this.rootElement.dataset[name]

        if (value === undefined) {
            return fallback
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

        if (this.counterMode === 'visible-cards') {
            const slidesPerView =
                Number(swiper.params.slidesPerView) || 1

            const visibleSlidesCount = Math.max(
                Math.ceil(slidesPerView),
                1
            )

            const firstVisibleSlideIndex =
                swiper.realIndex ?? swiper.activeIndex

            const currentCard = Math.min(
                firstVisibleSlideIndex +
                visibleSlidesCount,
                this.slidesCount
            )

            this.currentElement.textContent =
                this.formatNumber(currentCard)

            this.totalElement.textContent =
                this.formatNumber(this.slidesCount)

            return
        }

        const totalPages = Math.max(
            swiper.snapGrid.length,
            1
        )

        const currentPage = Math.min(
            swiper.snapIndex + 1,
            totalPages
        )

        this.currentElement.textContent =
            this.formatNumber(currentPage)

        this.totalElement.textContent =
            this.formatNumber(totalPages)
    }

    init() {
        const slidesDesktop = this.getNumberData(
            'sliderSlidesDesktop',
            3
        )
        const slidesTablet = this.getNumberData(
            'sliderSlidesTablet',
            2
        )
        const slidesMobile = this.getNumberData(
            'sliderSlidesMobile',
            1
        )

        const groupDesktop = this.getNumberData(
            'sliderGroupDesktop',
            1
        )
        const groupTablet = this.getNumberData(
            'sliderGroupTablet',
            1
        )
        const groupMobile = this.getNumberData(
            'sliderGroupMobile',
            1
        )

        const spaceDesktop = this.getNumberData(
            'sliderSpaceDesktop',
            30
        )

        const spaceTablet = this.getNumberData(
            'sliderSpaceTablet',
            20
        )

        const spaceMobile = this.getNumberData(
            'sliderSpaceMobile',
            16
        )

        const shouldLoop = this.getBooleanData(
            'sliderLoop',
            false
        )

        this.swiper = new Swiper(this.swiperElement, {
            modules: [
                A11y,
                Keyboard,
                Navigation,
                Pagination,
            ],

            slidesPerView: slidesMobile,
            slidesPerGroup: groupMobile,
            spaceBetween: spaceMobile,
            speed: 500,
            loop: shouldLoop,
            watchOverflow: true,
            observer: true,
            observeParents: true,

            keyboard: {
                enabled: true,
                onlyInViewport: true,
            },

            a11y: {
                enabled: true,
                prevSlideMessage: 'Previous slide',
                nextSlideMessage: 'Next slide',
                firstSlideMessage: 'This is the first slide',
                lastSlideMessage: 'This is the last slide',
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
                    spaceBetween: spaceTablet,
                },
                1024: {
                    slidesPerView: slidesDesktop,
                    slidesPerGroup: groupDesktop,
                    spaceBetween: spaceTablet,
                },
                1441: {
                    slidesPerView: slidesDesktop,
                    slidesPerGroup: groupDesktop,
                    spaceBetween: spaceDesktop,
                },
            },

            on: {
                init: (swiper) => this.updateCounter(swiper),
                slideChange: (swiper) => this.updateCounter(swiper),
                breakpoint: (swiper) => {
                    requestAnimationFrame(() => {
                        this.updateCounter(swiper)
                    })
                },
                resize: (swiper) => {
                    requestAnimationFrame(() => {
                        this.updateCounter(swiper)
                    })
                },
            },
        })
    }
}

class SliderCollection {
    selector = '[data-js-slider]'

    instances = new Map()

    constructor() {
        this.init(document)

        document.addEventListener(
            'estatein:property-listings-updated',
            (event) => {
                const scope =
                    event.detail?.rootElement

                this.removeDisconnected()

                if (
                    scope instanceof Element ||
                    scope instanceof Document
                ) {
                    this.init(scope)
                }
            }
        )
    }

    destroy(rootElement) {
        const instance =
            this.instances.get(rootElement)

        if (
            instance?.swiper &&
            !instance.swiper.destroyed
        ) {
            instance.swiper.destroy(true, true)
        }

        this.instances.delete(rootElement)

        delete rootElement.dataset.sliderInitialized
    }

    removeDisconnected() {
        for (const rootElement of this.instances.keys()) {
            if (!rootElement.isConnected) {
                this.destroy(rootElement)
            }
        }
    }

    init(scope) {
        const rootElements = new Set()

        if (
            scope instanceof Element &&
            scope.matches(this.selector)
        ) {
            rootElements.add(scope)
        }

        scope.querySelectorAll(this.selector)
            .forEach((rootElement) => {
                rootElements.add(rootElement)
            })

        if (scope instanceof Element) {
            const parentRoot =
                scope.closest(this.selector)

            if (parentRoot) {
                rootElements.add(parentRoot)
            }
        }

        rootElements.forEach((rootElement) => {
            this.initSlider(rootElement)
        })
    }

    initSlider(rootElement) {
        const swiperElement =
            rootElement.querySelector(
                '[data-js-slider-swiper]'
            )

        const instance =
            this.instances.get(rootElement)

        if (!swiperElement) {
            if (instance) {
                this.destroy(rootElement)
            }

            delete rootElement.dataset.sliderInitialized

            return
        }

        const hasCurrentInstance =
            instance?.swiper &&
            !instance.swiper.destroyed &&
            instance.swiperElement === swiperElement

        if (hasCurrentInstance) {
            instance.slidesCount =
                swiperElement.querySelectorAll(
                    '.swiper-slide'
                ).length

            instance.swiper.update()
            instance.updateCounter(instance.swiper)

            return
        }

        if (instance) {
            this.destroy(rootElement)
        }

        const newInstance = new Slider(rootElement)

        if (
            newInstance.swiper &&
            !newInstance.swiper.destroyed
        ) {
            this.instances.set(
                rootElement,
                newInstance
            )

            rootElement.dataset.sliderInitialized =
                'true'
        }
    }
}

export default SliderCollection