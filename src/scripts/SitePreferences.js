import dictionary from './locale-ru.json'
const norm = s => String(s).replace(/\s+/g, ' ').trim()
export const translate = (value, lang = document.documentElement.lang) => {
    const s = norm(value)
    if (lang !== 'ru') return value
    if (dictionary[s]) return dictionary[s]
    if (/^\d+-Bedroom$/.test(s)) return s.replace('-Bedroom', ' спальни')
    if (/^\d+-Bathroom$/.test(s)) return s.replace('-Bathroom', ' ванные')
    if (/^\d+ Bedrooms?$/.test(s)) return s.replace(/ Bedrooms?$/, ' спальни')
    if (/^\d+ Bathrooms?$/.test(s)) return s.replace(/ Bathrooms?$/, ' ванные')
    if (s.startsWith('Inquire About ')) return 'Узнать об объекте: ' + translate(s.slice(14), lang)
    if (/^Closes in \d+s$/.test(s)) return s.replace(/^Closes in (\d+)s$/, 'Закроется через $1 с')
    if (/^Since \d{4}$/.test(s)) return s.replace('Since ', 'С ')
    if (/^\d+ properties found\.$/.test(s)) return s.replace(/^(\d+) properties found\.$/, 'Найдено объектов: $1.')
    return value
}
export default class SitePreferences {
    constructor() {
        const read = key => { try { return localStorage.getItem(key) } catch { return null } }
        this.theme = read('estatein-theme') === 'light' ? 'light' : 'dark'
        this.lang = new URL(location.href).searchParams.get('lang') || read('estatein-lang') || 'en'
        if (!['en', 'ru'].includes(this.lang)) this.lang = 'en'
        this.texts = new WeakMap(); this.attributes = new WeakMap()
        document.documentElement.dataset.theme = this.theme
        this.addButtons()
        this.setLanguage(this.lang)
        let queued = false
        this.observer = new MutationObserver(records => {
            const ignoredMutationRoots =
                '#panel, #bx-panel, .pswp, ' +
                '[class*="ymaps-"], [data-estatein-counter]'

            if (records.every(record => {
                const element = record.target.nodeType === Node.ELEMENT_NODE
                    ? record.target
                    : record.target.parentElement

                return Boolean(element?.closest(ignoredMutationRoots))
            })) return
            if (queued) return
            queued = true; requestAnimationFrame(() => { queued = false; this.refresh() })
        })
        this.observe()
    }
    observe() { this.observer?.observe(document.body, { subtree: true, childList: true, characterData: true }) }
    addButtons() {
        const header = document.querySelector('.header__inner'); if (!header) return
        const tools = document.createElement('div'); tools.className = 'header-tools'
        this.themeButton = document.createElement('button'); this.themeButton.type = 'button'; this.themeButton.className = 'header-tool'; this.themeButton.dataset.preference = 'theme'
        this.themeButton.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><circle cx="12" cy="12" r="4"/><path d="M12 2v2m0 16v2M2 12h2m16 0h2M5 5l1.4 1.4m11.2 11.2L19 19M5 19l1.4-1.4M17.6 6.4L19 5"/></svg>'
        this.langButton = document.createElement('button'); this.langButton.type = 'button'; this.langButton.className = 'header-tool'; this.langButton.dataset.preference = 'language'
        tools.append(this.themeButton, this.langButton)
        header.insertBefore(tools, header.querySelector('[data-js-header-burger]'))
        this.themeButton.addEventListener('click', () => {
            this.theme = this.theme === 'dark' ? 'light' : 'dark'; document.documentElement.dataset.theme = this.theme
            try { localStorage.setItem('estatein-theme', this.theme) } catch { }
            this.updateButtons(); document.dispatchEvent(new CustomEvent('estatein:theme-change'))
        })
        this.langButton.addEventListener('click', () => this.setLanguage(this.lang === 'en' ? 'ru' : 'en'))
    }
    updateButtons() {
        if (!this.langButton) return
        this.langButton.textContent = this.lang === 'en' ? 'RU' : 'EN'
        this.langButton.setAttribute('aria-label', this.lang === 'en' ? 'Переключить на русский' : 'Switch to English')
        this.themeButton.setAttribute('aria-label', this.lang === 'ru' ? 'Переключить тему' : 'Switch color theme')
        this.themeButton.setAttribute('aria-pressed', String(this.theme === 'light'))
    }
    setLanguage(lang) {
        this.lang = lang; document.documentElement.lang = lang
        try { localStorage.setItem('estatein-lang', lang) } catch { }
        this.refresh(); this.updateButtons()
        document.dispatchEvent(new CustomEvent('estatein:language-change', { detail: { lang } }))
    }
    refresh() {
        this.observer?.disconnect()
        const skip = 'script,style,textarea,input,svg,[contenteditable="true"],#panel,#bx-panel,.pswp,[class*="ymaps-"],[data-preference],[data-estatein-counter]'
        const walker = document.createTreeWalker(document.body, NodeFilter.SHOW_TEXT)
        let node
        while ((node = walker.nextNode())) {
            if (!node.parentElement || node.parentElement.closest(skip) || !norm(node.data)) continue
            const last = this.texts.get(node)
            const source = last && node.data === last.output ? last.source : node.data
            const output = translate(source, this.lang)
            this.texts.set(node, { source, output }); if (node.data !== output) node.data = output
        }
        document.querySelectorAll('[data-estatein-ru]').forEach(el => {
            if (el.closest('#panel,#bx-panel')) return
            const en = el.dataset.estateinEn ?? el.textContent
            el.dataset.estateinEn = en
            const output = this.lang === 'ru' ? el.dataset.estateinRu : en
            if (el.textContent !== output) el.textContent = output
        })
        document.querySelectorAll('[placeholder],[aria-label],[title],[alt]').forEach(el => {
            if (el.closest(skip)) return
            let originals = this.attributes.get(el) || {}
            for (const attr of ['placeholder', 'aria-label', 'title', 'alt']) if (el.hasAttribute(attr)) {
                const now = el.getAttribute(attr), old = originals[attr]
                const source = old && now === old.output ? old.source : now
                const output = translate(source, this.lang); originals[attr] = { source, output }
                if (now !== output) el.setAttribute(attr, output)
            }
            this.attributes.set(el, originals)
        })
        this.updateButtons(); this.observe()
    }
}
