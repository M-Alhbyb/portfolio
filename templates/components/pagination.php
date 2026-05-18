<?php if (($totalPages ?? 1) > 1): ?>
<div class="flex items-center justify-center gap-2 mt-8 font-mono text-xs">
    <?php if ($currentPage > 1): ?>
        <a href="?page=<?= $currentPage - 1 ?><?= isset($categorySlug) && $categorySlug ? '&category=' . urlencode($categorySlug) : '' ?><?= isset($tagSlug) && $tagSlug ? '&tag=' . urlencode($tagSlug) : '' ?>"
           class="px-2 py-1 text-cat-subtext0 hover:text-cat-lavender hover:bg-cat-surface0 transition-colors">
            ←
        </a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?= $i ?><?= isset($categorySlug) && $categorySlug ? '&category=' . urlencode($categorySlug) : '' ?><?= isset($tagSlug) && $tagSlug ? '&tag=' . urlencode($tagSlug) : '' ?>"
           class="px-2 py-1 transition-colors <?= $i === $currentPage ? 'text-cat-green bg-cat-surface0' : 'text-cat-subtext0 hover:text-cat-lavender hover:bg-cat-surface0' ?>">
            <?= $i ?>
        </a>
    <?php endfor; ?>

    <?php if ($currentPage < $totalPages): ?>
        <a href="?page=<?= $currentPage + 1 ?><?= isset($categorySlug) && $categorySlug ? '&category=' . urlencode($categorySlug) : '' ?><?= isset($tagSlug) && $tagSlug ? '&tag=' . urlencode($tagSlug) : '' ?>"
           class="px-2 py-1 text-cat-subtext0 hover:text-cat-lavender hover:bg-cat-surface0 transition-colors">
            →
        </a>
    <?php endif; ?>
</div>
<?php endif; ?>
