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
<body class="min-h-screen bg-cat-base text-cat-text font-mono antialiased flex items-center justify-center p-4">
    <div class="w-full max-w-sm">
        <div class="text-center mb-8">
            <p class="term-prompt text-cat-green text-sm font-mono mb-2">./login</p>
            <p class="text-xs text-cat-subtext0 font-mono">Authentication Required</p>
        </div>

        <div class="term-panel p-6">
            <form method="POST" action="/admin/login" class="space-y-4">
                <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">

                <?php if ($error ?? false): ?>
                    <div class="term-panel p-3 border-cat-red">
                        <p class="text-xs text-cat-red font-mono"><?= htmlspecialchars($error) ?></p>
                    </div>
                <?php endif; ?>

                <div>
                    <label class="block text-xs text-cat-peach font-mono mb-1">Username</label>
                    <input type="text" name="username" required class="w-full px-3 py-2 text-sm">
                </div>

                <div>
                    <label class="block text-xs text-cat-peach font-mono mb-1">Password</label>
                    <input type="password" name="password" required class="w-full px-3 py-2 text-sm">
                </div>

                <button type="submit" class="term-btn term-btn-primary w-full text-sm py-2">$ authenticate</button>
            </form>

            <div class="mt-6 text-center">
                <a href="/" class="text-xs text-cat-subtext0 hover:text-cat-lavender font-mono">← Back to Portfolio</a>
            </div>
        </div>
    </div>
</body>
</html>
