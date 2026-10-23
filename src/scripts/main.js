import 'choices.js/public/assets/styles/choices.min.css'
import '../styles/main.scss'

import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'

import Header from './Header.js'
import SliderCollection from './Slider.js'
import PropertiesSearch from './PropertiesSearch.js'
import ContactsOffices from './ContactsOffices.js'
import PropertyDetailsGallery from './PropertyDetailsGallery.js'
import FormMasks from './FormMasks.js'
import ScrollToTop from './ScrollToTop.js'
import CustomSelects from './CustomSelects.js'
import FormsValidation from './FormsValidation.js'
import PropertiesMap from './PropertiesMap.js'
import PropertyModalMap from './PropertyModalMap.js'

document.addEventListener('DOMContentLoaded', () => {
  new Header()

  new CustomSelects()
  new PropertiesSearch()
  new SliderCollection()

  new ContactsOffices()
  new PropertyDetailsGallery()
  new FormMasks()
  new FormsValidation()

  new PropertiesMap()
  new PropertyModalMap()

  new ScrollToTop()
})

