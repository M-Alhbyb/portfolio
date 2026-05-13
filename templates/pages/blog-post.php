<article class="relative py-24 mt-16">
    <div class="absolute inset-0 grid-pattern opacity-20"></div>
    <div class="relative max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <p class="text-sm font-mono text-cyan-400 mb-2">
                <span class="text-gray-500">//</span>
                <a href="/blog" class="hover:text-blue-400 transition-colors"><?= \App\Helpers\Language::t('blog.title') ?></a>
                <span class="text-gray-500">/ post</span>
            </p>

            <h1 class="text-3xl sm:text-4xl font-bold gradient-text leading-tight">
                <?= htmlspecialchars($post['title']) ?>
            </h1>

            <div class="flex flex-wrap items-center gap-4 mt-4 text-sm text-gray-400">
                <time datetime="<?= htmlspecialchars($post['published_at'] ?? $post['created_at']) ?>">
                    <?= date('F j, Y', strtotime($post['published_at'] ?? $post['created_at'])) ?>
                </time>

                <?php if (!empty($categories)): ?>
                    <span class="text-gray-600">|</span>
                    <?php foreach ($categories as $cat): ?>
                        <a href="/blog?category=<?= htmlspecialchars($cat['slug']) ?>" class="text-blue-400 hover:text-blue-300 transition-colors">
                            <?= htmlspecialchars($cat['name']) ?>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <?php if (!empty($tags)): ?>
                <div class="flex flex-wrap gap-2 mt-4">
                    <?php foreach ($tags as $tag): ?>
                        <a href="/blog?tag=<?= htmlspecialchars($tag['slug']) ?>"
                           class="text-xs px-2.5 py-1 rounded-full bg-gray-800 text-gray-400 hover:text-white border border-gray-700 transition-colors">
                            #<?= htmlspecialchars($tag['name']) ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <?php if ($post['featured_image']): ?>
            <div class="mb-8 rounded-xl overflow-hidden">
                <img src="/<?= htmlspecialchars($post['featured_image']) ?>"
                     alt="<?= htmlspecialchars($post['title']) ?>"
                     class="w-full h-auto object-cover"
                     loading="lazy">
            </div>
        <?php endif; ?>

        <div class="prose prose-invert max-w-none">
            <?= $content ?? '' ?>
        </div>

        <div class="mt-12 pt-8 border-t border-blue-500/10">
            <div class="flex items-center justify-between">
                <a href="/blog" class="text-sm text-blue-400 hover:text-blue-300 transition-colors">
                    &larr; <?= \App\Helpers\Language::t('blog.back') ?>
                </a>

                <div class="flex items-center gap-3">
                    <span class="text-xs text-gray-500"><?= \App\Helpers\Language::t('blog.share') ?>:</span>
                    <a href="https://twitter.com/intent/tweet?text=<?= urlencode($post['title']) ?>&url=<?= urlencode('/blog/' . $post['slug']) ?>"
                       target="_blank" rel="noopener noreferrer"
                       class="text-gray-400 hover:text-blue-400 transition-colors" aria-label="Share on Twitter">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= urlencode('/blog/' . $post['slug']) ?>"
                       target="_blank" rel="noopener noreferrer"
                       class="text-gray-400 hover:text-blue-400 transition-colors" aria-label="Share on LinkedIn">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</article>
