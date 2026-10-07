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

document.addEventListener('DOMContentLoaded', () => {
  new Header()
  new SliderCollection()
  new PropertiesSearch()
  new ContactsOffices()
  new PropertyDetailsGallery()
  new FormMasks()
  new ScrollToTop()
})