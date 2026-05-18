<div class="py-24 term-section">
    <p class="term-prompt text-cat-green text-sm font-mono mb-2"><?= \App\Helpers\Language::t('contact.cmd') ?></p>
    <h1 class="text-2xl font-bold text-cat-mauve font-mono mb-6"><?= \App\Helpers\Language::t('contact.title') ?></h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <div class="term-panel p-4">
                <form method="POST" action="/contact" class="space-y-4">
                    <?php require __DIR__ . '/../components/csrf-token.php'; ?>
                    <input type="text" name="honeypot" class="hidden" tabindex="-1" autocomplete="off">

                    <?php if (!empty($errors)): ?>
                        <div class="term-panel p-3 border-cat-red">
                            <?php foreach ($errors as $field => $msgs): ?>
                                <?php foreach ((array) $msgs as $msg): ?>
                                    <p class="text-xs text-cat-red font-mono"><?= htmlspecialchars($msg) ?></p>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($success ?? false): ?>
                        <div class="term-panel p-3 border-cat-green">
                            <p class="text-sm text-cat-green font-mono"><?= htmlspecialchars($success) ?></p>
                        </div>
                    <?php endif; ?>

                    <div>
                        <label for="contact-name" class="block text-xs text-cat-peach font-mono mb-1"><?= \App\Helpers\Language::t('contact.name') ?></label>
                        <input id="contact-name" type="text" name="name" required minlength="2" maxlength="100" autocomplete="name" class="w-full px-3 py-2 text-sm">
                    </div>

                    <div>
                        <label for="contact-email" class="block text-xs text-cat-peach font-mono mb-1"><?= \App\Helpers\Language::t('contact.email') ?></label>
                        <input id="contact-email" type="email" name="email" required maxlength="255" autocomplete="email" class="w-full px-3 py-2 text-sm">
                    </div>

                    <div>
                        <label for="contact-message" class="block text-xs text-cat-peach font-mono mb-1"><?= \App\Helpers\Language::t('contact.message') ?></label>
                        <textarea id="contact-message" name="message" required minlength="10" maxlength="5000" rows="5" class="w-full px-3 py-2 text-sm resize-none"></textarea>
                    </div>

                    <button type="submit" class="term-btn term-btn-primary w-full text-sm py-2">
                        $ <?= \App\Helpers\Language::t('contact.send') ?>
                    </button>
                </form>
            </div>
        </div>

        <div class="space-y-4">
            <div class="term-panel p-4">
                <p class="text-cat-peach text-sm font-mono mb-3"><?= \App\Helpers\Language::t('contact.info') ?></p>
                <div class="space-y-3">
                    <a href="mailto:mohammedalhbyb@gmail.com" class="flex items-center gap-2 text-xs text-cat-text font-mono hover:text-cat-lavender">
                        <span class="text-cat-overlay2">✉</span> mohammedalhbyb@gmail.com
                    </a>
                    <a href="https://github.com/M-Alhbyb" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-xs text-cat-text font-mono hover:text-cat-lavender">
                        <span class="text-cat-overlay2">◆</span> github.com/M-Alhbyb
                    </a>
                    <a href="https://linkedin.com/in/m-elhabib" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-xs text-cat-text font-mono hover:text-cat-lavender">
                        <span class="text-cat-overlay2">■</span> linkedin.com/in/m-elhabib
                    </a>
                </div>
            </div>

            <div class="term-panel p-4">
                <p class="text-cat-peach text-sm font-mono mb-2"><?= \App\Helpers\Language::t('contact.availability') ?></p>
                <div class="flex items-center gap-2">
                    <span class="status-dot online"></span>
                    <span class="text-sm text-cat-green font-mono"><?= \App\Helpers\Language::t('contact.available') ?></span>
                </div>
                <p class="text-xs text-cat-subtext0 font-mono mt-2">
                    <?= \App\Helpers\Language::t('contact.response_time') ?>
                </p>
            </div>
        </div>
    </div>
</div>
