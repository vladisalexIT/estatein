import Choices from 'choices.js'

export default class CustomSelects {
    constructor() {
        this.selects = document.querySelectorAll('.js-custom-select')
        this.instances = []

        this.init()
    }

    init() {
        this.selects.forEach((select) => {
            this.initSelect(select)
        })
    }

    initSelect(select) {
        if (select.dataset.selectInitialized === 'true') {
            return
        }

        const theme =
            select.dataset.selectTheme ||
            (select.closest('.properties-search__field') ? 'filter' : 'form')

        const relatedContainers = [
            select.closest('.properties-search__field'),
            select.closest('.form-field'),
            select.closest('.form-grid__select-wrapper'),
            select.closest('.property-details-inquiry__selected-control'),
        ].filter(Boolean)

        const initialValue = select.value

        try {
            const instance = new Choices(select, {
                allowHTML: false,
                searchEnabled: false,
                shouldSort: false,
                placeholder: true,
                itemSelectText: '',
                removeItemButton: false,
            })

            const choicesElement = select.closest('.choices')

            if (!choicesElement) {
                instance.destroy()
                return
            }

            choicesElement.classList.add(`choices--${theme}`)
            choicesElement.classList.toggle('has-value', select.value !== '')

            relatedContainers.forEach((container) => {
                container.classList.add('is-select-enhanced')
            })

            const clickableContainer = relatedContainers[0]

            if (clickableContainer) {
                clickableContainer.addEventListener('click', (event) => {

                    if (
                        event.target.closest(
                            '.choices, [data-js-form-field-errors]',
                        )
                    ) {
                        return
                    }

                    if (
                        event.target.closest(
                            'a, button, input, textarea, [contenteditable="true"]',
                        )
                    ) {
                        return
                    }

                    event.preventDefault()
                    event.stopPropagation()

                    choicesElement.focus()
                    instance.showDropdown()
                })
            }

            select.dataset.selectInitialized = 'true'

            select.addEventListener('change', () => {
                choicesElement.classList.toggle(
                    'has-value',
                    select.value !== '',
                )
            })

            if (select.form) {
                select.form.addEventListener('reset', () => {
                    window.requestAnimationFrame(() => {
                        instance.setChoiceByValue(initialValue)

                        choicesElement.classList.toggle(
                            'has-value',
                            select.value !== '',
                        )
                    })
                })
            }

            this.instances.push(instance)
        } catch (error) {
            console.error(
                `Custom select initialization failed for #${select.id}`,
                error,
            )
        }
    }
}