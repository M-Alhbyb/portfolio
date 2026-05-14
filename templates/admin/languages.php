<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <p class="text-sm font-mono text-cyan-400 mb-1"><span class="text-gray-500">//</span> languages</p>
        <h1 class="text-2xl font-bold gradient-text">Manage Languages</h1>
    </div>

    <?php if ($error ?? false): ?>
        <div class="mb-4 p-3 rounded-lg bg-red-500/10 border border-red-500/20 text-sm text-red-400"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <?php if ($success ?? false): ?>
        <div class="mb-4 p-3 rounded-lg bg-green-500/10 border border-green-500/20 text-sm text-green-400"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <div class="glass-card rounded-xl p-6 mb-8">
        <h2 class="text-sm font-semibold text-white mb-4">Add New Language</h2>
        <form method="POST" action="/admin/languages" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
            <div>
                <label class="block text-xs text-gray-400 mb-1">Name</label>
                <input type="text" name="name" required maxlength="100"
                       class="w-full px-3 py-2 rounded-lg bg-gray-800/50 border border-gray-700 text-white text-sm focus:border-blue-500">
            </div>
            <div>
                <label class="block text-xs text-gray-400 mb-1">Level</label>
                <select name="proficiency"
                        class="w-full px-3 py-2 rounded-lg bg-gray-800/50 border border-gray-700 text-white text-sm focus:border-blue-500">
                    <option value="Native">Native</option>
                    <option value="Fluent">Fluent</option>
                    <option value="Advanced">Advanced</option>
                    <option value="Intermediate" selected>Intermediate</option>
                    <option value="Beginner">Beginner</option>
                </select>
            </div>
            <div>
                <label class="block text-xs text-gray-400 mb-1">Sort Order</label>
                <input type="number" name="sort_order" value="0"
                       class="w-full px-3 py-2 rounded-lg bg-gray-800/50 border border-gray-700 text-white text-sm focus:border-blue-500">
            </div>
            <div class="flex items-end">
                <button type="submit" class="btn-primary text-sm w-full">Add Language</button>
            </div>
        </form>
    </div>

    <div class="glass-card rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-blue-500/10 text-gray-400 text-left">
                    <th class="p-4 font-medium">Name</th>
                    <th class="p-4 font-medium hidden sm:table-cell">Proficiency</th>
                    <th class="p-4 font-medium">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($languages)): ?>
                <tr><td colspan="3" class="p-8 text-center text-gray-500">No languages yet.</td></tr>
                <?php else: ?>
                <?php foreach ($languages as $l): ?>
                <tr class="border-b border-blue-500/5 hover:bg-blue-500/5">
                    <td class="p-4 text-white"><?= htmlspecialchars($l['name']) ?></td>
                    <td class="p-4 hidden sm:table-cell">
                        <span class="text-xs px-2 py-0.5 rounded-full bg-blue-500/10 text-blue-300"><?= htmlspecialchars($l['proficiency']) ?></span>
                    </td>
                    <td class="p-4">
                        <form method="POST" action="/admin/languages/<?= (int) $l['id'] ?>" class="flex items-center gap-2">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
                            <input type="hidden" name="name" value="<?= htmlspecialchars($l['name']) ?>">
                            <input type="hidden" name="proficiency" value="<?= htmlspecialchars($l['proficiency']) ?>">
                            <input type="hidden" name="sort_order" value="<?= (int) ($l['sort_order'] ?? 0) ?>">
                            <select name="proficiency" class="w-24 px-2 py-1 rounded bg-gray-800/50 border border-gray-700 text-white text-xs focus:border-blue-500">
                                <option value="Native" <?= $l['proficiency'] === 'Native' ? 'selected' : '' ?>>Native</option>
                                <option value="Fluent" <?= $l['proficiency'] === 'Fluent' ? 'selected' : '' ?>>Fluent</option>
                                <option value="Advanced" <?= $l['proficiency'] === 'Advanced' ? 'selected' : '' ?>>Advanced</option>
                                <option value="Intermediate" <?= $l['proficiency'] === 'Intermediate' ? 'selected' : '' ?>>Intermediate</option>
                                <option value="Beginner" <?= $l['proficiency'] === 'Beginner' ? 'selected' : '' ?>>Beginner</option>
                            </select>
                            <button type="submit" class="text-xs px-2 py-1 rounded bg-blue-500/10 text-blue-300 hover:bg-blue-500/20">Update</button>
                        </form>
                        <form method="POST" action="/admin/languages/<?= (int) $l['id'] ?>" class="inline" onsubmit="return confirm('Delete this language?')">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
                            <button type="submit" class="text-xs px-2 py-1 rounded bg-red-500/10 text-red-300 hover:bg-red-500/20">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
