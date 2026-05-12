<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <p class="text-sm font-mono text-cyan-400 mb-1"><span class="text-gray-500">//</span> settings</p>
        <h1 class="text-2xl font-bold gradient-text">Site Settings</h1>
    </div>

    <?php if ($success ?? false): ?>
        <div class="mb-4 p-3 rounded-lg bg-green-500/10 border border-green-500/20 text-sm text-green-400"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>
    <?php if ($error ?? false): ?>
        <div class="mb-4 p-3 rounded-lg bg-red-500/10 border border-red-500/20 text-sm text-red-400"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="/admin/settings" class="space-y-6">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">

        <?php foreach ($groups ?? [] as $group): ?>
        <div class="glass-card rounded-xl p-6">
            <h2 class="text-sm font-semibold gradient-text uppercase tracking-wider mb-4"><?= htmlspecialchars(ucfirst($group)) ?></h2>

            <?php $groupSettings = array_filter($settings, fn($s) => $s['group_name'] === $group); ?>

            <?php if (empty($groupSettings)): ?>
                <p class="text-sm text-gray-500">No settings in this group.</p>
            <?php else: ?>
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-gray-400 text-left border-b border-blue-500/10">
                            <th class="pb-2 pr-4">Key</th>
                            <th class="pb-2 pr-4">Value</th>
                            <th class="pb-2 pr-4 hidden sm:table-cell">Locale</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($groupSettings as $s): ?>
                        <tr>
                            <td class="py-2 pr-4 text-gray-300"><?= htmlspecialchars($s['key']) ?></td>
                            <td class="py-2 pr-4">
                                <input type="hidden" name="keys[]" value="<?= htmlspecialchars($s['key']) ?>">
                                <input type="hidden" name="groups[]" value="<?= htmlspecialchars($s['group_name']) ?>">
                                <input type="text" name="values[]" value="<?= htmlspecialchars($s['value'] ?? '') ?>"
                                       class="w-full px-3 py-1.5 rounded bg-gray-800/50 border border-gray-700 text-white text-sm focus:border-blue-500">
                            </td>
                            <td class="py-2 hidden sm:table-cell">
                                <select name="locales[]" class="px-2 py-1.5 rounded bg-gray-800/50 border border-gray-700 text-white text-sm focus:border-blue-500">
                                    <option value="en" <?= $s['locale'] === 'en' ? 'selected' : '' ?>>EN</option>
                                    <option value="ar" <?= $s['locale'] === 'ar' ? 'selected' : '' ?>>AR</option>
                                    <option value="both" <?= $s['locale'] === 'both' ? 'selected' : '' ?>>Both</option>
                                </select>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>

        <button type="submit" class="btn-primary">Save All Settings</button>
    </form>
</div>
