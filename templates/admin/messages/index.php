<div class="term-section">
    <div class="mb-6">
        <p class="term-prompt text-cat-green text-xs font-mono mb-1">./messages --list</p>
        <h1 class="text-lg font-bold text-cat-mauve font-mono">Messages</h1>
    </div>

    <?php if (empty($messages)): ?>
        <div class="term-panel p-6 text-center">
            <p class="text-xs text-cat-subtext0 font-mono">No messages yet.</p>
        </div>
    <?php else: ?>
        <div class="space-y-1">
            <?php foreach ($messages as $m): ?>
            <div class="term-panel p-4 <?= $m['is_read'] ? '' : 'border-cat-lavender' ?>">
                <div class="flex items-start justify-between mb-2">
                    <div>
                        <span class="text-sm font-mono text-cat-text"><?= htmlspecialchars($m['name']) ?></span>
                        <span class="text-xs text-cat-subtext0 font-mono ml-2">&lt;<?= htmlspecialchars($m['email']) ?>&gt;</span>
                    </div>
                    <div class="flex items-center gap-2 shrink-0 ml-4">
                        <span class="text-xs text-cat-overlay2 font-mono"><?= date('Y-m-d H:i', strtotime($m['created_at'])) ?></span>
                        <span class="<?= $m['is_read'] ? 'term-status-active text-cat-green' : 'term-status-inactive text-cat-red' ?> text-xs"></span>
                    </div>
                </div>
                <p class="text-xs text-cat-subtext0 font-mono leading-relaxed">
                    <?= htmlspecialchars($m['message']) ?>
                </p>
                <div class="mt-2">
                    <a href="/admin/messages/<?= (int) $m['id'] ?>" class="text-xs text-cat-blue hover:text-cat-lavender font-mono">[ view ]</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
