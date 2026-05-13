<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <p class="text-sm font-mono text-cyan-400 mb-1"><span class="text-gray-500">//</span> timeline</p>
        <h1 class="text-2xl font-bold gradient-text">Manage Timeline</h1>
    </div>

    <?php if ($error ?? false): ?>
        <div class="mb-4 p-3 rounded-lg bg-red-500/10 border border-red-500/20 text-sm text-red-400"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <?php if ($success ?? false): ?>
        <div class="mb-4 p-3 rounded-lg bg-green-500/10 border border-green-500/20 text-sm text-green-400"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <div class="glass-card rounded-xl p-6 mb-8">
        <h2 class="text-sm font-semibold text-white mb-4">Add New Entry</h2>
        <form method="POST" action="/admin/timeline" enctype="multipart/form-data" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
            <div>
                <label class="block text-xs text-gray-400 mb-1">Type</label>
                <select name="type" class="w-full px-3 py-2 rounded-lg bg-gray-800/50 border border-gray-700 text-white text-sm focus:border-blue-500">
                    <option value="experience">Experience</option>
                    <option value="education">Education</option>
                </select>
            </div>
            <div>
                <label class="block text-xs text-gray-400 mb-1">Period</label>
                <input type="text" name="period" required maxlength="100" placeholder="e.g. 2024 - Present"
                       class="w-full px-3 py-2 rounded-lg bg-gray-800/50 border border-gray-700 text-white text-sm focus:border-blue-500">
            </div>
            <div>
                <label class="block text-xs text-gray-400 mb-1">Title</label>
                <input type="text" name="title" required maxlength="200"
                       class="w-full px-3 py-2 rounded-lg bg-gray-800/50 border border-gray-700 text-white text-sm focus:border-blue-500">
            </div>
            <div>
                <label class="block text-xs text-gray-400 mb-1">Organization</label>
                <input type="text" name="organization" required maxlength="200"
                       class="w-full px-3 py-2 rounded-lg bg-gray-800/50 border border-gray-700 text-white text-sm focus:border-blue-500">
            </div>
            <div>
                <label class="block text-xs text-gray-400 mb-1">Link</label>
                <input type="url" name="link" maxlength="255" placeholder="https://example.com"
                       class="w-full px-3 py-2 rounded-lg bg-gray-800/50 border border-gray-700 text-white text-sm focus:border-blue-500">
            </div>
            <div>
                <label class="block text-xs text-gray-400 mb-1">Logo</label>
                <input type="file" name="logo" accept=".jpg,.jpeg,.png,.webp"
                       class="w-full text-sm text-gray-400 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:bg-blue-500/10 file:text-blue-300 hover:file:bg-blue-500/20">
            </div>
            <div class="sm:col-span-2">
                <label class="block text-xs text-gray-400 mb-1">Description</label>
                <textarea name="description" rows="3" maxlength="5000"
                          class="w-full px-3 py-2 rounded-lg bg-gray-800/50 border border-gray-700 text-white text-sm focus:border-blue-500"></textarea>
            </div>
            <div>
                <label class="block text-xs text-gray-400 mb-1">Sort Order</label>
                <input type="number" name="sort_order" value="0"
                       class="w-full px-3 py-2 rounded-lg bg-gray-800/50 border border-gray-700 text-white text-sm focus:border-blue-500">
            </div>
            <div class="flex items-end">
                <button type="submit" class="btn-primary text-sm w-full">Add Entry</button>
            </div>
        </form>
    </div>

    <div class="glass-card rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-blue-500/10 text-gray-400 text-left">
                    <th class="p-4 font-medium">Type</th>
                    <th class="p-4 font-medium">Period</th>
                    <th class="p-4 font-medium hidden sm:table-cell">Title</th>
                    <th class="p-4 font-medium hidden sm:table-cell">Organization</th>
                    <th class="p-4 font-medium">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($entries)): ?>
                <tr><td colspan="5" class="p-8 text-center text-gray-500">No timeline entries yet.</td></tr>
                <?php else: ?>
                <?php foreach ($entries as $e): ?>
                <tr class="border-b border-blue-500/5 hover:bg-blue-500/5">
                    <td class="p-4">
                        <span class="text-xs px-2 py-0.5 rounded <?= $e['type'] === 'experience' ? 'bg-blue-500/10 text-blue-300' : 'bg-green-500/10 text-green-300' ?>">
                            <?= htmlspecialchars(ucfirst($e['type'])) ?>
                        </span>
                    </td>
                    <td class="p-4 text-white"><?= htmlspecialchars($e['period']) ?></td>
                    <td class="p-4 hidden sm:table-cell text-white"><?= htmlspecialchars($e['title']) ?></td>
                    <td class="p-4 hidden sm:table-cell text-gray-400"><?= htmlspecialchars($e['organization']) ?></td>
                    <td class="p-4">
                        <button @click="document.getElementById('edit-<?= (int) $e['id'] ?>').classList.toggle('hidden')"
                                class="text-xs px-2 py-1 rounded bg-blue-500/10 text-blue-300 hover:bg-blue-500/20">Edit</button>
                        <form method="POST" action="/admin/timeline/<?= (int) $e['id'] ?>" class="inline" onsubmit="return confirm('Delete this entry?')">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
                            <button type="submit" class="text-xs px-2 py-1 rounded bg-red-500/10 text-red-300 hover:bg-red-500/20">Delete</button>
                        </form>

                        <div id="edit-<?= (int) $e['id'] ?>" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60" @click.self="document.getElementById('edit-<?= (int) $e['id'] ?>').classList.add('hidden')">
                            <div class="glass rounded-xl p-6 w-full max-w-lg mx-4 max-h-[90vh] overflow-y-auto">
                                <h3 class="text-sm font-semibold text-white mb-4">Edit Entry</h3>
                                <form method="POST" action="/admin/timeline/<?= (int) $e['id'] ?>" enctype="multipart/form-data" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
                                    <div class="sm:col-span-2">
                                        <label class="block text-xs text-gray-400 mb-1">Type</label>
                                        <select name="type" class="w-full px-3 py-2 rounded-lg bg-gray-800/50 border border-gray-700 text-white text-sm focus:border-blue-500">
                                            <option value="experience" <?= $e['type'] === 'experience' ? 'selected' : '' ?>>Experience</option>
                                            <option value="education" <?= $e['type'] === 'education' ? 'selected' : '' ?>>Education</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-xs text-gray-400 mb-1">Period</label>
                                        <input type="text" name="period" value="<?= htmlspecialchars($e['period']) ?>" required maxlength="100"
                                               class="w-full px-3 py-2 rounded-lg bg-gray-800/50 border border-gray-700 text-white text-sm focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-xs text-gray-400 mb-1">Title</label>
                                        <input type="text" name="title" value="<?= htmlspecialchars($e['title']) ?>" required maxlength="200"
                                               class="w-full px-3 py-2 rounded-lg bg-gray-800/50 border border-gray-700 text-white text-sm focus:border-blue-500">
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label class="block text-xs text-gray-400 mb-1">Organization</label>
                                        <input type="text" name="organization" value="<?= htmlspecialchars($e['organization']) ?>" required maxlength="200"
                                               class="w-full px-3 py-2 rounded-lg bg-gray-800/50 border border-gray-700 text-white text-sm focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-xs text-gray-400 mb-1">Link</label>
                                        <input type="url" name="link" value="<?= htmlspecialchars($e['link'] ?? '') ?>" maxlength="255" placeholder="https://example.com"
                                               class="w-full px-3 py-2 rounded-lg bg-gray-800/50 border border-gray-700 text-white text-sm focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-xs text-gray-400 mb-1">Logo</label>
                                        <input type="file" name="logo" accept=".jpg,.jpeg,.png,.webp"
                                               class="w-full text-sm text-gray-400 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:bg-blue-500/10 file:text-blue-300 hover:file:bg-blue-500/20">
                                        <?php if (!empty($e['logo'])): ?>
                                            <div class="mt-2">
                                                <img src="/<?= htmlspecialchars($e['logo']) ?>" alt="Current logo" class="h-10 w-auto rounded">
                                                <label class="text-xs text-gray-500 mt-1 flex items-center gap-1">
                                                    <input type="checkbox" name="remove_logo" value="1" class="rounded bg-gray-800 border-gray-600">
                                                    Remove logo
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label class="block text-xs text-gray-400 mb-1">Description</label>
                                        <textarea name="description" rows="3" maxlength="5000"
                                                  class="w-full px-3 py-2 rounded-lg bg-gray-800/50 border border-gray-700 text-white text-sm focus:border-blue-500"><?= htmlspecialchars($e['description'] ?? '') ?></textarea>
                                    </div>
                                    <div>
                                        <label class="block text-xs text-gray-400 mb-1">Sort Order</label>
                                        <input type="number" name="sort_order" value="<?= (int) ($e['sort_order'] ?? 0) ?>"
                                               class="w-full px-3 py-2 rounded-lg bg-gray-800/50 border border-gray-700 text-white text-sm focus:border-blue-500">
                                    </div>
                                    <div class="flex items-end gap-2">
                                        <button type="submit" class="btn-primary text-sm flex-1">Save</button>
                                        <button type="button" @click="document.getElementById('edit-<?= (int) $e['id'] ?>').classList.add('hidden')"
                                                class="px-3 py-2 rounded-lg text-sm text-gray-400 hover:text-white border border-gray-700 hover:border-gray-600 transition-colors">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
