<section class="relative min-h-screen flex items-center overflow-hidden">
    <div class="absolute inset-0 grid-pattern opacity-30"></div>
    <div class="absolute inset-0 hex-bg"></div>

    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-red-500/10 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
        <div class="max-w-3xl">
            <div class="flex items-center gap-3 mb-6">
                <span class="status-dot online"></span>
                <span class="text-sm font-mono text-gray-400"><?= \App\Helpers\Language::t('hero.status') ?></span>
            </div>

            <div class="mb-4">
                <p class="text-sm font-mono text-cyan-400 mb-2">
                    <span class="text-gray-500">//</span> <?= \App\Helpers\Language::t('hero.greeting') ?>
                </p>
            </div>

            <h1 class="text-4xl sm:text-5xl md:text-7xl font-bold mb-6 leading-tight">
                <span class="text-white"><?= \App\Helpers\Language::t('hero.i_am') ?></span>
                <br>
                <span class="gradient-text">Mohamed Elhabib</span>
            </h1>

            <p class="text-lg sm:text-xl text-gray-300 mb-8 leading-relaxed max-w-2xl">
                <?= \App\Helpers\Language::t('hero.tagline') ?>
            </p>

            <div class="flex flex-wrap gap-4">
                <a href="/projects" class="btn-primary inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0l-4-4m4 4l-4 4"/>
                    </svg>
                    <?= \App\Helpers\Language::t('hero.view_projects') ?>
                </a>
                <a href="/contact" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-lg border border-blue-500/30 text-blue-300 hover:bg-blue-500/10 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <?= \App\Helpers\Language::t('hero.contact_me') ?>
                </a>
            </div>

            <div class="mt-12 p-4 glass rounded-lg max-w-md">
                <div class="flex items-center gap-2 text-sm font-mono">
                    <span class="text-cyan-400">$</span>
                    <span class="text-gray-300">./profile --engineer</span>
                </div>
                <div class="mt-2 text-sm font-mono text-gray-400">
                    <div><span class="text-blue-400">status:</span> <span class="text-green-400">active</span></div>
                    <div><span class="text-blue-400">focus:</span> <span class="text-cyan-400">DevOps &amp; Infrastructure</span></div>
                    <div><span class="text-blue-400">uptime:</span> <span class="text-yellow-400">99.9%</span></div>
                </div>
            </div>
        </div>
    </div>

    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
        </svg>
    </div>
</section>
