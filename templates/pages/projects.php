<div class="py-24 term-section">
    <p class="term-prompt text-cat-green text-sm font-mono mb-2">ls -la ~/projects/</p>
    <h1 class="text-2xl font-bold text-cat-mauve font-mono mb-2"><?= \App\Helpers\Language::t('projects.title') ?></h1>
    <p class="text-cat-subtext0 text-sm font-mono mb-8"><?= \App\Helpers\Language::t('projects.description') ?></p>

    <?php if (!empty($projects)): ?>
        <div class="space-y-1 border border-cat-surface1 divide-y divide-cat-surface1">
            <?php foreach ($projects as $project): ?>
                <?php require __DIR__ . '/../components/project-card.php'; ?>
            <?php endforeach; ?>
        </div>

        <?php if (!empty($pagination)): ?>
            <?php require __DIR__ . '/../components/pagination.php'; ?>
        <?php endif; ?>
    <?php else: ?>
        <div class="text-center py-12">
            <p class="text-cat-subtext0 text-sm font-mono"><?= \App\Helpers\Language::t('projects.empty') ?></p>
        </div>
    <?php endif; ?>
</div>
