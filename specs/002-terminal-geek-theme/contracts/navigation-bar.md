# Contract: Terminal Prompt Navigation Bar

**File**: `templates/components/header.php` (modified)
**Related layout**: `templates/layouts/public.php`

## Behavior

- Renders a fixed-position terminal title bar at the top of all public pages
- Styled like tmux/GNU Screen status bar: `[ 0: ~/home*  1: ~/projects  2: ~/blog  3: ~/about  4: ~/contact ]`
- Active page pane marked with `*` suffix
- Navigation items are clickable links to their respective routes
- On mobile (<640px): collapses to show only active pane name + hamburger toggle
- Language switcher (EN/AR) appears as a pane on the right side

## Visual Spec

- Background: Surface0 (#313244)
- Text: Lavender (#b4befe)
- Active pane: Green text (#a6e3a1) with `*`
- Separators: spaces between bracketed items
- Font: JetBrains Mono, 14px
- Border-bottom: 1px solid Surface1 (#45475a)
- Height: 36px (standard tmux bar height)
- No rounded corners
