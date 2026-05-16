<?php require __DIR__ . '/../components/hero.php'; ?>

<!-- Featured Projects -->
<section id="projects" class="relative py-24">
    <div class="absolute inset-0 grid-pattern opacity-20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <p class="text-sm font-mono text-cyan-400 mb-2">
                <span class="text-gray-500">//</span> <?= \App\Helpers\Language::t('projects.subtitle') ?>
            </p>
            <h2 class="text-3xl sm:text-4xl font-bold gradient-text">
                <?= \App\Helpers\Language::t('projects.title') ?>
            </h2>
            <p class="text-gray-400 mt-4 max-w-xl mx-auto">
                <?= \App\Helpers\Language::t('projects.description') ?>
            </p>
        </div>

        <?php if (!empty($featuredProjects)): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($featuredProjects as $project): ?>
                    <?php require __DIR__ . '/../components/project-card.php'; ?>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-12">
                <p class="text-gray-500"><?= \App\Helpers\Language::t('projects.empty') ?></p>
            </div>
        <?php endif; ?>

        <div class="text-center mt-10">
            <a href="/projects" class="inline-flex items-center gap-2 text-blue-400 hover:text-blue-300 transition-colors">
                <?= \App\Helpers\Language::t('projects.view_all') ?>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Infrastructure Section -->
<section id="infrastructure" class="relative py-24 bg-gray-900/30">
    <div class="absolute inset-0 hex-bg"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <p class="text-sm font-mono text-cyan-400 mb-2">
                <span class="text-gray-500">//</span> <?= \App\Helpers\Language::t('infra.subtitle') ?>
            </p>
            <h2 class="text-3xl sm:text-4xl font-bold gradient-text">
                <?= \App\Helpers\Language::t('infra.title') ?>
            </h2>
        </div>

        <div class="scan-line rounded-xl p-8 glass mb-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="glass-card rounded-lg p-5 text-center">
                    <div class="w-12 h-12 mx-auto mb-3 rounded-lg bg-blue-500/10 flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-white mb-2"><?= \App\Helpers\Language::t('infra.cloud') ?></h3>
                    <p class="text-xs text-gray-400">React, Vue, TailwindCSS, Alpine.js</p>
                </div>
                <div class="glass-card rounded-lg p-5 text-center">
                    <div class="w-12 h-12 mx-auto mb-3 rounded-lg bg-green-500/10 flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-white mb-2"><?= \App\Helpers\Language::t('infra.containers') ?></h3>
                    <p class="text-xs text-gray-400">PHP, Node.js, APIs, Databases</p>
                </div>
                <div class="glass-card rounded-lg p-5 text-center">
                    <div class="w-12 h-12 mx-auto mb-3 rounded-lg bg-purple-500/10 flex items-center justify-center">
                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-white mb-2"><?= \App\Helpers\Language::t('infra.ci_cd') ?></h3>
                    <p class="text-xs text-gray-400">LLMs, NLP, RAG, Fine-tuning</p>
                </div>
            </div>
        </div>

        <?php if (!empty($groupedSkills)): ?>
            <div x-data="skillBar" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($groupedSkills as $category => $categorySkills): ?>
                    <div class="glass-card rounded-xl p-5">
                        <h3 class="text-sm font-semibold text-cyan-400 mb-4 uppercase tracking-wider"><?= htmlspecialchars($category) ?></h3>
                        <div class="space-y-3">
                            <?php foreach ($categorySkills as $skill): ?>
                                <div>
                                    <div class="flex justify-between text-xs mb-1">
                                        <span class="text-gray-300"><?= htmlspecialchars($skill['name']) ?></span>
                                        <span class="text-gray-500"><?= (int) $skill['proficiency'] ?>%</span>
                                    </div>
                                    <div class="w-full h-1.5 bg-gray-800 rounded-full overflow-hidden">
                                        <div class="skill-bar-fill h-full rounded-full bg-gradient-to-r from-blue-500 to-cyan-400 transition-all duration-1000 ease-out"
                                             data-width="<?= (int) $skill['proficiency'] ?>%"
                                             style="width: 0%">
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php if (!empty($languages)): ?>
<section class="relative py-24 bg-gray-900/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <p class="text-sm font-mono text-cyan-400 mb-2">
                <span class="text-gray-500">//</span> languages
            </p>
            <h2 class="text-3xl sm:text-4xl font-bold gradient-text"><?= \App\Helpers\Language::t('about.languages') ?></h2>
        </div>
        <div class="max-w-2xl mx-auto">
            <div class="glass-card rounded-xl p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <?php foreach ($languages as $l): ?>
                    <div class="flex items-center justify-between py-2 px-3 bg-gray-800/30 rounded-lg">
                        <span class="text-sm text-white"><?= htmlspecialchars($l['name']) ?></span>
                        <span class="text-xs px-2 py-0.5 rounded-full bg-green-500/10 text-green-300 font-medium"><?= htmlspecialchars($l['proficiency']) ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Experience Section -->
