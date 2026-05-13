<header x-data="navMenu" class="glass fixed inset-x-0 top-0 z-50 border-b border-blue-500/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <a href="/" class="flex items-center group">
                <img src="/assets/images/logo.png" alt="Mohamed Elhabib" class="h-8 w-auto">
            </a>

            <nav class="hidden md:flex items-center gap-x-6">
                <a href="/" class="text-sm text-gray-300 hover:text-blue-400 transition-colors"><?= \App\Helpers\Language::t('nav.home') ?></a>
                <a href="/projects" class="text-sm text-gray-300 hover:text-blue-400 transition-colors"><?= \App\Helpers\Language::t('nav.projects') ?></a>
                <a href="/blog" class="text-sm text-gray-300 hover:text-blue-400 transition-colors"><?= \App\Helpers\Language::t('nav.blog') ?></a>
                <a href="/about" class="text-sm text-gray-300 hover:text-blue-400 transition-colors"><?= \App\Helpers\Language::t('nav.about') ?></a>
                <a href="/contact" class="text-sm text-gray-300 hover:text-blue-400 transition-colors"><?= \App\Helpers\Language::t('nav.contact') ?></a>

                <?php require __DIR__ . '/language-switcher.php'; ?>
            </nav>

            <button @click="toggle" class="md:hidden p-2 text-gray-300 hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          :d="isOpen ? 'M6 18L18 6M6 6l12 12' : 'M4 6h16M4 12h16M4 18h16'">
                    </path>
                </svg>
            </button>
        </div>

        <div x-show="isOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="md:hidden pb-4 space-y-2">
            <a href="/" @click="close" class="block px-3 py-2 text-sm text-gray-300 hover:text-blue-400"><?= \App\Helpers\Language::t('nav.home') ?></a>
            <a href="/projects" @click="close" class="block px-3 py-2 text-sm text-gray-300 hover:text-blue-400"><?= \App\Helpers\Language::t('nav.projects') ?></a>
            <a href="/blog" @click="close" class="block px-3 py-2 text-sm text-gray-300 hover:text-blue-400"><?= \App\Helpers\Language::t('nav.blog') ?></a>
            <a href="/about" @click="close" class="block px-3 py-2 text-sm text-gray-300 hover:text-blue-400"><?= \App\Helpers\Language::t('nav.about') ?></a>
            <a href="/contact" @click="close" class="block px-3 py-2 text-sm text-gray-300 hover:text-blue-400"><?= \App\Helpers\Language::t('nav.contact') ?></a>
            <div class="px-3 pt-2 border-t border-gray-700">
                <?php require __DIR__ . '/language-switcher.php'; ?>
            </div>
        </div>
    </div>
</header>
