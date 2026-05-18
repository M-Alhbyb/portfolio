<div class="timeline-line pl-8 pb-8 relative">
    <div class="absolute left-0 top-1 w-5 h-5 border border-cat-surface2 flex items-center justify-center bg-cat-base">
        <div class="w-2 h-2 bg-cat-blue"></div>
    </div>

    <div class="term-panel p-4">
        <div class="flex items-center justify-between mb-2">
            <span class="text-xs font-mono text-cat-teal">
                <?= htmlspecialchars($item['period'] ?? '') ?>
            </span>
            <span class="text-xs px-2 py-0.5 font-mono <?= ($item['type'] ?? '') === 'education' ? 'text-cat-green bg-cat-surface0' : 'text-cat-blue bg-cat-surface0' ?>">
                <?= htmlspecialchars(ucfirst($item['type'] ?? '')) ?>
            </span>
        </div>

        <h3 class="text-sm font-mono text-cat-text mb-1">
            <?php if (!empty($item['link'])): ?>
                <a href="<?= htmlspecialchars($item['link']) ?>" target="_blank" rel="noopener noreferrer" class="hover:text-cat-lavender transition-colors">
                    <?= htmlspecialchars($item['title'] ?? '') ?>
                </a>
            <?php else: ?>
                <?= htmlspecialchars($item['title'] ?? '') ?>
            <?php endif; ?>
        </h3>

        <p class="text-xs text-cat-subtext0 font-mono">
            <?php if (!empty($item['logo'])): ?>
                <?php if (str_starts_with($item['logo'], 'uploads/')): ?>
                    <img src="/<?= htmlspecialchars($item['logo']) ?>" alt="<?= htmlspecialchars($item['organization'] ?? '') ?>" class="inline-block h-4 w-auto mr-1 align-middle">
                <?php else: ?>
                    <span class="inline-block mr-1"><?= htmlspecialchars($item['logo']) ?></span>
                <?php endif; ?>
            <?php endif; ?>
            <?= htmlspecialchars($item['organization'] ?? '') ?>
            <?php if (!empty($item['place'])): ?>
                <span class="text-cat-overlay2"> :: <?= htmlspecialchars($item['place']) ?></span>
            <?php endif; ?>
            <?php if (!empty($item['work_type'])): ?>
                <span class="text-cat-overlay2 ml-1">[<?= htmlspecialchars($item['work_type']) ?>]</span>
            <?php endif; ?>
            <?php if (!empty($item['link'])): ?>
                <a href="<?= htmlspecialchars($item['link']) ?>" target="_blank" rel="noopener noreferrer" class="ml-1 text-cat-blue hover:text-cat-lavender underline text-xs"><?= \App\Helpers\Language::t('timeline.link') ?></a>
            <?php endif; ?>
        </p>

        <?php if (!empty($item['description'])): ?>
            <p class="text-xs text-cat-subtext0 font-mono mt-2">
                <?= htmlspecialchars($item['description']) ?>
            </p>
        <?php endif; ?>
    </div>
</div>
