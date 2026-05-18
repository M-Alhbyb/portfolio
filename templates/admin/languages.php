<div class="term-section">
    <p class="term-prompt text-cat-green text-xs font-mono mb-1"><?= \App\Helpers\Language::t('admin.languages.cmd') ?></p>
    <h1 class="text-lg font-bold text-cat-mauve font-mono mb-6"><?= \App\Helpers\Language::t('admin.languages.title') ?></h1>

    <?php if ($error ?? false): ?>
        <div class="term-panel p-3 border-cat-red mb-4"><p class="text-xs text-cat-red font-mono"><?= htmlspecialchars($error) ?></p></div>
    <?php endif; ?>
    <?php if ($success ?? false): ?>
        <div class="term-panel p-3 border-cat-green mb-4"><p class="text-xs text-cat-green font-mono"><?= htmlspecialchars($success) ?></p></div>
    <?php endif; ?>

    <div class="term-panel p-4 mb-6">
        <h2 class="text-sm font-bold text-cat-peach font-mono mb-4"><?= \App\Helpers\Language::t('admin.languages.add') ?></h2>
        <form method="POST" action="/admin/languages" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
            <div>
                <label class="block text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.languages.name') ?></label>
                <input type="text" name="name" required maxlength="100" class="w-full px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.languages.level') ?></label>
                <select name="proficiency" class="w-full px-3 py-2 text-sm">
                    <option value="Native"><?= \App\Helpers\Language::t('admin.languages.native') ?></option>
                    <option value="Fluent"><?= \App\Helpers\Language::t('admin.languages.fluent') ?></option>
                    <option value="Advanced"><?= \App\Helpers\Language::t('admin.languages.advanced') ?></option>
                    <option value="Upper Intermediate"><?= \App\Helpers\Language::t('admin.languages.upper_intermediate') ?></option>
                    <option value="Intermediate" selected><?= \App\Helpers\Language::t('admin.languages.intermediate') ?></option>
                    <option value="Beginner"><?= \App\Helpers\Language::t('admin.languages.beginner') ?></option>
                </select>
            </div>
            <div>
                <label class="block text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.languages.sort_order') ?></label>
                <input type="number" name="sort_order" value="0" class="w-full px-3 py-2 text-sm">
            </div>
            <div class="flex items-end">
                <button type="submit" class="term-btn term-btn-primary text-sm w-full"><?= \App\Helpers\Language::t('admin.languages.add_btn') ?></button>
            </div>
        </form>
    </div>

    <div class="term-panel overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-cat-surface1 text-cat-overlay2 text-left">
                    <th class="p-4 font-mono font-medium"><?= \App\Helpers\Language::t('admin.languages.name') ?></th>
                    <th class="p-4 font-mono font-medium hidden sm:table-cell"><?= \App\Helpers\Language::t('admin.languages.proficiency') ?></th>
                    <th class="p-4 font-mono font-medium"><?= \App\Helpers\Language::t('admin.languages.actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($languages)): ?>
                <tr><td colspan="3" class="p-8 text-center text-cat-overlay0 font-mono text-xs"><?= \App\Helpers\Language::t('admin.languages.empty') ?></td></tr>
                <?php else: ?>
                <?php foreach ($languages as $l): ?>
                <tr class="border-b border-cat-surface0 hover:bg-cat-surface0/50">
                    <td class="p-4 text-cat-text font-mono"><?= htmlspecialchars($l['name']) ?></td>
                    <td class="p-4 hidden sm:table-cell">
                        <span class="text-xs px-2 py-0.5 font-mono bg-cat-surface0 text-cat-lavender"><?= htmlspecialchars($l['proficiency']) ?></span>
                    </td>
                    <td class="p-4">
                        <form method="POST" action="/admin/languages/<?= (int) $l['id'] ?>" class="flex items-center gap-2">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
                            <input type="hidden" name="name" value="<?= htmlspecialchars($l['name']) ?>">
                            <input type="hidden" name="proficiency" value="<?= htmlspecialchars($l['proficiency']) ?>">
                            <input type="hidden" name="sort_order" value="<?= (int) ($l['sort_order'] ?? 0) ?>">
                            <select name="proficiency" class="w-24 px-2 py-1 text-xs">
                                <option value="Native" <?= $l['proficiency'] === 'Native' ? 'selected' : '' ?>><?= \App\Helpers\Language::t('admin.languages.native') ?></option>
                                <option value="Fluent" <?= $l['proficiency'] === 'Fluent' ? 'selected' : '' ?>><?= \App\Helpers\Language::t('admin.languages.fluent') ?></option>
                                <option value="Advanced" <?= $l['proficiency'] === 'Advanced' ? 'selected' : '' ?>><?= \App\Helpers\Language::t('admin.languages.advanced') ?></option>
                                <option value="Upper Intermediate" <?= $l['proficiency'] === 'Upper Intermediate' ? 'selected' : '' ?>><?= \App\Helpers\Language::t('admin.languages.upper_intermediate') ?></option>
                                <option value="Intermediate" <?= $l['proficiency'] === 'Intermediate' ? 'selected' : '' ?>><?= \App\Helpers\Language::t('admin.languages.intermediate') ?></option>
                                <option value="Beginner" <?= $l['proficiency'] === 'Beginner' ? 'selected' : '' ?>><?= \App\Helpers\Language::t('admin.languages.beginner') ?></option>
                            </select>
                            <button type="submit" class="text-xs px-2 py-1 rounded bg-cat-surface0 text-cat-blue hover:bg-cat-surface1 font-mono"><?= \App\Helpers\Language::t('admin.languages.update') ?></button>
                        </form>
                        <form method="POST" action="/admin/languages/<?= (int) $l['id'] ?>" class="inline" onsubmit="return confirm('<?= \App\Helpers\Language::t('admin.languages.delete_confirm') ?>')">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
                            <button type="submit" class="text-xs px-2 py-1 rounded bg-cat-surface0 text-cat-red hover:bg-cat-surface1 font-mono"><?= \App\Helpers\Language::t('admin.languages.delete') ?></button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