<section id="experience" class="relative py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <p class="text-sm font-mono text-cyan-400 mb-2">
                <span class="text-gray-500">//</span> <?= \App\Helpers\Language::t('timeline.subtitle') ?>
            </p>
            <h2 class="text-3xl sm:text-4xl font-bold gradient-text">
                <?= \App\Helpers\Language::t('timeline.experience') ?>
            </h2>
        </div>

        <div class="max-w-2xl mx-auto">
            <?php if (!empty($experience)): ?>
                <?php foreach ($experience as $item): ?>
                    <?php require __DIR__ . '/../components/timeline-item.php'; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center text-gray-500"><?= \App\Helpers\Language::t('timeline.empty') ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Education Section -->
<section class="relative py-24 bg-gray-900/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <p class="text-sm font-mono text-cyan-400 mb-2">
                <span class="text-gray-500">//</span> <?= \App\Helpers\Language::t('timeline.education_subtitle') ?>
            </p>
            <h2 class="text-3xl sm:text-4xl font-bold gradient-text">
                <?= \App\Helpers\Language::t('timeline.education') ?>
            </h2>
        </div>

        <div class="max-w-2xl mx-auto">
            <?php if (!empty($education)): ?>
                <?php foreach ($education as $item): ?>
                    <?php require __DIR__ . '/../components/timeline-item.php'; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center text-gray-500"><?= \App\Helpers\Language::t('timeline.empty') ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if (!empty($volunteering)): ?>
<section class="relative py-24 bg-gray-900/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <p class="text-sm font-mono text-cyan-400 mb-2">
                <span class="text-gray-500">//</span> <?= \App\Helpers\Language::t('volunteering.subtitle') ?>
            </p>
            <h2 class="text-3xl sm:text-4xl font-bold gradient-text"><?= \App\Helpers\Language::t('volunteering.title') ?></h2>
        </div>
        <div class="max-w-3xl mx-auto space-y-4">
            <?php foreach ($volunteering as $v): ?>
            <div class="glass-card rounded-lg p-5">
                <div class="flex items-start justify-between mb-1">
                    <div>
                        <h3 class="text-base font-semibold text-white">
                            <?php if (!empty($v['link'])): ?>
                                <a href="<?= htmlspecialchars($v['link']) ?>" target="_blank" rel="noopener noreferrer" class="hover:text-cyan-400 transition-colors">
                                    <?= htmlspecialchars($v['title']) ?>
                                </a>
                            <?php else: ?>
                                <?= htmlspecialchars($v['title']) ?>
                            <?php endif; ?>
                        </h3>
                        <p class="text-sm text-gray-400"><?= htmlspecialchars($v['organization']) ?>
                            <?php if (!empty($v['place'])): ?>
                                <span class="text-gray-500"> &middot; <?= htmlspecialchars($v['place']) ?></span>
                            <?php endif; ?>
                        </p>
                    </div>
                    <?php if (!empty($v['start_date']) || !empty($v['end_date'])): ?>
                        <span class="text-xs text-gray-500 whitespace-nowrap ml-4">
                            <?= htmlspecialchars($v['start_date'] ?? '') ?> — <?= htmlspecialchars($v['end_date'] ?? '') ?>
                        </span>
                    <?php endif; ?>
                </div>
                <?php if (!empty($v['description'])): ?>
                    <p class="text-sm text-gray-500 mt-2"><?= htmlspecialchars($v['description']) ?></p>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Blog Preview -->
