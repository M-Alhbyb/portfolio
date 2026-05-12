<div class="max-w-3xl mx-auto">
    <div class="mb-8">
        <p class="text-sm font-mono text-cyan-400 mb-1">
            <span class="text-gray-500">//</span>
            <a href="/admin/messages" class="hover:text-blue-400 transition-colors">messages</a>
            <span class="text-gray-500">/ detail</span>
        </p>
        <h1 class="text-2xl font-bold gradient-text">Message from <?= htmlspecialchars($message['name']) ?></h1>
    </div>

    <div class="glass-card rounded-xl p-6 space-y-4">
        <div class="grid grid-cols-2 gap-4 pb-4 border-b border-blue-500/10">
            <div>
                <span class="text-xs text-gray-500 block">Name</span>
                <span class="text-sm text-white"><?= htmlspecialchars($message['name']) ?></span>
            </div>
            <div>
                <span class="text-xs text-gray-500 block">Email</span>
                <a href="mailto:<?= htmlspecialchars($message['email']) ?>" class="text-sm text-blue-400 hover:text-blue-300"><?= htmlspecialchars($message['email']) ?></a>
            </div>
            <div>
                <span class="text-xs text-gray-500 block">Date</span>
                <span class="text-sm text-gray-300"><?= date('F j, Y g:i A', strtotime($message['created_at'])) ?></span>
            </div>
            <div>
                <span class="text-xs text-gray-500 block">Status</span>
                <span class="text-sm <?= $message['is_read'] ? 'text-gray-400' : 'text-green-400' ?>">
                    <?= $message['is_read'] ? 'Read' : 'Unread' ?>
                </span>
            </div>
        </div>

        <div>
            <span class="text-xs text-gray-500 block mb-2">Message</span>
            <div class="text-sm text-gray-300 leading-relaxed whitespace-pre-wrap"><?= htmlspecialchars($message['message']) ?></div>
        </div>

        <div class="flex items-center gap-3 pt-4 border-t border-blue-500/10">
            <?php if (!$message['is_read']): ?>
                <form method="POST" action="/admin/messages/<?= (int) $message['id'] ?>/read">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
                    <button type="submit" class="btn-primary text-sm">Mark as Read</button>
                </form>
            <?php endif; ?>
            <form method="POST" action="/admin/messages/<?= (int) $message['id'] ?>" onsubmit="return confirm('Delete this message?')">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
                <button type="submit" class="btn-red text-sm">Delete</button>
            </form>
        </div>
    </div>
</div>
