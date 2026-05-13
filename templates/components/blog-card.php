<a href="/blog/<?= htmlspecialchars($post['slug']) ?>" class="glass-card rounded-xl p-5 block group hover:-translate-y-1 transition-all duration-200">
    <div class="flex items-center gap-2 mb-3">
        <span class="text-xs font-mono text-gray-500">
            <?= date('M j, Y', strtotime($post['published_at'] ?? $post['created_at'])) ?>
        </span>
        <?php if (!empty($post['locale'])): ?>
            <span class="text-xs px-1.5 py-0.5 rounded bg-gray-800 text-gray-400 uppercase">
                <?= htmlspecialchars($post['locale']) ?>
            </span>
        <?php endif; ?>
    </div>

    <h3 class="text-base font-semibold text-white mb-2 group-hover:text-blue-400 transition-colors line-clamp-2">
        <?= htmlspecialchars($post['title']) ?>
    </h3>

    <?php if (!empty($post['excerpt'])): ?>
        <p class="text-sm text-gray-400 line-clamp-3">
            <?= htmlspecialchars($post['excerpt']) ?>
        </p>
    <?php endif; ?>

    <div class="mt-4 flex items-center text-sm text-blue-400 group-hover:text-blue-300 transition-colors">
        <span><?= \App\Helpers\Language::t('blog.read_more') ?></span>
        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
    </div>
</a>
