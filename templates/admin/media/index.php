<div class="term-section">
    <div class="flex items-center justify-between mb-6">
        <div>
            <p class="term-prompt text-cat-green text-xs font-mono mb-1">./media</p>
            <h1 class="text-lg font-bold text-cat-mauve font-mono">Media Library</h1>
        </div>
    </div>

    <?php if ($error ?? false): ?>
        <div class="term-panel p-3 border-cat-red mb-4"><p class="text-xs text-cat-red font-mono"><?= htmlspecialchars($error) ?></p></div>
    <?php endif; ?>
    <?php if ($success ?? false): ?>
        <div class="term-panel p-3 border-cat-green mb-4"><p class="text-xs text-cat-green font-mono"><?= htmlspecialchars($success) ?></p></div>
    <?php endif; ?>

    <div class="term-panel p-4 mb-6">
        <form method="POST" action="/admin/media/upload" enctype="multipart/form-data" class="flex items-center gap-4">
            <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
            <div class="flex-1">
                <input type="file" name="file" required accept=".jpg,.jpeg,.png,.webp"
                       class="w-full text-sm text-cat-text file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:bg-cat-surface0 file:text-cat-blue hover:file:bg-cat-surface1">
            </div>
            <button type="submit" class="term-btn term-btn-primary text-sm">$ upload</button>
        </form>
        <p class="text-xs text-cat-overlay0 font-mono mt-2">Allowed: JPG, PNG, WebP. Max 5MB.</p>
    </div>

    <?php if (empty($mediaItems)): ?>
        <div class="text-center py-12">
            <p class="text-cat-overlay0 font-mono text-xs">No media uploaded yet.</p>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
            <?php foreach ($mediaItems as $item): ?>
            <div class="term-panel overflow-hidden group">
                <div class="aspect-square bg-cat-surface0 relative">
                    <img src="/<?= htmlspecialchars($item['filepath']) ?>"
                         alt="<?= htmlspecialchars($item['alt_text'] ?: $item['filename']) ?>"
                         loading="lazy"
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-cat-base/80 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <form method="POST" action="/admin/media/<?= (int) $item['id'] ?>" onsubmit="return confirm('Delete this file?')">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
                            <button type="submit" class="term-btn term-btn-danger text-xs py-1 px-2">$ rm</button>
                        </form>
                    </div>
                </div>
                <div class="p-2">
                    <p class="text-xs text-cat-subtext0 font-mono truncate"><?= htmlspecialchars($item['filename']) ?></p>
                    <p class="text-xs text-cat-overlay2 font-mono"><?= round($item['file_size'] / 1024) ?> KB</p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
