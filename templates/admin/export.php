<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <p class="text-sm font-mono text-cyan-400 mb-1"><span class="text-gray-500">//</span> export</p>
        <h1 class="text-2xl font-bold gradient-text">Export Data</h1>
        <p class="text-sm text-gray-400 mt-1">Download your content as JSON or CSV files.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <?php $exportTypes = [
            'projects' => ['icon' => 'code', 'label' => 'Projects'],
            'posts' => ['icon' => 'document', 'label' => 'Posts'],
            'skills' => ['icon' => 'shield', 'label' => 'Skills'],
            'messages' => ['icon' => 'chat', 'label' => 'Messages'],
            'cv' => ['icon' => 'document-text', 'label' => 'CV / Resume', 'highlight' => true],
        ]; ?>

<?php foreach ($exportTypes as $key => $info): ?>
        <?php $isHighlight = !empty($info['highlight']); ?>
        <div class="glass-card rounded-xl p-5 <?= $isHighlight ? 'border border-blue-500/30' : '' ?>">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-sm font-semibold <?= $isHighlight ? 'text-blue-300' : 'text-white' ?>"><?= htmlspecialchars($info['label']) ?></h2>
                <?php if ($key === 'cv'): ?>
                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                <?php else: ?>
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                <?php endif; ?>
            </div>
            <?php if ($key === 'cv'): ?>
            <div class="flex items-center gap-2">
                <a href="/admin/export/cv/download" class="btn-primary text-xs py-1.5 inline-flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3"/></svg>
                    Download PDF
                </a>
            </div>
            <p class="text-xs text-gray-500 mt-2">ATS-optimized, A4 format</p>
            <?php else: ?>
            <div class="flex items-center gap-2">
                <a href="/admin/export/<?= htmlspecialchars($key) ?>?format=json" class="btn-primary text-xs py-1.5">JSON</a>
                <a href="/admin/export/<?= htmlspecialchars($key) ?>?format=csv" class="text-xs px-3 py-1.5 rounded border border-blue-500/30 text-blue-300 hover:bg-blue-500/10 transition-colors">CSV</a>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
</div>
