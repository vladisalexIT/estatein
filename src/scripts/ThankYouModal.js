export default class ThankYouModal {
  constructor() {
    this.dialog = document.getElementById('thank-you-overlay')

    if (!this.dialog) return

    this.title = this.dialog.querySelector('.thank-you-modal__title')
    this.text = this.dialog.querySelector('.thank-you-modal__text')
    this.timerButton = this.dialog.querySelector('[data-modal-timer]')
    this.closeButton = this.dialog.querySelector('#close-thank-you-btn')

    this.closeButton.addEventListener('click', () => {
      this.close()
    })

    this.dialog.addEventListener('click', (event) => {
      if (event.target === this.dialog) {
        this.close()
      }
    })

    this.dialog.addEventListener('cancel', (event) => {
      event.preventDefault()
      this.close()
    })

    this.dialog.addEventListener('close', () => {
      this.clearTimer()
      document.documentElement.classList.remove('has-thank-you-modal')

      if (this.returnFocus?.isConnected && !this.returnFocus.disabled) {
        this.returnFocus.focus({ preventScroll: true })
      }
    })

    this.timerButton.addEventListener('click', () => {
      this.clearTimer()
      this.timerButton.textContent = 'Auto-close off'
      this.timerButton.setAttribute(
        'aria-label',
        'Automatic closing is off',
      )
    })
  }

  open(message, returnFocus) {
    if (!this.dialog || this.dialog.open) return

    this.clearTimer()

    this.title.textContent = message.title
    this.text.textContent = message.text
    this.returnFocus = returnFocus ?? document.activeElement
    this.remainingSeconds = 5

    this.timerButton.setAttribute(
      'aria-label',
      'Turn off automatic closing',
    )

    this.updateCountdown()
    document.documentElement.classList.add('has-thank-you-modal')
    this.dialog.showModal()

    this.intervalId = window.setInterval(() => {
      this.remainingSeconds -= 1

      if (this.remainingSeconds <= 0) {
        this.close()
        return
      }

      this.updateCountdown()
    }, 1000)
  }

  updateCountdown() {
    this.timerButton.textContent =
      `Closes in ${this.remainingSeconds}s`
  }

  clearTimer() {
    window.clearInterval(this.intervalId)
    this.intervalId = null
  }

  close() {
    this.clearTimer()

    if (this.dialog?.open) {
      this.dialog.close()
    }
  }
}