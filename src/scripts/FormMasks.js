import IMask from 'imask';

class FormMasks {
  constructor() {
    this.phoneInput = document.getElementById('property-details-phone');
    if (this.phoneInput) {
      this.initPhoneMask();
    }
  }

  initPhoneMask() {
    const maskOptions = {
      mask: '+{7} (000) 000-0000',
      lazy: true, 
      placeholderChar: '_' 
    };
    IMask(this.phoneInput, maskOptions);
  }
}

export default FormMasks;