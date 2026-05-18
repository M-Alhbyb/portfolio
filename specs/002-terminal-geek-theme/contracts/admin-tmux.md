# Contract: tmux Admin Dashboard

**File**: `templates/layouts/admin.php` (modified)

## Behavior

- Admin dashboard layout restyled as a terminal multiplexer (tmux) session
- Left pane sidebar: vertical list of numbered panes (0: Dashboard, 1: Projects, 2: Posts, etc.)
- Active pane highlighted with `*` suffix and Lavender accent
- Content area: terminal title bar showing current section name
- Bottom status bar: user@hostname, current time, section name, in green on Surface0
- All form elements (inputs, selects, buttons) use terminal styling

## Visual Spec

- Sidebar background: Crust (#11111b), width: 220px
- Sidebar pane numbers: Green (#a6e3a1), pane names: Subtext0 (#a6adc8)
- Active pane: Lavender (#b4befe) text + `*` suffix
- Content background: Base (#1e1e2e)
- Content title bar: Surface0 (#313244), text: Lavender (#b4befe)
- Status bar: Green (#a6e3a1) on Surface0 (#313244)
- Form input background: Mantle (#181825), border: 1px Surface2 (#585b70), label: Peach (#fab387)
- Buttons: Surface1 (#45475a) background, Text (#cdd6f4) label, no rounded corners
- Font: JetBrains Mono throughout, 13px
