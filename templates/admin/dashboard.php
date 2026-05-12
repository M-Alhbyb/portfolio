<div class="max-w-6xl mx-auto">
    <div class="mb-8">
        <p class="text-sm font-mono text-cyan-400 mb-1">
            <span class="text-gray-500">//</span> dashboard
        </p>
        <h1 class="text-2xl font-bold gradient-text">Control Panel</h1>
        <p class="text-sm text-gray-400 mt-1">Welcome back, <?= htmlspecialchars($username ?? 'Admin') ?></p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div class="glass-card rounded-xl p-5">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-mono text-gray-500">TOTAL</span>
                <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
            </div>
            <div class="text-2xl font-bold text-white"><?= (int) $totalProjects ?></div>
            <div class="text-xs text-gray-500 mt-1">Projects</div>
        </div>

        <div class="glass-card rounded-xl p-5">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-mono text-gray-500">TOTAL</span>
                <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
            </div>
            <div class="text-2xl font-bold text-white"><?= (int) $totalPosts ?></div>
            <div class="text-xs text-gray-500 mt-1">Posts</div>
        </div>

        <div class="glass-card rounded-xl p-5">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-mono text-gray-500">UNREAD</span>
                <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <div class="text-2xl font-bold text-white"><?= (int) $unreadMessages ?></div>
            <div class="text-xs text-gray-500 mt-1">Messages</div>
        </div>

        <div class="glass-card rounded-xl p-5">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-mono text-gray-500">STATUS</span>
                <span class="status-dot online"></span>
            </div>
            <div class="text-2xl font-bold text-green-400">Online</div>
            <div class="text-xs text-gray-500 mt-1">System Active</div>
        </div>
    </div>

    <?php if (!empty($recentMedia)): ?>
    <div class="glass-card rounded-xl p-5">
        <h2 class="text-sm font-semibold text-white mb-4">Latest Uploads</h2>
        <div class="grid grid-cols-5 sm:grid-cols-10 gap-2">
            <?php foreach ($recentMedia as $media): ?>
                <div class="aspect-square rounded-lg overflow-hidden bg-gray-800">
                    <img src="/<?= htmlspecialchars($media['filepath']) ?>"
                         alt="<?= htmlspecialchars($media['alt_text'] ?: $media['filename']) ?>"
                         class="w-full h-full object-cover" loading="lazy">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
</div>
