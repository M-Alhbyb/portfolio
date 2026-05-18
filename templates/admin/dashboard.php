<div class="term-section">
    <p class="term-prompt text-cat-green text-xs font-mono mb-2"><?= \App\Helpers\Language::t('admin.dashboard.cmd') ?></p>
    <h1 class="text-lg font-bold text-cat-mauve font-mono mb-1"><?= \App\Helpers\Language::t('admin.dashboard.title') ?></h1>
    <p class="text-xs text-cat-subtext0 font-mono mb-6"><?= \App\Helpers\Language::t('admin.dashboard.welcome', ['username' => htmlspecialchars($username ?? 'Admin')]) ?></p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 mb-6">
        <div class="term-panel p-4">
            <div class="text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.dashboard.total') ?></div>
            <div class="text-lg font-bold text-cat-text font-mono"><?= (int) $totalProjects ?></div>
            <div class="text-xs text-cat-subtext0 font-mono mt-1"><?= \App\Helpers\Language::t('admin.dashboard.projects') ?></div>
        </div>

        <div class="term-panel p-4">
            <div class="text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.dashboard.total') ?></div>
            <div class="text-lg font-bold text-cat-text font-mono"><?= (int) $totalPosts ?></div>
            <div class="text-xs text-cat-subtext0 font-mono mt-1"><?= \App\Helpers\Language::t('admin.dashboard.posts') ?></div>
        </div>

        <div class="term-panel p-4">
            <div class="text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.dashboard.unread') ?></div>
            <div class="text-lg font-bold text-cat-text font-mono"><?= (int) $unreadMessages ?></div>
            <div class="text-xs text-cat-subtext0 font-mono mt-1"><?= \App\Helpers\Language::t('admin.dashboard.messages') ?></div>
        </div>

        <div class="term-panel p-4">
            <div class="text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.dashboard.status') ?></div>
            <div class="text-lg font-bold text-cat-green font-mono term-status-active"><?= \App\Helpers\Language::t('admin.dashboard.active') ?></div>
            <div class="text-xs text-cat-subtext0 font-mono mt-1"><?= \App\Helpers\Language::t('admin.dashboard.system_active') ?></div>
        </div>
    </div>

    <?php if (!empty($recentMedia)): ?>
    <div class="term-panel p-4">
        <h2 class="text-sm font-bold text-cat-lavender font-mono mb-3"><?= \App\Helpers\Language::t('admin.dashboard.latest_uploads') ?></h2>
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
