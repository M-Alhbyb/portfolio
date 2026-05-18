<div class="term-section">
    <div class="flex items-center justify-between mb-6">
        <div>
            <p class="term-prompt text-cat-green text-xs font-mono mb-1">./projects --manage</p>
            <h1 class="text-lg font-bold text-cat-mauve font-mono">Manage Projects</h1>
        </div>
        <a href="/admin/projects/create" class="term-btn term-btn-primary text-xs">+ New Project</a>
    </div>

    <div class="term-panel overflow-x-auto">
        <table class="w-full text-xs font-mono">
            <thead>
                <tr class="border-b border-cat-surface1 text-cat-overlay2 text-left">
                    <th class="p-3 font-medium">Title</th>
                    <th class="p-3 font-medium hidden md:table-cell">Status</th>
                    <th class="p-3 font-medium hidden sm:table-cell">Featured</th>
                    <th class="p-3 font-medium hidden lg:table-cell">Sort</th>
                    <th class="p-3 font-medium">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($projects)): ?>
                <tr><td colspan="5" class="p-6 text-center text-cat-subtext0">No projects yet.</td></tr>
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
                            <a href="/admin/projects/<?= (int) $p['id'] ?>/edit" class="text-xs px-2 py-1 bg-cat-surface0 text-cat-blue hover:text-cat-lavender border border-cat-surface1">Edit</a>
                            <form method="POST" action="/admin/projects/<?= (int) $p['id'] ?>" onsubmit="return confirm('Delete this project?')">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
                                <button type="submit" class="text-xs px-2 py-1 bg-cat-surface0 text-cat-red hover:text-cat-maroon border border-cat-surface1">Delete</button>
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
