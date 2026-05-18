# Feature Specification: Terminal Geek Theme

**Feature Branch**: `002-terminal-geek-theme`
**Created**: 2026-05-18
**Status**: Draft
**Input**: User description: "make the project more linux terminal styled, with many geek and nerds things, and use cattpucchin mocha theme only"

## Clarifications

### Session 2026-05-18

- Q: How should loading states and page transitions be styled in the terminal theme? → A: Boot sequence animation for the initial homepage load, terminal spinner/progress bar for data-fetching operations (project list, blog list), silent instant transitions for simple page-to-page navigations.
- Q: How should the terminal theme handle RTL/Arabic layout for bilingual support? → A: Mirrored terminal layout for RTL — navigation bar flips to right, content padding and alignment mirror, same terminal colors and fonts are retained. The existing `dir="rtl"` CSS overrides remain active and are extended to cover the new terminal-styled UI elements.
- Q: Which content elements get systemd-style status badges? → A: Three specific elements: project cards (published/draft status), contact messages in admin dashboard (read/unread status), and a site uptime indicator in the footer or navigation bar.

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Experience Portfolio as Terminal Session (Priority: P1)

A visitor lands on the homepage and is presented with a full terminal emulator aesthetic. Instead of traditional hero sections and card grids, the page behaves like a terminal session: a `$` prompt greets them, content is displayed as command output blocks, navigation is handled via clickable prompt commands, and the entire color palette is Catppuccin Mocha. The visitor can scroll through sections that feel like `cat`-ing files, running `neofetch`, and browsing `ls -la` listings.

**Why this priority**: The terminal aesthetic is the defining characteristic of this feature. Without it, no other requirement delivers value. It is the foundation that all other stories build on.

**Independent Test**: A visitor can load the homepage, see a terminal-styled interface using only Catppuccin Mocha colors, read all portfolio content rendered as terminal output blocks, and navigate to any section without encountering any non-terminal-styled elements.

**Acceptance Scenarios**:

