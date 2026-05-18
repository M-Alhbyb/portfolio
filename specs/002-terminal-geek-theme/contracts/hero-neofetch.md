# Contract: neofetch Hero Block

**File**: `templates/components/hero.php` (modified)
**Related**: `templates/pages/home.php`

## Behavior

- Displays developer bio as a `neofetch`-style ASCII block replacing the current hero section
- Left column: ASCII art logo (Tux or "ELHABIB" ASCII text art)
- Right column: system-info-style key-value pairs (name, role, location, email, shell, uptime)
- Below the info block: clickable prompt commands as CTAs (e.g., `$ ./projects --list`, `$ cat about.txt`)

## Visual Spec

- Background: Base (#1e1e2e)
- ASCII art: Mauve (#cba6f7)
- Key labels (left column, e.g., `Name:`): Blue (#89b4fa)
- Values (right column, e.g., `Mohamed Elhabib`): Text (#cdd6f4)
- Prompt commands: Green (#a6e3a1)
- Full viewport height (min-h-screen)
- Content centered vertically and horizontally
- Max-width: 80ch (terminal-like readability)
- Font: JetBrains Mono throughout
