<?php
$title = $title ?? \App\Helpers\Language::t('seo.default_title');
$description = $description ?? \App\Helpers\Language::t('seo.default_description');
$ogTitle = $ogTitle ?? $title;
$ogDescription = $ogDescription ?? $description;
$ogImage = $ogImage ?? null;
$ogType = $ogType ?? \App\Helpers\Language::t('seo.default_og_type');
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
