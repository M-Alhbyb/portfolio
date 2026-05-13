<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?= htmlspecialchars($name) ?> - CV</title>
<style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
        font-family: 'Times New Roman', Times, serif;
        font-size: 11pt;
        line-height: 1.4;
        color: #000;
        background: #fff;
        padding: 0.7in 0.75in;
    }
    h1 {
        font-size: 20pt;
        font-weight: bold;
        text-align: center;
        margin-bottom: 2pt;
        letter-spacing: 0.5pt;
        color: #1a1a1a;
    }
    .contact-line {
        text-align: center;
        font-size: 10pt;
        color: #333;
        margin-bottom: 14pt;
        line-height: 1.6;
    }
    .contact-line a { color: #1a1a1a; text-decoration: none; }
    .divider {
        border: none;
        border-top: 1.5px solid #222;
        margin: 8pt 0 10pt 0;
    }
    h2 {
        font-size: 12pt;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1pt;
        color: #1a1a1a;
        border-bottom: 1px solid #555;
        padding-bottom: 2pt;
        margin-top: 14pt;
        margin-bottom: 8pt;
    }
    .summary-text {
        font-size: 10.5pt;
        color: #222;
        margin-bottom: 4pt;
        text-align: justify;
    }
    .entry {
        margin-bottom: 10pt;
    }
    .entry-header {
        display: flex;
        justify-content: space-between;
        align-items: baseline;
    }
    .entry-title {
        font-size: 11pt;
        font-weight: bold;
        color: #1a1a1a;
    }
    .entry-org {
        font-size: 11pt;
        font-style: italic;
        color: #333;
    }
    .entry-date {
        font-size: 10pt;
        color: #444;
        white-space: nowrap;
        margin-left: 8pt;
    }
    .entry-desc {
        font-size: 10pt;
        color: #222;
        margin-top: 2pt;
        text-align: justify;
    }
    ul {
        margin: 3pt 0 0 16pt;
        padding: 0;
    }
    li {
        font-size: 10pt;
        color: #222;
        margin-bottom: 2pt;
        text-align: justify;
    }
    .skills-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 4pt 16pt;
        margin-top: 4pt;
    }
    .skill-cat {
        font-size: 10pt;
        color: #222;
        min-width: 30%;
    }
    .skill-cat strong {
        font-weight: bold;
        color: #1a1a1a;
    }
    .project-title {
        font-size: 10.5pt;
        font-weight: bold;
        color: #1a1a1a;
        margin-top: 6pt;
    }
    .project-tech {
        font-size: 9.5pt;
        color: #444;
        margin-bottom: 2pt;
    }
    @page { margin: 0.5in 0.6in; }
</style>
</head>
<body>

<h1><?= htmlspecialchars($name) ?></h1>
<div class="contact-line">
    <?php if ($email): ?><?= htmlspecialchars($email) ?> | <?php endif; ?>
    <?php if ($phone): ?><?= htmlspecialchars($phone) ?> | <?php endif; ?>
    <?php if ($location): ?><?= htmlspecialchars($location) ?><?php endif; ?>
    <?php if ($email): ?><br><?php endif; ?>
    <?php if ($github): ?><a href="<?= htmlspecialchars($github) ?>">GitHub</a><?php endif; ?>
    <?php if ($github && $linkedin): ?> | <?php endif; ?>
    <?php if ($linkedin): ?><a href="<?= htmlspecialchars($linkedin) ?>">LinkedIn</a><?php endif; ?>
</div>

<hr class="divider">

<?php if ($summary): ?>
<h2>Professional Summary</h2>
<p class="summary-text"><?= htmlspecialchars($summary) ?></p>
<?php endif; ?>

<h2>Experience</h2>
<?php if (empty($experience)): ?>
    <p style="font-size:10pt;color:#555;">No experience entries yet.</p>
<?php else: ?>
    <?php foreach ($experience as $exp): ?>
    <div class="entry">
        <div class="entry-header">
            <span class="entry-title"><?= htmlspecialchars($exp['title']) ?></span>
            <span class="entry-date"><?= htmlspecialchars($exp['period']) ?></span>
        </div>
        <div class="entry-org"><?= htmlspecialchars($exp['organization']) ?></div>
        <?php if (!empty($exp['description'])): ?>
        <p class="entry-desc"><?= htmlspecialchars($exp['description']) ?></p>
        <?php endif; ?>
    </div>
    <?php endforeach; ?>
<?php endif; ?>

<h2>Education</h2>
<?php if (empty($education)): ?>
    <p style="font-size:10pt;color:#555;">No education entries yet.</p>
<?php else: ?>
    <?php foreach ($education as $edu): ?>
    <div class="entry">
        <div class="entry-header">
            <span class="entry-title"><?= htmlspecialchars($edu['title']) ?></span>
            <span class="entry-date"><?= htmlspecialchars($edu['period']) ?></span>
        </div>
        <div class="entry-org"><?= htmlspecialchars($edu['organization']) ?></div>
        <?php if (!empty($edu['description'])): ?>
        <p class="entry-desc"><?= htmlspecialchars($edu['description']) ?></p>
        <?php endif; ?>
    </div>
    <?php endforeach; ?>
<?php endif; ?>

<?php if (!empty($groupedSkills)): ?>
<h2>Skills</h2>
<div class="skills-grid">
    <?php foreach ($groupedSkills as $category => $skills): ?>
    <div class="skill-cat">
        <strong><?= htmlspecialchars($category) ?>:</strong>
        <?php
            $names = array_map(fn($s) => $s['name'], $skills);
            echo htmlspecialchars(implode(', ', $names));
        ?>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<?php if (!empty($projects)): ?>
<h2>Projects</h2>
<?php foreach ($projects as $proj): ?>
<div class="entry">
    <div class="project-title"><?= htmlspecialchars($proj['title']) ?></div>
    <?php if (!empty($proj['tech_stack'])): ?>
    <div class="project-tech">
        <?php
            $techs = json_decode($proj['tech_stack'], true);
            if (is_array($techs)) echo 'Technologies: ' . htmlspecialchars(implode(', ', $techs));
        ?>
    </div>
    <?php endif; ?>
    <p class="entry-desc"><?= htmlspecialchars($proj['short_description']) ?></p>
</div>
<?php endforeach; ?>
<?php endif; ?>

</body>
</html>
