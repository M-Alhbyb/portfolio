<!-- man page-style header -->
<div class="term-man-header max-w-4xl mx-auto mt-9">
    <span class="text-cat-mauve font-bold"><?= htmlspecialchars(strtoupper($project['title'] ?? 'PROJECT')) ?></span>(7)
    <span class="text-cat-subtext0 ml-2">— <?= htmlspecialchars($project['short_description'] ?? '') ?></span>
</div>

<section class="py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-xs text-cat-subtext0 font-mono mb-6">
            ($ <a href="/projects" class="text-cat-blue hover:text-cat-lavender">cd ~/projects</a> && ./<?= htmlspecialchars($project['slug'] ?? '') ?>)
        </div>

        <div class="space-y-8">
            <?php if (!empty($project['content'])): ?>
            <div>
                <h2 class="term-man-section text-sm font-bold mb-2">NAME</h2>
                <p class="text-cat-text text-sm font-mono ml-6 leading-relaxed">
                    <?= htmlspecialchars($project['title'] ?? '') ?> — <?= htmlspecialchars($project['short_description'] ?? '') ?>
                </p>
            </div>
            <?php endif; ?>

            <div>
                <h2 class="term-man-section text-sm font-bold mb-2">SYNOPSIS</h2>
                <div class="text-cat-text text-sm font-mono ml-6 leading-relaxed">
                    <?= htmlspecialchars($project['short_description'] ?? '') ?>
                </div>
            </div>

            <?php if (!empty($project['content'])): ?>
            <div>
                <h2 class="term-man-section text-sm font-bold mb-2">DESCRIPTION</h2>
                <div class="text-cat-text text-sm font-mono ml-6 leading-relaxed prose prose-invert max-w-none">
                    <?= \App\Helpers\Markdown::render($project['content']) ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if (!empty($techStack)): ?>
            <div>
                <h2 class="term-man-section text-sm font-bold mb-2">TECH STACK</h2>
                <div class="ml-6 flex flex-wrap gap-x-3 gap-y-1">
                    <?php foreach ($techStack as $tech): ?>
                        <span class="text-cat-blue text-sm font-mono"><?= htmlspecialchars($tech) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if (!empty($project['architecture_details'])): ?>
            <div>
                <h2 class="term-man-section text-sm font-bold mb-2">ARCHITECTURE</h2>
                <div class="text-cat-text text-sm font-mono ml-6 leading-relaxed prose prose-invert max-w-none">
                    <?= \App\Helpers\Markdown::render($project['architecture_details']) ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if (!empty($project['challenges'])): ?>
            <div>
                <h2 class="term-man-section text-sm font-bold mb-2">BUGS / CHALLENGES</h2>
                <div class="text-cat-text text-sm font-mono ml-6 leading-relaxed prose prose-invert max-w-none">
                    <?= \App\Helpers\Markdown::render($project['challenges']) ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if (!empty($project['outcomes'])): ?>
            <div>
                <h2 class="term-man-section text-sm font-bold mb-2">EXIT STATUS / OUTCOMES</h2>
                <div class="text-cat-text text-sm font-mono ml-6 leading-relaxed prose prose-invert max-w-none">
                    <?= \App\Helpers\Markdown::render($project['outcomes']) ?>
                </div>
            </div>
            <?php endif; ?>

            <div>
                <h2 class="term-man-section text-sm font-bold mb-2">SEE ALSO</h2>
                <div class="ml-6 text-sm font-mono space-y-1">
                    <a href="/projects" class="text-cat-blue hover:text-cat-lavender">~/projects</a>
                    <?php if (!empty($project['link'])): ?>
                        <br>
                        <a href="<?= htmlspecialchars($project['link']) ?>" target="_blank" rel="noopener noreferrer" class="text-cat-blue hover:text-cat-lavender"><?= htmlspecialchars($project['link']) ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if (!empty($images)): ?>
<?php $galleryJson = htmlspecialchars(json_encode(array_map(function($img) use ($project) {
    return ['src' => '/' . $img['filepath'], 'alt' => $img['alt_text'] ?: $project['title']];
}, $images)), ENT_QUOTES, 'UTF-8'); ?>
<section class="py-8" x-data="gallery" data-images='<?= $galleryJson ?>' @keydown.window="onKeydown">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="term-man-section text-sm font-bold mb-4">GALLERY</h2>

        <div class="columns-1 md:columns-2 lg:columns-3 gap-4 space-y-4">
            <?php foreach ($images as $i => $image): ?>
                <div class="break-inside-avoid">
                    <button type="button" @click="openViewer(<?= $i ?>)" class="term-panel overflow-hidden group w-full text-left">
                        <img src="/<?= htmlspecialchars($image['filepath']) ?>"
                             alt="<?= htmlspecialchars($image['alt_text'] ?: $project['title']) ?>"
                             loading="lazy"
                             class="w-full <?= $i % 3 === 0 ? 'aspect-[4/3]' : ($i % 3 === 1 ? 'aspect-square' : 'aspect-[3/4]') ?> object-cover group-hover:opacity-80 transition-opacity duration-300">
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
                     class="max-h-[90vh] max-w-[90vw] object-contain">
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
