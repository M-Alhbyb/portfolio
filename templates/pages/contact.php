<div class="relative py-24 mt-16">
    <div class="absolute inset-0 grid-pattern opacity-20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <p class="text-sm font-mono text-cyan-400 mb-2">
                <span class="text-gray-500">//</span> <?= \App\Helpers\Language::t('contact.subtitle') ?>
            </p>
            <h1 class="text-3xl sm:text-4xl font-bold gradient-text">
                <?= \App\Helpers\Language::t('contact.title') ?>
            </h1>
        </div>

        <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <div class="glass-card rounded-xl p-6">
                    <form method="POST" action="/contact" class="space-y-4">
                        <?php require __DIR__ . '/../components/csrf-token.php'; ?>
                        <input type="text" name="honeypot" class="hidden" tabindex="-1" autocomplete="off">

                        <?php if (!empty($errors)): ?>
                            <div class="p-3 rounded-lg bg-red-500/10 border border-red-500/20">
                                <?php foreach ($errors as $field => $msgs): ?>
                                    <?php foreach ((array) $msgs as $msg): ?>
                                        <p class="text-xs text-red-400"><?= htmlspecialchars($msg) ?></p>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($success ?? false): ?>
                            <div class="p-3 rounded-lg bg-green-500/10 border border-green-500/20">
                                <p class="text-sm text-green-400"><?= htmlspecialchars($success) ?></p>
                            </div>
                        <?php endif; ?>

                        <div>
                            <label class="block text-sm text-gray-300 mb-1"><?= \App\Helpers\Language::t('contact.name') ?></label>
                            <input type="text" name="name" required minlength="2" maxlength="100"
                                   class="w-full px-4 py-2 rounded-lg bg-gray-800/50 border border-gray-700 text-white focus:border-blue-500 transition-colors">
                        </div>

                        <div>
                            <label class="block text-sm text-gray-300 mb-1"><?= \App\Helpers\Language::t('contact.email') ?></label>
                            <input type="email" name="email" required maxlength="255"
                                   class="w-full px-4 py-2 rounded-lg bg-gray-800/50 border border-gray-700 text-white focus:border-blue-500 transition-colors">
                        </div>

                        <div>
                            <label class="block text-sm text-gray-300 mb-1"><?= \App\Helpers\Language::t('contact.message') ?></label>
                            <textarea name="message" required minlength="10" maxlength="5000" rows="5"
                                      class="w-full px-4 py-2 rounded-lg bg-gray-800/50 border border-gray-700 text-white focus:border-blue-500 transition-colors resize-none"></textarea>
                        </div>

                        <button type="submit" class="btn-primary w-full">
                            <?= \App\Helpers\Language::t('contact.send') ?>
                        </button>
                    </form>
                </div>
            </div>

            <div class="space-y-6">
                <div class="glass-card rounded-xl p-6">
                    <h3 class="text-sm font-semibold text-white mb-4"><?= \App\Helpers\Language::t('contact.info') ?></h3>
                    <div class="space-y-4">
                        <a href="mailto:contact@elhabib.dev" class="flex items-center gap-3 text-sm text-gray-300 hover:text-blue-400 transition-colors">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            contact@elhabib.dev
                        </a>
                        <a href="https://github.com/mohamedelhabib" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 text-sm text-gray-300 hover:text-blue-400 transition-colors">
                            <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                            GitHub
                        </a>
                        <a href="https://linkedin.com/in/mohamedelhabib" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 text-sm text-gray-300 hover:text-blue-400 transition-colors">
                            <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            LinkedIn
                        </a>
                    </div>
                </div>

                <div class="glass-card rounded-xl p-6">
                    <h3 class="text-sm font-semibold text-white mb-2"><?= \App\Helpers\Language::t('contact.availability') ?></h3>
                    <div class="flex items-center gap-2 mt-2">
                        <span class="status-dot online"></span>
                        <span class="text-sm text-gray-300"><?= \App\Helpers\Language::t('contact.available') ?></span>
                    </div>
                    <p class="text-xs text-gray-500 mt-2">
                        <?= \App\Helpers\Language::t('contact.response_time') ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