1. **Given** a first-time visitor, **When** they load the homepage, **Then** the background uses Catppuccin Mocha base color (#1e1e2e), text is Catppuccin Mocha Text (#cdd6f4), and all prose uses monospace font only.
2. **Given** a visitor on the homepage, **When** they scroll through the page, **Then** each content section is visually rendered as a terminal command output block (e.g., `$ neofetch` for the hero bio block, `$ ls -la ~/projects/` for the project listing).
3. **Given** a visitor viewing any content section, **When** the section header appears, **Then** it is styled as a terminal command prompt with `$ ` prefix in Catppuccin Mocha Green (#a6e3a1).

---

### User Story 2 - Navigate Using Terminal Prompt Menu (Priority: P1)

The visitor navigates the portfolio not through a traditional navbar but through a terminal prompt bar or command-based navigation. The top of the page displays a persistent terminal title bar (like tmux or GNU Screen) with "clickable command" links (e.g., `[ ~/projects ]` `[ ~/blog ]` `[ ~/about ]`). Each page transition feels like `cd`-ing into a new directory, with a command output header introducing the page content.

**Why this priority**: Navigation is a fundamental interaction. Replacing the glass navbar with a terminal prompt menu is essential to the terminal aesthetic.

**Independent Test**: A visitor can click a terminal-style navigation link, see a command-style header on the destination page, and navigate back without using any traditional dropdown or hamburger menus.

**Acceptance Scenarios**:

1. **Given** a visitor on any page, **When** they look at the top of the page, **Then** they see a terminal-style title bar (Catppuccin Mocha Surface0 background, Lavender text) containing navigation items styled as directory paths.
2. **Given** a visitor on the homepage navigation bar, **When** they click `~/projects`, **Then** they are taken to the projects page and see a header displaying `$ ls -la ~/projects/` with project content listed below.
3. **Given** a visitor on a mobile device, **When** they view the navigation, **Then** the terminal prompt bar collapses to a visible but compact format without losing readability, or uses a terminal-style drawer overlay.

---

### User Story 3 - View Project Case Study as `man` Page (Priority: P2)

A visitor navigates to a project detail page. Instead of a traditional case study layout, the content is presented as a styled `man` page. The page has a `MAN(7)` header bar, section headers like `NAME`, `SYNOPSIS`, `DESCRIPTION`, `OPTIONS` (tech stack), `EXIT STATUS` (outcomes), `BUGS` (challenges), and a `SEE ALSO` section with related projects. The content flows as terminal output with proper indentation, monospace formatting, and Catppuccin Mocha syntax highlighting.

**Why this priority**: The `man` page metaphor is a deeply geeky, recognizable format that transforms case studies into something unique and memorable. It is the flagship "nerd thing" for the feature.

**Independent Test**: A visitor can navigate from the project listing to a project detail page, immediately recognize the `man` page format, read all sections of the case study, and navigate back.

**Acceptance Scenarios**:

1. **Given** a project card on the projects page (styled as `ls -la` output), **When** the visitor clicks the project name, **Then** they are taken to a project detail page with a `MAN(7)` header bar styled with Catppuccin Mocha Mauve (#cba6f7) text on Surface0 background.
2. **Given** a visitor on the project `man` page, **When** they scroll through the content, **Then** they see sections labeled `NAME`, `SYNOPSIS`, `DESCRIPTION`, `TECH STACK`, `ARCHITECTURE`, `CHALLENGES`, `OUTCOMES`, and `SEE ALSO`, each with a standard man page section header format.
3. **Given** a visitor viewing the tech stack section, **When** they read the content, **Then** technology names are highlighted in Catppuccin Mocha Blue (#89b4fa) and descriptions in Text color.

---

### User Story 4 - Browse Blog as `tldr` Pages (Priority: P2)

The blog listing page displays posts as a `tldr`-style command summary. Each blog post card shows: a brief excerpt, publication date as a timestamp, tags as inline badges, and a `➜` prompt link to read more. The individual blog post page uses terminal styling throughout, with the content rendered as a readable terminal output.

**Why this priority**: Blog readability is important, and the `tldr` format is a recognizable terminal metaphor for consuming documentation and articles.

**Independent Test**: A visitor can browse the blog listing, identify posts from their `tldr`-style summaries, click one to read the full post, and see the entire experience in terminal styling.

**Acceptance Scenarios**:

1. **Given** a visitor on the blog page, **When** they load the page, **Then** they see a header `$ man -k blog` and a listing of posts as `tldr`-style entries with title, excerpt, date, and tags.
2. **Given** a visitor clicking a blog post, **When** the page loads, **Then** the post header displays the title, author, and date in terminal output format with Catppuccin Mocha Yellow (#f9e2af) for the title.
3. **Given** a visitor reading a blog post, **When** code blocks are present, **Then** they are rendered with Catppuccin Mocha Mantle (#181825) background and syntax highlighting using Catppuccin Mocha accent colors.

---

### User Story 5 - Admin Dashboard as Terminal Multiplexer (Priority: P3)

Mohamed logs into the CMS dashboard. The dashboard is restyled as a terminal multiplexer session (tmux-style). The sidebar is replaced with a vertical panel listing open "panes" (Dashboard, Projects, Posts, Settings, etc.) each preceded by a numbered prefix like `0: dashboard*`. The content area has a terminal title bar showing the current pane, and status bar at the bottom shows system status, user, and time. The form elements (inputs, select dropdowns, buttons) adopt terminal styling with sharp borders, monospace labels, and Catppuccin Mocha colors.

**Why this priority**: The admin dashboard is used exclusively by Mohamed. Converting it to terminal style completes the full-site theme but has no impact on public visitors. It is the lowest priority because it affects only one user.

**Independent Test**: An authenticated admin can log into the dashboard, see the tmux-style interface, navigate between management sections using the terminal pane panel, and perform CRUD operations with terminal-styled form elements.

**Acceptance Scenarios**:

1. **Given** an authenticated admin, **When** they enter the dashboard, **Then** the interface displays a tmux-style status bar at the bottom showing user, hostname, current time, and pane name, all in Catppuccin Mocha Green (#a6e3a1) on Surface0 background.
2. **Given** an admin on the dashboard, **When** they look at the left panel, **Then** they see a vertical list of "panes" (numbered 0-N) with the active pane highlighted by a `*` and Catppuccin Mocha Lavender (#b4befe) accent.
3. **Given** an admin using a form (create/edit project), **When** they fill out fields, **Then** all input fields have sharp 1px borders (Catppuccin Mocha Surface2), monospace labels in Peach (#fab387), and solid dark backgrounds (Mantle).

---

### User Story 6 - Discover Geek Easter Eggs (Priority: P3)

A visitor discovers playful geek and nerd cultural references throughout the site. These include: an ASCII art section divider (cat, Tux the penguin, or similar), a `$ whoami` output block in the hero showing developer info, a systemd-style service status indicator for the site uptime, a Matrix-style digital rain effect on the 404 page, and a "loading" animation styled as a kernel boot sequence. The footer displays `Copyright © 2026 elhabib. All rights reserved.` rendered as a `LICENSE` file block.

**Why this priority**: Easter eggs enhance the personality of the site and delight technical visitors, but they are non-critical cosmetic additions. They complete the "geek and nerds" promise.

**Independent Test**: A visitor can scroll through the homepage, encounter at least three distinct geek/nerd cultural references or easter eggs, and identify them as terminal/linux culture references.

**Acceptance Scenarios**:

1. **Given** a visitor scrolling through the homepage, **When** they reach section dividers, **Then** section divides are marked with ASCII art (e.g., Tux penguin, an ASCII cat, or a decorative ANSI border) rendered in Catppuccin Mocha Mauve.
2. **Given** a visitor on the 404 page, **When** the page loads, **Then** they see a Matrix-style digital rain animation effect in Catppuccin Mocha Green.
3. **Given** a visitor viewing the hero section, **When** they see the developer info block, **Then** it is formatted as a `neofetch` or `whoami` terminal output with system stats (name, role, location, uptime, shell) in Catppuccin Mocha colors.

---

### Edge Cases

- What happens when JavaScript is disabled? The terminal-styled layout must remain readable as static HTML with CSS-only styling (no JS-dependent animations or layouts).
- How does the terminal theme handle print styles? Print output should mimic terminal output capture (white background, black monospace text, no animations).
- What happens with very long page content in terminal format? Vertical scrolling must work naturally, and the terminal title bar should remain fixed at the top.
- How does the terminal aesthetic handle file uploads and rich media in the admin dashboard? Upload buttons stay functional but adopt terminal styling (sharp borders, monospace labels, progress rendered as ASCII progress bars).
- How does the site behave during page-to-page navigation? Simple navigations transition silently with no loading indicator. The initial homepage load and any data-fetching operation (project list, blog list) shows a terminal-style loading indicator: boot sequence animation on first visit, spinner or progress bar for subsequent data fetches.
- What happens on ultra-wide or very narrow screens? Terminal layouts must remain readable: content width is capped at typical terminal width (~80-100ch) on wide screens, and scrolls horizontally on very narrow screens to prevent line truncation.

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: System MUST apply the Catppuccin Mocha color palette as the exclusive color scheme across all public and admin pages: Base (#1e1e2e), Mantle (#181825), Crust (#11111b), Surface0 (#313244), Surface1 (#45475a), Surface2 (#585b70), Overlay0 (#6c7086), Overlay1 (#7f849c), Overlay2 (#9399b2), Subtext0 (#a6adc8), Subtext1 (#bac2de), Text (#cdd6f4), Lavender (#b4befe), Blue (#89b4fa), Sapphire (#74c7ec), Sky (#89dceb), Teal (#94e2d5), Green (#a6e3a1), Yellow (#f9e2af), Peach (#fab387), Maroon (#eba0ac), Red (#f38ba8), Mauve (#cba6f7), Pink (#f5c2e7), Flamingo (#f2cdcd), Rosewater (#f5e0dc).
- **FR-002**: System MUST replace all glassmorphism effects (backdrop blur, semi-transparent overlays, gradient backgrounds) with flat solid colors from the Catppuccin Mocha palette, with an optional CRT scan-line overlay effect.
- **FR-003**: System MUST use monospace font (JetBrains Mono or equivalent) as the primary typeface for all body text, headings, labels, and UI elements across all pages.
- **FR-004**: System MUST replace the traditional navigation bar with a terminal-style title bar (tmux/GNU Screen inspired) containing clickable navigation items styled as directory paths or pane tabs.
- **FR-005**: System MUST render each public page content section with a preceding terminal prompt line (e.g., `$ cat about.txt`, `$ ls -la ~/projects/`, `$ neofetch`) in Catppuccin Mocha Green.
- **FR-006**: System MUST present the developer hero/bio block as a `neofetch`-style or `whoami`-style terminal output display.
- **FR-007**: System MUST display project detail pages using the `man` page format with standard man section headers (NAME, SYNOPSIS, DESCRIPTION, OPTIONS, EXIT STATUS, BUGS, SEE ALSO).
- **FR-008**: System MUST display blog post listings as `tldr`-style command summary entries.
- **FR-009**: System MUST restyle the admin CMS dashboard UI as a terminal multiplexer (tmux-style) with numbered pane sidebar, terminal title bar, and status bar showing user/host/time.
- **FR-010**: System MUST style all form elements (inputs, textareas, buttons, selects) with sharp 1px Catppuccin Mocha Surface2 borders, solid Mantle backgrounds, and monospace labels.
- **FR-011**: System MUST include at least three distinct geek/nerd cultural easter eggs visible on public pages (e.g., ASCII art dividers, systemd-style status indicators, `LICENSE`-style footer, Matrix rain on 404 page).
- **FR-012**: System MUST remove all non-Catppuccin Mocha colors from CSS (no Tailwind default colors outside the palette shall be used in rendered output).
- **FR-013**: System MUST replace gradient text effects with solid Catppuccin Mocha accent colors (Mauve for headings, Blue for links, Green for prompts).
- **FR-014**: System MUST maintain responsive behavior: the terminal theme must remain readable and functional on mobile (320px+), tablet, and desktop viewports.
- **FR-020**: System MUST preserve and extend existing RTL layout support for Arabic language: navigation bar, sidebar, and all structural UI elements must mirror their positions under `dir="rtl"` while keeping the terminal color palette, fonts, and styling consistent.
- **FR-015**: System MUST provide a CSS-only fallback for users with JavaScript disabled: all terminal-styled content must render with correct colors and layout without JS.
- **FR-016**: System MUST replace rounded corners (`rounded-*` classes) with sharp corners on all UI elements to match terminal aesthetic.
- **FR-017**: System MUST render skill/progress bars as ASCII-style progress bars (e.g., `[████████░░] 80%`) in Catppuccin Mocha Teal and Surface2.
- **FR-018**: System MUST add a terminal cursor blink animation to the prompt line on the homepage.

*The Catppuccin Mocha palette is strict for all UI elements (backgrounds, text, borders, buttons, navigation, forms). Embedded images (screenshots, diagrams, photos in case studies), technology stack badges using brand colors, and third-party embedded content retain their original colors.*

- **FR-019**: System MUST add indicator badges styled as systemd service status labels (e.g., `● active`, `● inactive`) on: project cards (published/draft status), contact messages in the admin dashboard (read/unread status), and a site uptime indicator in the footer or navigation bar.

### Key Entities

This feature introduces no new data entities. It is a pure visual and thematic restyling of the existing UI. No database schema changes are required.

## Success Criteria *(mandatory)*

### Measurable Outcomes

- **SC-001**: A first-time visitor can identify the site as terminal-themed within 3 seconds of page load based on color scheme, typography, and layout alone.
- **SC-002**: Every visible pixel on all public and admin pages uses only colors from the Catppuccin Mocha palette; no default Tailwind colors, gradient backgrounds, or glassmorphism effects remain.
- **SC-003**: Navigation via terminal prompt bar is as fast and intuitive as the traditional navbar — a visitor can navigate to any section within 2 clicks.
- **SC-004**: Project case studies rendered as `man` pages contain all content sections without truncation or readability loss.
- **SC-005**: The admin dashboard retains full CRUD functionality after terminal restyling — all forms, buttons, and navigation remain usable in terminal styling.
- **SC-006**: The site passes basic accessibility checks: text contrast ratios meet WCAG AA standards using Catppuccin Mocha color combinations.
- **SC-007**: The terminal-themed layout renders correctly and remains readable on mobile, tablet, and desktop viewports without horizontal scrolling on content text.
- **SC-008**: A technical visitor can identify at least three geek/nerd cultural references within the first scroll of the homepage.
- **SC-009**: Page load performance is not degraded by the theme changes — no new heavy dependencies are introduced.

## Assumptions

- The existing TailwindCSS and Alpine.js setup will be retained; the terminal theme is applied via CSS overrides and class replacements, not a full framework swap.
- The Catppuccin Mocha palette is the only allowed color set; the existing custom CSS variables will be replaced with Catppuccin Mocha values.
- JetBrains Mono (already loaded) will become the primary body font.
- All existing functionality (contact form, CRUD operations, SEO meta tags) remains unchanged — only visual presentation is modified.
- Bilingual support (Arabic/English) is maintained and the terminal theme mirrors layout for RTL: navigation bar, sidebar, and content padding reverse direction under `dir="rtl"`.
- The `neofetch`-style hero block will display static content (not actual system information).
- The Matrix rain effect on the 404 page is a lightweight CSS/JS canvas animation, not a heavy library integration.
- Terminal prompt commands (`$ cat`, `$ ls`, etc.) are decorative and clickable as navigation aids, not functional shell interpreters.
- The admin dashboard terminal restyling affects layout and appearance only — all backend logic, session handling, and security remain unchanged.
