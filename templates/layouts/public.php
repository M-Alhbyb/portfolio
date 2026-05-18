<!DOCTYPE html>
<html lang="<?= $locale ?? 'en' ?>" dir="<?= $dir ?? 'ltr' ?>" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?= \App\Core\Session::getCsrfToken() ?>">
    <?= $seo ?? '' ?>
    <link rel="icon" type="image/png" href="/assets/images/logo.png">
    <link rel="stylesheet" href="/assets/css/app.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen font-mono bg-cat-base text-cat-text">
    <div x-data="navMenu" class="md:hidden fixed inset-x-0 top-0 z-50">
        <div class="bg-cat-crust border-b border-cat-surface1 h-10 flex items-center px-3 text-xs font-mono text-cat-subtext0">
            <img src="/assets/images/logo.png" alt="logo" class="h-5 w-auto term-catppuccin-logo">
            <span class="ml-2 text-cat-overlay2"><?= \App\Helpers\Language::t('layout.breadcrumb') ?></span>
            <div class="ml-auto flex items-center gap-2" dir="ltr">
                <a href="/lang/en" class="text-xs px-1.5 py-1 font-mono <?= \App\Helpers\Language::getLocale() === 'en' ? 'text-cat-green' : 'text-cat-subtext0' ?>">EN</a>
                <span class="text-cat-overlay0">/</span>
                <a href="/lang/ar" class="text-xs px-1.5 py-1 font-mono <?= \App\Helpers\Language::getLocale() === 'ar' ? 'text-cat-green' : 'text-cat-subtext0' ?>">AR</a>
                <button @click="toggle" class="ml-1 p-1 text-cat-subtext0 hover:text-cat-text">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              :d="isOpen ? 'M6 18L18 6M6 6l12 12' : 'M4 6h16M4 12h16M4 18h16'">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
        <div x-show="isOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
             class="bg-cat-crust border-b border-cat-surface1">
            <div class="px-3 py-3 space-y-1">
                <a href="/" @click="close" class="block px-3 py-2 text-sm text-cat-subtext0 hover:text-cat-lavender hover:bg-cat-surface0 font-mono"><?= \App\Helpers\Language::t('nav.home_cmd') ?></a>
                <a href="/projects" @click="close" class="block px-3 py-2 text-sm text-cat-subtext0 hover:text-cat-lavender hover:bg-cat-surface0 font-mono"><?= \App\Helpers\Language::t('nav.projects_cmd') ?></a>
                <a href="/blog" @click="close" class="block px-3 py-2 text-sm text-cat-subtext0 hover:text-cat-lavender hover:bg-cat-surface0 font-mono"><?= \App\Helpers\Language::t('nav.blog_cmd') ?></a>
                <a href="/about" @click="close" class="block px-3 py-2 text-sm text-cat-subtext0 hover:text-cat-lavender hover:bg-cat-surface0 font-mono"><?= \App\Helpers\Language::t('nav.about_cmd') ?></a>
                <a href="/contact" @click="close" class="block px-3 py-2 text-sm text-cat-subtext0 hover:text-cat-lavender hover:bg-cat-surface0 font-mono"><?= \App\Helpers\Language::t('nav.contact_cmd') ?></a>
            </div>
        </div>
    </div>

    <?php require __DIR__ . '/../components/header.php'; ?>

    <main class="min-h-screen md:pt-10 pt-10">
        <?= $content ?? '' ?>
    </main>

    <?php require __DIR__ . '/../components/footer.php'; ?>

    <script>
        window.__ = <?= json_encode([
            'js.error' => \App\Helpers\Language::t('js.error'),
            'js.boot_mount' => \App\Helpers\Language::t('js.boot_mount'),
            'js.boot_kernel' => \App\Helpers\Language::t('js.boot_kernel'),
            'js.boot_neofetch' => \App\Helpers\Language::t('js.boot_neofetch'),
            'js.boot_modules' => \App\Helpers\Language::t('js.boot_modules'),
            'js.boot_connection' => \App\Helpers\Language::t('js.boot_connection'),
            'js.boot_ready' => \App\Helpers\Language::t('js.boot_ready'),
        ]) ?>;
    </script>
    <script src="/assets/js/app.js"></script>
</body>
</html>
