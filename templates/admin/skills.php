<div class="term-section">
    <p class="term-prompt text-cat-green text-xs font-mono mb-1"><?= \App\Helpers\Language::t('admin.skills.cmd') ?></p>
    <h1 class="text-lg font-bold text-cat-mauve font-mono mb-6"><?= \App\Helpers\Language::t('admin.skills.title') ?></h1>

    <?php if ($error ?? false): ?>
        <div class="term-panel p-3 border-cat-red mb-4"><p class="text-xs text-cat-red font-mono"><?= htmlspecialchars($error) ?></p></div>
    <?php endif; ?>
    <?php if ($success ?? false): ?>
        <div class="term-panel p-3 border-cat-green mb-4"><p class="text-xs text-cat-green font-mono"><?= htmlspecialchars($success) ?></p></div>
    <?php endif; ?>

    <div class="term-panel p-4 mb-6">
        <h2 class="text-sm font-bold text-cat-peach font-mono mb-4"><?= \App\Helpers\Language::t('admin.skills.add') ?></h2>
        <form method="POST" action="/admin/skills" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
            <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
            <div>
                <label class="block text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.languages.name') ?></label>
                <input type="text" name="name" required maxlength="100" class="w-full px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.skills.category') ?></label>
                <select name="category" class="w-full px-3 py-2 text-sm">
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?= htmlspecialchars($cat) ?>"><?= htmlspecialchars($cat) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label class="block text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.skills.proficiency') ?></label>
                <input type="number" name="proficiency" value="75" min="1" max="100" class="w-full px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.skills.icon') ?></label>
                <input type="text" name="icon" maxlength="50" class="w-full px-3 py-2 text-sm">
            </div>
            <div class="flex items-end">
                <button type="submit" class="term-btn term-btn-primary text-sm w-full"><?= \App\Helpers\Language::t('admin.skills.add_btn') ?></button>
            </div>
        </form>
    </div>

    <div class="term-panel overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-cat-surface1 text-cat-overlay2 text-left">
                    <th class="p-4 font-mono font-medium"><?= \App\Helpers\Language::t('admin.languages.name') ?></th>
                    <th class="p-4 font-mono font-medium hidden sm:table-cell"><?= \App\Helpers\Language::t('admin.skills.category') ?></th>
                    <th class="p-4 font-mono font-medium hidden sm:table-cell"><?= \App\Helpers\Language::t('admin.skills.proficiency') ?></th>
                    <th class="p-4 font-mono font-medium"><?= \App\Helpers\Language::t('admin.languages.actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($skills)): ?>
                <tr><td colspan="4" class="p-8 text-center text-cat-overlay0 font-mono text-xs"><?= \App\Helpers\Language::t('admin.skills.empty') ?></td></tr>
                <?php else: ?>
                <?php foreach ($skills as $s): ?>
                <tr class="border-b border-cat-surface0 hover:bg-cat-surface0/50">
                    <td class="p-4 text-cat-text font-mono"><?= htmlspecialchars($s['name']) ?></td>
                    <td class="p-4 hidden sm:table-cell text-cat-subtext0 font-mono"><?= htmlspecialchars($s['category']) ?></td>
                    <td class="p-4 hidden sm:table-cell">
                        <div class="flex items-center gap-2">
                            <div class="w-24 h-1.5 bg-cat-surface0 rounded-full overflow-hidden">
                                <div class="h-full rounded-full bg-cat-mauve" style="width: <?= (int) $s['proficiency'] ?>%"></div>
                            </div>
                            <span class="text-xs text-cat-overlay2 font-mono"><?= (int) $s['proficiency'] ?>%</span>
                        </div>
                    </td>
                    <td class="p-4">
                        <form method="POST" action="/admin/skills/<?= (int) $s['id'] ?>" class="flex items-center gap-2">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
                            <input type="hidden" name="name" value="<?= htmlspecialchars($s['name']) ?>">
                            <input type="hidden" name="category" value="<?= htmlspecialchars($s['category']) ?>">
                            <input type="hidden" name="proficiency" value="<?= (int) $s['proficiency'] ?>">
                            <input type="hidden" name="icon" value="<?= htmlspecialchars($s['icon'] ?? '') ?>">
                            <input type="hidden" name="sort_order" value="<?= (int) ($s['sort_order'] ?? 0) ?>">
                            <input type="number" name="proficiency" value="<?= (int) $s['proficiency'] ?>" min="1" max="100" class="w-16 px-2 py-1 text-xs">
                            <button type="submit" class="text-xs px-2 py-1 rounded bg-cat-surface0 text-cat-blue hover:bg-cat-surface1 font-mono"><?= \App\Helpers\Language::t('admin.skills.update') ?></button>
                        </form>
                        <form method="POST" action="/admin/skills/<?= (int) $s['id'] ?>" class="inline" onsubmit="return confirm('<?= \App\Helpers\Language::t('admin.skills.delete_confirm') ?>')">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
                            <button type="submit" class="text-xs px-2 py-1 rounded bg-cat-surface0 text-cat-red hover:bg-cat-surface1 font-mono"><?= \App\Helpers\Language::t('admin.skills.delete') ?></button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
