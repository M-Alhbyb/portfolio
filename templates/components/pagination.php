<?php if (($totalPages ?? 1) > 1): ?>
<div class="flex items-center justify-center gap-2 mt-12">
    <?php if ($currentPage > 1): ?>
        <a href="?page=<?= $currentPage - 1 ?><?= isset($categorySlug) && $categorySlug ? '&category=' . urlencode($categorySlug) : '' ?><?= isset($tagSlug) && $tagSlug ? '&tag=' . urlencode($tagSlug) : '' ?>"
           class="px-3 py-2 rounded-lg text-sm text-gray-400 hover:text-blue-400 hover:bg-blue-500/10 transition-colors">
            &larr;
        </a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?= $i ?><?= isset($categorySlug) && $categorySlug ? '&category=' . urlencode($categorySlug) : '' ?><?= isset($tagSlug) && $tagSlug ? '&tag=' . urlencode($tagSlug) : '' ?>"
           class="px-3 py-2 rounded-lg text-sm transition-colors <?= $i === $currentPage ? 'bg-blue-500 text-white' : 'text-gray-400 hover:text-blue-400 hover:bg-blue-500/10' ?>">
            <?= $i ?>
        </a>
    <?php endfor; ?>

    <?php if ($currentPage < $totalPages): ?>
        <a href="?page=<?= $currentPage + 1 ?><?= isset($categorySlug) && $categorySlug ? '&category=' . urlencode($categorySlug) : '' ?><?= isset($tagSlug) && $tagSlug ? '&tag=' . urlencode($tagSlug) : '' ?>"
           class="px-3 py-2 rounded-lg text-sm text-gray-400 hover:text-blue-400 hover:bg-blue-500/10 transition-colors">
            &rarr;
        </a>
    <?php endif; ?>
</div>
<?php endif; ?>
