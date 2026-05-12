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