<section id="blog" class="relative py-24 bg-gray-900/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <p class="text-sm font-mono text-cyan-400 mb-2">
                <span class="text-gray-500">//</span> <?= \App\Helpers\Language::t('blog.subtitle') ?>
            </p>
            <h2 class="text-3xl sm:text-4xl font-bold gradient-text">
                <?= \App\Helpers\Language::t('blog.title') ?>
            </h2>
        </div>

        <?php if (!empty($recentPosts)): ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php foreach ($recentPosts as $post): ?>
                    <?php require __DIR__ . '/../components/blog-card.php'; ?>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-12">
                <p class="text-gray-500"><?= \App\Helpers\Language::t('blog.empty') ?></p>
            </div>
        <?php endif; ?>

        <div class="text-center mt-10">
            <a href="/blog" class="inline-flex items-center gap-2 text-blue-400 hover:text-blue-300 transition-colors">
                <?= \App\Helpers\Language::t('blog.view_all') ?>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="relative py-24">
    <div class="absolute inset-0 grid-pattern opacity-20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <p class="text-sm font-mono text-cyan-400 mb-2">
                <span class="text-gray-500">//</span> <?= \App\Helpers\Language::t('contact.subtitle') ?>
            </p>
            <h2 class="text-3xl sm:text-4xl font-bold gradient-text">
                <?= \App\Helpers\Language::t('contact.title') ?>
            </h2>
        </div>

        <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <div x-data="contactForm" class="glass-card rounded-xl p-6">
                    <form action="/contact" method="POST" @submit.prevent="submit" class="space-y-4">
                        <?php require __DIR__ . '/../components/csrf-token.php'; ?>
                        <input type="text" name="honeypot" x-model="honeypot" class="hidden" tabindex="-1" autocomplete="off">

                        <div>
                            <label class="block text-sm text-gray-300 mb-1"><?= \App\Helpers\Language::t('contact.name') ?></label>
                            <input type="text" name="name" required minlength="2" maxlength="100"
                                   class="w-full px-4 py-2 rounded-lg bg-gray-800/50 border border-gray-700 text-white focus:border-blue-500 transition-colors">
                            <template x-if="errors.name">
                                <p class="text-xs text-red-400 mt-1" x-text="errors.name[0]"></p>
                            </template>
                        </div>

                        <div>
                            <label class="block text-sm text-gray-300 mb-1"><?= \App\Helpers\Language::t('contact.email') ?></label>
                            <input type="email" name="email" required maxlength="255"
                                   class="w-full px-4 py-2 rounded-lg bg-gray-800/50 border border-gray-700 text-white focus:border-blue-500 transition-colors">
                            <template x-if="errors.email">
                                <p class="text-xs text-red-400 mt-1" x-text="errors.email[0]"></p>
                            </template>
                        </div>

                        <div>
                            <label class="block text-sm text-gray-300 mb-1"><?= \App\Helpers\Language::t('contact.message') ?></label>
                            <textarea name="message" required minlength="10" maxlength="5000" rows="4"
                                      class="w-full px-4 py-2 rounded-lg bg-gray-800/50 border border-gray-700 text-white focus:border-blue-500 transition-colors resize-none"></textarea>
                            <template x-if="errors.message">
                                <p class="text-xs text-red-400 mt-1" x-text="errors.message[0]"></p>
                            </template>
                        </div>

                        <template x-if="errors._">
                            <p class="text-sm text-red-400" x-text="errors._"></p>
                        </template>
                        <template x-if="success">
                            <p class="text-sm text-green-400"><?= \App\Helpers\Language::t('contact.success') ?></p>
                        </template>

                        <button type="submit" :disabled="loading"
                                class="btn-primary w-full flex items-center justify-center gap-2 disabled:opacity-50">
                            <template x-if="loading">
                                <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                </svg>
                            </template>
                            <span x-text="loading ? '<?= \App\Helpers\Language::t('contact.sending') ?>' : '<?= \App\Helpers\Language::t('contact.send') ?>'"></span>
                        </button>
                    </form>
                </div>
            </div>

            <div class="space-y-6">
                <div class="glass-card rounded-xl p-6">
                    <h3 class="text-sm font-semibold text-white mb-4"><?= \App\Helpers\Language::t('contact.info') ?></h3>
                    <div class="space-y-4">
                        <a href="mailto:<?= htmlspecialchars($contactInfo['email']) ?>" class="flex items-center gap-3 text-sm text-gray-300 hover:text-blue-400 transition-colors">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <?= htmlspecialchars($contactInfo['email']) ?>
                        </a>
                        <a href="<?= htmlspecialchars($contactInfo['github']) ?>" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 text-sm text-gray-300 hover:text-blue-400 transition-colors">
                            <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                            GitHub
                        </a>
                        <a href="<?= htmlspecialchars($contactInfo['linkedin']) ?>" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 text-sm text-gray-300 hover:text-blue-400 transition-colors">
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
</section>
