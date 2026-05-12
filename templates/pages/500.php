<!DOCTYPE html>
<html lang="<?= \App\Helpers\Language::getLocale() ?>" dir="<?= \App\Helpers\Language::dir() ?>" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - <?= \App\Helpers\Language::t('error.500_title') ?> | Elhabib Portfolio</title>
    <link rel="stylesheet" href="/assets/css/app.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="min-h-screen bg-[#0b1120] text-white font-sans antialiased flex items-center justify-center">
    <div class="text-center max-w-lg mx-auto px-4">
        <div class="text-8xl font-bold text-red-400 mb-4">500</div>
        <div class="w-16 h-1 bg-gradient-to-r from-red-500 to-orange-500 mx-auto mb-6 rounded-full"></div>
        <h1 class="text-2xl font-semibold mb-3"><?= \App\Helpers\Language::t('error.500_title') ?></h1>
        <p class="text-gray-400 mb-8"><?= \App\Helpers\Language::t('error.500_message') ?></p>
        <a href="/" class="btn-primary inline-flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            <?= \App\Helpers\Language::t('error.500_home') ?>
        </a>
    </div>
</body>
</html>
