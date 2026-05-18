<div class="term-section">
    <p class="term-prompt text-cat-green text-xs font-mono mb-1"><?= \App\Helpers\Language::t('admin.export.cmd') ?></p>
    <h1 class="text-lg font-bold text-cat-mauve font-mono mb-2"><?= \App\Helpers\Language::t('admin.export.title') ?></h1>
    <p class="text-xs text-cat-subtext0 font-mono mb-6"><?= \App\Helpers\Language::t('admin.export.description') ?></p>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <?php $exportTypes = [
            'projects' => ['label' => \App\Helpers\Language::t('admin.dashboard.projects')],
            'posts' => ['label' => \App\Helpers\Language::t('admin.dashboard.posts')],
            'skills' => ['label' => \App\Helpers\Language::t('admin.cv.skills')],
            'messages' => ['label' => \App\Helpers\Language::t('admin.dashboard.messages')],
            'cv' => ['label' => \App\Helpers\Language::t('admin.export.cv'), 'highlight' => true],
        ]; ?>

<?php foreach ($exportTypes as $key => $info): ?>
        <?php $isHighlight = !empty($info['highlight']); ?>
        <div class="term-panel p-4 <?= $isHighlight ? 'border-cat-lavender' : '' ?>">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-sm font-bold text-cat-text font-mono <?= $isHighlight ? 'text-cat-lavender' : '' ?>"><?= htmlspecialchars($info['label']) ?></h2>
            </div>
            <?php if ($key === 'cv'): ?>
            <div class="flex items-center gap-2">
                <a href="/admin/export/cv/download" class="term-btn term-btn-primary text-xs py-1.5 inline-flex items-center gap-1"><?= \App\Helpers\Language::t('admin.export.download_pdf') ?></a>
            </div>
            <p class="text-xs text-cat-overlay0 font-mono mt-2"><?= \App\Helpers\Language::t('admin.export.pdf_desc') ?></p>
            <?php else: ?>
            <div class="flex items-center gap-2">
                <a href="/admin/export/<?= htmlspecialchars($key) ?>?format=json" class="term-btn term-btn-primary text-xs py-1.5"><?= \App\Helpers\Language::t('admin.export.json') ?></a>
                <a href="/admin/export/<?= htmlspecialchars($key) ?>?format=csv" class="term-btn text-xs py-1.5"><?= \App\Helpers\Language::t('admin.export.csv') ?></a>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
</div>
