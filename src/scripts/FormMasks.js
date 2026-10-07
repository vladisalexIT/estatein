import IMask from 'imask'

class FormMasks {
  selectors = {
    phoneInput: 'input[type="tel"]',
  }

  constructor() {
    this.maskInstances = []

    document
      .querySelectorAll(this.selectors.phoneInput)
      .forEach((inputElement) => {
        this.initPhoneMask(inputElement)
      })
  }

  initPhoneMask(inputElement) {
    const maskInstance = IMask(inputElement, {
      mask: '+{7} (000) 000-0000',
      lazy: true,
      placeholderChar: '_',
    })

    this.maskInstances.push(maskInstance)
  }
}

export default FormMasks