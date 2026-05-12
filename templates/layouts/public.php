<!DOCTYPE html>
<html lang="<?= $locale ?? 'en' ?>" dir="<?= $dir ?? 'ltr' ?>" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?= \App\Core\Session::getCsrfToken() ?>">
    <?= $seo ?? '' ?>
    <link rel="stylesheet" href="/assets/css/app.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen font-sans antialiased">
    <?php require __DIR__ . '/../components/header.php'; ?>

    <main class="min-h-screen">
        <?= $content ?? '' ?>
    </main>

    <?php require __DIR__ . '/../components/footer.php'; ?>

    <script src="/assets/js/app.js"></script>
</body>
</html>
