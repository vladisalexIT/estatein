import '../styles/main.scss'

import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'

import Header from './Header.js'
import SliderCollection from './Slider.js'
import PropertiesSearch from './PropertiesSearch'

document.addEventListener('DOMContentLoaded', () => {
    new Header()
    new SliderCollection()
    new PropertiesSearch()
})