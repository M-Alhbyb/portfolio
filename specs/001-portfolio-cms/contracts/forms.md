# Form Input Contracts: Portfolio Website & CMS Dashboard

All forms require CSRF token validation. Tokens are generated per-session
and embedded as hidden fields.

## Public Form: Contact

| Field | Type | Required | Validation |
|-------|------|----------|------------|
| name | text | Yes | 2-100 chars |
| email | email | Yes | Valid email format, max 255 chars |
| message | textarea | Yes | 10-5000 chars |
| csrf_token | hidden | Yes | Must match session token |
| honeypot | hidden | No | Must be empty (anti-spam) |

**Rate limiting**: Max 1 submission per IP per 300 seconds.

**Response**: JSON `{ "success": true }` or `{ "success": false, "errors": {...} }`.

---

## Admin Form: Login

| Field | Type | Required | Validation |
|-------|------|----------|------------|
| username | text | Yes | 1-50 chars |
| password | password | Yes | 1-255 chars |
| csrf_token | hidden | Yes | Must match session token |

**Lockout**: After 5 failed attempts, block for 15 minutes.

**Response**: Redirect to `/admin` on success, back to `/admin/login` with
error on failure.

---

## Admin Form: Project Create/Edit

| Field | Type | Required | Notes |
|-------|------|----------|-------|
| title | text | Yes | Max 200 chars |
| slug | text | Yes | Auto-generated from title if empty |
| short_description | textarea | Yes | Max 500 chars |
| content | textarea | Yes | Markdown, min 100 chars when publishing |
| tech_stack | text | No | JSON string array |
| architecture_details | textarea | No | Markdown |
| deployment_notes | textarea | No | Markdown |
| challenges | textarea | No | Markdown |
| outcomes | textarea | No | Markdown |
| thumbnail | file | No | Image, max 5MB, MIME: JPEG/PNG/WebP/GIF |
| status | select | Yes | draft or published |
| featured | checkbox | No | boolean |
| sort_order | number | No | integer |
| gallery[] | file[] | No | Multiple images, same constraints as thumbnail |
| csrf_token | hidden | Yes | |

---

## Admin Form: Blog Post Create/Edit

| Field | Type | Required | Notes |
|-------|------|----------|-------|
| title | text | Yes | Max 200 chars |
| slug | text | Yes | Auto-generated from title if empty |
| content | textarea | Yes | Markdown, min 100 chars when publishing |
| excerpt | textarea | No | Max 500 chars |
| featured_image | file | No | Image, max 5MB |
| status | select | Yes | draft or published |
| category_ids | select[] | No | Multiple category IDs |
| tag_ids | select[] | No | Multiple tag IDs |
| meta_title | text | No | Max 70 chars |
| meta_description | textarea | No | Max 160 chars |
| og_image | file | No | Image for social sharing |
| locale | select | Yes | en or ar |
| csrf_token | hidden | Yes | |

---

## Admin Form: Skills

| Field | Type | Required | Notes |
|-------|------|----------|-------|
| name | text | Yes | Max 100 chars |
| category | select | Yes | e.g., Backend, DevOps, Frontend |
| proficiency | number | Yes | 1-100 |
| icon | text | No | Icon identifier string |
| sort_order | number | No | integer |
| csrf_token | hidden | Yes | |

---

## Admin Form: Settings

| Field | Type | Required | Notes |
|-------|------|----------|-------|
| key | text | Yes | Setting key, must be unique |
| value | text | Yes | Setting value |
| group | select | Yes | seo, homepage, social, general |
| locale | select | No | en, ar, or both |
| csrf_token | hidden | Yes | |

Settings are managed as key-value pairs. Multiple settings can be updated
in a single request by sending an array of `{ key, value }`.
