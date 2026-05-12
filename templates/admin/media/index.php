<div class="max-w-6xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <div>
            <p class="text-sm font-mono text-cyan-400 mb-1"><span class="text-gray-500">//</span> media</p>
            <h1 class="text-2xl font-bold gradient-text">Media Library</h1>
        </div>
    </div>

    <?php if ($error ?? false): ?>
        <div class="mb-4 p-3 rounded-lg bg-red-500/10 border border-red-500/20 text-sm text-red-400"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <?php if ($success ?? false): ?>
        <div class="mb-4 p-3 rounded-lg bg-green-500/10 border border-green-500/20 text-sm text-green-400"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <div class="glass-card rounded-xl p-6 mb-8">
        <form method="POST" action="/admin/media/upload" enctype="multipart/form-data" class="flex items-center gap-4">
            <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
            <div class="flex-1">
                <input type="file" name="file" required accept=".jpg,.jpeg,.png,.webp"
                       class="w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:bg-blue-500/10 file:text-blue-300 hover:file:bg-blue-500/20">
            </div>
            <button type="submit" class="btn-primary text-sm">Upload</button>
        </form>
        <p class="text-xs text-gray-500 mt-2">Allowed: JPG, PNG, WebP. Max 5MB.</p>
    </div>

    <?php if (empty($mediaItems)): ?>
        <div class="text-center py-12">
            <p class="text-gray-500">No media uploaded yet.</p>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
            <?php foreach ($mediaItems as $item): ?>
            <div class="glass-card rounded-lg overflow-hidden group">
                <div class="aspect-square bg-gray-800 relative">
                    <img src="/<?= htmlspecialchars($item['filepath']) ?>"
                         alt="<?= htmlspecialchars($item['alt_text'] ?: $item['filename']) ?>"
                         loading="lazy"
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <form method="POST" action="/admin/media/<?= (int) $item['id'] ?>" onsubmit="return confirm('Delete this file?')">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
                            <button type="submit" class="btn-red text-xs py-1 px-2">Delete</button>
                        </form>
                    </div>
                </div>
                <div class="p-2">
                    <p class="text-xs text-gray-400 truncate"><?= htmlspecialchars($item['filename']) ?></p>
                    <p class="text-xs text-gray-600"><?= round($item['file_size'] / 1024) ?> KB</p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
