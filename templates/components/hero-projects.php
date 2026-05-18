<section class="pt-24 pb-8 term-section">
    <p class="term-prompt text-cat-green text-sm font-mono mb-2">ls -la ~/projects/</p>
    <div class="flex items-center gap-2 mb-2">
        <span class="status-dot online"></span>
        <span class="text-xs font-mono text-cat-subtext0"><?= \App\Helpers\Language::t('projects.status') ?></span>
    </div>
    <h1 class="text-2xl sm:text-3xl font-bold text-cat-mauve font-mono mb-3">
        <?= \App\Helpers\Language::t('projects.heading') ?>
    </h1>
    <p class="text-sm text-cat-subtext0 font-mono max-w-2xl">
        <?= \App\Helpers\Language::t('projects.subheading') ?>
    </p>
</section>
