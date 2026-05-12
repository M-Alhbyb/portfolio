# Feature Specification: Portfolio Website & CMS Dashboard

**Feature Branch**: `001-portfolio-cms`
**Created**: 2026-05-12
**Status**: Draft
**Input**: User description: "Create a complete specification for a personal portfolio website and custom CMS dashboard for Mohamed Elhabib, a Full Stack Web Developer specialized in backend systems, DevOps, Linux infrastructure, AI integrations, and production operations."

## Clarifications

### Session 2026-05-12

- Q: Admin password & session security policy? → A: Strong: min 8 chars with complexity, 30min idle timeout, lockout after 5 failed attempts
- Q: Content backup & export strategy? → A: Manual export (JSON/CSV) from dashboard with DB backup documented

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Browse Portfolio Homepage (Priority: P1)

A first-time visitor lands on the homepage. They see the hero section with Mohamed's professional introduction, role, and value proposition. They scroll through featured engineering case studies, an infrastructure/DevOps capabilities section, an interactive experience timeline, a preview of recent blog posts, and a contact section. The experience feels like exploring an engineering control center.

**Why this priority**: The homepage is the primary entry point and must immediately communicate credibility, expertise, and production experience to recruiters, technical founders, and clients.

**Independent Test**: A visitor can load the homepage, view all required sections (hero, featured projects, infrastructure, timeline, blog preview, contact), and understand who Mohamed is and what he does within 30 seconds, without any broken content or layout issues.

**Acceptance Scenarios**:

1. **Given** a first-time visitor, **When** they load the homepage, **Then** the hero section displays the name, role, title, and a short value proposition with CTA buttons.
2. **Given** a visitor on the homepage, **When** they scroll past the hero, **Then** they see a grid of featured project cards, each with preview image, summary, technology tags, and a "view case study" action.
3. **Given** a visitor on the homepage, **When** they scroll further, **Then** they see an infrastructure/DevOps section with visual architecture blocks or diagrams explaining Docker workflows, reverse proxy, backend systems, and deployment pipelines.
4. **Given** a visitor on the homepage, **When** they continue scrolling, **Then** they see an interactive vertical timeline showing freelance work, company roles, and DevOps milestones.
5. **Given** a visitor on the homepage, **When** they reach the bottom, **Then** they see a blog preview section showing recent post titles and a contact section with form and social links.

---

### User Story 2 - View Project Case Study (Priority: P1)

A visitor clicks on a featured project card from the homepage or navigates to the projects section. They are taken to a detailed case study page that reads like an engineering postmortem: problem statement, architecture overview, technology stack, implementation details, challenges solved, deployment notes, and measurable outcomes.

**Why this priority**: Detailed case studies are the core differentiator. They prove real production experience and engineering depth to technical audiences.

**Independent Test**: A visitor can navigate from the homepage project card to a full case study page and read all required sections without encountering missing content or broken navigation.

**Acceptance Scenarios**:

1. **Given** a project card on the homepage, **When** the visitor clicks "view case study", **Then** they are taken to a dedicated project page with a full URL slug.
2. **Given** a visitor on a case study page, **When** the page loads, **Then** they see: problem statement, architecture overview, technology stack, implementation details, challenges solved, deployment/process details, and measurable outcomes.
3. **Given** a case study with gallery images, **When** the visitor views the page, **Then** images are lazy-loaded and displayed in a gallery format.

---

### User Story 3 - Manage Content via CMS Dashboard (Priority: P1)

Mohamed logs into a protected admin dashboard. He sees an operational control panel with sidebar navigation. He can create, read, update, and delete projects and blog posts. He manages uploaded media, skills, homepage content, SEO settings, and reviews contact messages. The dashboard feels like a production operations console.

**Why this priority**: Without the CMS, the portfolio cannot be maintained or updated independently. It is the backbone of the entire platform.

**Independent Test**: An authenticated admin can log in, navigate to any content management section, perform a complete CRUD cycle (create, view, edit, delete), and log out securely.

**Acceptance Scenarios**:

1. **Given** an unauthenticated user, **When** they navigate to the admin dashboard URL, **Then** they are redirected to a login form.
2. **Given** valid credentials, **When** the user submits the login form, **Then** they are authenticated and redirected to the dashboard home.
3. **Given** an authenticated admin, **When** they navigate to the projects manager, **Then** they see a list of all projects with create, edit, and delete actions.
4. **Given** an admin on the create project form, **When** they fill in all required fields and submit, **Then** the project is saved, a thumbnail can be uploaded, and they are redirected to the project list with a success message.
5. **Given** an admin viewing a project detail, **When** they click edit, modify fields, and save, **Then** the changes are persisted and reflected on the public site.
6. **Given** an admin viewing a project, **When** they click delete and confirm, **Then** the project is removed from the database and no longer appears on the public site.

