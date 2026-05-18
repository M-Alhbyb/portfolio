# Contract: man Page Case Study

**File**: `templates/pages/project-detail.php` (modified)

## Behavior

- Renders project detail as a styled UNIX man page
- Header bar: `PROJECT-NAME(7)` with description line
- Sections: `NAME`, `SYNOPSIS`, `DESCRIPTION`, `TECH STACK`, `ARCHITECTURE`, `CHALLENGES`, `OUTCOMES`, `SEE ALSO`
- Content flows as terminal output with consistent indentation
- Links remain clickable (styled as underlined text)
- No interactive man page pager — content is fully scrollable

## Visual Spec

- Header bar background: Surface0 (#313244)
- Header bar text: Mauve (#cba6f7) for `PROJECT-NAME(7)`, Subtext0 for description
- Section headers (e.g., `NAME`): Yellow (#f9e2af), bold, followed by `:`
- Body text: Text (#cdd6f4)
- Tech stack items: Blue (#89b4fa)
- Code blocks: Mantle (#181825) background, Teal (#94e2d5) text
- Borders: 1px Surface2 (#585b70)
- Max-width: 90ch
- Font: JetBrains Mono, 15px body
- Indentation: 3 spaces per section level
