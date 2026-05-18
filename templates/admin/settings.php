<div class="term-section">
    <p class="term-prompt text-cat-green text-xs font-mono mb-1"><?= \App\Helpers\Language::t('admin.settings.cmd') ?></p>
    <h1 class="text-lg font-bold text-cat-mauve font-mono mb-6"><?= \App\Helpers\Language::t('admin.settings.title') ?></h1>

    <?php if ($success ?? false): ?>
        <div class="term-panel p-3 border-cat-green mb-4"><p class="text-xs text-cat-green font-mono"><?= htmlspecialchars($success) ?></p></div>
    <?php endif; ?>
    <?php if ($error ?? false): ?>
        <div class="term-panel p-3 border-cat-red mb-4"><p class="text-xs text-cat-red font-mono"><?= htmlspecialchars($error) ?></p></div>
    <?php endif; ?>

    <form method="POST" action="/admin/settings" class="space-y-4">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">

        <?php foreach ($groups ?? [] as $group): ?>
        <div class="term-panel p-4">
            <h2 class="text-sm font-bold text-cat-peach font-mono uppercase tracking-wider mb-4"># <?= htmlspecialchars(ucfirst($group)) ?></h2>

            <?php $groupSettings = array_filter($settings, fn($s) => $s['group_name'] === $group); ?>

            <?php if (empty($groupSettings)): ?>
                <p class="text-xs text-cat-overlay0 font-mono"><?= \App\Helpers\Language::t('admin.settings.no_settings') ?></p>
            <?php else: ?>
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-cat-overlay2 text-left border-b border-cat-surface1">
                            <th class="pb-2 pr-4 font-mono font-medium"><?= \App\Helpers\Language::t('admin.settings.key') ?></th>
                            <th class="pb-2 pr-4 font-mono font-medium"><?= \App\Helpers\Language::t('admin.settings.value') ?></th>
                            <th class="pb-2 pr-4 font-mono font-medium hidden sm:table-cell"><?= \App\Helpers\Language::t('admin.settings.locale') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($groupSettings as $s): ?>
                        <tr>
                            <td class="py-2 pr-4 text-cat-subtext1 font-mono text-xs"><?= htmlspecialchars($s['key']) ?></td>
                            <td class="py-2 pr-4">
                                <input type="hidden" name="keys[]" value="<?= htmlspecialchars($s['key']) ?>">
                                <input type="hidden" name="groups[]" value="<?= htmlspecialchars($s['group_name']) ?>">
                                <input type="text" name="values[]" value="<?= htmlspecialchars($s['value'] ?? '') ?>" class="w-full px-3 py-1.5 text-sm">
                            </td>
                            <td class="py-2 hidden sm:table-cell">
                                <select name="locales[]" class="px-2 py-1.5 text-sm">
                                    <option value="en" <?= $s['locale'] === 'en' ? 'selected' : '' ?>><?= \App\Helpers\Language::t('admin.settings.en') ?></option>
                                    <option value="ar" <?= $s['locale'] === 'ar' ? 'selected' : '' ?>><?= \App\Helpers\Language::t('admin.settings.ar') ?></option>
                                    <option value="both" <?= $s['locale'] === 'both' ? 'selected' : '' ?>><?= \App\Helpers\Language::t('admin.settings.both') ?></option>
                                </select>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>

        <button type="submit" class="term-btn term-btn-primary text-sm py-2 px-4"><?= \App\Helpers\Language::t('admin.settings.save_all') ?></button>
    </form>
</div>
