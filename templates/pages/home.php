<div class="term-section-full">
    <?php require __DIR__ . '/../components/hero.php'; ?>
</div>

<!-- Featured Projects -->
<section id="projects" class="py-24 term-section">
    <p class="term-prompt text-cat-green text-sm font-mono mb-2"><?= \App\Helpers\Language::t('home.projects_cmd') ?></p>
    <div class="mb-12">
        <h2 class="text-2xl font-bold text-cat-mauve font-mono mb-2"><?= \App\Helpers\Language::t('projects.title') ?></h2>
        <p class="text-cat-subtext0 text-sm font-mono"><?= \App\Helpers\Language::t('projects.description') ?></p>
    </div>

    <?php if (!empty($featuredProjects)): ?>
        <div class="space-y-1 border border-cat-surface1 divide-y divide-cat-surface1">
            <?php foreach ($featuredProjects as $project): ?>
                <?php require __DIR__ . '/../components/project-card.php'; ?>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="text-center py-12">
            <p class="text-cat-subtext0 text-sm font-mono"><?= \App\Helpers\Language::t('projects.empty') ?></p>
        </div>
    <?php endif; ?>

    <div class="mt-6">
        <a href="/projects" class="text-cat-blue text-sm font-mono hover:text-cat-lavender"><?= \App\Helpers\Language::t('home.projects_all_cmd') ?></a>
    </div>
</section>

<!-- Infrastructure Section -->
<section id="infrastructure" class="py-24 bg-cat-mantle">
    <div class="term-section">
        <p class="term-prompt text-cat-green text-sm font-mono mb-2"><?= \App\Helpers\Language::t('home.infra_cmd') ?></p>
        <h2 class="text-2xl font-bold text-cat-mauve font-mono mb-2"><?= \App\Helpers\Language::t('infra.title') ?></h2>

        <div class="term-panel p-4 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="term-panel p-4">
                    <h3 class="text-cat-blue text-sm font-mono mb-2"><?= \App\Helpers\Language::t('home.infra_frontend') ?></h3>
                    <p class="text-cat-subtext0 text-xs font-mono"><?= \App\Helpers\Language::t('home.infra_frontend_tech') ?></p>
                </div>
                <div class="term-panel p-4">
                    <h3 class="text-cat-teal text-sm font-mono mb-2"><?= \App\Helpers\Language::t('home.infra_backend') ?></h3>
                    <p class="text-cat-subtext0 text-xs font-mono"><?= \App\Helpers\Language::t('home.infra_backend_tech') ?></p>
                </div>
                <div class="term-panel p-4">
                    <h3 class="text-cat-mauve text-sm font-mono mb-2"><?= \App\Helpers\Language::t('home.infra_ai_ml') ?></h3>
                    <p class="text-cat-subtext0 text-xs font-mono"><?= \App\Helpers\Language::t('home.infra_ai_ml_tech') ?></p>
                </div>
            </div>
        </div>

        <?php if (!empty($groupedSkills)): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="md:col-span-2 lg:col-span-3">
                    <p class="term-prompt text-cat-green text-sm font-mono mb-2"><?= \App\Helpers\Language::t('home.skills_cmd') ?></p>
                </div>
                <?php foreach ($groupedSkills as $category => $categorySkills): ?>
                    <div class="term-panel p-4">
                        <p class="text-cat-lavender text-sm font-mono mb-3"># <?= htmlspecialchars($category) ?></p>
                        <div class="space-y-2">
                            <?php foreach ($categorySkills as $skill): ?>
                                <div>
                                    <div class="flex justify-between text-xs font-mono mb-1">
                                        <span class="text-cat-text"><?= htmlspecialchars($skill['name']) ?></span>
                                        <span class="text-cat-overlay2"><?= (int) $skill['proficiency'] ?>%</span>
                                    </div>
                                    <div class="term-progress text-xs">
                                        <span class="term-progress-fill"><?= str_repeat('█', (int)((int)$skill['proficiency'] / 10)) ?></span>
                                        <span class="term-progress-empty"><?= str_repeat('░', 10 - (int)((int)$skill['proficiency'] / 10)) ?></span>
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
<section class="py-24 term-section">
    <p class="term-prompt-muted text-cat-teal text-sm font-mono mb-2"><?= \App\Helpers\Language::t('home.languages_cmd') ?></p>
    <h2 class="text-2xl font-bold text-cat-mauve font-mono mb-6"><?= \App\Helpers\Language::t('about.languages') ?></h2>
    <div class="term-panel p-4 max-w-2xl">
        <div class="space-y-1 divide-y divide-cat-surface1">
            <?php foreach ($languages as $l): ?>
            <div class="flex items-center justify-between py-2 px-2">
                <span class="text-cat-text text-sm font-mono"><?= htmlspecialchars($l['name']) ?></span>
                <span class="text-cat-green text-xs font-mono"><?= htmlspecialchars($l['proficiency']) ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Experience Section -->
