<div class="max-w-6xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <div>
            <p class="text-sm font-mono text-cyan-400 mb-1"><span class="text-gray-500">//</span> posts</p>
            <h1 class="text-2xl font-bold gradient-text">Manage Posts</h1>
        </div>
        <a href="/admin/posts/create" class="btn-primary text-sm">+ New Post</a>
    </div>

    <div class="glass-card rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-blue-500/10 text-gray-400 text-left">
                    <th class="p-4 font-medium">Title</th>
                    <th class="p-4 font-medium hidden md:table-cell">Status</th>
                    <th class="p-4 font-medium hidden sm:table-cell">Locale</th>
                    <th class="p-4 font-medium">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($posts)): ?>
                <tr><td colspan="4" class="p-8 text-center text-gray-500">No posts yet.</td></tr>
                <?php else: ?>
                <?php foreach ($posts as $p): ?>
                <tr class="border-b border-blue-500/5 hover:bg-blue-500/5">
                    <td class="p-4 text-white"><?= htmlspecialchars($p['title']) ?></td>
                    <td class="p-4 hidden md:table-cell">
                        <span class="text-xs px-2 py-0.5 rounded-full <?= $p['status'] === 'published' ? 'bg-green-500/10 text-green-400' : 'bg-yellow-500/10 text-yellow-400' ?>"><?= $p['status'] ?></span>
                    </td>
                    <td class="p-4 hidden sm:table-cell text-gray-400"><?= htmlspecialchars($p['locale']) ?></td>
                    <td class="p-4">
                        <div class="flex items-center gap-2">
                            <a href="/admin/posts/<?= (int) $p['id'] ?>/edit" class="text-xs px-2 py-1 rounded bg-blue-500/10 text-blue-300 hover:bg-blue-500/20">Edit</a>
                            <form method="POST" action="/admin/posts/<?= (int) $p['id'] ?>" onsubmit="return confirm('Delete this post?')">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
                                <button type="submit" class="text-xs px-2 py-1 rounded bg-red-500/10 text-red-300 hover:bg-red-500/20">Delete</button>
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
