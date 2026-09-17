class Header {
  selectors = {
    root: '[data-js-header]',
    overlay: '[data-js-header-overlay]',
    burger: '[data-js-header-burger]',
    backdrop: '[data-js-header-backdrop]',
    menuLink: '.header__menu-link',
    announcement: '[data-js-announcement]',
    announcementClose: '[data-js-announcement-close]',
  }

  stateClasses = {
    isActive: 'is-active',
    isLock: 'is-lock',
    isHidden: 'is-hidden',
  }

  constructor() {
    this.rootElement = document.querySelector(
      this.selectors.root
    )

    this.announcementElement = document.querySelector(
      this.selectors.announcement
    )

    if (this.rootElement) {
      this.overlayElement =
        this.rootElement.querySelector(
          this.selectors.overlay
        )

      this.burgerElement =
        this.rootElement.querySelector(
          this.selectors.burger
        )

      this.backdropElement =
        this.rootElement.querySelector(
          this.selectors.backdrop
        )

      this.menuLinkElements =
        this.rootElement.querySelectorAll(
          this.selectors.menuLink
        )

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
    return this.rootElement.classList.contains(
      this.stateClasses.isActive
    )
  }

  openMenu() {
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
  }

  closeMenu() {
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
  }

  toggleMenu() {
    if (this.isMenuOpen) {
      this.closeMenu()
    } else {
      this.openMenu()
    }
  }

  setActiveMenuLink() {
    const currentPath = window.location.pathname

    this.menuLinkElements.forEach((linkElement) => {
      const linkPath = new URL(
        linkElement.href
      ).pathname

      const normalizedCurrentPath =
        currentPath === '/index.html'
          ? '/'
          : currentPath

      const isActive =
        linkPath === normalizedCurrentPath

      linkElement.classList.toggle(
        this.stateClasses.isActive,
        isActive
      )

      if (isActive) {
        linkElement.setAttribute(
          'aria-current',
          'page'
        )
      } else {
        linkElement.removeAttribute(
          'aria-current'
        )
      }
    })
  }

  onDocumentKeydown = (event) => {
    if (
      event.key === 'Escape' &&
      this.isMenuOpen
    ) {
      this.closeMenu()
      this.burgerElement.focus()
    }
  }

  onWindowResize = () => {
    const mobileBreakpoint = 767.98

    if (
      window.innerWidth > mobileBreakpoint &&
      this.isMenuOpen
    ) {
      this.closeMenu()
    }
  }

  bindHeaderEvents() {
    this.burgerElement.addEventListener(
      'click',
      () => this.toggleMenu()
    )

    this.backdropElement?.addEventListener(
      'click',
      () => this.closeMenu()
    )

    this.menuLinkElements.forEach((linkElement) => {
      linkElement.addEventListener(
        'click',
        () => this.closeMenu()
      )
    })

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