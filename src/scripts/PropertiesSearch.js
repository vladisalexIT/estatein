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
    listings: '#property-listings',
  }

  constructor() {
    this.rootElement = document.querySelector(
      this.selectors.root
    )

    if (!this.rootElement) {
      return
    }

    this.formElement = this.rootElement.querySelector(
      this.selectors.form
    )

    this.primaryElement = this.rootElement.querySelector(
      this.selectors.primary
    )

    this.inputElement = this.rootElement.querySelector(
      this.selectors.input
    )

    this.submitElement = this.rootElement.querySelector(
      this.selectors.submit
    )

    this.isLoading = false

    this.bindFields()
    this.bindPrimary()
    this.bindForm()
    this.bindHistory()
  }

  bindFields() {
    this.rootElement
      .querySelectorAll(this.selectors.field)
      .forEach((fieldElement) => {
        const selectElement = fieldElement.querySelector(
          this.selectors.select
        )

        const valueElement = fieldElement.querySelector(
          this.selectors.value
        )

        if (!selectElement || !valueElement) {
          return
        }

        const updateValue = () => {
          const selectedOption =
            selectElement.options[selectElement.selectedIndex]

          valueElement.textContent =
            selectedOption?.textContent.trim() ?? ''
        }

        updateValue()

        selectElement.addEventListener('change', updateValue)
      })
  }

  bindPrimary() {
    if (!this.primaryElement || !this.inputElement) {
      return
    }

    this.primaryElement.addEventListener('click', (event) => {
      if (
        this.submitElement &&
        this.submitElement.contains(event.target)
      ) {
        return
      }

      this.inputElement.focus()
    })
  }

  bindForm() {
    if (!this.formElement) {
      return
    }

    this.formElement.addEventListener('submit', (event) => {
      event.preventDefault()

      this.loadResults()
    })
  }

  bindHistory() {
    window.addEventListener('popstate', () => {
      this.syncFormWithUrl(window.location.href)
      this.loadResults(window.location.href, false)
    })
  }

  getFormUrl() {
    const url = new URL(
      this.formElement.action || window.location.href,
      window.location.origin
    )

    const params = new URLSearchParams()
    const formData = new FormData(this.formElement)

    formData.forEach((value, key) => {
      if (
        typeof value === 'string' &&
        value.trim() !== ''
      ) {
        params.append(key, value)
      }
    })

    url.search = params.toString()

    return url
  }

  syncFormWithUrl(rawUrl) {
    const url = new URL(
      rawUrl,
      window.location.origin
    )

    if (this.inputElement) {
      this.inputElement.value =
        url.searchParams.get('query') || ''
    }

    this.rootElement
      .querySelectorAll(this.selectors.select)
      .forEach((selectElement) => {
        const value =
          url.searchParams.get(selectElement.name) || ''

        if (selectElement._estateinChoices) {
          selectElement._estateinChoices.setChoiceByValue(value)
        } else {
          selectElement.value = value
        }

        selectElement.dispatchEvent(
          new Event('change', { bubbles: true })
        )
      })
  }

  async loadResults(
    rawUrl = this.getFormUrl(),
    updateHistory = true
  ) {
    if (this.isLoading) {
      return
    }

    this.isLoading = true

    const url = new URL(
      rawUrl,
      window.location.origin
    )

    this.rootElement.classList.add('is-loading')
    this.rootElement.setAttribute('aria-busy', 'true')

    if (this.submitElement) {
      this.submitElement.disabled = true
    }

    try {
      const response = await fetch(url.toString(), {
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          Accept: 'text/html',
        },
      })

      if (!response.ok) {
        throw new Error(
          `Property search request failed: ${response.status}`
        )
      }

      const html = await response.text()

      const documentFragment =
        new DOMParser().parseFromString(
          html,
          'text/html'
        )

      const nextListings =
        documentFragment.querySelector(
          this.selectors.listings
        )

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

      if (updateHistory) {
        window.history.pushState(
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
    } catch (error) {
      console.error(error)

      window.location.assign(url.toString())
    } finally {
      this.isLoading = false

      this.rootElement.classList.remove('is-loading')
      this.rootElement.setAttribute('aria-busy', 'false')

      if (this.submitElement) {
        this.submitElement.disabled = false
      }
    }
  }
}

export default PropertiesSearch