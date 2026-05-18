# Implementation Plan: Terminal Geek Theme

**Branch**: `002-terminal-geek-theme` | **Date**: 2026-05-18 | **Spec**: specs/002-terminal-geek-theme/spec.md
**Input**: Feature specification from `/specs/002-terminal-geek-theme/spec.md`

## Summary

Restyle the entire Elhabib Portfolio (public + admin CMS) as a Linux terminal-themed interface using the Catppuccin Mocha color palette exclusively. Replace all glassmorphism, gradient effects, and rounded corners with flat solid colors, sharp borders, monospace typography, and terminal-inspired UI metaphors (tmux navigation, man-page case studies, tldr blog listings, neofetch hero, systemd status badges). Add geek/nerd easter eggs (ASCII art, Matrix rain, boot sequence animation). Retain all existing backend logic and functionality unchanged.

## Technical Context

**Language/Version**: PHP 8.x (flat PHP, no framework)  
**Primary Dependencies**: TailwindCSS 3.x, Alpine.js 3.x, JetBrains Mono (already loaded)  
**Storage**: PostgreSQL (unchanged — no schema changes)  
**Testing**: Manual visual inspection, no automated UI testing framework in use  
**Target Platform**: Linux VPS with Nginx  
**Project Type**: Web application (PHP backend + TailwindCSS/Alpine.js frontend)  
**Performance Goals**: Lighthouse >90, no new heavy dependencies introduced  
**Constraints**: WCAG AA contrast using Catppuccin Mocha palette, CSS-only fallback for no-JS, responsive down to 320px  
**Scale/Scope**: Single-developer portfolio, 2 themes (public + admin), ~15 templates

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

| Gate (Principle) | Status | Notes |
|---|---|---|
| I. Flat PHP Architecture | ✅ PASS | No PHP changes. Pure frontend restyle. |
| II. Lightweight Frontend | ✅ PASS | Retains TailwindCSS + Alpine.js. Matrix rain is a lightweight canvas animation as per spec assumption. |
| III. Security-First | ✅ PASS | No backend changes. Security model untouched. |
| IV. Performance & Mobile | ✅ PASS | Removing glassmorphism improves performance. Spec requires responsive terminal layout with touch-friendly navigation. |
| V. Design & Visual Identity | ⚠️ OVERRIDE | Feature explicitly replaces constitution's prescribed design (glassmorphism, navy/blue palette, Inter font) with flat terminal, Catppuccin Mocha, JetBrains Mono. This is an intentional feature-level design decision that supersedes Principle V for this feature scope. All other principles remain binding. |
| CMS Dashboard Standard | ⚠️ OVERRIDE | Constitution prescribes "glass sidebar, blurred panels" for CMS. Feature replaces with tmux-style flat terminal. Same override rationale as Principle V. |

**Complexity Justification**: The terminal theme requires new CSS classes, color variable replacement, and template structure changes to navigation and layouts. This is not complexity for its own sake but the defining characteristic of the feature. Constitution Principle V's glassmorphism mandate is intentionally replaced by the feature spec.

## Project Structure

### Documentation (this feature)

```text
specs/002-terminal-geek-theme/
├── plan.md              # This file (/speckit.plan command output)
├── research.md          # Phase 0 output
├── data-model.md        # Phase 1 output (no data changes — see file)
├── quickstart.md        # Phase 1 output
├── contracts/           # Phase 1 output — UI component contracts
└── tasks.md             # Phase 2 output (/speckit.tasks command)
```

### Source Code (repository root)

```text
# Terminal Theme — modifies existing files, no new directory structure needed
public/assets/css/
├── input.css            # [MODIFY] Replace color variables, add terminal classes, remove glassmorphism
└── app.css              # [REBUILD] Compiled output

public/assets/js/
└── app.js               # [MODIFY] Add terminal cursor blink, boot sequence trigger, Matrix rain

templates/
├── layouts/
│   ├── public.php       # [MODIFY] Replace navbar include with terminal prompt bar
│   └── admin.php        # [MODIFY] Replace glass sidebar with tmux-style pane panel
├── components/
│   ├── header.php       # [MODIFY] Restyle as terminal title bar
│   ├── footer.php       # [MODIFY] Add LICENSE-style block + uptime badge
│   ├── hero.php         # [MODIFY] Convert to neofetch-style output
│   ├── project-card.php # [MODIFY] Restyle as ls -la output with systemd badge
│   ├── blog-card.php    # [MODIFY] Restyle as tldr entry
│   └── timeline-item.php# [MODIFY] Terminal-styled timeline
├── pages/
│   ├── home.php         # [MODIFY] Add prompt prefix headers to sections
│   ├── projects.php     # [MODIFY] Add `$ ls -la` header
│   ├── project-detail.php# [MODIFY] Convert to man page format
│   ├── blog.php         # [MODIFY] Add `$ man -k blog` header
│   ├── blog-post.php    # [MODIFY] Terminal-styled content
│   └── 404.php          # [MODIFY] Add Matrix rain animation
└── admin/
    └── [various]        # [MODIFY] Apply terminal styles to all admin templates
```

**Structure Decision**: No structural changes. This is a pure restyle of existing templates and CSS. No new files need creation — all changes are modifications to existing source files.

## Complexity Tracking

| Violation | Why Needed | Simpler Alternative Rejected Because |
|-----------|------------|-------------------------------------|
| Principle V override (glassmorphism → flat terminal) | Feature spec explicitly requests terminal aesthetic | Keeping glassmorphism defeats the purpose of the feature |
| CMS Dashboard standard override (glass → tmux) | Full-site consistency requires dashboard to match | A mismatched admin theme would break immersion |
