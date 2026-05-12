<div class="relative py-24 mt-16">
    <div class="absolute inset-0 grid-pattern opacity-20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <p class="text-sm font-mono text-cyan-400 mb-2">
                <span class="text-gray-500">//</span> <?= \App\Helpers\Language::t('blog.subtitle') ?>
            </p>
            <h1 class="text-3xl sm:text-4xl font-bold gradient-text">
                <?= \App\Helpers\Language::t('blog.title') ?>
            </h1>
        </div>

        <?php if (!empty($categories) || !empty($tags)): ?>
        <div class="flex flex-wrap items-center gap-3 mb-10 justify-center">
            <a href="/blog" class="text-xs px-3 py-1.5 rounded-full <?= empty($categorySlug) && empty($tagSlug) ? 'bg-blue-500 text-white' : 'bg-gray-800 text-gray-400 hover:text-white' ?> transition-colors">
                <?= \App\Helpers\Language::t('blog.all') ?>
            </a>
            <?php foreach ($categories as $cat): ?>
                <a href="/blog?category=<?= htmlspecialchars($cat['slug']) ?>"
                   class="text-xs px-3 py-1.5 rounded-full <?= ($categorySlug ?? '') === $cat['slug'] ? 'bg-blue-500 text-white' : 'bg-gray-800 text-gray-400 hover:text-white' ?> transition-colors">
                    <?= htmlspecialchars($cat['name']) ?>
                </a>
            <?php endforeach; ?>
            <?php foreach ($tags as $t): ?>
                <a href="/blog?tag=<?= htmlspecialchars($t['slug']) ?>"
                   class="text-xs px-3 py-1.5 rounded-full <?= ($tagSlug ?? '') === $t['slug'] ? 'bg-blue-500/20 text-blue-300 border border-blue-500/30' : 'bg-gray-800 text-gray-400 hover:text-white' ?> transition-colors">
                    #<?= htmlspecialchars($t['name']) ?>
                </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($posts)): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($posts as $post): ?>
                    <?php require __DIR__ . '/../components/blog-card.php'; ?>
                <?php endforeach; ?>
            </div>

            <?php
            $currentPage = $page;
            $totalPages = $totalPages ?? 1;
            require __DIR__ . '/../components/pagination.php';
            ?>
        <?php else: ?>
            <div class="text-center py-20">
                <div class="text-4xl mb-4 text-gray-600">&#9997;</div>
                <p class="text-gray-500"><?= \App\Helpers\Language::t('blog.empty') ?></p>
                <a href="/" class="inline-block mt-4 text-sm text-blue-400 hover:text-blue-300 transition-colors">
                    &larr; <?= \App\Helpers\Language::t('nav.home') ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
