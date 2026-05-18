<div class="term-section">
    <div class="flex items-center justify-between mb-6">
        <div>
            <p class="term-prompt text-cat-green text-xs font-mono mb-1"><?= \App\Helpers\Language::t('admin.posts.cmd') ?></p>
            <h1 class="text-lg font-bold text-cat-mauve font-mono"><?= \App\Helpers\Language::t('admin.posts.title') ?></h1>
        </div>
        <a href="/admin/posts/create" class="term-btn term-btn-primary text-xs"><?= \App\Helpers\Language::t('admin.posts.new') ?></a>
    </div>

    <div class="term-panel overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-cat-surface1 text-cat-overlay2 text-left">
                    <th class="p-4 font-mono font-medium"><?= \App\Helpers\Language::t('admin.posts.title_col') ?></th>
                    <th class="p-4 font-mono font-medium hidden md:table-cell"><?= \App\Helpers\Language::t('admin.posts.status') ?></th>
                    <th class="p-4 font-mono font-medium hidden sm:table-cell"><?= \App\Helpers\Language::t('admin.posts.locale') ?></th>
                    <th class="p-4 font-mono font-medium"><?= \App\Helpers\Language::t('admin.posts.actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($posts)): ?>
                <tr><td colspan="4" class="p-8 text-center text-cat-overlay0 font-mono text-xs"><?= \App\Helpers\Language::t('admin.posts.empty') ?></td></tr>
                <?php else: ?>
                <?php foreach ($posts as $p): ?>
                <tr class="border-b border-cat-surface0 hover:bg-cat-surface0/50">
                    <td class="p-4 text-cat-text font-mono"><?= htmlspecialchars($p['title']) ?></td>
                    <td class="p-4 hidden md:table-cell">
                        <span class="text-xs px-2 py-0.5 font-mono <?= $p['status'] === 'published' ? 'text-cat-green bg-cat-surface0' : 'text-cat-yellow bg-cat-surface0' ?>"><?= $p['status'] ?></span>
                    </td>
                    <td class="p-4 hidden sm:table-cell text-cat-subtext0 font-mono"><?= htmlspecialchars($p['locale']) ?></td>
                    <td class="p-4">
                        <div class="flex items-center gap-2">
                            <a href="/admin/posts/<?= (int) $p['id'] ?>/edit" class="text-xs px-2 py-1 rounded bg-cat-surface0 text-cat-blue hover:bg-cat-surface1 font-mono"><?= \App\Helpers\Language::t('admin.posts.edit') ?></a>
                            <form method="POST" action="/admin/posts/<?= (int) $p['id'] ?>" onsubmit="return confirm('<?= \App\Helpers\Language::t('admin.posts.delete_confirm') ?>')">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
                                <button type="submit" class="text-xs px-2 py-1 rounded bg-cat-surface0 text-cat-red hover:bg-cat-surface1 font-mono"><?= \App\Helpers\Language::t('admin.posts.delete') ?></button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
