<div class="term-section">
    <p class="term-prompt text-cat-green text-xs font-mono mb-1">./volunteering</p>
    <h1 class="text-lg font-bold text-cat-mauve font-mono mb-6">Manage Volunteering</h1>

    <?php if ($error ?? false): ?>
        <div class="term-panel p-3 border-cat-red mb-4"><p class="text-xs text-cat-red font-mono"><?= htmlspecialchars($error) ?></p></div>
    <?php endif; ?>
    <?php if ($success ?? false): ?>
        <div class="term-panel p-3 border-cat-green mb-4"><p class="text-xs text-cat-green font-mono"><?= htmlspecialchars($success) ?></p></div>
    <?php endif; ?>

    <div class="term-panel p-4 mb-6">
        <h2 class="text-sm font-bold text-cat-peach font-mono mb-4">$ add-entry</h2>
        <form method="POST" action="/admin/volunteering" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
            <div>
                <label class="block text-xs text-cat-overlay2 font-mono mb-1">Title</label>
                <input type="text" name="title" required maxlength="200" class="w-full px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs text-cat-overlay2 font-mono mb-1">Organization</label>
                <input type="text" name="organization" required maxlength="200" class="w-full px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs text-cat-overlay2 font-mono mb-1">Place</label>
                <input type="text" name="place" maxlength="100" placeholder="e.g. Qatar" class="w-full px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs text-cat-overlay2 font-mono mb-1">Link</label>
                <input type="url" name="link" maxlength="255" placeholder="https://example.com" class="w-full px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs text-cat-overlay2 font-mono mb-1">Start Date</label>
                <input type="text" name="start_date" maxlength="50" placeholder="e.g. 2022" class="w-full px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs text-cat-overlay2 font-mono mb-1">End Date</label>
                <input type="text" name="end_date" maxlength="50" placeholder="e.g. Present" class="w-full px-3 py-2 text-sm">
            </div>
            <div class="sm:col-span-2">
                <label class="block text-xs text-cat-overlay2 font-mono mb-1">Description</label>
                <textarea name="description" rows="3" maxlength="5000" class="w-full px-3 py-2 text-sm"></textarea>
            </div>
            <div>
                <label class="block text-xs text-cat-overlay2 font-mono mb-1">Sort Order</label>
                <input type="number" name="sort_order" value="0" class="w-full px-3 py-2 text-sm">
            </div>
            <div class="flex items-end">
                <button type="submit" class="term-btn term-btn-primary text-sm w-full">$ add</button>
            </div>
        </form>
    </div>

    <div class="term-panel overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-cat-surface1 text-cat-overlay2 text-left">
                    <th class="p-4 font-mono font-medium">Title</th>
                    <th class="p-4 font-mono font-medium hidden sm:table-cell">Organization</th>
                    <th class="p-4 font-mono font-medium hidden sm:table-cell">Period</th>
                    <th class="p-4 font-mono font-medium">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($entries)): ?>
                <tr><td colspan="4" class="p-8 text-center text-cat-overlay0 font-mono text-xs">No volunteer entries yet.</td></tr>
                <?php else: ?>
                <?php foreach ($entries as $e): ?>
                <tr class="border-b border-cat-surface0 hover:bg-cat-surface0/50">
                    <td class="p-4 text-cat-text font-mono"><?= htmlspecialchars($e['title']) ?></td>
                    <td class="p-4 hidden sm:table-cell text-cat-subtext0 font-mono"><?= htmlspecialchars($e['organization']) ?></td>
                    <td class="p-4 hidden sm:table-cell text-cat-overlay2 font-mono text-xs">
                        <?php if (!empty($e['start_date']) || !empty($e['end_date'])): ?>
                            <?= htmlspecialchars($e['start_date'] ?? '') ?> — <?= htmlspecialchars($e['end_date'] ?? '') ?>
                        <?php endif; ?>
                    </td>
                    <td class="p-4">
                        <button @click="document.getElementById('edit-<?= (int) $e['id'] ?>').classList.toggle('hidden')"
                                class="text-xs px-2 py-1 rounded bg-cat-surface0 text-cat-blue hover:bg-cat-surface1 font-mono">edit</button>
                        <form method="POST" action="/admin/volunteering/<?= (int) $e['id'] ?>" class="inline" onsubmit="return confirm('Delete this entry?')">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
                            <button type="submit" class="text-xs px-2 py-1 rounded bg-cat-surface0 text-cat-red hover:bg-cat-surface1 font-mono">delete</button>
                        </form>

                        <div id="edit-<?= (int) $e['id'] ?>" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-cat-base/80" @click.self="document.getElementById('edit-<?= (int) $e['id'] ?>').classList.add('hidden')">
                            <div class="term-panel p-6 w-full max-w-lg mx-4 max-h-[90vh] overflow-y-auto">
                                <h3 class="text-sm font-bold text-cat-peach font-mono mb-4">$ edit-entry</h3>
                                <form method="POST" action="/admin/volunteering/<?= (int) $e['id'] ?>" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
                                    <div>
                                        <label class="block text-xs text-cat-overlay2 font-mono mb-1">Title</label>
                                        <input type="text" name="title" value="<?= htmlspecialchars($e['title']) ?>" required maxlength="200" class="w-full px-3 py-2 text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-xs text-cat-overlay2 font-mono mb-1">Organization</label>
                                        <input type="text" name="organization" value="<?= htmlspecialchars($e['organization']) ?>" required maxlength="200" class="w-full px-3 py-2 text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-xs text-cat-overlay2 font-mono mb-1">Place</label>
                                        <input type="text" name="place" value="<?= htmlspecialchars($e['place'] ?? '') ?>" maxlength="100" class="w-full px-3 py-2 text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-xs text-cat-overlay2 font-mono mb-1">Link</label>
                                        <input type="url" name="link" value="<?= htmlspecialchars($e['link'] ?? '') ?>" maxlength="255" class="w-full px-3 py-2 text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-xs text-cat-overlay2 font-mono mb-1">Start Date</label>
                                        <input type="text" name="start_date" value="<?= htmlspecialchars($e['start_date'] ?? '') ?>" maxlength="50" class="w-full px-3 py-2 text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-xs text-cat-overlay2 font-mono mb-1">End Date</label>
                                        <input type="text" name="end_date" value="<?= htmlspecialchars($e['end_date'] ?? '') ?>" maxlength="50" class="w-full px-3 py-2 text-sm">
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label class="block text-xs text-cat-overlay2 font-mono mb-1">Description</label>
                                        <textarea name="description" rows="3" maxlength="5000" class="w-full px-3 py-2 text-sm"><?= htmlspecialchars($e['description'] ?? '') ?></textarea>
                                    </div>
                                    <div>
                                        <label class="block text-xs text-cat-overlay2 font-mono mb-1">Sort Order</label>
                                        <input type="number" name="sort_order" value="<?= (int) ($e['sort_order'] ?? 0) ?>" class="w-full px-3 py-2 text-sm">
                                    </div>
                                    <div class="flex items-end gap-2">
                                        <button type="submit" class="term-btn term-btn-primary text-sm flex-1">$ save</button>
                                        <button type="button" @click="document.getElementById('edit-<?= (int) $e['id'] ?>').classList.add('hidden')"
                                                class="term-btn text-sm flex-1">cancel</button>
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
