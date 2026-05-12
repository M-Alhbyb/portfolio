<?php require __DIR__ . '/../components/hero-projects.php'; ?>

<section class="relative py-24">
    <div class="absolute inset-0 grid-pattern opacity-20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <p class="text-sm font-mono text-cyan-400 mb-2">
                <span class="text-gray-500">//</span> <?= \App\Helpers\Language::t('projects.subtitle') ?>
            </p>
            <h2 class="text-3xl sm:text-4xl font-bold gradient-text">
                <?= \App\Helpers\Language::t('projects.title') ?>
            </h2>
            <p class="text-gray-400 mt-4 max-w-xl mx-auto">
                <?= \App\Helpers\Language::t('projects.description') ?>
            </p>
        </div>

        <?php if (!empty($projects)): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($projects as $project): ?>
                    <?php require __DIR__ . '/../components/project-card.php'; ?>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-12">
                <p class="text-gray-500"><?= \App\Helpers\Language::t('projects.empty') ?></p>
            </div>
        <?php endif; ?>
    </div>
</section>
