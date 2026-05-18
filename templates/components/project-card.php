<a href="/projects/<?= htmlspecialchars($project['slug']) ?>"
   class="term-panel block group hover:border-cat-lavender transition-colors duration-200 px-4 py-3">
    <div class="flex items-start gap-3">
        <span class="text-cat-overlay2 text-xs font-mono mt-0.5 shrink-0">
            <?= !empty($project['status']) && $project['status'] === 'published' ? '●' : '○' ?>
        </span>
        <div class="min-w-0 flex-1">
            <div class="flex items-center justify-between gap-2">
                <span class="text-cat-text text-sm font-mono group-hover:text-cat-lavender transition-colors truncate">
                    <?= htmlspecialchars($project['title']) ?>
                </span>
                <?php if (!empty($project['status']) && $project['status'] === 'published'): ?>
                    <span class="term-status-active text-cat-green text-xs shrink-0"><?= \App\Helpers\Language::t('project.status_active') ?></span>
                <?php else: ?>
                    <span class="term-status-inactive text-cat-red text-xs shrink-0"><?= \App\Helpers\Language::t('project.status_draft') ?></span>
                <?php endif; ?>
            </div>
            <p class="text-cat-subtext0 text-xs font-mono mt-1 line-clamp-2">
                <?= htmlspecialchars($project['short_description']) ?>
            </p>
            <?php if (!empty($project['tech_stack'])): ?>
                <?php $techs = json_decode($project['tech_stack'], true) ?? []; ?>
                <div class="flex flex-wrap gap-1.5 mt-2">
                    <?php foreach (array_slice($techs, 0, 4) as $tech): ?>
                        <span class="text-xs text-cat-blue font-mono"><?= htmlspecialchars($tech) ?></span>
                        <?php if ($tech !== array_slice($techs, 0, 4)[count(array_slice($techs, 0, 4)) - 1]): ?>
                            <span class="text-cat-surface2">|</span>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <?php if (count($techs) > 4): ?>
                        <span class="text-xs text-cat-overlay2">+<?= count($techs) - 4 ?></span>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</a>
