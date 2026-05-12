# Research: Portfolio Website & CMS Dashboard

## Technical Decisions

### Decision: PHP 8.1+ with Flat Architecture

**Decision**: Use PHP 8.1+ with no frameworks. PDO for database access.

**Rationale**: Constitution mandates flat PHP only. PHP 8.1 provides named
arguments, enums, readonly properties, and fibers which improve code quality
without a framework.

**Alternatives considered**: Laravel/Symfony (rejected by constitution),
WordPress (rejected by constitution).

---

### Decision: TailwindCSS v3 via CDN (Build)

**Decision**: Use TailwindCSS v3 with a build step (Tailwind CLI or Vite) for
production optimization, with the CDN play CDN option available for rapid
prototyping.

**Rationale**: Full TailwindCSS build pipeline produces minimal CSS (purging
unused classes) which aligns with Lighthouse 90+ targets. CDN-only approach
would ship all classes and hurt performance.

**Alternatives considered**: Tailwind CDN only (rejected: too large for
production), raw CSS (rejected: loses utility-first advantage).

---

### Decision: PostgreSQL as Primary Database

**Decision**: PostgreSQL for production; MySQL-compatible schema documented
for users who prefer MySQL.

**Rationale**: Constitution allows either. PostgreSQL offers better JSON
support (useful for flexible content fields), superior full-text search
(future blog search), and stronger reliability guarantees for the admin's
Linux VPS environment.

**Alternatives considered**: MySQL (documented as fallback).

---

### Decision: Multilingual i18n via PHP Arrays

**Decision**: Use PHP associative arrays in language files for translations.
Key structure: `lang/en.php` and `lang/ar.php`. Language preference stored in
session.

**Rationale**: No framework means no i18n library. PHP arrays are the simplest
approach that separates translation content from logic. Session-based
preference is stateless-friendly and works with Nginx caching.

**Alternatives considered**: JSON translation files (more parsing overhead),
Database-stored translations (overkill for single-admin portfolio).

---

### Decision: Nginx + PHP-FPM Configuration

**Decision**: Standard Nginx server block with `try_files` routing to
`public/index.php` for all non-asset URLs.

**Rationale**: Nginx is the mandated server. A single front controller pattern
keeps routing centralized and simple.

**Alternatives considered**: Apache with .htaccess (rejected: Nginx mandated),
Multiple PHP entry points (rejected: harder to maintain auth middleware).

---

### Decision: Blog Content as Markdown

**Decision**: Store blog post content as Markdown in the database. Render to
HTML server-side with a lightweight Markdown parser.

**Rationale**: Spec requires "markdown or rich text". Markdown is simpler to
implement, store, and validate than rich HTML. No client-side editor library
needed (fits minimal JS principle).

**Alternatives considered**: Rich text / HTML (requires editor library, more
complex sanitization), Plain text (too limited).
