# Data Model: Terminal Geek Theme

**No data model changes.** This feature is a pure visual and thematic restyling of the existing UI. No new database tables, columns, or data entities are introduced. No schema migrations are required.

## Preserved Data

All existing data entities remain unchanged:

- **User** — Admin credentials, session data
- **Project** — Case study content, images, tech stack
- **Blog Post** — Article content, metadata
- **Skill** — Technical competencies and proficiency levels
- **Message** — Contact form submissions
- **Media** — Uploaded files and images
- **Setting** — Site-wide configuration and SEO metadata

## Implementation Notes

- The `status` field on Projects and Messages (used for published/draft and read/unread states) is used by the new systemd-style status badges but requires no schema changes.
- No additional fields are needed for the terminal theme — all styling is applied at the CSS and template level.
