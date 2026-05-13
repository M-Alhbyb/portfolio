# Data Model: Portfolio Website & CMS Dashboard

## Entity Relationship Summary

```
User 1──* Project        User 1──* Post
User 1──* Media
User 1──* Message (read status)

Project 1──* ProjectImage
Project *──* Skill (via project_skills join)

Post *──* Category (via post_categories join)
Post *──* Tag (via post_tags join)
```

---

## Entities

### User

Represents the admin user for CMS authentication.

| Field | Type | Constraints | Notes |
|-------|------|-------------|-------|
| id | INT | PK, AUTO_INCREMENT | |
| username | VARCHAR(50) | UNIQUE, NOT NULL | |
| email | VARCHAR(255) | UNIQUE, NOT NULL | |
| password_hash | VARCHAR(255) | NOT NULL | bcrypt hashed |
| display_name | VARCHAR(100) | NOT NULL | |
| created_at | TIMESTAMP | NOT NULL, DEFAULT NOW() | |
| updated_at | TIMESTAMP | ON UPDATE NOW() | |
| last_login | TIMESTAMP | NULL | |

**Validation**: Password min 8 chars, mixed case + digits + special chars.
Lockout after 5 failed attempts for 15 minutes.

**Relationships**:
- Has many Projects (created_by)
- Has many Posts (created_by)
- Has many Media (uploaded_by)
- Has many Messages (read_by)

---

### Project

A detailed engineering case study.

| Field | Type | Constraints | Notes |
|-------|------|-------------|-------|
| id | INT | PK, AUTO_INCREMENT | |
| user_id | INT | FK → users.id, NOT NULL | |
| title | VARCHAR(200) | NOT NULL | |
| slug | VARCHAR(200) | UNIQUE, NOT NULL | URL-friendly |
| short_description | TEXT | NOT NULL | Card summary |
| content | TEXT | NOT NULL | Full case study (Markdown) |
| tech_stack | TEXT | NULL | JSON array of technologies |
| architecture_details | TEXT | NULL | Markdown |
| deployment_notes | TEXT | NULL | Markdown |
| challenges | TEXT | NULL | Markdown |
| outcomes | TEXT | NULL | Markdown (measurable) |
| thumbnail | VARCHAR(255) | NULL | Path to thumbnail image |
| status | ENUM('draft','published') | NOT NULL, DEFAULT 'draft' | |
| featured | BOOLEAN | DEFAULT FALSE | Show on homepage |
| sort_order | INT | DEFAULT 0 | |
| created_at | TIMESTAMP | NOT NULL, DEFAULT NOW() | |
| updated_at | TIMESTAMP | ON UPDATE NOW() | |
| published_at | TIMESTAMP | NULL | |

**Validation**: Slug must be unique, support Arabic/English characters.
Title max 200 chars. Content min 100 chars when published.

**Relationships**:
- Belongs to User
- Has many ProjectImages
- Has many Skills (via project_skills)

---

### ProjectImage

Gallery images for a project.

| Field | Type | Constraints | Notes |
|-------|------|-------------|-------|
| id | INT | PK, AUTO_INCREMENT | |
| project_id | INT | FK → projects.id, NOT NULL, ON DELETE CASCADE | |
| filename | VARCHAR(255) | NOT NULL | Original filename |
| filepath | VARCHAR(255) | NOT NULL | Storage path |
| mime_type | VARCHAR(50) | NOT NULL | |
| file_size | INT | NOT NULL | Bytes |
| alt_text | VARCHAR(200) | NULL | For accessibility |
| sort_order | INT | DEFAULT 0 | Display order |
| created_at | TIMESTAMP | NOT NULL, DEFAULT NOW() | |

**Validation**: MIME must be JPEG, PNG, WebP, GIF. Max 5MB per file.

**Relationships**:
- Belongs to Project

---

### Post

A blog article.

| Field | Type | Constraints | Notes |
|-------|------|-------------|-------|
| id | INT | PK, AUTO_INCREMENT | |
| user_id | INT | FK → users.id, NOT NULL | |
| title | VARCHAR(200) | NOT NULL | |
| slug | VARCHAR(200) | UNIQUE, NOT NULL | URL-friendly |
| content | TEXT | NOT NULL | Markdown |
| excerpt | VARCHAR(500) | NULL | Short preview |
| featured_image | VARCHAR(255) | NULL | |
| status | ENUM('draft','published') | NOT NULL, DEFAULT 'draft' | |
| meta_title | VARCHAR(70) | NULL | SEO |
| meta_description | VARCHAR(160) | NULL | SEO |
| og_image | VARCHAR(255) | NULL | Open Graph image |
| locale | ENUM('en','ar') | NOT NULL, DEFAULT 'en' | Language |
| created_at | TIMESTAMP | NOT NULL, DEFAULT NOW() | |
| updated_at | TIMESTAMP | ON UPDATE NOW() | |
| published_at | TIMESTAMP | NULL | |

**Validation**: Slug unique across locale. Meta fields max lengths as noted.

**Relationships**:
- Belongs to User
- Has many Categories (via post_categories)
- Has many Tags (via post_tags)

---

### Category

Blog post categories.

