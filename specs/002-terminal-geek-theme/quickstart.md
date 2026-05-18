# Quickstart Guide: Terminal Geek Theme

## Overview

This guide provides a step-by-step implementation approach for restyling the Elhabib Portfolio with a Linux terminal aesthetic using Catppuccin Mocha colors. No new dependencies are required.

## Prerequisites

- Node.js (for TailwindCSS build pipeline)
- Working TailwindCSS build: `npm run build:css`
- Git branch: `002-terminal-geek-theme`

## Implementation Steps

### Step 1: Configure Catppuccin Mocha in Tailwind

Extend `tailwind.config.js` to add Catppuccin Mocha colors under a `cat-` prefix:

```js
theme: {
  extend: {
    colors: {
      cat: {
        base: '#1e1e2e',
        mantle: '#181825',
        crust: '#11111b',
        surface0: '#313244',
        surface1: '#45475a',
        surface2: '#585b70',
        overlay0: '#6c7086',
        overlay1: '#7f849c',
        overlay2: '#9399b2',
        subtext0: '#a6adc8',
        subtext1: '#bac2de',
        text: '#cdd6f4',
        lavender: '#b4befe',
        blue: '#89b4fa',
        sapphire: '#74c7ec',
        sky: '#89dceb',
        teal: '#94e2d5',
        green: '#a6e3a1',
        yellow: '#f9e2af',
        peach: '#fab387',
        maroon: '#eba0ac',
        red: '#f38ba8',
        mauve: '#cba6f7',
        pink: '#f5c2e7',
        flamingo: '#f2cdcd',
        rosewater: '#f5e0dc',
      }
    }
  }
}
```

### Step 2: Update input.css

Replace existing CSS variables with Catppuccin Mocha values. Remove glassmorphism classes (`.glass`, `.glass-card`). Add new terminal classes:
- `.term-panel` — solid background, 1px border, no blur
- `.term-border` — 1px solid Surface2
- `.term-prompt` — green `$ ` prefix
- `.term-cursor` — blinking block cursor animation
- `.term-status-active` — green `● active`
- `.term-status-inactive` — red `● inactive`
- `.term-man-header` — man page header bar style
- `.term-boot` — boot sequence keyframe animation
- `.term-neofetch` — neofetch ASCII art styling
- `.term-progress` — ASCII progress bar (Unicode block chars)

Remove: `.glass`, `.glass-card`, `.gradient-text`, `.gradient-border`, `.hex-bg`, `.scan-line`, `.btn-primary`, `.btn-red` (or replace with flat terminal equivalents).

### Step 3: Update Layout Templates

1. **public.php**: Replace `header.php` include with terminal title bar. Keep footer include.
2. **admin.php**: Replace glass sidebar with tmux-style pane panel. Add bottom status bar.
3. **header.php**: Rewrite as terminal title bar navigation.
4. **footer.php**: Add LICENSE-style copyright block + uptime systemd badge.

### Step 4: Update Page Templates

1. **hero.php**: Convert to neofetch-style output with ASCII art + system info.
2. **home.php**: Add `$ ` prompt headers before each content section.
3. **projects.php**: Header `$ ls -la ~/projects/`, restyle project cards.
4. **project-card.php**: Show as `ls -la` list entry with systemd badge.
5. **project-detail.php**: Full man page format with section headers.
6. **blog.php**: Header `$ man -k blog`, restyle blog cards as tldr entries.
7. **blog-card.php**: tldr-style compact entry.
8. **blog-post.php**: Terminal-styled prose with syntax-highlighted code blocks.
9. **timeline-item.php**: Terminal-styled timeline.
10. **404.php**: Add Matrix rain canvas animation.

### Step 5: Update JavaScript

1. **app.js**: Add boot sequence trigger (checks `sessionStorage` flag).
2. Add terminal cursor blink to homepage prompt.
3. Add Matrix rain controller for 404 page.
4. Ensure all Alpine.js components (form handling, gallery, skill bars) still function.

### Step 6: Rebuild CSS

Run `npm run build:css` to compile the updated `input.css` into `app.css`.

## Testing Checklist

- [ ] Every page renders with Catppuccin Mocha colors only (inspect for stray Tailwind defaults)
- [ ] No glassmorphism effects remain (backdrop-filter, bg-opacity < 1 on UI elements)
- [ ] All navigation links work via terminal title bar
- [ ] Project detail shows man page format with all sections
- [ ] Blog listing shows tldr-style entries
- [ ] Admin dashboard has tmux-style pane panel and status bar
- [ ] Mobile viewport: navigation collapses readable, content scrolls without overflow
- [ ] Arabic RTL layout: navigation flips to right, content mirrors
- [ ] JS disabled: all content visible and readable with correct colors
- [ ] Lighthouse score >90
- [ ] At least 3 easter eggs visible on homepage scroll