---

### User Story 4 - Contact via Form (Priority: P2)

A visitor fills out the contact form with their name, email, and message, then submits it. The system stores the message, shows a confirmation to the visitor, and the message becomes available in the CMS dashboard for Mohamed to review and respond.

**Why this priority**: The contact form is a key conversion point for freelance clients and recruiters. It must be reliable and frictionless.

**Independent Test**: A visitor can fill out all required form fields, submit, receive confirmation feedback, and an admin can see the submitted message in the dashboard.

**Acceptance Scenarios**:

1. **Given** a visitor on the contact page, **When** they submit the form with valid name, email, and message, **Then** they see a success confirmation within 3 seconds.
2. **Given** a visitor submitting the contact form, **When** they leave required fields empty, **Then** they see inline validation errors and the form is not submitted.
3. **Given** a submitted contact message, **When** an admin logs into the dashboard and navigates to messages, **Then** they see the message with sender details, timestamp, and can mark it as read or delete it.

---

### User Story 5 - Browse Blog (Priority: P2)

A visitor navigates to the blog section. They see a list of posts with titles, excerpt, featured images, categories, and tags. They can filter by category or tag, click a post to read the full content, and view SEO metadata including Open Graph data when shared.

**Why this priority**: The blog demonstrates ongoing learning and expertise in Linux, DevOps, infrastructure recovery, and AI integration. It keeps the site fresh and improves SEO.

**Independent Test**: A visitor can browse the blog list, filter by a category, click a post to read its full content on a dedicated page, and share the link with correct Open Graph preview.

**Acceptance Scenarios**:

1. **Given** a visitor on the blog page, **When** the page loads, **Then** they see a list of published posts sorted by date, each with title, excerpt, featured image, category, and tags.
2. **Given** a visitor browsing blog posts, **When** they click a category or tag filter, **Then** the list updates to show only matching posts.
3. **Given** a visitor on a single blog post page, **When** the page loads, **Then** they see the full content, publish date, author, categories, tags, and a featured image.
4. **Given** a blog post URL, **When** shared on social media, **Then** Open Graph meta tags render the correct title, description, and image.

---

### User Story 6 - Switch Language (Priority: P3)

A visitor clicks a language toggle to switch between Arabic and English. All visible content switches to the selected language, and the layout adjusts between LTR and RTL modes seamlessly.

**Why this priority**: Bilingual support expands the audience and demonstrates attention to accessibility and regional users. It is valuable but secondary to core portfolio functionality.

**Independent Test**: A visitor on any public page can toggle the language, see all visible content switch, and observe correct RTL/LTR layout without broken elements.

**Acceptance Scenarios**:

1. **Given** a visitor viewing the site in English, **When** they click the Arabic toggle, **Then** all visible text content switches to Arabic and the layout changes to RTL.
2. **Given** a visitor viewing the site in Arabic, **When** they click the English toggle, **Then** all visible text content switches to English and the layout changes to LTR.
3. **Given** a visitor switches language, **When** they navigate to another page, **Then** the language preference is preserved for the session.

---

### User Story 7 - View About Page (Priority: P3)

A visitor navigates to the about page. They read Mohamed's professional story, engineering philosophy, infrastructure mindset, learning journey, and volunteering/leadership experience. The page reinforces credibility and personal connection.

**Why this priority**: Builds trust and personal connection with visitors, but content is static and less critical than case studies and the homepage.

**Independent Test**: A visitor can navigate to the about page and view all sections without broken content.

**Acceptance Scenarios**:

1. **Given** a visitor, **When** they navigate to the about page, **Then** they see: professional story, engineering philosophy, infrastructure mindset, learning journey, and volunteering/leadership sections.
2. **Given** a visitor on the about page, **When** the content exceeds viewport, **Then** they can scroll through all sections.

---

### Edge Cases

