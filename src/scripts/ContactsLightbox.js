import PhotoSwipe from 'photoswipe'
import 'photoswipe/style.css'

export default class ContactsLightbox {
  constructor() {
    const gallery = document.querySelector('.contacts-gallery')
    if (!gallery) return
    const pictures = [...gallery.querySelectorAll('picture')].filter(p => p.querySelector('img'))
    pictures.forEach((picture, index) => {
      // Keep picture itself in the original grid; avoid a new layout wrapper.
      picture.tabIndex = 0
      picture.setAttribute('role', 'button')
      picture.setAttribute('aria-label', `View image: ${picture.querySelector('img').alt}`)
      const open = async () => {
        try {
          const dataSource = await Promise.all(pictures.map(async p => {
            const img = p.querySelector('img')
            const source = img.src // Full image, not the small responsive currentSrc.
            const probe = new Image(); probe.src = source
            await probe.decode()
            return { src: source, width: probe.naturalWidth, height: probe.naturalHeight, alt: img.alt }
          }))
          const ru = document.documentElement.lang === 'ru'
          const pswp = new PhotoSwipe({
            dataSource, index, bgOpacity: .9,
            showHideAnimationType: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'none' : 'fade',
            closeTitle: ru ? 'Закрыть' : 'Close', zoomTitle: ru ? 'Масштаб' : 'Zoom',
            arrowPrevTitle: ru ? 'Предыдущее фото' : 'Previous image',
            arrowNextTitle: ru ? 'Следующее фото' : 'Next image',
          })
          pswp.on('destroy', () => picture.focus({ preventScroll: true }))
          pswp.init()
        } catch (error) { console.error('[ContactsLightbox]', error) }
      }
      picture.addEventListener('click', open)
      picture.addEventListener('keydown', e => {
        if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); open() }
      })
    })
  }
}
