<header class="hidden md:flex term-titlebar fixed inset-x-0 top-0 z-50 flex-col items-center border-b border-cat-surface1">
    <div class="flex items-center h-full w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <span class="hidden md:inline mr-2"><img src="/assets/images/logo.png" alt="logo" class="h-5 w-auto term-catppuccin-logo inline"></span> <span class="text-cat-subtext0 mr-2">[</span>
        <a href="/" class="term-titlebar-item"><?= \App\Helpers\Language::t('nav.home_cmd') ?></a>
        <span class="text-cat-overlay0 mx-1">|</span>
        <a href="/projects" class="term-titlebar-item"><?= \App\Helpers\Language::t('nav.projects_cmd') ?></a>
        <span class="text-cat-overlay0 mx-1">|</span>
        <a href="/blog" class="term-titlebar-item"><?= \App\Helpers\Language::t('nav.blog_cmd') ?></a>
        <span class="text-cat-overlay0 mx-1">|</span>
        <a href="/about" class="term-titlebar-item"><?= \App\Helpers\Language::t('nav.about_cmd') ?></a>
        <span class="text-cat-overlay0 mx-1">|</span>
        <a href="/contact" class="term-titlebar-item"><?= \App\Helpers\Language::t('nav.contact_cmd') ?></a>
        <span class="text-cat-subtext0 ml-2">]</span>

        <div class="hidden md:flex ml-auto items-center">
            <?php require __DIR__ . '/language-switcher.php'; ?>
        </div>
    </div>
</header>
