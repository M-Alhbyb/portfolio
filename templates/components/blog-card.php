<a href="/blog/<?= htmlspecialchars($post['slug']) ?>" class="flex items-start gap-3 px-4 py-3 hover:bg-cat-surface0 transition-colors group">
    <span class="term-prompt-muted text-cat-teal text-xs font-mono mt-0.5 shrink-0">➜</span>
    <div class="min-w-0 flex-1">
        <div class="flex items-center gap-2 text-xs text-cat-overlay2 font-mono mb-1">
            <span><?= date('Y-m-d', strtotime($post['published_at'] ?? $post['created_at'])) ?></span>
            <?php if (!empty($post['locale'])): ?>
                <span class="text-cat-surface2">|</span>
                <span class="text-cat-subtext0"><?= htmlspecialchars($post['locale']) ?></span>
            <?php endif; ?>
        </div>
        <h3 class="text-sm font-mono text-cat-yellow group-hover:text-cat-text transition-colors">
            <?= htmlspecialchars($post['title']) ?>
        </h3>
        <?php if (!empty($post['excerpt'])): ?>
            <p class="text-xs text-cat-subtext0 font-mono mt-1 line-clamp-2">
                <?= htmlspecialchars($post['excerpt']) ?>
            </p>
        <?php endif; ?>
        <?php if (!empty($post['tags'])): ?>
            <?php $tags = json_decode($post['tags'], true) ?? []; ?>
            <div class="flex flex-wrap gap-1.5 mt-1.5">
                <?php foreach (array_slice($tags, 0, 3) as $tag): ?>
                    <span class="text-xs text-cat-blue font-mono">#<?= htmlspecialchars(is_array($tag) ? ($tag['name'] ?? $tag) : $tag) ?></span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</a>
