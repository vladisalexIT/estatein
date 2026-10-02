class ContactsOffices {
  selectors = {
    root: '[data-js-office-tabs]',
    tab: '[role="tab"]',
    panel: '[role="tabpanel"]',
    item: '[data-office-category]',
    empty: '[data-js-offices-empty]',
  }

  constructor() {
    document
      .querySelectorAll(this.selectors.root)
      .forEach((rootElement) => {
        this.init(rootElement)
      })
  }

  init(rootElement) {
    const tabElements = [
      ...rootElement.querySelectorAll(this.selectors.tab),
    ]

    const panelElement = rootElement.querySelector(
      this.selectors.panel
    )

    const itemElements = [
      ...rootElement.querySelectorAll(this.selectors.item),
    ]

    const emptyElement = rootElement.querySelector(
      this.selectors.empty
    )

    if (
      !tabElements.length ||
      !panelElement ||
      !itemElements.length
    ) {
      return
    }

    const setActiveTab = (activeTab, shouldFocus = false) => {
      const filter =
        activeTab.dataset.officeFilter ?? 'all'

      tabElements.forEach((tabElement) => {
        const isActive = tabElement === activeTab

        tabElement.classList.toggle(
          'is-active',
          isActive
        )

        tabElement.setAttribute(
          'aria-selected',
          String(isActive)
        )

        tabElement.setAttribute(
          'tabindex',
          isActive ? '0' : '-1'
        )
      })

      panelElement.setAttribute(
        'aria-labelledby',
        activeTab.id
      )

      let visibleItemsCount = 0

      itemElements.forEach((itemElement) => {
        const isVisible =
          filter === 'all' ||
          itemElement.dataset.officeCategory === filter

        itemElement.hidden = !isVisible

        if (isVisible) {
          visibleItemsCount += 1
        }
      })

      if (emptyElement) {
        emptyElement.hidden = visibleItemsCount > 0
      }

      if (shouldFocus) {
        activeTab.focus()
      }
    }

    tabElements.forEach((tabElement, index) => {
      tabElement.addEventListener('click', () => {
        setActiveTab(tabElement)
      })

      tabElement.addEventListener('keydown', (event) => {
        let nextIndex = index

        if (event.key === 'ArrowRight') {
          nextIndex = (index + 1) % tabElements.length
        }

        if (event.key === 'ArrowLeft') {
          nextIndex =
            (index - 1 + tabElements.length) %
            tabElements.length
        }

        if (event.key === 'Home') {
          nextIndex = 0
        }

        if (event.key === 'End') {
          nextIndex = tabElements.length - 1
        }

        if (nextIndex === index) {
          return
        }

        event.preventDefault()
        setActiveTab(tabElements[nextIndex], true)
      })
    })

    setActiveTab(tabElements[0])
  }
}

export default ContactsOffices