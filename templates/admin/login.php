<!DOCTYPE html>
<html lang="en" dir="ltr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Elhabib Portfolio</title>
    <link rel="stylesheet" href="/assets/css/app.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen bg-[#070b15] text-gray-100 font-sans antialiased flex items-center justify-center p-4">
    <div class="w-full max-w-sm">
        <div class="text-center mb-8">
            <div class="flex items-center justify-center gap-3 mb-4">
                <span class="w-3 h-3 rounded-full bg-blue-500 shadow-[0_0_12px_rgba(59,130,246,0.6)]"></span>
                <span class="text-lg font-semibold gradient-text">CMS Control</span>
            </div>
            <p class="text-sm text-gray-400 font-mono">Authentication Required</p>
        </div>

        <div class="glass rounded-xl p-6">
            <form method="POST" action="/admin/login" class="space-y-4">
                <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">

                <?php if ($error ?? false): ?>
                    <div class="p-3 rounded-lg bg-red-500/10 border border-red-500/20 text-sm text-red-400">
                        <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>

                <div>
                    <label class="block text-sm text-gray-300 mb-1">Username</label>
                    <input type="text" name="username" required
                           class="w-full px-4 py-2.5 rounded-lg bg-gray-800/50 border border-gray-700 text-white focus:border-blue-500 transition-colors">
                </div>

                <div>
                    <label class="block text-sm text-gray-300 mb-1">Password</label>
                    <input type="password" name="password" required
                           class="w-full px-4 py-2.5 rounded-lg bg-gray-800/50 border border-gray-700 text-white focus:border-blue-500 transition-colors">
                </div>

                <button type="submit" class="btn-primary w-full">Authenticate</button>
            </form>

            <div class="mt-6 text-center">
                <a href="/" class="text-xs text-gray-500 hover:text-blue-400 transition-colors">&larr; Back to Portfolio</a>
            </div>
        </div>
    </div>
</body>
</html>
