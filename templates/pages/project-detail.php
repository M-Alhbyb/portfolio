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
            <?php $is_github = strpos($project['link'], 'github.com') !== false; ?>
            <a href="<?= htmlspecialchars($project['link']) ?>" target="_blank" rel="noopener noreferrer"
               class="inline-flex items-center gap-2 px-6 py-3 rounded-lg <?= $is_github ? 'bg-gray-800 text-gray-300 border-gray-700 hover:bg-gray-700' : 'bg-blue-500/10 text-blue-300 border-blue-500/20 hover:bg-blue-500/20' ?> border transition-colors mb-8">
                <?php if ($is_github): ?>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                    Source Code
                <?php else: ?>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                    Live Demo
                <?php endif; ?>
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
<?php $galleryJson = htmlspecialchars(json_encode(array_map(function($img) use ($project) {
    return ['src' => '/' . $img['filepath'], 'alt' => $img['alt_text'] ?: $project['title']];
}, $images)), ENT_QUOTES, 'UTF-8'); ?>
<section class="py-8" x-data="gallery" data-images='<?= $galleryJson ?>' @keydown.window="onKeydown">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-3 mb-8">
            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <h2 class="text-xl font-semibold gradient-text"><?= \App\Helpers\Language::t('projects.gallery') ?></h2>
        </div>

        <div class="columns-1 md:columns-2 lg:columns-3 gap-4 space-y-4">
            <?php foreach ($images as $i => $image): ?>
                <div class="break-inside-avoid <?= $i === 0 ? 'lg:col-span-2' : '' ?>">
                    <button type="button" @click="openViewer(<?= $i ?>)" class="glass-card rounded-lg overflow-hidden group w-full text-left">
                        <img src="/<?= htmlspecialchars($image['filepath']) ?>"
                             alt="<?= htmlspecialchars($image['alt_text'] ?: $project['title']) ?>"
                             loading="lazy"
                             class="w-full <?= $i % 3 === 0 ? 'aspect-[4/3]' : ($i % 3 === 1 ? 'aspect-square' : 'aspect-[3/4]') ?> object-cover group-hover:scale-105 transition-transform duration-300">
                    </button>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <template x-teleport="body">
        <div x-show="open" x-cloak
             class="fixed inset-0 z-50 flex items-center justify-center bg-black/90"
             @click.self="closeViewer">
            <button @click="closeViewer" class="absolute top-4 right-4 text-white/70 hover:text-white transition-colors z-10">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <button @click="prev" class="absolute left-4 text-white/70 hover:text-white transition-colors z-10">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>

            <template x-if="images[currentIndex]">
                <img :src="images[currentIndex].src" :alt="images[currentIndex].alt"
                     class="max-h-[90vh] max-w-[90vw] object-contain rounded-lg">
            </template>

            <button @click="next" class="absolute right-4 text-white/70 hover:text-white transition-colors z-10">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>

            <div class="absolute bottom-4 text-white/50 text-sm" x-text="`${currentIndex + 1} / ${images.length}`"></div>
        </div>
    </template>
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
