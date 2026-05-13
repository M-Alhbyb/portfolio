<div class="timeline-line pl-8 pb-8 relative">
    <div class="absolute left-0 top-1 w-6 h-6 rounded-full bg-blue-500/20 border-2 border-blue-500 flex items-center justify-center">
        <div class="w-2 h-2 rounded-full bg-blue-400"></div>
    </div>

    <div class="glass-card rounded-lg p-5">
        <div class="flex items-center justify-between mb-2">
            <span class="text-xs font-mono text-cyan-400">
                <?= htmlspecialchars($item['period'] ?? '') ?>
            </span>
            <span class="text-xs px-2 py-0.5 rounded <?= ($item['type'] ?? '') === 'education' ? 'bg-green-500/10 text-green-300' : 'bg-blue-500/10 text-blue-300' ?>">
                <?= htmlspecialchars(ucfirst($item['type'] ?? '')) ?>
            </span>
        </div>

        <h3 class="text-base font-semibold text-white mb-1">
            <?php if (!empty($item['link'])): ?>
                <a href="<?= htmlspecialchars($item['link']) ?>" target="_blank" rel="noopener noreferrer" class="hover:text-cyan-400 transition-colors">
                    <?= htmlspecialchars($item['title'] ?? '') ?>
                </a>
            <?php else: ?>
                <?= htmlspecialchars($item['title'] ?? '') ?>
            <?php endif; ?>
        </h3>

        <p class="text-sm text-gray-400">
            <?php if (!empty($item['logo'])): ?>
                <?php if (str_starts_with($item['logo'], 'uploads/')): ?>
                    <img src="/<?= htmlspecialchars($item['logo']) ?>" alt="<?= htmlspecialchars($item['organization'] ?? '') ?> logo" class="inline-block h-5 w-auto mr-2 align-middle">
                <?php else: ?>
                    <span class="inline-block mr-2"><?= htmlspecialchars($item['logo']) ?></span>
                <?php endif; ?>
            <?php endif; ?>
            <?= htmlspecialchars($item['organization'] ?? '') ?>
            <?php if (!empty($item['link'])): ?>
                <a href="<?= htmlspecialchars($item['link']) ?>" target="_blank" rel="noopener noreferrer" class="ml-1 text-cyan-400 hover:underline text-xs">[Visit]</a>
            <?php endif; ?>
        </p>

        <?php if (!empty($item['description'])): ?>
            <p class="text-sm text-gray-500 mt-2">
                <?= htmlspecialchars($item['description']) ?>
            </p>
        <?php endif; ?>
    </div>
</div>
