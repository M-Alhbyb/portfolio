<div class="term-section">
    <div class="flex items-center justify-between mb-6">
        <div>
            <p class="term-prompt text-cat-green text-xs font-mono mb-1"><?= \App\Helpers\Language::t('admin.projects.cmd') ?></p>
            <h1 class="text-lg font-bold text-cat-mauve font-mono"><?= \App\Helpers\Language::t('admin.projects.title') ?></h1>
        </div>
        <a href="/admin/projects/create" class="term-btn term-btn-primary text-xs"><?= \App\Helpers\Language::t('admin.projects.new') ?></a>
    </div>

    <div class="term-panel overflow-x-auto">
        <table class="w-full text-xs font-mono">
            <thead>
                <tr class="border-b border-cat-surface1 text-cat-overlay2 text-left">
                    <th class="p-3 font-medium"><?= \App\Helpers\Language::t('admin.projects.title_col') ?></th>
                    <th class="p-3 font-medium hidden md:table-cell"><?= \App\Helpers\Language::t('admin.projects.status') ?></th>
                    <th class="p-3 font-medium hidden sm:table-cell"><?= \App\Helpers\Language::t('admin.projects.featured') ?></th>
                    <th class="p-3 font-medium hidden lg:table-cell"><?= \App\Helpers\Language::t('admin.projects.sort') ?></th>
                    <th class="p-3 font-medium"><?= \App\Helpers\Language::t('admin.projects.actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($projects)): ?>
                <tr><td colspan="5" class="p-6 text-center text-cat-subtext0"><?= \App\Helpers\Language::t('admin.projects.empty') ?></td></tr>
                <?php else: ?>
                <?php foreach ($projects as $p): ?>
                <tr class="border-b border-cat-surface1 hover:bg-cat-surface0">
                    <td class="p-3 text-cat-text"><?= htmlspecialchars($p['title']) ?></td>
                    <td class="p-3 hidden md:table-cell">
                        <span class="<?= $p['status'] === 'published' ? 'term-status-active text-cat-green' : 'term-status-inactive text-cat-red' ?> text-xs"><?= $p['status'] ?></span>
                    </td>
                    <td class="p-3 hidden sm:table-cell text-cat-subtext0"><?= $p['featured'] === 't' || $p['featured'] === true ? '✓' : '—' ?></td>
                    <td class="p-3 hidden lg:table-cell text-cat-subtext0"><?= (int) $p['sort_order'] ?></td>
                    <td class="p-3">
                        <div class="flex items-center gap-2">
                            <a href="/admin/projects/<?= (int) $p['id'] ?>/edit" class="text-xs px-2 py-1 bg-cat-surface0 text-cat-blue hover:text-cat-lavender border border-cat-surface1"><?= \App\Helpers\Language::t('admin.projects.edit') ?></a>
                            <form method="POST" action="/admin/projects/<?= (int) $p['id'] ?>" onsubmit="return confirm('<?= \App\Helpers\Language::t('admin.projects.delete_confirm') ?>')">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
                                <button type="submit" class="text-xs px-2 py-1 bg-cat-surface0 text-cat-red hover:text-cat-maroon border border-cat-surface1"><?= \App\Helpers\Language::t('admin.projects.delete') ?></button>
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
