<?php
$title = $title ?? 'Mohamed Elhabib - Engineering Portfolio';
$description = $description ?? 'Portfolio of Mohamed Elhabib, showcasing engineering projects, DevOps infrastructure, and technical expertise.';
$ogTitle = $ogTitle ?? $title;
$ogDescription = $ogDescription ?? $description;
$ogImage = $ogImage ?? null;
$ogType = $ogType ?? 'website';
$canonical = $canonical ?? null;
$noindex = $noindex ?? false;
?>
<title><?= htmlspecialchars($title) ?></title>
<meta name="description" content="<?= htmlspecialchars($description) ?>">
<meta property="og:title" content="<?= htmlspecialchars($ogTitle) ?>">
<meta property="og:description" content="<?= htmlspecialchars($ogDescription) ?>">
<meta property="og:type" content="<?= htmlspecialchars($ogType) ?>">
<?php if ($ogImage): ?>
<meta property="og:image" content="<?= htmlspecialchars($ogImage) ?>">
<?php endif; ?>
<meta name="twitter:card" content="summary_large_image">
<?php if ($canonical): ?>
<link rel="canonical" href="<?= htmlspecialchars($canonical) ?>">
<?php endif; ?>
<?php if ($noindex): ?>
<meta name="robots" content="noindex, nofollow">
<?php endif; ?>
