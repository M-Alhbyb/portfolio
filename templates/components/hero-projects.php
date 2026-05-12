<section class="relative pt-32 pb-16 overflow-hidden">
    <div class="absolute inset-0 grid-pattern opacity-20"></div>
    <div class="absolute top-1/3 left-1/3 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="flex items-center justify-center gap-3 mb-4">
            <span class="status-dot online"></span>
            <span class="text-sm font-mono text-gray-400"><?= \App\Helpers\Language::t('projects.status') ?></span>
        </div>
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold gradient-text mb-4">
            <?= \App\Helpers\Language::t('projects.heading') ?>
        </h1>
        <p class="text-lg text-gray-300 max-w-2xl mx-auto">
            <?= \App\Helpers\Language::t('projects.subheading') ?>
        </p>
    </div>
</section>
