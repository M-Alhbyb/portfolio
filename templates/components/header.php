<header x-data="navMenu" class="term-titlebar fixed inset-x-0 top-0 z-50">
    <div class="flex items-center h-full w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <span class="text-cat-subtext0 mr-2">[</span>
        <a href="/" class="term-titlebar-item" :class="{ 'active': window.location.pathname === '/' }">~/home</a>
        <span class="text-cat-overlay0 mx-1">|</span>
        <a href="/projects" class="term-titlebar-item" :class="{ 'active': window.location.pathname.startsWith('/projects') }">~/projects</a>
        <span class="text-cat-overlay0 mx-1">|</span>
        <a href="/blog" class="term-titlebar-item" :class="{ 'active': window.location.pathname.startsWith('/blog') }">~/blog</a>
        <span class="text-cat-overlay0 mx-1">|</span>
        <a href="/about" class="term-titlebar-item" :class="{ 'active': window.location.pathname === '/about' }">~/about</a>
        <span class="text-cat-overlay0 mx-1">|</span>
        <a href="/contact" class="term-titlebar-item" :class="{ 'active': window.location.pathname === '/contact' }">~/contact</a>
        <span class="text-cat-subtext0 ml-2">]</span>

        <div class="ml-auto flex items-center">
            <?php require __DIR__ . '/language-switcher.php'; ?>
        </div>

        <button @click="toggle" class="md:hidden ml-2 p-1 text-cat-subtext0 hover:text-cat-text">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      :d="isOpen ? 'M6 18L18 6M6 6l12 12' : 'M4 6h16M4 12h16M4 18h16'">
                </path>
            </svg>
        </button>
    </div>

    <div x-show="isOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
         class="md:hidden bg-cat-crust border-t border-cat-surface1">
        <div class="px-4 py-3 space-y-2">
            <a href="/" @click="close" class="block text-sm text-cat-subtext0 hover:text-cat-lavender">~/home</a>
            <a href="/projects" @click="close" class="block text-sm text-cat-subtext0 hover:text-cat-lavender">~/projects</a>
            <a href="/blog" @click="close" class="block text-sm text-cat-subtext0 hover:text-cat-lavender">~/blog</a>
            <a href="/about" @click="close" class="block text-sm text-cat-subtext0 hover:text-cat-lavender">~/about</a>
            <a href="/contact" @click="close" class="block text-sm text-cat-subtext0 hover:text-cat-lavender">~/contact</a>
            <div class="pt-2 border-t border-cat-surface1">
                <?php require __DIR__ . '/language-switcher.php'; ?>
            </div>
        </div>
    </div>
</header>
