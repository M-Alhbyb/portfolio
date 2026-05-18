<div class="py-24 term-section">
    <p class="term-prompt text-cat-green text-sm font-mono mb-2"><?= \App\Helpers\Language::t('about.cmd') ?></p>
    <h1 class="text-2xl font-bold text-cat-mauve font-mono mb-8"><?= \App\Helpers\Language::t('about.title') ?></h1>

    <div class="space-y-8">
        <!-- STORY -->
        <section>
            <h2 class="term-man-section text-sm mb-3"><?= \App\Helpers\Language::t('about.story_label') ?></h2>
            <div class="term-panel p-4">
                <p class="text-sm text-cat-text font-mono leading-relaxed">
                    <?= \App\Helpers\Language::t('about.bio_p1') ?>
                </p>
                <p class="text-sm text-cat-text font-mono leading-relaxed mt-3">
                    <?= \App\Helpers\Language::t('about.bio_p2') ?>
                </p>
                <p class="text-sm text-cat-text font-mono leading-relaxed mt-3">
                    <?= \App\Helpers\Language::t('about.bio_p3') ?>
                </p>
            </div>
        </section>

        <!-- PHILOSOPHY -->
        <section>
            <h2 class="term-man-section text-sm mb-3"><?= \App\Helpers\Language::t('about.philosophy_label') ?></h2>
            <div class="term-panel p-4">
                <p class="text-sm text-cat-text font-mono leading-relaxed mb-4">
                    <?= \App\Helpers\Language::t('about.philosophy_intro') ?>
                </p>
                <div class="space-y-2 text-sm font-mono">
                    <div class="flex items-start gap-3">
                        <span class="text-cat-blue mt-1">◆</span>
                        <span class="text-cat-text"><?= \App\Helpers\Language::t('about.phil_simple') ?></span>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-cat-teal mt-1">◆</span>
                        <span class="text-cat-text"><?= \App\Helpers\Language::t('about.phil_automate') ?></span>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-cat-yellow mt-1">◆</span>
                        <span class="text-cat-text"><?= \App\Helpers\Language::t('about.phil_real_needs') ?></span>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-cat-mauve mt-1">◆</span>
                        <span class="text-cat-text"><?= \App\Helpers\Language::t('about.phil_learn') ?></span>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-cat-red mt-1">◆</span>
                        <span class="text-cat-text"><?= \App\Helpers\Language::t('about.phil_stability') ?></span>
                    </div>
                </div>
            </div>
        </section>

        <!-- WHAT I WORK WITH -->
        <section>
            <h2 class="term-man-section text-sm mb-3"><?= \App\Helpers\Language::t('about.what_i_work_with') ?></h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="term-panel p-4">
                    <h3 class="text-xs text-cat-blue font-mono mb-2"><?= \App\Helpers\Language::t('about.skills_web_label') ?></h3>
                    <p class="text-xs text-cat-subtext0 font-mono"><?= \App\Helpers\Language::t('about.skills_web') ?></p>
                </div>
                <div class="term-panel p-4">
                    <h3 class="text-xs text-cat-teal font-mono mb-2"><?= \App\Helpers\Language::t('about.skills_linux_label') ?></h3>
                    <p class="text-xs text-cat-subtext0 font-mono"><?= \App\Helpers\Language::t('about.skills_linux') ?></p>
                </div>
                <div class="term-panel p-4">
                    <h3 class="text-xs text-cat-yellow font-mono mb-2"><?= \App\Helpers\Language::t('about.skills_automation_label') ?></h3>
                    <p class="text-xs text-cat-subtext0 font-mono"><?= \App\Helpers\Language::t('about.skills_automation') ?></p>
                </div>
                <div class="term-panel p-4">
                    <h3 class="text-xs text-cat-mauve font-mono mb-2"><?= \App\Helpers\Language::t('about.skills_design_label') ?></h3>
                    <p class="text-xs text-cat-subtext0 font-mono"><?= \App\Helpers\Language::t('about.skills_design') ?></p>
                </div>
            </div>
        </section>

        <!-- CURRENT INTERESTS -->
        <section>
            <h2 class="term-man-section text-sm mb-3"><?= \App\Helpers\Language::t('about.current_interests') ?></h2>
            <div class="term-panel p-4">
                <div class="space-y-2 text-sm font-mono">
                    <div class="flex items-start gap-3">
                        <span class="text-cat-blue mt-1">◆</span>
                        <span class="text-cat-text"><?= \App\Helpers\Language::t('about.interest_ai') ?></span>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-cat-teal mt-1">◆</span>
                        <span class="text-cat-text"><?= \App\Helpers\Language::t('about.interest_dev_tools') ?></span>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-cat-yellow mt-1">◆</span>
                        <span class="text-cat-text"><?= \App\Helpers\Language::t('about.interest_system_design') ?></span>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-cat-mauve mt-1">◆</span>
                        <span class="text-cat-text"><?= \App\Helpers\Language::t('about.interest_adaptive') ?></span>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-cat-red mt-1">◆</span>
                        <span class="text-cat-text"><?= \App\Helpers\Language::t('about.interest_open_source') ?></span>
                    </div>
                </div>
            </div>
        </section>

        <!-- LANGUAGES -->
        <?php if (!empty($languages)): ?>
        <section>
            <h2 class="term-man-section text-sm mb-3"><?= \App\Helpers\Language::t('about.languages_label') ?></h2>
            <div class="term-panel p-4">
                <div class="space-y-1 divide-y divide-cat-surface1">
                    <?php foreach ($languages as $l): ?>
                    <div class="flex items-center justify-between py-2 px-2">
                        <span class="text-sm text-cat-text font-mono"><?= htmlspecialchars($l['name']) ?></span>
                        <span class="text-xs text-cat-green font-mono"><?= htmlspecialchars($l['proficiency']) ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- LEARNING JOURNEY -->
        <section>
            <h2 class="term-man-section text-sm mb-3"><?= \App\Helpers\Language::t('about.learning_journey') ?></h2>
            <div class="term-panel p-4">
                <p class="text-sm text-cat-text font-mono leading-relaxed mb-4">
                    <?= \App\Helpers\Language::t('about.journey_p1') ?>
                </p>
                <p class="text-sm text-cat-text font-mono leading-relaxed mb-4">
                    <?= \App\Helpers\Language::t('about.journey_continue') ?>
                </p>
                <div class="space-y-2 text-sm font-mono">
                    <div class="flex items-center gap-3">
                        <span class="text-cat-blue">●</span>
                        <span class="text-cat-text"><?= \App\Helpers\Language::t('about.interest_backend') ?></span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-cat-teal">●</span>
                        <span class="text-cat-text"><?= \App\Helpers\Language::t('about.interest_ai_agents') ?></span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-cat-yellow">●</span>
                        <span class="text-cat-text"><?= \App\Helpers\Language::t('about.interest_infra') ?></span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-cat-mauve">●</span>
                        <span class="text-cat-text"><?= \App\Helpers\Language::t('about.interest_nlp') ?></span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-cat-red">●</span>
                        <span class="text-cat-text"><?= \App\Helpers\Language::t('about.interest_design_principles') ?></span>
                    </div>
                </div>
            </div>
        </section>

        <!-- VOLUNTEERING & COMMUNITY -->
        <section>
            <h2 class="term-man-section text-sm mb-3"><?= \App\Helpers\Language::t('about.volunteering_label') ?></h2>
            <div class="term-panel p-4">
                <p class="text-sm text-cat-text font-mono leading-relaxed">
                    <?= \App\Helpers\Language::t('about.volunteering_desc') ?>
                </p>
            </div>
        </section>
    </div>
</div>
