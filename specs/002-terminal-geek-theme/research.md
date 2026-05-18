# Research: Terminal Geek Theme

## Design Decisions

### Decision: Catppuccin Mocha Color Token Mapping

**Decision**: Map the 26 Catppuccin Mocha colors to TailwindCSS custom properties, replacing all existing color variables.

**Rationale**: TailwindCSS v3 uses utility classes that reference named colors. Rather than replacing every utility class in templates (e.g., `text-blue-500` → `text-cat-blue`), define Catppuccin Mocha colors as CSS custom properties and extend the Tailwind theme config to add a `cat-` color namespace (e.g., `text-cat-base`, `bg-cat-surface0`, `border-cat-lavender`). This keeps template changes minimal and allows gradual adoption.

**Alternatives considered**:
- Complete utility class search-and-replace (too brittle, high risk of missed classes)
- Keep existing Tailwind colors and override via CSS cascade (confusing, hard to audit)
- CSS variables only, no Tailwind integration (loses Tailwind's JIT and responsive variants)

### Decision: Navigation — Terminal Title Bar vs Dropdown Menu

**Decision**: Persistent terminal title bar at the top of every page, collapsing to a compact status bar on mobile (<640px) with a hamburger-triggered terminal-styled drawer.

**Rationale**: A tmux/GNU Screen-style title bar is immediately recognizable to technical users. On mobile, the available width requires collapsing navigation items while preserving the terminal aesthetic.

**Alternatives considered**:
- Full-screen terminal emulator with command input (over-engineered, harms accessibility)
- Fixed left sidebar like tmux (consumes too much space on content-focused portfolio)
- No persistent navigation (requires back-button-only flow — defeats SC-003)

### Decision: man Page Layout for Case Studies

**Decision**: Project detail pages display content in a CSS-styled man page format with `MAN(7)` header, section headers, and terminal indentation. No actual man page compilation or troff rendering.

**Rationale**: The man page metaphor is purely visual — content is still stored as structured HTML/CSS in templates. Styling with monospace text, section headers like `NAME:` and `DESCRIPTION:`, and proper indentation achieves the recognizable aesthetic without toolchain complexity.

**Alternatives considered**:
- Render actual troff/man pages via a server-side tool (over-engineered, maintenance burden)
- iframe embedding terminal output (breaks responsive layout)
- Plain text output (loses interactivity and styling)

### Decision: Matrix Rain Implementation

**Decision**: Lightweight `<canvas>` element with falling Katakana/Hiragana character columns in Catppuccin Mocha Green (#a6e3a1). Triggered on 404 page load. ~50 lines of vanilla JS, no library.

**Rationale**: Canvas-based Matrix rain is a well-known pattern with minimal performance impact. At 60fps on a 404 page (rarely visited), it adds delightful geek flavor without degrading Lighthouse scores. Dark background + green characters fits Catppuccin Mocha.

**Alternatives considered**:
- CSS-only falling animation (limited visual fidelity)
- Pre-rendered animated GIF (no color control, larger payload)

### Decision: Boot Sequence Animation

**Decision**: CSS-only "boot sequence" text reveal on initial homepage load: lines of terminal boot messages fade in sequentially (e.g., `[OK] Mounting filesystems...`, `[OK] Starting neofetch...`) for ~2 seconds, then transition to the main page content. No JS required.

**Rationale**: A CSS keyframe animation with staggered `animation-delay` achieves the boot effect without JavaScript. The animation runs once per session (stored in `sessionStorage` flag). Does not impact performance on subsequent navigations.

**Alternatives considered**:
- JS-driven typing animation (more overhead, fails without JS)
- Real system boot output (impractical, no actual boot process to display)

### Decision: CSS Architecture

**Decision**: Replace existing custom CSS variables in `input.css` with Catppuccin Mocha values. Remove glassmorphism classes (`.glass`, `.glass-card`) and replace with flat terminal equivalents (`.term-panel`, `.term-border`). Keep existing gradient classes for backward compatibility during transition, then remove.

**Rationale**: The existing `input.css` has ~306 lines of custom CSS organized as variables, utility classes, and RTL overrides. Replacing variables and adding terminal classes is cleaner than rewriting from scratch. The RTL overrides remain active.

**Constitution Consideration**: Principle V (Design & Visual Identity) is intentionally overridden per the plan's Complexity Tracking. This is an accepted tradeoff for the feature.

### Decision: ASCII Art Dividers

**Decision**: Use CSS `::before` pseudo-elements with `content` property to render small ASCII art section dividers (Tux penguin, decorative line borders). Rendered in Catppuccin Mocha Mauve (#cba6f7).

**Rationale**: Pseudo-elements keep ASCII art in CSS, not templates, avoiding markup bloat. Mauve provides visual separation without competing with content text (Text/#cdd6f4).

**Alternatives considered**:
- Inline `<pre>` blocks in templates (adds markup noise)
- SVG art (heavier, more complex to create/edit)
- Unicode box-drawing characters (CSS pseudo-elements + Unicode achieves the same effect)

## Implementation Order

1. `input.css` — Color variables, new terminal classes, remove glassmorphism
2. `tailwind.config.js` — Add Catppuccin Mocha color extension
3. `public.php` layout — Replace navbar with terminal title bar
4. `header.php` — Restyle as terminal prompt navigation
5. `footer.php` — Add LICENSE block + uptime badge
6. `hero.php` — Convert to neofetch-style output
7. `home.php` — Add prompt prefix headers to sections
8. `project-card.php` + `projects.php` — ls -la listing + systemd badges
9. `project-detail.php` — man page format
10. `blog-card.php` + `blog.php` — tldr-style entries
11. `blog-post.php` — Terminal-styled prose
12. `timeline-item.php` — Terminal-styled timeline
13. `admin.php` layout — tmux-style pane sidebar + status bar
14. Admin templates — Terminal-styled forms and tables
15. `404.php` — Matrix rain canvas animation
16. `app.js` — Boot sequence trigger, cursor blink, Matrix rain controller
