import ThankYouModal from './ThankYouModal.js'

export default class FormsValidation {
  errorSelector = '[data-js-form-field-errors]'

  successMessages = {
    inquiry: {
      title: 'Thank You for Getting in Touch!',
      text: 'Your request has been received. Our team will contact you shortly.',
    },
    newsletter: {
      title: 'Thank You for Your Interest!',
      text: 'Your request for Estatein updates has been received.',
    },
  }

  constructor() {
    this.modal = new ThankYouModal()

    document.querySelectorAll('[data-js-form]').forEach((form) => {
      this.initForm(form)
    })
  }

  isField(element) {
    return (
      element.matches('input, select, textarea') &&
      Boolean(element.name) &&
      element.willValidate
    )
  }

  getFields(form) {
    return [...form.elements].filter((element) => {
      return this.isField(element)
    })
  }

  getVisibleControl(field) {
    return field.closest('.choices') ?? field
  }

  getErrorElement(field) {
    const wrapper = field.closest(
      '.form-field, .form-grid__item, .agreement, ' +
      '.form-grid__checkbox-wrapper, .form-subscribe',
    )

    if (wrapper) {
      return wrapper.querySelector(this.errorSelector)
    }


    return null
  }

  initField(field) {
    const control = this.getVisibleControl(field)
    const error = this.getErrorElement(field)

    if (control !== field) {
      const label = field.labels?.[0]

      if (label) {
        label.id ||= `${field.id}-label`
        control.setAttribute('aria-labelledby', label.id)
      } else if (field.hasAttribute('aria-label')) {
        control.setAttribute(
          'aria-label',
          field.getAttribute('aria-label'),
        )
      }
    }

    if (!error) return

    error.id ||= `${field.id}-error`

    const descriptionIds = new Set([
      ...(field.getAttribute('aria-describedby') ?? '')
        .split(/\s+/)
        .filter(Boolean),
      error.id,
    ])

    const description = [...descriptionIds].join(' ')

    field.setAttribute('aria-describedby', description)
    control.setAttribute('aria-describedby', description)
  }

  trimValue(field) {
    if (
      field.matches(
        'input[type="text"], input[type="email"], ' +
        'input[type="search"], textarea',
      )
    ) {
      field.value = field.value.trim()
    }
  }

  getMessage(field) {
    field.setCustomValidity('')

    if (
      field.required &&
      field.matches('input[type="text"], textarea') &&
      field.value !== '' &&
      field.value.trim() === ''
    ) {
      field.setCustomValidity('Please complete this field.')
    }


    const { validity } = field

    if (validity.customError) {
      return field.validationMessage
    }

    if (validity.valueMissing) {
      if (field.type === 'checkbox') {
        return 'Please accept the terms and privacy policy.'
      }

      if (field.tagName === 'SELECT') {
        return 'Please select an option.'
      }

      return 'Please complete this field.'
    }

    if (validity.typeMismatch) {
      return field.type === 'email'
        ? 'Enter a valid email address.'
        : 'Enter a valid value.'
    }

    if (validity.patternMismatch) {
      return field.type === 'tel'
        ? 'Enter a complete phone number.'
        : 'Check the format of this field.'
    }

    if (validity.tooShort) {
      return `Use at least ${field.minLength} characters.`
    }

    if (validity.tooLong) {
      return `Use no more than ${field.maxLength} characters.`
    }

    return validity.valid ? '' : 'Check the value of this field.'
  }

  showError(field, message) {
    const control = this.getVisibleControl(field)
    const error = this.getErrorElement(field)
    const isInvalid = message !== ''

    field.setAttribute('aria-invalid', String(isInvalid))

    if (control !== field) {
      control.setAttribute('aria-invalid', String(isInvalid))
      control.classList.toggle('is-invalid', isInvalid)
    }

    if (error) {
      error.textContent = message
      error.hidden = !isInvalid
    }
  }

  validateField(field) {
    const message = this.getMessage(field)

    this.showError(field, message)

    return message === ''
  }

