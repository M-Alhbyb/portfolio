<section class="relative min-h-screen flex items-center overflow-hidden">
    <div class="absolute inset-0 term-grid opacity-30"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 md:py-32 w-full">
        <div class="flex flex-col md:flex-row items-center gap-8 md:gap-12 lg:gap-16 hero-order">
            <div class="flex-1 w-full md:min-w-0">
                <div class="term-panel p-4 md:p-6 mb-8 w-full">
                    <div class="flex flex-col sm:flex-row items-center sm:items-start gap-4 md:gap-6">
                        <div class="flex-shrink-0">
                            <div class="relative overflow-hidden w-28 h-28 md:w-32 md:h-32 lg:w-36 lg:h-36 rounded-full border-2 border-cat-surface2">
                                <img src="/assets/images/photo.webp" alt="MohamedElhabib Mohamed"
                                     class="w-full h-full object-cover term-catppuccin-img">
                                <div class="term-img-overlay rounded-full"></div>
                            </div>
                        </div>
                        <div class="space-y-1 text-sm font-mono flex-1">
                            <div><span class="term-neofetch-key"><?= \App\Helpers\Language::t('hero.neofetch_name_label') ?></span><span class="term-neofetch-val"><?= \App\Helpers\Language::t('hero.neofetch_name') ?></span></div>
                            <div><span class="term-neofetch-key"><?= \App\Helpers\Language::t('hero.neofetch_role_label') ?></span><span class="term-neofetch-val"><?= \App\Helpers\Language::t('hero.neofetch_role') ?></span></div>
                            <div><span class="term-neofetch-key"><?= \App\Helpers\Language::t('hero.neofetch_focus_label') ?></span><span class="term-neofetch-val text-cat-blue"><?= \App\Helpers\Language::t('hero.neofetch_focus') ?></span></div>
                            <div><span class="term-neofetch-key"><?= \App\Helpers\Language::t('hero.neofetch_location_label') ?></span><span class="term-neofetch-val"><?= \App\Helpers\Language::t('hero.neofetch_location') ?></span></div>
                            <div><span class="term-neofetch-key"><?= \App\Helpers\Language::t('hero.neofetch_email_label') ?></span><span class="term-neofetch-val text-cat-blue">mohammedalhbyb@gmail.com</span></div>
                            <div><span class="term-neofetch-key"><?= \App\Helpers\Language::t('hero.neofetch_shell_label') ?></span><span class="term-neofetch-val"><?= \App\Helpers\Language::t('hero.neofetch_shell') ?></span></div>
                            <div><span class="term-neofetch-key"><?= \App\Helpers\Language::t('hero.neofetch_uptime_label') ?></span><span class="term-neofetch-val term-status-active text-cat-green"><?= \App\Helpers\Language::t('hero.neofetch_uptime') ?></span></div>
                        </div>
                    </div>
                </div>

                <p class="term-prompt text-cat-green text-sm font-mono mb-2">
                    <span class="text-cat-text"><?= \App\Helpers\Language::t('hero.about_cmd') ?></span>
                </p>
                <p class="text-cat-subtext0 font-mono text-sm leading-relaxed max-w-2xl mb-6">
                    <?= \App\Helpers\Language::t('hero.tagline') ?>
                </p>

                <div class="flex flex-wrap gap-3">
                    <a href="/projects" class="term-btn term-btn-primary text-sm flex items-center gap-2">
                        <?= \App\Helpers\Language::t('hero.projects_cmd') ?>
                    </a>
                    <a href="/contact" class="term-btn text-sm flex items-center gap-2">
                        <?= \App\Helpers\Language::t('hero.contact_cmd') ?>
                    </a>
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