| Field | Type | Constraints | Notes |
|-------|------|-------------|-------|
| id | INT | PK, AUTO_INCREMENT | |
| name | VARCHAR(100) | NOT NULL | |
| slug | VARCHAR(100) | UNIQUE, NOT NULL | |
| description | VARCHAR(255) | NULL | |
| created_at | TIMESTAMP | NOT NULL, DEFAULT NOW() | |

**Relationships**:
- Has many Posts (via post_categories)

---

### Tag

Blog post tags.

| Field | Type | Constraints | Notes |
|-------|------|-------------|-------|
| id | INT | PK, AUTO_INCREMENT | |
| name | VARCHAR(50) | NOT NULL | |
| slug | VARCHAR(50) | UNIQUE, NOT NULL | |
| created_at | TIMESTAMP | NOT NULL, DEFAULT NOW() | |

**Relationships**:
- Has many Posts (via post_tags)

---

### Skill

Technical skills displayed on the site.

| Field | Type | Constraints | Notes |
|-------|------|-------------|-------|
| id | INT | PK, AUTO_INCREMENT | |
| name | VARCHAR(100) | NOT NULL | |
| category | VARCHAR(50) | NOT NULL | e.g., "Backend", "DevOps", "Frontend" |
| proficiency | INT | NOT NULL, 1-100 | Display percentage |
| icon | VARCHAR(50) | NULL | Icon identifier |
| sort_order | INT | DEFAULT 0 | |
| created_at | TIMESTAMP | NOT NULL, DEFAULT NOW() | |

**Relationships**:
- Has many Projects (via project_skills)

---

### Message

Contact form submission.

| Field | Type | Constraints | Notes |
|-------|------|-------------|-------|
| id | INT | PK, AUTO_INCREMENT | |
| name | VARCHAR(100) | NOT NULL | |
| email | VARCHAR(255) | NOT NULL | |
| message | TEXT | NOT NULL | |
| is_read | BOOLEAN | DEFAULT FALSE | |
| read_by | INT | FK → users.id, NULL | |
| read_at | TIMESTAMP | NULL | |
| ip_address | VARCHAR(45) | NULL | For rate limiting |
| created_at | TIMESTAMP | NOT NULL, DEFAULT NOW() | |

**Validation**: Valid email format. Message min 10 chars. Max 1 per IP per
5 minutes (rate limiting).

---

### Media

Uploaded files (images, documents).

| Field | Type | Constraints | Notes |
|-------|------|-------------|-------|
| id | INT | PK, AUTO_INCREMENT | |
| user_id | INT | FK → users.id, NULL | Uploader |
| filename | VARCHAR(255) | NOT NULL | Original name |
| filepath | VARCHAR(255) | NOT NULL | Storage path |
| mime_type | VARCHAR(50) | NOT NULL | |
| file_size | INT | NOT NULL | Bytes |
| width | INT | NULL | For images |
| height | INT | NULL | For images |
| alt_text | VARCHAR(200) | NULL | |
| created_at | TIMESTAMP | NOT NULL, DEFAULT NOW() | |

**Validation**: Allowed MIME: image/jpeg, image/png, image/webp, image/gif.
Max 5MB per file.

---

### Setting

Site-wide configuration key-value store.

| Field | Type | Constraints | Notes |
|-------|------|-------------|-------|
| id | INT | PK, AUTO_INCREMENT | |
| key | VARCHAR(100) | UNIQUE, NOT NULL | |
| value | TEXT | NULL | |
| group | VARCHAR(50) | NOT NULL | e.g., "seo", "homepage", "social" |
| locale | ENUM('en','ar','both') | DEFAULT 'both' | |
| created_at | TIMESTAMP | NOT NULL, DEFAULT NOW() | |
| updated_at | TIMESTAMP | ON UPDATE NOW() | |

**Predefined keys**: `site_title`, `site_description`, `hero_title_en`,
`hero_title_ar`, `hero_subtitle_en`, `hero_subtitle_ar`,
`social_github`, `social_linkedin`, `social_whatsapp`, `social_email`,
`meta_keywords`, `ga_id` (optional), `homepage_intro_en`,
`homepage_intro_ar`.

---

### Junction Tables

#### project_skills

| Field | Type | Constraints |
|-------|------|-------------|
| project_id | INT | FK → projects.id, ON DELETE CASCADE |
| skill_id | INT | FK → skills.id, ON DELETE CASCADE |
| PK | | (project_id, skill_id) |

#### post_categories

| Field | Type | Constraints |
|-------|------|-------------|
| post_id | INT | FK → posts.id, ON DELETE CASCADE |
| category_id | INT | FK → categories.id, ON DELETE CASCADE |
| PK | | (post_id, category_id) |

#### post_tags

| Field | Type | Constraints |
|-------|------|-------------|
| post_id | INT | FK → posts.id, ON DELETE CASCADE |
| tag_id | INT | FK → tags.id, ON DELETE CASCADE |
| PK | | (post_id, tag_id) |

---

## State Transitions

### Project / Post Status

```
draft ──→ published
  ↑          │
  └──────────┘
  (can unpublish back to draft)
```

- **draft**: Visible only in CMS. Not in sitemap. Not indexed.
- **published**: Visible on public site. Included in sitemap. Indexable.

### Message Read Status

```
unread ──→ read
(field: is_read = false → true)
```
