import Alpine from 'alpinejs'

Alpine.data('accessibilityWidget', () => ({
    open: false,
    fontSize: 0,
    highContrast: false,
    grayscale: false,

    init() {
        try {
            const saved = localStorage.getItem('a11y-prefs')
            if (saved) {
                const prefs = JSON.parse(saved)
                this.fontSize = prefs.fontSize ?? 0
                this.highContrast = prefs.highContrast ?? false
                this.grayscale = prefs.grayscale ?? false
            }
        } catch {}
        this.applyPreferences()
    },

    applyPreferences() {
        document.documentElement.style.fontSize = `${100 + this.fontSize * 10}%`
        document.documentElement.classList.toggle('a11y-high-contrast', this.highContrast)
        document.documentElement.classList.toggle('a11y-grayscale', this.grayscale)
    },

    save() {
        localStorage.setItem('a11y-prefs', JSON.stringify({
            fontSize: this.fontSize,
            highContrast: this.highContrast,
            grayscale: this.grayscale,
        }))
        this.applyPreferences()
    },

    increase() {
        if (this.fontSize < 3) { this.fontSize++; this.save() }
    },

    decrease() {
        if (this.fontSize > -2) { this.fontSize--; this.save() }
    },

    toggleContrast() {
        this.highContrast = !this.highContrast
        this.save()
    },

    toggleGrayscale() {
        this.grayscale = !this.grayscale
        this.save()
    },

    reset() {
        this.fontSize = 0
        this.highContrast = false
        this.grayscale = false
        this.save()
    },
}))

Alpine.data('counterAnimation', (target) => ({
    current: 0,
    init() {
        const steps = 60
        const increment = target / steps
        let count = 0
        const timer = setInterval(() => {
            count++
            this.current = Math.min(Math.round(increment * count), target)
            if (count >= steps) { clearInterval(timer) }
        }, 1500 / steps)
    },
}))

Alpine.data('testimonialCarousel', (total) => ({
    current: 0,
    total,
    init() {
        setInterval(() => { this.next() }, 6000)
    },
    next() { this.current = (this.current + 1) % this.total },
    prev() { this.current = (this.current - 1 + this.total) % this.total },
}))

window.Alpine = Alpine
Alpine.start()
