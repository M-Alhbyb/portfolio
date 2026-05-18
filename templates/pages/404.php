<!DOCTYPE html>
<html lang="<?= \App\Helpers\Language::getLocale() ?>" dir="<?= \App\Helpers\Language::dir() ?>" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - <?= \App\Helpers\Language::t('error.404_title') ?> | Elhabib Portfolio</title>
    <link rel="stylesheet" href="/assets/css/app.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        canvas#matrix { position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; opacity: 0.2; pointer-events: none; }
    </style>
</head>
<body class="min-h-screen bg-cat-base text-cat-text font-mono antialiased flex items-center justify-center">
    <canvas id="matrix"></canvas>
    <div class="text-center max-w-lg mx-auto px-4 relative z-10">
        <div class="text-8xl font-bold text-cat-mauve mb-4 font-mono">404</div>
        <div class="text-cat-overlay2 text-xs font-mono mb-4"><?= \App\Helpers\Language::t('error.404_cmd') ?></div>
        <h1 class="text-xl font-bold text-cat-yellow font-mono mb-3"><?= \App\Helpers\Language::t('error.404_title') ?></h1>
        <p class="text-cat-subtext0 text-sm font-mono mb-8"><?= \App\Helpers\Language::t('error.404_message') ?></p>
        <a href="/" class="term-btn term-btn-primary text-sm inline-flex items-center gap-2">
            <?= \App\Helpers\Language::dir() === 'rtl' ? '→' : '←' ?> <?= \App\Helpers\Language::t('error.404_home') ?>
        </a>
    </div>
    <script>
    (function() {
        const canvas = document.getElementById('matrix');
        const ctx = canvas.getContext('2d');
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        const chars = 'アイウエオカキクケコサシスセソタチツテトナニヌネノハヒフヘホマミムメモヤユヨラリルレロワヲン0123456789';
        const fontSize = 14;
        const columns = Math.floor(canvas.width / fontSize);
        const drops = Array(columns).fill(1);
        function draw() {
            ctx.fillStyle = 'rgba(30, 30, 46, 0.05)';
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            ctx.fillStyle = '#a6e3a1';
            ctx.font = fontSize + 'px JetBrains Mono, monospace';
            for (let i = 0; i < drops.length; i++) {
                const text = chars[Math.floor(Math.random() * chars.length)];
                ctx.fillText(text, i * fontSize, drops[i] * fontSize);
                if (drops[i] * fontSize > canvas.height && Math.random() > 0.975) drops[i] = 0;
                drops[i]++;
            }
        }
        setInterval(draw, 40);
        window.addEventListener('resize', () => { canvas.width = window.innerWidth; canvas.height = window.innerHeight; });
    })();
    </script>
</body>
</html>
