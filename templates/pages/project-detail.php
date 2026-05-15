<?php
$techStack = $techStack ?? [];
$images = $images ?? [];
use App\Helpers\Markdown;
?>

<section class="relative pt-32 pb-8">
    <div class="absolute inset-0 grid-pattern opacity-20"></div>
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="/projects" class="inline-flex items-center gap-2 text-sm text-gray-400 hover:text-blue-400 transition-colors mb-8">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            <?= \App\Helpers\Language::t('projects.back') ?>
        </a>

        <div class="flex items-center gap-3 mb-4">
            <span class="status-dot online"></span>
            <span class="text-sm font-mono text-gray-400"><?= \App\Helpers\Language::t('projects.case_study') ?></span>
        </div>

        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold gradient-text mb-4">
            <?= htmlspecialchars($project['title']) ?>
        </h1>

        <p class="text-lg text-gray-300 mb-8">
            <?= htmlspecialchars($project['short_description']) ?>
        </p>

        <?php if (!empty($project['link'])): ?>
            <a href="<?= htmlspecialchars($project['link']) ?>" target="_blank" rel="noopener noreferrer"
               class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-blue-500/10 text-blue-300 border border-blue-500/20 hover:bg-blue-500/20 transition-colors mb-8">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                Visit Project
            </a>
        <?php endif; ?>

        <?php if (!empty($techStack)): ?>
            <div class="flex flex-wrap gap-2 mb-8">
                <?php foreach ($techStack as $tech): ?>
                    <span class="text-xs px-3 py-1 rounded-full bg-blue-500/10 text-blue-300 border border-blue-500/20">
                        <?= htmlspecialchars($tech) ?>
                    </span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php if (!empty($images)): ?>
<section class="py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php foreach ($images as $image): ?>
                <div class="glass-card rounded-lg overflow-hidden group">
                    <img src="/<?= htmlspecialchars($image['filepath']) ?>"
                         alt="<?= htmlspecialchars($image['alt_text'] ?: $project['title']) ?>"
                         loading="lazy"
                         class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-invert max-w-none space-y-12">
            <?php if (!empty($project['content'])): ?>
            <div>
                <h2 class="text-xl font-semibold gradient-text mb-4"><?= \App\Helpers\Language::t('projects.overview') ?></h2>
                <div class="text-gray-300 leading-relaxed">
                    <?= Markdown::render($project['content']) ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if (!empty($project['architecture_details'])): ?>
            <div class="glass-card rounded-xl p-6">
                <h2 class="text-xl font-semibold gradient-text mb-4"><?= \App\Helpers\Language::t('projects.architecture') ?></h2>
                <div class="text-gray-300 leading-relaxed">
                    <?= Markdown::render($project['architecture_details']) ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if (!empty($project['challenges'])): ?>
            <div class="glass-card rounded-xl p-6">
                <h2 class="text-xl font-semibold gradient-text mb-4"><?= \App\Helpers\Language::t('projects.challenges') ?></h2>
                <div class="text-gray-300 leading-relaxed">
                    <?= Markdown::render($project['challenges']) ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if (!empty($project['deployment_notes'])): ?>
            <div class="glass-card rounded-xl p-6">
                <h2 class="text-xl font-semibold gradient-text mb-4"><?= \App\Helpers\Language::t('projects.deployment') ?></h2>
                <div class="text-gray-300 leading-relaxed">
                    <?= Markdown::render($project['deployment_notes']) ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if (!empty($project['outcomes'])): ?>
            <div class="glass-card rounded-xl p-6 border-green-500/20">
                <h2 class="text-xl font-semibold gradient-text mb-4"><?= \App\Helpers\Language::t('projects.outcomes') ?></h2>
                <div class="text-gray-300 leading-relaxed">
                    <?= Markdown::render($project['outcomes']) ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
