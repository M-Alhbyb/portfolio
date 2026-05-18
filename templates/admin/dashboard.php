<div class="term-section">
    <p class="term-prompt text-cat-green text-xs font-mono mb-2">./dashboard --status</p>
    <h1 class="text-lg font-bold text-cat-mauve font-mono mb-1">Control Panel</h1>
    <p class="text-xs text-cat-subtext0 font-mono mb-6">Welcome back, <?= htmlspecialchars($username ?? 'Admin') ?></p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 mb-6">
        <div class="term-panel p-4">
            <div class="text-xs text-cat-overlay2 font-mono mb-1">TOTAL</div>
            <div class="text-lg font-bold text-cat-text font-mono"><?= (int) $totalProjects ?></div>
            <div class="text-xs text-cat-subtext0 font-mono mt-1">Projects</div>
        </div>

        <div class="term-panel p-4">
            <div class="text-xs text-cat-overlay2 font-mono mb-1">TOTAL</div>
            <div class="text-lg font-bold text-cat-text font-mono"><?= (int) $totalPosts ?></div>
            <div class="text-xs text-cat-subtext0 font-mono mt-1">Posts</div>
        </div>

        <div class="term-panel p-4">
            <div class="text-xs text-cat-overlay2 font-mono mb-1">UNREAD</div>
            <div class="text-lg font-bold text-cat-text font-mono"><?= (int) $unreadMessages ?></div>
            <div class="text-xs text-cat-subtext0 font-mono mt-1">Messages</div>
        </div>

        <div class="term-panel p-4">
            <div class="text-xs text-cat-overlay2 font-mono mb-1">STATUS</div>
            <div class="text-lg font-bold text-cat-green font-mono term-status-active">active</div>
            <div class="text-xs text-cat-subtext0 font-mono mt-1">System Active</div>
        </div>
    </div>

    <?php if (!empty($recentMedia)): ?>
    <div class="term-panel p-4">
        <h2 class="text-sm font-bold text-cat-lavender font-mono mb-3">Latest Uploads</h2>
        <div class="grid grid-cols-5 sm:grid-cols-10 gap-2">
            <?php foreach ($recentMedia as $media): ?>
                <div class="aspect-square overflow-hidden bg-cat-mantle border border-cat-surface1">
                    <img src="/<?= htmlspecialchars($media['filepath']) ?>"
                         alt="<?= htmlspecialchars($media['alt_text'] ?: $media['filename']) ?>"
                         class="w-full h-full object-cover" loading="lazy">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
</div>
