<!--
  SYNC IMPACT REPORT
  Version change: (new) → 1.0.0
  Modified principles: N/A (initial version)
  Added sections: All 5 Core Principles, Technical & Deployment Standards,
    Content & Portfolio Standards, Governance
  Removed sections: None
  Templates requiring updates:
    - .specify/templates/plan-template.md ✅ no changes needed (generic)
    - .specify/templates/spec-template.md ✅ no changes needed (generic)
    - .specify/templates/tasks-template.md ✅ no changes needed (generic)
    - .specify/templates/checklist-template.md ✅ no changes needed (generic)
  Follow-up TODOs: None
-->

# Elhabib Portfolio Constitution

## Core Principles

### I. Flat PHP Architecture

Use flat PHP architecture only. Do not use Laravel, Symfony, WordPress, or
other PHP frameworks. Use reusable includes/components. Use PDO exclusively for
database access. All database queries MUST use prepared statements. Separate
logic, templates, and configuration cleanly.

### II. Lightweight Frontend

Use TailwindCSS for styling. Use Alpine.js for lightweight interactivity. Avoid
heavy frontend frameworks. HTMX is allowed for partial updates and dashboard
actions. JavaScript MUST remain minimal and purposeful.

### III. Security-First (NON-NEGOTIABLE)

CSRF protection REQUIRED for all forms. Validate and sanitize ALL user input.
Protect admin routes with authentication middleware. Secure session handling is
mandatory. File uploads MUST validate MIME types and enforce size limits. Never
expose sensitive configuration publicly.

### IV. Performance & Mobile Excellence

Lighthouse score MUST be above 90 at all times. Prioritize fast initial load,
optimized images, lazy loading, and minimal JavaScript bundles. Responsive on
low-end devices. Mobile experience is first-class: reduced blur/animation on
mobile, touch-friendly interactions, optimized spacing, and readable
typography. Glassmorphism MUST remain performant on mobile.

### V. Design & Visual Identity

Dark modern interface with glassmorphism. Engineering dashboard aesthetics.
Deep navy backgrounds (#0b1020, #111827), electric blue accents (#2563eb,
#3b82f6), crimson/red highlights (#ef4444, #dc2626). Frosted translucent
surfaces (rgba(255,255,255,0.08)). Avoid rainbow gradients, oversaturated neon,
and excessive blur. Maintain strong contrast and readability at all times.
Typography: Space Grotesk / Inter (English), Cairo / IBM Plex Sans Arabic
(Arabic). Clean hierarchy with large readable headings and strong spacing.

## Technical & Deployment Standards

**Database**: Use MySQL or PostgreSQL. Required tables: users, projects,
project_images, posts, skills, settings, messages.

**Code Quality**: All code MUST be modular, readable, maintainable, and
consistently formatted. Avoid duplicated logic, deeply nested structures,
inline business logic inside templates, and unstructured CSS.

**Deployment**: Target Linux VPS with Nginx. Docker is optional. Support
environment configuration, secure deployment, backup strategy, and scalable
hosting structure.

**Animations**: MUST be subtle, support usability, and improve polish. Allowed:
hover transitions, glow effects, fade animations, floating gradients, smooth
section reveals. Avoid excessive motion, distracting effects, heavy particle
systems, and slow rendering.

**CMS Dashboard**: MUST feel operational and technical. Darker UI than public
website. Support full CRUD operations, image uploads, and markdown or rich text
editing. Provide project management, blog management, and SEO controls.
Aesthetic: glass sidebar, blurred panels, operational widgets, subtle
animations.

## Content & Portfolio Standards

**Portfolio Requirements**: Each project MUST include: problem statement,
architecture overview, technology stack, implementation details, challenges
solved, deployment/process details, and measurable outcomes. Projects MUST NOT
appear as simple screenshot galleries.

**Content Philosophy**: Tone MUST be technical, clear, confident, and practical.
Avoid fake startup language, exaggerated marketing language, generic buzzwords,
and meaningless claims. Emphasize production experience, infrastructure
expertise, backend engineering, operational problem solving, AI integration,
and systems thinking.

**UX Priorities (Homepage)**: Focus on identity, credibility, engineering
expertise, real-world impact, and featured projects. Required sections: Hero,
Featured Projects, Infrastructure/DevOps, Experience Timeline, Blog/Notes,
Contact.

## Governance

This constitution supersedes all other project practices and guidelines.
Amendments require documented rationale, team approval, and a migration plan
where applicable.

**Amendment Procedure**:
- Propose changes via a new branch with a spec describing the amendment.
- All amendments MUST be reviewed and approved.
- Approved amendments MUST be merged via PR.

**Versioning Policy**:
- MAJOR: Backward-incompatible governance or principle removals/redefinitions.
- MINOR: New principles/sections or materially expanded guidance.
- PATCH: Clarifications, wording, typo fixes, non-semantic refinements.

**Compliance Review**:
- All PRs/reviews MUST verify compliance with this constitution.
- Complexity MUST be justified when it conflicts with stated principles.
- Use AGENTS.md for runtime development guidance.

**Version**: 1.0.0 | **Ratified**: 2026-05-12 | **Last Amended**: 2026-05-12
