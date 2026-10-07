class FormsValidation {
  selectors = {
    form: '[data-js-form]',
    formFieldErrors: '[data-js-form-field-errors]'
  }

  errorMessages = {
    valueMissing: (field) => {
      if (field.type === 'checkbox') return 'You must agree to the terms and conditions';
      if (field.tagName.toLowerCase() === 'select') return 'Please select one of the options';
      return 'This field cannot be empty or contain only spaces';
    },
    typeMismatch: ({ type }) => {
      if (type === 'email') return 'Please enter a valid email address (e.g., name@mail.com)';
      return 'The entered data does not match the field type';
    },
    patternMismatch: ({ title }) => title || 'The data format is incorrect',
    tooShort: ({ minLength }) => `Minimum length is ${minLength} characters`,
    tooLong: ({ maxLength }) => `Maximum length is ${maxLength} characters`
  }

  constructor() {
    this.bindEvents()
  }

  sanitizeFieldValue(field) {
    if (['input', 'textarea'].includes(field.tagName.toLowerCase()) && field.type !== 'checkbox' && field.type !== 'radio') {
      field.value = field.value.replace(/\s+/g, ' ');
    }
  }

  sanitizeOnBlur(field) {
    if (['input', 'textarea'].includes(field.tagName.toLowerCase()) && field.type !== 'checkbox' && field.type !== 'radio') {
      field.value = field.value.trim();
    }
  }

  getCustomFieldErrors(field) {
    const value = field.value.trim();
    const name = field.name;

    if (field.required && value === '') {
      return 'This field cannot contain only spaces';
    }

    if (value.length > 0) {
      if (name === 'first_name' || name === 'last_name' || name === 'first-name' || name === 'last-name') {
        const nameRegex = /^[a-zA-Zа-яА-ЯёЁіІїЇєЄ\s\-'\`]+$/;
        if (!nameRegex.test(value)) {
          return 'Names can only contain letters (English or Russian), hyphens, or apostrophes';
        }
        if (value.length < 2) {
          return 'Name must be at least 2 characters long';
        }
      }

      if (field.type === 'email') {
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!emailRegex.test(value)) {
          return 'Invalid email format. Domain required (e.g., .com or .net)';
        }
        if (value.endsWith('@test.com') || value.endsWith('@example.com') || value.endsWith('@test.ru')) {
          return 'Please use a valid working email address';
        }
      }

      if (field.tagName.toLowerCase() === 'textarea' || name === 'message') {
        if (value.length < 10) {
          return 'Please provide a more detailed message (minimum 10 characters)';
        }
        const urlRegex = /(https?:\/\/[^\s]+)/g;
        if (urlRegex.test(value)) {
          return 'Links are not allowed in the message for security reasons';
        }
      }
    }

    return null; 
  }

  manageErrors(fieldControlElement, errorMessages) {
    const parentField = fieldControlElement.closest('.form-field') || 
      fieldControlElement.closest('.form-grid__item') || 
      fieldControlElement.closest('.agreement') ||
      fieldControlElement.closest('.form-grid__checkbox-wrapper') ||
      fieldControlElement.closest('.form-subscribe');
    
    if (!parentField) return;

    const fieldErrorsElement = parentField.querySelector(this.selectors.formFieldErrors);
    if (fieldErrorsElement) {
      fieldErrorsElement.innerHTML = errorMessages
        .map((errorMessage) => `<span class="field__error" style="color: rgb(228, 21, 21); font-size: 0.875rem; display: block; margin-top: 0.375rem; font-weight: 500; line-height: 1.4;">${errorMessage}</span>`)
        .join('');
    }
    
    if (errorMessages.length > 0) {
      fieldControlElement.style.borderColor = 'rgb(228, 21, 21)';
      parentField.classList.add('is-invalid');
      parentField.classList.remove('is-valid');
    } else {
      const isFooterInput = fieldControlElement.classList.contains('form-subscribe__input');
      fieldControlElement.style.borderColor = fieldControlElement.type !== 'checkbox' 
        ? (isFooterInput ? '' : '#703bf7') 
        : '';
      parentField.classList.remove('is-invalid');
      parentField.classList.add('is-valid');
    }
  }

  validateField(fieldControlElement) {
    fieldControlElement.setCustomValidity('');

    if (fieldControlElement.value.trim() === '') {
      this.manageErrors(fieldControlElement, []); 
      fieldControlElement.style.borderColor = ''; 
      
      const parentField = fieldControlElement.closest('.form-field') || 
        fieldControlElement.closest('.form-grid__item') || 
        fieldControlElement.closest('.agreement') ||
        fieldControlElement.closest('.form-grid__checkbox-wrapper');

      if (parentField) {
        parentField.classList.remove('is-invalid', 'is-valid');
      }

      if (fieldControlElement.required) {
        const errorMessages = [this.errorMessages.valueMissing(fieldControlElement)];
        this.manageErrors(fieldControlElement, errorMessages);
        return false;
      }

      return true;
    }

    const errors = fieldControlElement.validity;
    const errorMessages = [];

    Object.entries(this.errorMessages).forEach(([errorType, getErrorMessage]) => {
      if (errors[errorType]) {
        errorMessages.push(getErrorMessage(fieldControlElement));
      }
    });

    if (errorMessages.length === 0) {
      const customError = this.getCustomFieldErrors(fieldControlElement);
      if (customError) {
        errorMessages.push(customError);
        fieldControlElement.setCustomValidity(customError);
      }
    }

    this.manageErrors(fieldControlElement, errorMessages);

    return errorMessages.length === 0;
  }

  onInput(event) {
    const { target } = event;
    const isFormField = target.closest(this.selectors.form);
    if (isFormField) {
      this.sanitizeFieldValue(target);
    }
  }

  onBlur(event) {
    const { target } = event;
    const isFormField = target.closest(this.selectors.form);
    if (isFormField) {
      this.sanitizeOnBlur(target);
      
      if (target.required && ['input', 'textarea'].includes(target.tagName.toLowerCase())) {
        this.validateField(target);
      }
    }
  }

  onChange(event) {
    const { target } = event;
    const isFormField = target.closest(this.selectors.form);
    if (!isFormField) return;

    const isRequired = target.required;
    const isInteractiveType = ['radio', 'checkbox'].includes(target.type) || target.tagName.toLowerCase() === 'select';

    if (isRequired && isInteractiveType) {
      this.validateField(target);
    }
  }

  showThankYouModal() {
    const overlay = document.getElementById('thank-you-overlay');
    const closeBtn = document.getElementById('close-thank-you-btn');
    
    if (!overlay) return;

    overlay.classList.add('is-open');

    const closeModal = () => {
      overlay.classList.remove('is-open');
    };

    closeBtn.addEventListener('click', closeModal, { once: true });
    overlay.addEventListener('click', (e) => {
      if (e.target === overlay) closeModal();
    }, { once: true });
  }

  onSubmit(event) {
    const form = event.target;
    const isFormElement = form.matches(this.selectors.form);
    
    if (!isFormElement) return;

    event.preventDefault();

    const allControlElements = [...form.elements].filter(el => ['input', 'select', 'textarea'].includes(el.tagName.toLowerCase()));
    let isFormValid = true;
    let firstInvalidFieldControl = null;

    allControlElements.forEach((checkedField) => {
      this.sanitizeOnBlur(checkedField);
      
      if (!this.validateField(checkedField)) {
        isFormValid = false;
        if (!firstInvalidFieldControl) {
          firstInvalidFieldControl = checkedField;
        }
      }
    });

    if (!isFormValid) {
      if (firstInvalidFieldControl) firstInvalidFieldControl.focus();
      return;
    }

    const submitButton = form.querySelector('button[type="submit"]');
    const originalButtonText = submitButton ? submitButton.innerHTML : 'Submit';
    const isFooterForm = form.classList.contains('form-subscribe');

    if (submitButton) {
      submitButton.disabled = true;
      submitButton.innerHTML = 'Sending...';
    }

    const formInputs = [...form.elements].filter(el => ['input', 'select', 'textarea', 'button'].includes(el.tagName.toLowerCase()));
    formInputs.forEach(el => el.disabled = true);

    const formData = new FormData(form);
    const collectedData = Object.fromEntries(formData);
    console.log('--- На сервер отправлены следующие данные формы: ---', collectedData);

    setTimeout(() => {
      this.showThankYouModal();
      form.reset();

      formInputs.forEach(el => {
        el.style.borderColor = '';
        el.disabled = false;

        const parent = el.closest('.form-field') || el.closest('.form-grid__item') || el.closest('.agreement') || el.closest('.form-grid__checkbox-wrapper');
        if (parent) {
          parent.classList.remove('is-invalid', 'is-valid');
        }
      });

      form.querySelectorAll(this.selectors.formFieldErrors).forEach(el => el.innerHTML = '');

      if (submitButton) {
        submitButton.disabled = false;
        submitButton.innerHTML = originalButtonText;
      }
    }, 1500);
  }

  bindEvents() {
    document.addEventListener('input', (event) => this.onInput(event));
    document.addEventListener('blur', (event) => this.onBlur(event), { capture: true });
    document.addEventListener('change', (event) => this.onChange(event));
    document.addEventListener('submit', (event) => this.onSubmit(event));
  }
}

new FormsValidation();