<div class="max-w-6xl mx-auto">
    <div class="mb-8">
        <p class="text-sm font-mono text-cyan-400 mb-1"><span class="text-gray-500">//</span> messages</p>
        <h1 class="text-2xl font-bold gradient-text">Message Inbox</h1>
    </div>

    <div class="glass-card rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-blue-500/10 text-gray-400 text-left">
                    <th class="p-4 font-medium">From</th>
                    <th class="p-4 font-medium hidden md:table-cell">Email</th>
                    <th class="p-4 font-medium hidden sm:table-cell">Date</th>
                    <th class="p-4 font-medium">Status</th>
                    <th class="p-4 font-medium">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($messages)): ?>
                <tr><td colspan="5" class="p-8 text-center text-gray-500">No messages yet.</td></tr>
                <?php else: ?>
                <?php foreach ($messages as $m): ?>
                <tr class="border-b border-blue-500/5 hover:bg-blue-500/5 <?= !$m['is_read'] ? 'bg-blue-500/5' : '' ?>">
                    <td class="p-4 text-white font-medium"><?= htmlspecialchars($m['name']) ?></td>
                    <td class="p-4 hidden md:table-cell text-gray-400"><?= htmlspecialchars($m['email']) ?></td>
                    <td class="p-4 hidden sm:table-cell text-gray-400"><?= date('M j, Y', strtotime($m['created_at'])) ?></td>
                    <td class="p-4">
                        <span class="text-xs px-2 py-0.5 rounded-full <?= $m['is_read'] ? 'bg-gray-500/10 text-gray-400' : 'bg-green-500/10 text-green-400' ?>">
                            <?= $m['is_read'] ? 'Read' : 'New' ?>
                        </span>
                    </td>
                    <td class="p-4">
                        <a href="/admin/messages/<?= (int) $m['id'] ?>" class="text-xs px-2 py-1 rounded bg-blue-500/10 text-blue-300 hover:bg-blue-500/20">View</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
