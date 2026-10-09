class Header {
  selectors = {
    root: '[data-js-header]',
    overlay: '[data-js-header-overlay]',
    burger: '[data-js-header-burger]',
    backdrop: '[data-js-header-backdrop]',
    menuLink: '.header__menu-link',
    announcement: '[data-js-announcement]',
    announcementClose: '[data-js-announcement-close]',
    contact: '.header__contact',
  }

  stateClasses = {
    isActive: 'is-active',
    isLock: 'is-lock',
    isHidden: 'is-hidden',
  }

  mobileBreakpoint = 767.98

  focusableSelector = [
    'a[href]',
    'button:not([disabled])',
    'input:not([disabled])',
    'select:not([disabled])',
    'textarea:not([disabled])',
    '[tabindex]:not([tabindex="-1"])',
  ].join(',')

  constructor() {
    this.rootElement = document.querySelector(
      this.selectors.root
    )

    this.announcementElement = document.querySelector(
      this.selectors.announcement
    )

    if (this.rootElement) {
      this.overlayElement = this.rootElement.querySelector(
        this.selectors.overlay
      )

      this.burgerElement = this.rootElement.querySelector(
        this.selectors.burger
      )

      this.backdropElement = this.rootElement.querySelector(
        this.selectors.backdrop
      )

      this.menuLinkElements =
        this.rootElement.querySelectorAll(
          this.selectors.menuLink
        )

      this.contactElement = this.rootElement.querySelector(
        this.selectors.contact
      )

      this.previouslyFocusedElement = null

      this.syncMenuAccessibility()
      this.bindHeaderEvents()
      this.setActiveMenuLink()
    }

    if (this.announcementElement) {
      this.announcementCloseElement =
        this.announcementElement.querySelector(
          this.selectors.announcementClose
        )

      this.bindAnnouncementEvents()
    }
  }

  get isMenuOpen() {
    return Boolean(
      this.rootElement?.classList.contains(
        this.stateClasses.isActive
      )
    )
  }

  normalizePath(pathname) {
    const normalizedPath =
      pathname
        .replace(/\/index\.(?:html|php)$/i, '/')
        .replace(/\/+$/, '') || '/'

    const staticPagePaths = {
      '/about.html': '/about',
      '/properties.html': '/properties',
      '/services.html': '/services',
      '/property-details.html': '/property-details',
      '/contacts.html': '/contacts',
    }

    return staticPagePaths[normalizedPath] ?? normalizedPath
  }

  syncMenuAccessibility() {
    if (!this.overlayElement) {
      return
    }

    const isMobile =
      window.innerWidth <= this.mobileBreakpoint

    if (!isMobile) {
      this.overlayElement.removeAttribute('aria-hidden')
      this.overlayElement.inert = false
      return
    }

    this.overlayElement.setAttribute(
      'aria-hidden',
      String(!this.isMenuOpen)
    )

    this.overlayElement.inert = !this.isMenuOpen
  }

  openMenu() {
    if (
      !this.rootElement ||
      !this.burgerElement
    ) {
      return
    }

    const scrollbarWidth =
      window.innerWidth -
      document.documentElement.clientWidth

    document.documentElement.style.setProperty(
      '--scrollbar-compensation',
      `${scrollbarWidth}px`
    )

    this.previouslyFocusedElement =
      document.activeElement

    this.rootElement.classList.add(
      this.stateClasses.isActive
    )

    this.burgerElement.classList.add(
      this.stateClasses.isActive
    )

    this.burgerElement.setAttribute(
      'aria-expanded',
      'true'
    )

    this.burgerElement.setAttribute(
      'aria-label',
      'Close navigation menu'
    )

    document.documentElement.classList.add(
      this.stateClasses.isLock
    )

    this.syncMenuAccessibility()

    requestAnimationFrame(() => {
      const firstFocusableElement =
        this.overlayElement?.querySelector(
          this.focusableSelector
        )

      firstFocusableElement?.focus()
    })
  }

  closeMenu({ restoreFocus = false } = {}) {
    if (
      !this.rootElement ||
      !this.burgerElement
    ) {
      return
    }

    this.rootElement.classList.remove(
      this.stateClasses.isActive
    )

    this.burgerElement.classList.remove(
      this.stateClasses.isActive
    )

    this.burgerElement.setAttribute(
      'aria-expanded',
      'false'
    )

    this.burgerElement.setAttribute(
      'aria-label',
      'Open navigation menu'
    )

    document.documentElement.classList.remove(
      this.stateClasses.isLock
    )

    document.documentElement.style.removeProperty(
      '--scrollbar-compensation'
    )

    this.syncMenuAccessibility()

    if (
      restoreFocus &&
      this.previouslyFocusedElement instanceof HTMLElement
    ) {
      this.previouslyFocusedElement.focus()
    }

    this.previouslyFocusedElement = null
  }

  toggleMenu() {
    if (this.isMenuOpen) {
      this.closeMenu({ restoreFocus: true })
    } else {
      this.openMenu()
    }
  }

  setActiveMenuLink() {
    if (!this.menuLinkElements) {
      return
    }

    const currentPath = this.normalizePath(
      window.location.pathname
    )

    const navigationPath =
      currentPath === '/property-details'
        ? '/properties'
        : currentPath

    this.menuLinkElements.forEach((linkElement) => {
      const linkPath = this.normalizePath(
        new URL(
          linkElement.href,
          window.location.origin
        ).pathname
      )

      const isActive = linkPath === navigationPath

      linkElement.classList.toggle(
        this.stateClasses.isActive,
        isActive
      )

      if (isActive) {
        linkElement.setAttribute('aria-current', 'page')
      } else {
        linkElement.removeAttribute('aria-current')
      }
    })

    const isContactPage = currentPath === '/contacts'

    this.contactElement?.classList.toggle(
      this.stateClasses.isActive,
      isContactPage
    )

    if (isContactPage) {
      this.contactElement?.setAttribute(
        'aria-current',
        'page'
      )
    } else {
      this.contactElement?.removeAttribute('aria-current')
    }
  }

  trapMenuFocus(event) {
    if (
      event.key !== 'Tab' ||
      !this.isMenuOpen ||
      !this.overlayElement
    ) {
      return
    }

    const focusableElements = [
      ...this.overlayElement.querySelectorAll(
        this.focusableSelector
      ),
    ].filter((element) => {
      return !element.hidden
    })

    if (!focusableElements.length) {
      return
    }

    const firstElement = focusableElements[0]

    const lastElement =
      focusableElements[
      focusableElements.length - 1
      ]

    if (
      event.shiftKey &&
      document.activeElement === firstElement
    ) {
      event.preventDefault()
      lastElement.focus()
      return
    }

    if (
      !event.shiftKey &&
      document.activeElement === lastElement
    ) {
      event.preventDefault()
      firstElement.focus()
    }
  }

  onDocumentKeydown = (event) => {
    this.trapMenuFocus(event)

    if (
      event.key === 'Escape' &&
      this.isMenuOpen
    ) {
      this.closeMenu({ restoreFocus: true })
    }
  }

  onWindowResize = () => {
    if (
      window.innerWidth > this.mobileBreakpoint &&
      this.isMenuOpen
    ) {
      this.closeMenu()
    }

    this.syncMenuAccessibility()
  }

  bindHeaderEvents() {
    this.burgerElement?.addEventListener(
      'click',
      () => this.toggleMenu()
    )

    this.backdropElement?.addEventListener(
      'click',
      () => this.closeMenu({ restoreFocus: true })
    )

    this.menuLinkElements?.forEach(
      (linkElement) => {
        linkElement.addEventListener(
          'click',
          () => {
            this.closeMenu({
              restoreFocus: true,
            })
          }
        )
      }
    )

    this.contactElement?.addEventListener(
      'click',
      () => {
        this.closeMenu({
          restoreFocus: true,
        })
      }
    )

    document.addEventListener(
      'keydown',
      this.onDocumentKeydown
    )

    window.addEventListener(
      'resize',
      this.onWindowResize
    )
  }

  bindAnnouncementEvents() {
    this.announcementCloseElement?.addEventListener(
      'click',
      () => {
        this.announcementElement.classList.add(
          this.stateClasses.isHidden
        )
      }
    )
  }
}

export default Header