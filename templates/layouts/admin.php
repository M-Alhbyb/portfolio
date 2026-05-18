<!DOCTYPE html>
<html lang="en" dir="ltr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin - Elhabib Portfolio' ?></title>
    <link rel="icon" type="image/png" href="/assets/images/logo.png">
    <link rel="stylesheet" href="/assets/css/app.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="min-h-screen bg-cat-base text-cat-text font-mono antialiased" x-data="{ sidebarOpen: true }">
    <div class="flex h-screen overflow-hidden">
        <!-- tmux-style pane sidebar -->
        <aside class="fixed inset-y-0 left-0 z-40 w-56 bg-cat-crust border-r border-cat-surface1 transform -translate-x-full lg:translate-x-0 transition-transform duration-200 ease-in-out flex flex-col"
               :class="{ 'translate-x-0': sidebarOpen }">
            <div class="flex items-center h-9 px-3 border-b border-cat-surface1 text-xs text-cat-subtext0">
                <span class="text-cat-green font-bold">0:</span>
                <span class="ml-1 text-cat-lavender">dashboard*</span>
            </div>
            <nav class="flex-1 overflow-y-auto py-1 space-y-0.5 px-1">
                <a href="/admin" class="flex items-center gap-2 px-2 py-1.5 text-xs text-cat-subtext0 hover:text-cat-lavender hover:bg-cat-surface0 rounded-none transition-colors">
                    <span class="text-cat-overlay2">0:</span> dashboard
                </a>
                <a href="/admin/projects" class="flex items-center gap-2 px-2 py-1.5 text-xs text-cat-subtext0 hover:text-cat-lavender hover:bg-cat-surface0 rounded-none transition-colors">
                    <span class="text-cat-overlay2">1:</span> projects
                </a>
                <a href="/admin/posts" class="flex items-center gap-2 px-2 py-1.5 text-xs text-cat-subtext0 hover:text-cat-lavender hover:bg-cat-surface0 rounded-none transition-colors">
                    <span class="text-cat-overlay2">2:</span> posts
                </a>
                <a href="/admin/skills" class="flex items-center gap-2 px-2 py-1.5 text-xs text-cat-subtext0 hover:text-cat-lavender hover:bg-cat-surface0 rounded-none transition-colors">
                    <span class="text-cat-overlay2">3:</span> skills
                </a>
                <a href="/admin/languages" class="flex items-center gap-2 px-2 py-1.5 text-xs text-cat-subtext0 hover:text-cat-lavender hover:bg-cat-surface0 rounded-none transition-colors">
                    <span class="text-cat-overlay2">4:</span> languages
                </a>
                <a href="/admin/volunteering" class="flex items-center gap-2 px-2 py-1.5 text-xs text-cat-subtext0 hover:text-cat-lavender hover:bg-cat-surface0 rounded-none transition-colors">
                    <span class="text-cat-overlay2">5:</span> volunteering
                </a>
                <a href="/admin/timeline" class="flex items-center gap-2 px-2 py-1.5 text-xs text-cat-subtext0 hover:text-cat-lavender hover:bg-cat-surface0 rounded-none transition-colors">
                    <span class="text-cat-overlay2">6:</span> timeline
                </a>
                <a href="/admin/messages" class="flex items-center gap-2 px-2 py-1.5 text-xs text-cat-subtext0 hover:text-cat-lavender hover:bg-cat-surface0 rounded-none transition-colors">
                    <span class="text-cat-overlay2">7:</span> messages
                </a>
                <a href="/admin/media" class="flex items-center gap-2 px-2 py-1.5 text-xs text-cat-subtext0 hover:text-cat-lavender hover:bg-cat-surface0 rounded-none transition-colors">
                    <span class="text-cat-overlay2">8:</span> media
                </a>
                <a href="/admin/settings" class="flex items-center gap-2 px-2 py-1.5 text-xs text-cat-subtext0 hover:text-cat-lavender hover:bg-cat-surface0 rounded-none transition-colors">
                    <span class="text-cat-overlay2">9:</span> settings
                </a>
                <a href="/admin/export" class="flex items-center gap-2 px-2 py-1.5 text-xs text-cat-subtext0 hover:text-cat-lavender hover:bg-cat-surface0 rounded-none transition-colors">
                    <span class="text-cat-overlay2">10:</span> export
                </a>
            </nav>
            <div class="border-t border-cat-surface1 p-1">
                <a href="/" class="flex items-center gap-2 px-2 py-1.5 text-xs text-cat-overlay2 hover:text-cat-text hover:bg-cat-surface0">
                    <span class="text-cat-overlay2">~</span> back to site
                </a>
            </div>
        </aside>

        <div class="flex-1 flex flex-col lg:pl-56">
            <!-- Terminal title bar -->
            <header class="term-titlebar flex items-center justify-between px-4 lg:px-6">
                <div class="flex items-center gap-2">
                    <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-1 text-cat-subtext0 hover:text-cat-lavender">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                    <span class="text-cat-green">$</span>
                    <span class="text-cat-text text-xs">./<?= $section ?? 'dashboard' ?></span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-cat-subtext0 text-xs hidden sm:block"><?= htmlspecialchars($username ?? 'admin') ?></span>
                    <a href="/admin/logout" class="term-btn term-btn-danger text-xs py-1 px-2">logout</a>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-4 lg:p-6 bg-cat-base">
                <?= $content ?? '' ?>
            </main>

            <!-- tmux status bar -->
            <div class="term-statusbar flex items-center justify-between px-4">
                <div class="flex items-center gap-3">
                    <span><?= htmlspecialchars($username ?? 'admin') ?>@elhabib-portfolio</span>
                    <span class="text-cat-subtext0"><?= date('H:i:s') ?></span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-cat-subtext0">"<?= $section ?? 'dashboard' ?>"</span>
                    <span class="term-status-active text-cat-green">running</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
