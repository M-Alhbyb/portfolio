<div class="term-section">
    <p class="term-prompt text-cat-green text-xs font-mono mb-1">
        <a href="/admin/messages" class="text-cat-blue hover:text-cat-lavender"><?= \App\Helpers\Language::t('admin.sidebar.messages') ?></a>
        <span class="text-cat-overlay2">/</span>
        <span class="text-cat-text"><?= \App\Helpers\Language::t('admin.messages.detail_breadcrumb') ?></span>
    </p>
    <h1 class="text-lg font-bold text-cat-mauve font-mono mb-6"><?= \App\Helpers\Language::t('admin.messages.from', ['name' => htmlspecialchars($message['name'])]) ?></h1>

    <div class="term-panel p-4 space-y-4">
        <div class="grid grid-cols-2 gap-4 pb-4 border-b border-cat-surface1">
            <div>
                <span class="text-xs text-cat-overlay2 font-mono block"><?= \App\Helpers\Language::t('admin.messages.name') ?></span>
                <span class="text-sm text-cat-text font-mono"><?= htmlspecialchars($message['name']) ?></span>
            </div>
            <div>
                <span class="text-xs text-cat-overlay2 font-mono block"><?= \App\Helpers\Language::t('admin.messages.email') ?></span>
                <a href="mailto:<?= htmlspecialchars($message['email']) ?>" class="text-sm text-cat-blue hover:text-cat-lavender font-mono"><?= htmlspecialchars($message['email']) ?></a>
            </div>
            <div>
                <span class="text-xs text-cat-overlay2 font-mono block"><?= \App\Helpers\Language::t('admin.messages.date') ?></span>
                <span class="text-sm text-cat-subtext0 font-mono"><?= date('Y-m-d H:i', strtotime($message['created_at'])) ?></span>
            </div>
            <div>
                <span class="text-xs text-cat-overlay2 font-mono block"><?= \App\Helpers\Language::t('admin.messages.status') ?></span>
                <span class="text-sm font-mono <?= $message['is_read'] ? 'text-cat-subtext0' : 'term-status-active text-cat-green' ?>">
                    <?= $message['is_read'] ? \App\Helpers\Language::t('admin.messages.read') : \App\Helpers\Language::t('admin.messages.unread') ?>
                </span>
            </div>
        </div>

        <div>
            <span class="text-xs text-cat-overlay2 font-mono block mb-2"><?= \App\Helpers\Language::t('admin.messages.message') ?></span>
            <div class="text-sm text-cat-text font-mono leading-relaxed whitespace-pre-wrap"><?= htmlspecialchars($message['message']) ?></div>
        </div>

        <div class="flex items-center gap-3 pt-4 border-t border-cat-surface1">
            <?php if (!$message['is_read']): ?>
                <form method="POST" action="/admin/messages/<?= (int) $message['id'] ?>/read">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
                    <button type="submit" class="term-btn term-btn-primary text-xs py-2 px-3"><?= \App\Helpers\Language::t('admin.messages.mark_read') ?></button>
                </form>
            <?php endif; ?>
            <form method="POST" action="/admin/messages/<?= (int) $message['id'] ?>" onsubmit="return confirm('<?= \App\Helpers\Language::t('admin.messages.delete_confirm') ?>')">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
                <button type="submit" class="term-btn term-btn-danger text-xs py-2 px-3"><?= \App\Helpers\Language::t('admin.messages.delete') ?></button>
            </form>
        </div>
    </div>
</div>
