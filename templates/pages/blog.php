<div class="py-24 term-section">
    <p class="term-prompt text-cat-green text-sm font-mono mb-2"><?= \App\Helpers\Language::t('blog.man_cmd') ?></p>
    <h1 class="text-2xl font-bold text-cat-mauve font-mono mb-6"><?= \App\Helpers\Language::t('blog.title') ?></h1>

    <?php if (!empty($categories) || !empty($tags)): ?>
    <div class="flex flex-wrap items-center gap-2 mb-8 font-mono text-xs">
        <a href="/blog" class="px-2 py-1 <?= empty($categorySlug) && empty($tagSlug) ? 'text-cat-green bg-cat-surface0' : 'text-cat-subtext0 hover:text-cat-lavender' ?> transition-colors"><?= \App\Helpers\Language::t('blog.all_filter') ?></a>
        <?php foreach ($categories as $cat): ?>
            <a href="/blog?category=<?= htmlspecialchars($cat['slug']) ?>"
               class="px-2 py-1 <?= ($categorySlug ?? '') === $cat['slug'] ? 'text-cat-green bg-cat-surface0' : 'text-cat-subtext0 hover:text-cat-lavender' ?> transition-colors">
                <?= htmlspecialchars($cat['name']) ?>
            </a>
        <?php endforeach; ?>
        <?php foreach ($tags as $t): ?>
            <a href="/blog?tag=<?= htmlspecialchars($t['slug']) ?>"
                class="px-2 py-1 <?= ($tagSlug ?? '') === $t['slug'] ? 'text-cat-text bg-cat-surface0' : 'text-cat-overlay2 hover:text-cat-text' ?> transition-colors">
                #<?= htmlspecialchars($t['name']) ?>
            </a>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <?php if (!empty($posts)): ?>
        <div class="border border-cat-surface1 divide-y divide-cat-surface1">
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
            <p class="text-cat-subtext0 text-sm font-mono"><?= \App\Helpers\Language::t('blog.empty') ?></p>
            <a href="/" class="inline-block mt-4 text-xs text-cat-blue hover:text-cat-lavender font-mono">
                ← <?= \App\Helpers\Language::t('nav.home') ?>
            </a>
        </div>
    <?php endif; ?>
</div>
