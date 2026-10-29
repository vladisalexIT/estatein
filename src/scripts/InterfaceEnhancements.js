export default class InterfaceEnhancements {
  constructor() {
    this.header = document.querySelector('[data-js-header]')
    this.reduced = window.matchMedia('(prefers-reduced-motion: reduce)')
    if (this.header) this.initHeader()
    this.initHeroRoundLink()
    this.initMotion()
  }
  initHeader() {
    const header = this.header

    const slot = document.createElement('div')
    slot.className = 'header-slot'
    header.before(slot)
    slot.append(header)
    const measure = () => {
      const compact = header.classList.contains('is-compact')
      header.classList.add('is-measuring')
      header.classList.remove('is-compact')
      slot.style.height = `${header.getBoundingClientRect().height}px`
      header.classList.toggle('is-compact', compact)
      header.classList.remove('is-measuring')
      this.updateHeader()
    }
    const panel = document.getElementById('bx-panel')
    let ticking = false
    this.updateHeader = () => {
      let offset = 0
      if (panel && getComputedStyle(panel).display !== 'none') {
        const rect = panel.getBoundingClientRect()
        if (rect.top <= 1 && rect.bottom > 0) offset = Math.max(0, rect.bottom)
      }
      document.documentElement.style.setProperty('--admin-top', `${offset}px`)
      const rect = slot.getBoundingClientRect()
      const pinned = rect.top <= offset
      header.classList.toggle('is-pinned', pinned)
      header.classList.toggle('is-compact', rect.top <= offset - 32)
      const h = header.getBoundingClientRect().height
      document.documentElement.style.setProperty('--header-visible-height', `${h}px`)
      ticking = false
    }
    const update = () => {
      if (ticking) return
      ticking = true
      requestAnimationFrame(this.updateHeader)
    }
    window.addEventListener('scroll', update, { passive: true })
    window.addEventListener('resize', measure)
    header.addEventListener('transitionend', update)
    new MutationObserver((records) => {
      if (records.some(record => record.oldValue !== header.getAttribute('class'))) update()
    }).observe(header, { attributes: true, attributeOldValue: true, attributeFilter: ['class'] })
    if (panel) {
      new ResizeObserver(update).observe(panel)
      new MutationObserver(update).observe(panel, { attributes: true, subtree: true, childList: true })
    }
    measure()
    document.fonts?.ready.then(measure)
    document.addEventListener('estatein:language-change', measure)
  }

  initHeroRoundLink() {
    const visual = document.querySelector('.hero__visual')
    const link = visual?.querySelector('.hero__round-link')
    const actions = document.querySelector('.hero__actions')

    if (!visual || !link || !actions) return

    let frame = null

    const update = () => {
      frame = null

      if (window.innerWidth < 768 || window.innerWidth > 1360) {
        link.style.removeProperty('top')
        return
      }

      const visualRect = visual.getBoundingClientRect()
      const actionsRect = actions.getBoundingClientRect()
      const diameter = link.getBoundingClientRect().height

      const originalTop = visual.clientHeight * 0.18

      const actionsTop =
        actionsRect.top -
        visualRect.top +
        actionsRect.height / 2 -
        diameter / 2

      const progress = Math.max(
        0,
        Math.min(1, (1360 - window.innerWidth) / 360),
      )

      const desiredTop =
        originalTop +
        (Math.max(originalTop, actionsTop) - originalTop) * progress

      const maximumTop = Math.max(
        0,
        visual.clientHeight - diameter - 12,
      )

      link.style.top = `${Math.max(0, Math.min(desiredTop, maximumTop))
        }px`
    }

    const schedule = () => {
      if (frame !== null) return
      frame = requestAnimationFrame(update)
    }

    window.addEventListener('resize', schedule)

    document.addEventListener(
      'estatein:language-change',
      schedule,
    )

    if ('ResizeObserver' in window) {
      const observer = new ResizeObserver(schedule)
      observer.observe(visual)
      observer.observe(actions)
    }

    document.fonts?.ready.then(schedule)

    update()
  }


  initMotion() {
    if (this.reduced.matches) return

    if (
      !('IntersectionObserver' in window) ||
      typeof Element.prototype.animate !== 'function'
    ) {
      return
    }

    if (
      document
        .getElementById('bx-panel')
        ?.classList.contains('bx-panel-expanded') &&
      document.querySelector(
        '.bx-context-toolbar, .bx-component-opener',
      )
    ) {
      return
    }

    const pending = new Set()

    const show = (element) => {
      if (!pending.has(element)) return

      pending.delete(element)
      reveal.unobserve(element)

      element.animate(
        [
          {
            opacity: 0,
            transform: 'translateY(24px)',
          },
          {
            opacity: 1,
            transform: 'translateY(0)',
          },
        ],
        {
          duration: 620,
          easing: 'cubic-bezier(.22,.61,.36,1)',
        },
      )

      element.classList.remove('estatein-reveal-pending')
    }

    const reveal = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            show(entry.target)
          }
        })
      },
      {
        threshold: 0.08,
        rootMargin: '0px 0px -24px 0px',
      },
    )

    document
      .querySelectorAll(
        '.main section > .container > header, ' +
        '.section-header, ' +
        '.footer__cta-content',
      )
      .forEach((element) => {
        if (
          element.getBoundingClientRect().top <
          window.innerHeight
        ) {
          return
        }

        pending.add(element)
        element.classList.add('estatein-reveal-pending')
        reveal.observe(element)
      })

    document.addEventListener('focusin', (event) => {
      if (!(event.target instanceof Element)) return

      const element = event.target.closest(
        '.estatein-reveal-pending',
      )

      if (element) show(element)
    })

    const roundText = document.querySelector(
      '.hero__round-link-ring',
    )

    roundText?.animate(
      [
        { transform: 'rotate(-180deg)' },
        { transform: 'rotate(0deg)' },
      ],
      {
        duration: 1250,
        easing: 'cubic-bezier(.22,.61,.36,1)',
      },
    )

    const stats = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return

          const element = entry.target
          const original = element.textContent.trim()
          const match = original.match(/^(\d+)(k?\+)$/i)

          if (match) {
            const number = document.createElement('span')
            const accessible = document.createElement('span')

            accessible.className = 'visually-hidden'
            accessible.textContent = original

            number.setAttribute('aria-hidden', 'true')
            number.setAttribute('data-estatein-counter', '')
            number.textContent = `0${match[2]}`

            element.replaceChildren(accessible, number)

            const target = Number(match[1])
            const duration = 1100
            let startedAt = null

            const tick = (now) => {
              if (!element.isConnected) return

              startedAt ??= now

              const progress = this.reduced.matches
                ? 1
                : Math.min(1, (now - startedAt) / duration)

              const eased = 1 - (1 - progress) ** 2.5
              const value =
                `${Math.round(target * eased)}${match[2]}`

              if (number.textContent !== value) {
                number.textContent = value
              }

              if (progress < 1) {
                requestAnimationFrame(tick)
              }
            }

            requestAnimationFrame(tick)
          }

          stats.unobserve(element)
        })
      },
      {
        threshold: 0.6,
      },
    )

    document
      .querySelectorAll(
        '.hero__stat-value, .about-hero__stats-value',
      )
      .forEach((element) => stats.observe(element))

    this.reduced.addEventListener('change', (event) => {
      if (!event.matches) return

      reveal.disconnect()
      stats.disconnect()

      pending.forEach((element) => {
        element.classList.remove('estatein-reveal-pending')
      })

      pending.clear()

      roundText?.getAnimations().forEach((animation) => {
        animation.finish()
      })
    })
  }
}
