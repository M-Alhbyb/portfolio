document.addEventListener('alpine:init', () => {
  Alpine.data('navMenu', () => ({
    isOpen: false,
    toggle() {
      this.isOpen = !this.isOpen;
    },
    close() {
      this.isOpen = false;
    }
  }));

  Alpine.data('contactForm', () => ({
    loading: false,
    success: false,
    errors: {},
    honeypot: '',
    submit() {
      this.loading = true;
      this.errors = {};
      this.success = false;

      const form = this.$el;
      const formData = new FormData(form);

      fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: { 'Accept': 'application/json' }
      })
        .then(res => res.json())
        .then(data => {
          if (data.success) {
            this.success = true;
            form.reset();
          } else {
            this.errors = data.errors || {};
          }
        })
        .catch(() => {
          this.errors = { _: 'An error occurred. Please try again.' };
        })
        .finally(() => {
          this.loading = false;
        });
    }
  }));

  Alpine.data('skillBar', () => ({
    init() {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.style.width = entry.target.dataset.width;
            observer.unobserve(entry.target);
          }
        });
      }, { threshold: 0.2 });
      this.$nextTick(() => {
        document.querySelectorAll('.skill-bar-fill').forEach(el => observer.observe(el));
      });
    }
  }));

  Alpine.data('typeWriter', () => ({
    text: '',
    fullText: '',
    speed: 50,
    init() {
      this.fullText = this.$el.textContent;
      this.text = '';
      let i = 0;
      const interval = setInterval(() => {
        if (i < this.fullText.length) {
          this.text += this.fullText[i];
          i++;
        } else {
          clearInterval(interval);
        }
      }, this.speed);
    }
  }));
});
