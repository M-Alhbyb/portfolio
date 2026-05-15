<a href="/projects/<?= htmlspecialchars($project['slug']) ?>" class="glass-card rounded-xl p-6 block group hover:-translate-y-1 transition-all duration-200">
    <div class="flex items-start justify-between mb-4">
        <div class="w-10 h-10 rounded-lg bg-blue-500/10 flex items-center justify-center group-hover:bg-blue-500/20 transition-colors">
            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
            </svg>
        </div>
        <?php if (!empty($project['status']) && $project['status'] === 'published'): ?>
            <span class="status-dot online"></span>
        <?php endif; ?>
    </div>

    <h3 class="text-lg font-semibold text-white mb-2 group-hover:text-blue-400 transition-colors">
        <?= htmlspecialchars($project['title']) ?>
    </h3>

    <p class="text-sm text-gray-400 mb-4 line-clamp-3">
        <?= htmlspecialchars($project['short_description']) ?>
    </p>

    <?php if (!empty($project['link'])): ?>
        <?php $is_github = strpos($project['link'], 'github.com') !== false; ?>
        <div class="mb-4">
            <span class="text-xs inline-flex items-center gap-1 <?= $is_github ? 'text-gray-400' : 'text-blue-400' ?>">
                <?php if ($is_github): ?>
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                    Source Code
                <?php else: ?>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                    Live Demo
                <?php endif; ?>
            </span>
        </div>
    <?php endif; ?>

    <?php if (!empty($project['tech_stack'])): ?>
        <?php $techs = json_decode($project['tech_stack'], true) ?? []; ?>
        <div class="flex flex-wrap gap-2">
            <?php foreach (array_slice($techs, 0, 4) as $tech): ?>
                <span class="text-xs px-2 py-1 rounded-full bg-blue-500/10 text-blue-300 border border-blue-500/20">
                    <?= htmlspecialchars($tech) ?>
                </span>
            <?php endforeach; ?>
            <?php if (count($techs) > 4): ?>
                <span class="text-xs px-2 py-1 rounded-full bg-gray-800 text-gray-400">
                    +<?= count($techs) - 4 ?>
                </span>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</a>