<section id="experience" class="py-24 bg-cat-mantle">
    <div class="term-section">
        <p class="term-prompt text-cat-green text-sm font-mono mb-2"><?= \App\Helpers\Language::t('home.experience_cmd') ?></p>
        <h2 class="text-2xl font-bold text-cat-mauve font-mono mb-6"><?= \App\Helpers\Language::t('timeline.experience') ?></h2>

        <?php if (!empty($experience)): ?>
            <div class="max-w-2xl">
                <?php foreach ($experience as $item): ?>
                    <?php require __DIR__ . '/../components/timeline-item.php'; ?>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-cat-subtext0 text-sm font-mono"><?= \App\Helpers\Language::t('timeline.empty') ?></p>
        <?php endif; ?>
    </div>
</section>

<!-- Education Section -->
<section class="py-24 term-section">
    <p class="term-prompt-muted text-cat-teal text-sm font-mono mb-2"><?= \App\Helpers\Language::t('home.education_cmd') ?></p>
    <h2 class="text-2xl font-bold text-cat-mauve font-mono mb-6"><?= \App\Helpers\Language::t('timeline.education') ?></h2>

    <?php if (!empty($education)): ?>
        <div class="max-w-2xl">
            <?php foreach ($education as $item): ?>
                <?php require __DIR__ . '/../components/timeline-item.php'; ?>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-cat-subtext0 text-sm font-mono"><?= \App\Helpers\Language::t('timeline.empty') ?></p>
    <?php endif; ?>
</section>

<?php if (!empty($volunteering)): ?>
<section class="py-24 bg-cat-mantle">
    <div class="term-section">
        <p class="term-prompt-muted text-cat-teal text-sm font-mono mb-2"><?= \App\Helpers\Language::t('home.volunteering_cmd') ?></p>
        <h2 class="text-2xl font-bold text-cat-mauve font-mono mb-6"><?= \App\Helpers\Language::t('volunteering.title') ?></h2>
        <div class="space-y-2">
            <?php foreach ($volunteering as $v): ?>
            <div class="term-panel p-4">
                <div class="flex items-start justify-between mb-1">
                    <div>
                        <h3 class="text-sm font-mono text-cat-lavender">
                            <?php if (!empty($v['link'])): ?>
                                <a href="<?= htmlspecialchars($v['link']) ?>" target="_blank" rel="noopener noreferrer" class="hover:text-cat-blue transition-colors">
                                    <?= htmlspecialchars($v['title']) ?>
                                </a>
                            <?php else: ?>
                                <?= htmlspecialchars($v['title']) ?>
                            <?php endif; ?>
                        </h3>
                        <p class="text-xs text-cat-subtext0 font-mono"><?= htmlspecialchars($v['organization']) ?>
                            <?php if (!empty($v['place'])): ?>
                                <span class="text-cat-overlay2"> :: <?= htmlspecialchars($v['place']) ?></span>
                            <?php endif; ?>
                        </p>
                    </div>
                    <?php if (!empty($v['start_date']) || !empty($v['end_date'])): ?>
                        <span class="text-xs text-cat-overlay2 font-mono shrink-0 ml-4">
                            <?= htmlspecialchars($v['start_date'] ?? '') ?>–<?= htmlspecialchars($v['end_date'] ?? '') ?>
                        </span>
                    <?php endif; ?>
                </div>
                <?php if (!empty($v['description'])): ?>
                    <p class="text-xs text-cat-subtext0 font-mono mt-2"><?= htmlspecialchars($v['description']) ?></p>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Blog Preview -->
<section id="blog" class="py-24 term-section">
    <p class="term-prompt text-cat-green text-sm font-mono mb-2"><?= \App\Helpers\Language::t('home.blog_cmd') ?></p>
    <h2 class="text-2xl font-bold text-cat-mauve font-mono mb-6"><?= \App\Helpers\Language::t('blog.title') ?></h2>

    <?php if (!empty($recentPosts)): ?>
        <div class="space-y-1 border border-cat-surface1 divide-y divide-cat-surface1">
            <?php foreach ($recentPosts as $post): ?>
                <?php require __DIR__ . '/../components/blog-card.php'; ?>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="text-center py-12">
            <p class="text-cat-subtext0 text-sm font-mono"><?= \App\Helpers\Language::t('blog.empty') ?></p>
        </div>
    <?php endif; ?>

    <div class="mt-6">
        <a href="/blog" class="text-cat-blue text-sm font-mono hover:text-cat-lavender"><?= \App\Helpers\Language::t('home.blog_all_cmd') ?></a>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-24 bg-cat-mantle">
    <div class="term-section">
        <p class="term-prompt text-cat-green text-sm font-mono mb-2"><?= \App\Helpers\Language::t('home.contact_cmd') ?></p>
        <h2 class="text-2xl font-bold text-cat-mauve font-mono mb-6"><?= \App\Helpers\Language::t('contact.title') ?></h2>

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
                            <span class="text-cat-overlay2">■</span> LinkedIn
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
</section>
