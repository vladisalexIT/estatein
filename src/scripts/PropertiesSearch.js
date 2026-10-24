class PropertiesSearch {
  selectors = {
    root: '.properties-search',
    form: '.properties-search__form',
    field: '.properties-search__field',
    select: '.properties-search__select',
    value: '.properties-search__field-value',
    primary: '.properties-search__primary',
    input: '.properties-search__input',
    submit: '.properties-search__submit',
    reset: '[data-js-properties-reset]',
    error: '[data-search-errors]',
    listings: '#property-listings',
  }

  constructor() {
    this.rootElement = document.querySelector(
      this.selectors.root
    )

    if (!this.rootElement) return

    this.formElement = this.rootElement.querySelector(
      this.selectors.form
    )

    if (!this.formElement) return

    this.inputElement = this.formElement.querySelector(
      this.selectors.input
    )

    this.primaryElement = this.formElement.querySelector(
      this.selectors.primary
    )

    this.submitElement = this.formElement.querySelector(
      this.selectors.submit
    )

    this.resetElement = this.rootElement.querySelector(
      this.selectors.reset
    )

    this.errorElement = this.rootElement.querySelector(
      this.selectors.error
    )

    this.selectElements = [
      ...this.formElement.querySelectorAll(
        this.selectors.select
      ),
    ]

    this.isLocal =
      this.formElement.dataset.searchMode === 'local'

    this.isSyncing = false
    this.searchTimer = null
    this.abortController = null
    this.requestId = 0

    const listingsElement = document.querySelector(
      this.selectors.listings
    )

    this.localTemplate = this.isLocal
      ? listingsElement?.cloneNode(true)
      : null

    this.localSlides = this.localTemplate
      ? [
          ...this.localTemplate.querySelectorAll(
            '.swiper-wrapper > .swiper-slide'
          ),
        ]
      : []

    this.statusElement = document.createElement('p')
    this.statusElement.className = 'visually-hidden'
    this.statusElement.setAttribute('role', 'status')
    this.statusElement.setAttribute('aria-live', 'polite')
    this.rootElement.append(this.statusElement)

    if (this.errorElement) {
      this.errorElement.hidden = true
      this.errorElement.setAttribute('role', 'alert')
    }

    this.bindEvents()
    this.syncFormWithUrl(window.location.href)

    if (this.isLocal) {
      this.updateResults({
        historyMode: 'none',
      })
    }
  }

  bindEvents() {
    this.selectElements.forEach((selectElement) => {
      selectElement.addEventListener('change', () => {
        this.updateFieldLabels()
        this.updateResetButton()

        if (this.isSyncing) return

        this.updateResults()
      })
    })

    this.inputElement?.addEventListener('input', (event) => {
      this.updateResetButton()

      window.clearTimeout(this.searchTimer)

      if (event.isComposing) return

      this.searchTimer = window.setTimeout(() => {
        this.updateResults()
      }, 300)
    })

    this.inputElement?.addEventListener(
      'compositionend',
      () => {
        window.clearTimeout(this.searchTimer)

        this.searchTimer = window.setTimeout(() => {
          this.updateResults()
        }, 300)
      }
    )

    this.formElement.addEventListener('submit', (event) => {
      event.preventDefault()

      this.updateResults({
        historyMode: 'push',
        scroll: true,
      })
    })

    this.resetElement?.addEventListener('click', () => {
      this.setFormValues(new URLSearchParams())

      this.updateResults()
    })

    this.primaryElement?.addEventListener(
      'click',
      (event) => {
        if (
          this.submitElement?.contains(event.target)
        ) {
          return
        }

        this.inputElement?.focus()
      }
    )

    window.addEventListener('popstate', () => {
      this.syncFormWithUrl(window.location.href)

      this.updateResults({
        historyMode: 'none',
      })
    })
  }

  updateFieldLabels() {
    this.rootElement
      .querySelectorAll(this.selectors.field)
      .forEach((fieldElement) => {
        const selectElement = fieldElement.querySelector(
          this.selectors.select
        )

        const valueElement = fieldElement.querySelector(
          this.selectors.value
        )

        if (!selectElement || !valueElement) return

        const option =
          selectElement.options[
            selectElement.selectedIndex
          ]

        valueElement.textContent =
          option?.textContent.trim() || ''
      })
  }

  updateResetButton() {
    if (!this.resetElement) return

    const hasQuery =
      Boolean(this.inputElement?.value.trim())

    const hasSelectedFilters =
      this.selectElements.some(
        (selectElement) => selectElement.value !== ''
      )

    this.resetElement.disabled =
      !hasQuery && !hasSelectedFilters
  }

  setFormValues(params) {
    this.isSyncing = true

    try {
      if (this.inputElement) {
        this.inputElement.value =
          params.get(this.inputElement.name) || ''
      }

      this.selectElements.forEach((selectElement) => {
        const requestedValue =
          params.get(selectElement.name) || ''

        const hasOption = [
          ...selectElement.options,
        ].some(
          (option) => option.value === requestedValue
        )

        const value = hasOption ? requestedValue : ''

        if (selectElement._estateinChoices) {
          selectElement._estateinChoices
            .setChoiceByValue(value)
        } else {
          selectElement.value = value
        }

        selectElement.dispatchEvent(
          new Event('change', {
            bubbles: true,
          })
        )
      })
    } finally {
      this.isSyncing = false
    }

    this.updateFieldLabels()
    this.updateResetButton()
  }

  syncFormWithUrl(rawUrl) {
    const url = new URL(
      rawUrl,
      window.location.origin
    )

    this.setFormValues(url.searchParams)
  }

  getFormUrl() {
    const url = new URL(
      this.formElement.action || window.location.href,
      window.location.origin
    )

    const params = new URLSearchParams()

    new FormData(this.formElement).forEach(
      (value, key) => {
        if (
          typeof value === 'string' &&
          value.trim() !== ''
        ) {
          params.append(key, value.trim())
        }
      }
    )

    url.search = params.toString()
    url.hash = ''

    return url
  }

  normalize(value) {
    return String(value)
      .toLocaleLowerCase()
      .replace(/[-_]/g, ' ')
      .replace(/\s+/g, ' ')
      .trim()
  }

  matchesLocalSlide(slideElement, params) {
    const query = this.normalize(
      params.get('query') || ''
    )

    const searchableText = this.normalize(
      [
        slideElement.textContent,
        slideElement.dataset.filterLocation,
        slideElement.dataset.filterType,
      ].join(' ')
    )

    if (
      query &&
      !query.split(' ').every(
        (word) => searchableText.includes(word)
      )
    ) {
      return false
    }

    const fields = [
      ['location', 'filterLocation'],
      ['type', 'filterType'],
      ['size', 'filterSize'],
      ['build-year', 'filterBuildYear'],
    ]

    const matchesFields = fields.every(
      ([parameter, dataKey]) => {
        const selectedValue =
          params.get(parameter) || ''

        return (
          !selectedValue ||
          slideElement.dataset[dataKey] ===
            selectedValue
        )
      }
    )

    if (!matchesFields) return false

    const priceSelect = this.selectElements.find(
      (element) => element.name === 'price'
    )

    if (priceSelect?.value) {
      const selectedOption =
        priceSelect.options[
          priceSelect.selectedIndex
        ]

      const price = Number(
        slideElement.dataset.filterPrice
      )

      if (!Number.isFinite(price)) return false

      const min = selectedOption.dataset.priceMin
      const max = selectedOption.dataset.priceMax

      if (
        min !== undefined &&
        price < Number(min)
      ) {
        return false
      }

      if (
        max !== undefined &&
        price >= Number(max)
      ) {
        return false
      }
    }

    return true
  }

  buildLocalResults(url) {
    if (!this.localTemplate) {
      throw new Error(
        'Local property listings template was not found'
      )
    }

    const nextListings =
      this.localTemplate.cloneNode(true)

    const wrapper = nextListings.querySelector(
      '.swiper-wrapper'
    )

    const matchedSlides = this.localSlides.filter(
      (slideElement) =>
        this.matchesLocalSlide(
          slideElement,
          url.searchParams
        )
    )

    wrapper.replaceChildren(
      ...matchedSlides.map(
        (slideElement) =>
          slideElement.cloneNode(true)
      )
    )

    if (!matchedSlides.length) {
      nextListings
        .querySelector('[data-js-slider-swiper]')
        ?.remove()

      nextListings
        .querySelector('.properties-listings__footer')
        ?.remove()

      const emptyElement =
        document.createElement('div')

      emptyElement.className =
        'properties-listings__empty'

      const title = document.createElement('h3')
      title.className =
        'properties-listings__empty-title'
      title.textContent = 'No properties found'

      const text = document.createElement('p')
      text.className =
        'properties-listings__empty-text'
      text.textContent =
        'Try changing your search or resetting the filters.'

      emptyElement.append(title, text)

      nextListings
        .querySelector(
          '.properties-listings__container'
        )
        .append(emptyElement)
    }

    return nextListings
  }

  setLoading(isLoading) {
    this.rootElement.classList.toggle(
      'is-loading',
      isLoading
    )

    this.formElement.setAttribute(
      'aria-busy',
      String(isLoading)
    )

    const listings = document.querySelector(
      this.selectors.listings
    )

    listings?.setAttribute(
      'aria-busy',
      String(isLoading)
    )
  }

  showError(message = '') {
    if (!this.errorElement) return

    this.errorElement.textContent = message
    this.errorElement.hidden = !message
  }

  scrollToResults(element) {
    window.requestAnimationFrame(() => {
      element.scrollIntoView({
        behavior: window.matchMedia(
          '(prefers-reduced-motion: reduce)'
        ).matches
          ? 'instant'
          : 'smooth',
        block: 'start',
      })
    })
  }

  async updateResults({
    historyMode = 'replace',
    scroll = false,
  } = {}) {
    window.clearTimeout(this.searchTimer)

    const requestId = ++this.requestId

    this.abortController?.abort()

    const url = this.getFormUrl()

    this.showError()

    try {
      let nextListings

      if (this.isLocal) {
        nextListings = this.buildLocalResults(url)
      } else {
        this.abortController = new AbortController()

        this.setLoading(true)

        const response = await fetch(
          url.toString(),
          {
            signal: this.abortController.signal,
            headers: {
              'X-Requested-With':
                'XMLHttpRequest',
              Accept: 'text/html',
            },
          }
        )

        if (!response.ok) {
          throw new Error(
            `Property search failed: ${response.status}`
          )
        }

        const html = await response.text()

        if (requestId !== this.requestId) return

        const parsedDocument =
          new DOMParser().parseFromString(
            html,
            'text/html'
          )

        nextListings =
          parsedDocument.querySelector(
            this.selectors.listings
          )
      }

      if (requestId !== this.requestId) return

      const currentListings =
        document.querySelector(
          this.selectors.listings
        )

      if (!nextListings || !currentListings) {
        throw new Error(
          'Property listings block was not found'
        )
      }

      currentListings.replaceWith(nextListings)

      if (
        historyMode !== 'none' &&
        url.href !== window.location.href
      ) {
        const method =
          historyMode === 'push'
            ? 'pushState'
            : 'replaceState'

        window.history[method](
          {},
          '',
          url.toString()
        )
      }

      document.dispatchEvent(
        new CustomEvent(
          'estatein:property-listings-updated',
          {
            detail: {
              rootElement: nextListings,
            },
          }
        )
      )

      const count = nextListings.querySelectorAll(
        '.swiper-wrapper > .swiper-slide'
      ).length

      this.statusElement.textContent =
        `${count} properties found.`

      this.updateResetButton()

      if (scroll) {
        this.scrollToResults(nextListings)
      }
    } catch (error) {
      if (
        error.name === 'AbortError' ||
        requestId !== this.requestId
      ) {
        return
      }

      console.error(
        '[PropertiesSearch]',
        error
      )

      this.showError(
        'Unable to update properties. Please try again.'
      )
    } finally {
      if (requestId === this.requestId) {
        this.setLoading(false)
      }
    }
  }
}

export default PropertiesSearch