  initForm(form) {
    form.querySelectorAll(this.errorSelector).forEach((error) => {
      error.classList.add('form-error')
      error.hidden = true
    })

    this.getFields(form).forEach((field) => {
      this.initField(field)
    })

    form.addEventListener('input', ({ target }) => {
      if (
        this.isField(target) &&
        target.getAttribute('aria-invalid') === 'true'
      ) {
        this.validateField(target)
      }
    })

    form.addEventListener('focusout', ({ target }) => {
      if (
        !this.isField(target) ||
        ['checkbox', 'radio', 'select-one'].includes(target.type)
      ) {
        return
      }

      this.trimValue(target)
      this.validateField(target)
    })

    form.addEventListener('change', ({ target }) => {
      if (!this.isField(target)) return

      this.validateField(target)
    })

    form.addEventListener('reset', () => {
      window.requestAnimationFrame(() => {
        this.getFields(form).forEach((field) => {
          field.setCustomValidity('')
          this.showError(field, '')
        })
      })
    })

    form.addEventListener('submit', (event) => {
      this.onSubmit(event)
    })
  }

  async onSubmit(event) {
    event.preventDefault()

    const form = event.currentTarget

    if (form.dataset.submitting === 'true') return

    const status = form.querySelector('[data-js-form-submit-error]')
    if (status) {
      status.hidden = true
      status.textContent = ''
    }

    const invalidFields = this.getFields(form).filter((field) => {
      this.trimValue(field)
      return !this.validateField(field)
    })

    if (invalidFields.length) {
      this.focusField(invalidFields[0])
      return
    }

    const formData = new FormData(form)
    const kind = form.dataset.formKind ?? 'inquiry'
    const button = form.querySelector('button[type="submit"]')
    const buttonLabel = button?.querySelector('span') ?? button
    const originalText = buttonLabel?.textContent
    let firstInvalidField = null
    let success = false

    form.dataset.submitting = 'true'
    form.setAttribute('aria-busy', 'true')
    form.inert = true

    if (button) {
      button.disabled = true
      if (kind !== 'newsletter') buttonLabel.textContent = 'Sending...'
    }

    try {
      const response = await fetch(form.action, {
        method: 'POST',
        body: formData,
        credentials: 'same-origin',
        headers: { Accept: 'application/json' },
      })

      const contentType = response.headers.get('content-type') ?? ''
      if (!contentType.includes('application/json')) {
        throw new Error('Unable to send your request. Please try again later.')
      }

      const result = await response.json()

      if (!response.ok || result.success !== true) {
        const fields = this.getFields(form)
        for (const [name, message] of Object.entries(result.errors ?? {})) {
          const field = fields.find((item) => item.name === name)
          if (!field || typeof message !== 'string') continue
          this.showError(field, message)
          firstInvalidField ??= field
        }

        throw new Error(
          typeof result.message === 'string'
            ? result.message
            : 'Unable to send your request. Please try again later.',
        )
      }

      form.reset()
      success = true
    } catch (error) {
      if (status) {
        status.textContent = error instanceof TypeError
          ? 'Connection error. Please check your connection and try again.'
          : error.message || 'Unable to send your request. Please try again later.'
        status.hidden = false
      }
    } finally {
      delete form.dataset.submitting
      form.removeAttribute('aria-busy')
      form.inert = false

      if (button) {
        button.disabled = false
        if (kind !== 'newsletter') buttonLabel.textContent = originalText
      }
    }

    if (success) {
      this.modal.open(
        this.successMessages[kind] ?? this.successMessages.inquiry,
        button,
      )
    } else if (firstInvalidField) {
      this.focusField(firstInvalidField)
    } else if (status && !status.hidden) {
      status.focus({ preventScroll: true })
      status.scrollIntoView({ behavior: 'smooth', block: 'nearest' })
    }
  }

  focusField(field) {
    const control = this.getVisibleControl(field)
    control.focus({ preventScroll: true })
    control.scrollIntoView({ behavior: 'smooth', block: 'center' })
  }
}
