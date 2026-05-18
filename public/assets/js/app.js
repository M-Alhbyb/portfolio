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
          this.errors = { _: window.__ ? window.__['js.error'] : 'An error occurred. Please try again.' };
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

  Alpine.data('gallery', () => ({
    images: [],
    currentIndex: 0,
    open: false,
    init() {
      this.images = JSON.parse(this.$el.dataset.images || '[]');
    },
    openViewer(index) {
      this.currentIndex = index;
      this.open = true;
      document.body.style.overflow = 'hidden';
    },
    closeViewer() {
      this.open = false;
      document.body.style.overflow = '';
    },
    next() {
      this.currentIndex = (this.currentIndex + 1) % this.images.length;
    },
    prev() {
      this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
    },
    onKeydown(e) {
      if (e.key === 'Escape') this.closeViewer();
      if (e.key === 'ArrowRight') this.next();
      if (e.key === 'ArrowLeft') this.prev();
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

  // Boot sequence — runs once per session on first homepage load
  if (window.location.pathname === '/' && !sessionStorage.getItem('booted')) {
    document.addEventListener('DOMContentLoaded', () => {
      const __ = window.__ || {};
      const bootLines = [
        __('js.boot_mount') || '[OK] Mounting filesystems...',
        __('js.boot_kernel') || '[OK] Initializing kernel modules...',
        __('js.boot_neofetch') || '[OK] Starting neofetch daemon...',
        __('js.boot_modules') || '[OK] Loading portfolio modules...',
        __('js.boot_connection') || '[OK] Establishing secure connection...',
        __('js.boot_ready') || '[OK] System ready.'
      ];
      const overlay = document.createElement('div');
      overlay.id = 'boot-overlay';
      overlay.style.cssText = 'position:fixed;inset:0;z-index:9999;background:#1e1e2e;display:flex;flex-direction:column;justify-content:center;align-items:center;font-family:JetBrains Mono,monospace;font-size:0.8125rem;color:#a6e3a1;padding:2rem;';
      document.body.prepend(overlay);

      bootLines.forEach((line, i) => {
        const el = document.createElement('div');
        el.style.cssText = 'opacity:0;animation:bootFadeIn 0.3s ease-out forwards;animation-delay:' + (i * 0.4) + 's;margin-bottom:0.25rem;';
        el.textContent = line;
        overlay.appendChild(el);
      });

      const style = document.createElement('style');
      style.textContent = '@keyframes bootFadeIn{0%{opacity:0;transform:translateY(-2px)}100%{opacity:1;transform:translateY(0)}}';
      document.head.appendChild(style);

      setTimeout(() => {
        overlay.style.transition = 'opacity 0.5s ease-out';
        overlay.style.opacity = '0';
        setTimeout(() => overlay.remove(), 500);
      }, bootLines.length * 400 + 800);

      sessionStorage.setItem('booted', '1');
    });
  }
});
