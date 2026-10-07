class ScrollToTop {
  selectors = {
    button: '[data-js-scroll-top]',
  }

  stateClasses = {
    isVisible: 'is-visible',
  }

  constructor() {
    this.buttonElement = document.querySelector(
      this.selectors.button
    )

    if (!this.buttonElement) {
      return
    }

    this.isTicking = false

    this.bindEvents()
    this.update()
  }

  update = () => {
    this.buttonElement.classList.toggle(
      this.stateClasses.isVisible,
      window.scrollY > 600
    )

    this.isTicking = false
  }

  onScroll = () => {
    if (this.isTicking) {
      return
    }

    this.isTicking = true
    requestAnimationFrame(this.update)
  }

  scrollToTop = () => {
    const prefersReducedMotion =
      window.matchMedia(
        '(prefers-reduced-motion: reduce)'
      ).matches

    window.scrollTo({
      top: 0,
      behavior: prefersReducedMotion
        ? 'auto'
        : 'smooth',
    })
  }

  bindEvents() {
    window.addEventListener(
      'scroll',
      this.onScroll,
      { passive: true }
    )

    this.buttonElement.addEventListener(
      'click',
      this.scrollToTop
    )
  }
}

export default ScrollToTop