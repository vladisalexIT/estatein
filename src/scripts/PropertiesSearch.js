class PropertiesSearch {
  selectors = {
    root: '.properties-search',
    field: '.properties-search__field',
    select: '.properties-search__select',
    value: '.properties-search__field-value',
    primary: '.properties-search__primary',
    input: '.properties-search__input',
    submit: '.properties-search__submit',
  }

  constructor() {
    this.rootElement = document.querySelector(
      this.selectors.root
    )

    if (!this.rootElement) {
      return
    }

    this.primaryElement = this.rootElement.querySelector(
      this.selectors.primary
    )

    this.inputElement = this.rootElement.querySelector(
      this.selectors.input
    )

    this.submitElement = this.rootElement.querySelector(
      this.selectors.submit
    )

    this.bindFields()
    this.bindPrimary()
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
}

export default PropertiesSearch