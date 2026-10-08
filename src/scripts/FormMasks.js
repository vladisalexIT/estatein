import IMask from 'imask'

export default class FormMasks {
  constructor() {
    this.maskInstances = []

    document.querySelectorAll('input[type="tel"]').forEach((input) => {
      this.initPhoneMask(input)
    })
  }

  initPhoneMask(input) {
    input.pattern = String.raw`\+7 \([0-9]{3}\) [0-9]{3}-[0-9]{4}`

    const instance = IMask(input, {
      mask: '+{7} (000) 000-0000',
      lazy: true,
      placeholderChar: '_',
    })

    this.maskInstances.push(instance)

    input.form?.addEventListener('reset', () => {
      window.requestAnimationFrame(() => {
        instance.updateValue()
      })
    })
  }
}