- What happens when a project case study has no gallery images? The gallery section should gracefully hide or show a placeholder.
- How does the system handle special characters or Arabic text in URLs? Slugs must support both languages without breaking routing.
- What happens when the admin session expires mid-edit? The system should redirect to login and preserve form state if possible, or at minimum not lose data.
- How does the contact form handle spam submissions? Implement rate limiting per IP and basic honeypot field.
- How does the system handle brute-force login attempts? Lock the account for 15 minutes after 5 consecutive failed attempts.
- What happens when an uploaded image exceeds the size limit? The system rejects the upload with a clear error message.
- How does the site behave when no projects or blog posts exist? Empty states should show helpful placeholder messages, not broken layouts.

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: System MUST display a homepage with all required sections: hero, featured projects, infrastructure/DevOps, experience timeline, blog preview, and contact.
- **FR-002**: System MUST render detailed project case study pages with: problem statement, architecture overview, technology stack, implementation details, challenges solved, deployment details, and measurable outcomes.
- **FR-003**: System MUST support a project gallery with multiple images per project.
- **FR-004**: System MUST provide a blog with support for categories, tags, featured images, and SEO metadata.
- **FR-005**: System MUST allow visitors to filter blog posts by category and tag.
- **FR-006**: System MUST include an about page with professional story, philosophy, infrastructure mindset, learning journey, and volunteering sections.
- **FR-007**: System MUST provide a contact form with fields for name, email, and message, with client-side and server-side validation.
- **FR-008**: System MUST display social links (GitHub, LinkedIn, WhatsApp, email) on the contact page.
- **FR-009**: System MUST authenticate admin users before granting access to any CMS dashboard routes.
- **FR-010**: System MUST provide full CRUD operations for: projects, blog posts, skills, homepage content, SEO settings, uploaded media, and contact messages.
- **FR-011**: System MUST support image uploads with MIME type validation and file size limits.
- **FR-012**: System MUST support bilingual content in Arabic and English with proper RTL and LTR layout switching.
- **FR-013**: System MUST generate a sitemap.xml and robots.txt for search engines.
- **FR-014**: System MUST include dynamic Open Graph and meta tags on all public pages.
- **FR-015**: System MUST implement CSRF protection on all form submissions.
- **FR-016**: System MUST implement rate limiting on the contact form to prevent abuse.
- **FR-017**: System MUST provide a responsive layout that works on mobile, tablet, and desktop devices.
- **FR-018**: System MUST support draft/publish states for projects and blog posts.
- **FR-019**: System MUST preserve language preference across the session.
- **FR-020**: System MUST display empty states with helpful messages when content lists have no items.
- **FR-021**: System MUST enforce admin password policy: minimum 8 characters with mixed case, digits, and special characters.
- **FR-022**: System MUST terminate admin sessions after 30 minutes of inactivity and redirect to login.
- **FR-023**: System MUST lock admin access for 15 minutes after 5 consecutive failed login attempts.
- **FR-024**: System MUST provide a dashboard export action that downloads all content as structured JSON/CSV archives.

### Key Entities

- **User**: Admin user account with credentials for accessing the CMS dashboard. Has role-based access (admin only for MVP).
- **Project**: A detailed engineering case study. Contains title, slug, thumbnail, gallery images, short description, full case study content, tech stack, architecture details, deployment notes, challenges, outcomes, and publish status.
- **Blog Post**: A published article. Contains title, slug, content, featured image, category, tags, SEO metadata, publish date, and status (draft/published).
- **Skill**: A technical skill or competency displayed on the site. Contains name, category, proficiency level, and display order.
- **Message**: A contact form submission. Contains sender name, email, message body, timestamp, and read status.
- **Media**: An uploaded file (image, document). Contains filename, file path, MIME type, file size, and upload timestamp.
- **Setting**: Site-wide configuration. Contains key-value pairs for SEO defaults, homepage content blocks, site metadata, and language settings.

## Success Criteria *(mandatory)*

### Measurable Outcomes

- **SC-001**: A first-time visitor can understand the developer's expertise and view a featured case study within 30 seconds of landing on the homepage.
- **SC-002**: Each project case study page renders all required sections (problem, architecture, tech stack, implementation, challenges, deployment, outcomes) without missing content.
- **SC-003**: An authenticated admin can complete a full CRUD cycle (create, edit, view, delete) for a project or blog post in under 5 minutes.
- **SC-004**: Contact form submissions complete successfully and display confirmation to the visitor within 3 seconds.
- **SC-005**: Language toggle switches all visible page content with correct RTL/LTR layout within 1 second with no broken elements.
- **SC-006**: All public pages load with semantic HTML structure and render correct Open Graph meta tags when shared on social platforms.
- **SC-007**: The site renders correctly and remains usable on mobile, tablet, and desktop viewports without horizontal scrolling or overlapping elements.
- **SC-008**: Unauthenticated users cannot access any admin dashboard page; they are redirected to the login form.

## Assumptions

- The site will be self-hosted on a Linux VPS with the admin maintaining the server.
- Content (projects, blog posts, skills) will be created and managed by Mohamed exclusively through the CMS dashboard.
- The bilingual implementation covers all public-facing text; admin dashboard UI can remain in English only.
- Contact form submissions are stored and viewed in the dashboard; email notification is a future enhancement.
- Image uploads are limited to standard web formats (JPEG, PNG, WebP, GIF) with a maximum file size of 5MB.
- The site does not require a public user registration system or multi-author support.
- Social links (GitHub, LinkedIn, WhatsApp, email) are static and configured via the CMS settings.
- The experience timeline content is managed through the CMS and can be updated as career progresses.
