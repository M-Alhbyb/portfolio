<article class="py-24 term-section">
    <p class="term-prompt text-cat-green text-sm font-mono mb-2">
        <a href="/blog" class="text-cat-blue hover:text-cat-lavender">~/blog</a>
        <span class="text-cat-overlay2">/</span>
        <span class="text-cat-text"><?= htmlspecialchars($post['slug'] ?? '') ?></span>
    </p>

    <h1 class="text-xl sm:text-2xl font-bold text-cat-yellow font-mono mb-3 leading-tight">
        <?= htmlspecialchars($post['title']) ?>
    </h1>

    <div class="flex flex-wrap items-center gap-3 text-xs text-cat-subtext0 font-mono mb-6">
        <time datetime="<?= htmlspecialchars($post['published_at'] ?? $post['created_at']) ?>">
            <?= date('Y-m-d', strtotime($post['published_at'] ?? $post['created_at'])) ?>
        </time>
        <?php if (!empty($categories)): ?>
            <span class="text-cat-surface2">|</span>
            <?php foreach ($categories as $cat): ?>
                <a href="/blog?category=<?= htmlspecialchars($cat['slug']) ?>" class="text-cat-blue hover:text-cat-lavender">
                    <?= htmlspecialchars($cat['name']) ?>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <?php if (!empty($tags)): ?>
        <div class="flex flex-wrap gap-2 mb-6">
            <?php foreach ($tags as $tag): ?>
                <a href="/blog?tag=<?= htmlspecialchars($tag['slug']) ?>"
                   class="text-xs text-cat-blue font-mono hover:text-cat-lavender">
                    #<?= htmlspecialchars($tag['name']) ?>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if ($post['featured_image']): ?>
        <div class="term-panel p-1 mb-6">
            <img src="/<?= htmlspecialchars($post['featured_image']) ?>"
                 alt="<?= htmlspecialchars($post['title']) ?>"
                 class="w-full h-auto"
                 loading="lazy">
        </div>
    <?php endif; ?>

    <div class="term-code text-sm leading-relaxed mb-8">
        <?= $content ?? '' ?>
    </div>

    <div class="border-t border-cat-surface1 pt-6">
        <div class="flex items-center justify-between">
            <a href="/blog" class="text-xs text-cat-blue hover:text-cat-lavender font-mono">
                ← <?= \App\Helpers\Language::t('blog.back') ?>
            </a>
            <div class="flex items-center gap-3">
                <span class="text-xs text-cat-overlay2 font-mono"><?= \App\Helpers\Language::t('blog.share') ?>:</span>
                <a href="https://twitter.com/intent/tweet?text=<?= urlencode($post['title']) ?>&url=<?= urlencode('/blog/' . $post['slug']) ?>"
                   target="_blank" rel="noopener noreferrer" class="text-xs text-cat-subtext0 hover:text-cat-blue font-mono">X</a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= urlencode('/blog/' . $post['slug']) ?>"
                   target="_blank" rel="noopener noreferrer" class="text-xs text-cat-subtext0 hover:text-cat-blue font-mono">in</a>
            </div>
        </div>
    </div>
</article>
