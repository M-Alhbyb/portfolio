<section class="relative min-h-screen flex items-center overflow-hidden">
    <div class="absolute inset-0 term-grid opacity-30"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 w-full">
        <div class="flex items-center gap-12 lg:gap-16">
            <div class="flex-1 min-w-0">
                <div class="term-panel p-6 mb-8 max-w-lg">
                    <pre class="term-neofetch-ascii text-[0.6rem] leading-tight mb-4">
            ████████████
          ██            ██
         ██   ████████   ██
        ██   ██████████   ██
       ██   ████████████   ██
       ██   ████████████   ██
       ██   ████████████   ██
        ██   ██████████   ██
         ██   ████████   ██
          ██            ██
            ████████████
                    </pre>
                    <div class="space-y-1 text-sm font-mono">
                        <div><span class="term-neofetch-key">Name:     </span><span class="term-neofetch-val">MohamedElhabib Mohamed</span></div>
                        <div><span class="term-neofetch-key">Role:     </span><span class="term-neofetch-val">Full Stack Web Developer</span></div>
                        <div><span class="term-neofetch-key">Focus:    </span><span class="term-neofetch-val text-cat-blue">Backend · DevOps · Linux · AI</span></div>
                        <div><span class="term-neofetch-key">Location: </span><span class="term-neofetch-val">Khartoum, Sudan</span></div>
                        <div><span class="term-neofetch-key">Email:    </span><span class="term-neofetch-val text-cat-blue">mohammedalhbyb@gmail.com</span></div>
                        <div><span class="term-neofetch-key">Shell:    </span><span class="term-neofetch-val">zsh 5.9</span></div>
                        <div><span class="term-neofetch-key">Uptime:   </span><span class="term-neofetch-val term-status-active text-cat-green">99.9%</span></div>
                    </div>
                </div>

                <p class="term-prompt text-cat-green text-sm font-mono mb-2">
                    <span class="text-cat-text">./about --short</span>
                </p>
                <p class="text-cat-subtext0 font-mono text-sm leading-relaxed max-w-2xl mb-6">
                    <?= \App\Helpers\Language::t('hero.tagline') ?>
                </p>

                <div class="flex flex-wrap gap-3">
                    <a href="/projects" class="term-btn term-btn-primary text-sm flex items-center gap-2">
                        ./projects --list
                    </a>
                    <a href="/contact" class="term-btn text-sm flex items-center gap-2">
                        ./contact --email
                    </a>
                </div>
            </div>

            <div class="hidden md:block flex-shrink-0">
                <div class="term-panel p-2">
                    <img src="/assets/images/photo.webp" alt="MohamedElhabib Mohamed"
                         class="w-64 lg:w-72 object-cover aspect-[4/5]">
                </div>
            </div>
        </div>
    </div>

    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <svg class="w-5 h-5 text-cat-overlay1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
        </svg>
    </div>
</section>
