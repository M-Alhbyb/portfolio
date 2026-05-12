---

description: "Task list for portfolio website and CMS dashboard implementation"
---

# Tasks: Portfolio Website & CMS Dashboard

**Input**: Design documents from `specs/001-portfolio-cms/`
**Prerequisites**: plan.md (required), spec.md (required for user stories), research.md, data-model.md, contracts/routing.md, contracts/forms.md

**Tests**: Not requested in spec — manual browser validation.

**Organization**: Tasks are grouped by user story to enable independent implementation and testing of each story.

## Format: `[ID] [P?] [Story?] Description`

- **[P]**: Can run in parallel (different files, no dependencies)
- **[Story]**: Which user story this task belongs to (e.g., US1, US2, US3)
- Include exact file paths in descriptions

## Path Conventions

- **Web app**: `public/`, `app/`, `templates/` at repository root
- Paths reflect the structure from plan.md

## Phase 1: Setup (Shared Infrastructure)

**Purpose**: Project initialization and basic structure

- [X] T001 [P] Create directory structure: public/, app/, templates/, database/, config/
- [X] T002 [P] Initialize TailwindCSS input file at public/assets/css/input.css with default theme
- [X] T003 [P] Create Alpine.js app entry point at public/assets/js/app.js
- [X] T004 [P] Create environment template at config/.env.example
- [X] T005 [P] Create Nginx server block template at config/nginx/portfolio.conf
- [X] T006 [P] Create .gitignore (exclude config/database.php, uploads/, node_modules/)

---

## Phase 2: Foundational (Blocking Prerequisites)

**Purpose**: Core infrastructure that MUST be complete before ANY user story can be implemented

**⚠️ CRITICAL**: No user story work can begin until this phase is complete

- [X] T007 [P] Implement PDO wrapper singleton in app/Core/Database.php
- [X] T008 [P] Implement request router in app/Core/Router.php (method + path matching with {param} support)
- [X] T009 [P] Implement session handler in app/Core/Session.php (start, regenerate, destroy, flash messages)
- [X] T010 [P] Implement input validation helpers in app/Core/Validation.php
- [X] T011 [P] Implement SEO meta/OG helper in app/Helpers/SEO.php
- [X] T012 [P] Implement Markdown renderer in app/Helpers/Markdown.php (lightweight parser)
- [X] T013 [P] Implement Language/i18n helper in app/Helpers/Language.php (load lang files, translate key)
- [X] T014 [P] Create public layout template at templates/layouts/public.php (header, nav, footer, SEO slot)
- [X] T015 [P] Create reusable header component at templates/components/header.php (nav, language toggle slot)
- [X] T016 [P] Create reusable footer component at templates/components/footer.php (social links, copyright)
- [X] T017 [P] Create SEO meta component at templates/components/seo-meta.php (title, OG tags)
- [X] T018 [P] Create CSRF token component at templates/components/csrf-token.php (hidden input field)
- [X] T019 Implement front controller at public/index.php (require Router, dispatch routes, render layout)
- [X] T020 [P] Create base database schema at database/schema.sql (all tables from data-model.md)

**Checkpoint**: Foundation ready — user story implementation can now begin in parallel

---

## Phase 3: User Story 1 - Browse Portfolio Homepage (Priority: P1) 🎯 MVP

**Goal**: Deliver a complete homepage with hero, featured projects, infrastructure/DevOps section, experience timeline, blog preview, and contact section that communicates Mohamed's engineering expertise.

**Independent Test**: A visitor can load the homepage, view all required sections, and understand who Mohamed is within 30 seconds.

### Implementation

- [X] T021 [P] [US1] Create database config loader at app/Config/database.php
- [X] T022 [P] [US1] Create app config loader at app/Config/app.php
- [X] T023 [P] [US1] Create Project model with read operations in app/Models/Project.php (findFeatured, findBySlug, findAll)
- [X] T024 [P] [US1] Create Setting model in app/Models/Setting.php (get/set by key, group, locale)
- [X] T025 [P] [US1] Create Skill model in app/Models/Skill.php (findByCategory, findAll)
- [X] T026 [P] [US1] Create Post model with read operations in app/Models/Post.php (findPublished, findRecent)
- [X] T027 [US1] Implement HomeController with index action in app/Controllers/HomeController.php
- [X] T028 [US1] Create homepage template at templates/pages/home.php (compose all sections)
- [X] T029 [US1] Create hero section partial at templates/components/hero.php (intro, CTAs, terminal-inspired visual)
- [X] T030 [P] [US1] Create project card component at templates/components/project-card.php
- [X] T031 [P] [US1] Create timeline item component at templates/components/timeline-item.php
- [X] T032 [P] [US1] Create blog card component at templates/components/blog-card.php
- [X] T033 [US1] Create infrastructure/DevOps visual section in templates/pages/home.php (CSS architecture blocks)
- [X] T034 [US1] Add featured projects grid section to homepage template
- [X] T035 [US1] Add contact section with form and social links to homepage template
- [X] T036 [US1] Register homepage routes in public/index.php

**Checkpoint**: Homepage renders with all sections. Hero, featured projects, infrastructure, timeline, blog preview, and contact sections display correctly with data from database.

---

## Phase 4: User Story 2 - View Project Case Study (Priority: P1)

**Goal**: Deliver a detailed project case study page with problem statement, architecture, tech stack, implementation, challenges, deployment, and outcomes.

**Independent Test**: A visitor can click a project card on the homepage and navigate to a full case study page with all required sections.

### Implementation

- [X] T037 [P] [US2] Create ProjectImage model in app/Models/ProjectImage.php (findByProjectId)
- [X] T038 [US2] Implement ProjectController with index and show actions in app/Controllers/ProjectController.php
- [X] T039 [US2] Create projects list template at templates/pages/projects.php
- [X] T040 [US2] Create project detail template at templates/pages/project-detail.php (all case study sections + gallery)
- [X] T041 [US2] Register project routes in public/index.php

**Checkpoint**: Project list and case study pages render with full content and image gallery.

---

## Phase 5: User Story 3 - Manage Content via CMS Dashboard (Priority: P1)

**Goal**: Deliver a fully functional admin dashboard with authentication, CRUD operations for all content types, media management, and content export.

**Independent Test**: An authenticated admin can log in, perform a full CRUD cycle for a project and a blog post, manage media, and export content.

### Implementation

- [X] T042 [P] [US3] Implement authentication middleware in app/Core/Auth.php (login check, session validation)
- [X] T043 [US3] Implement admin auth controller in app/Admin/AuthController.php (login, authenticate, logout)
- [X] T044 [US3] Implement admin dashboard controller in app/Admin/DashboardController.php (index with summary widgets)
- [X] T045 [US3] Create admin layout template at templates/layouts/admin.php (glass sidebar, header, content area)
- [X] T046 [US3] Create admin login template at templates/admin/login.php
- [X] T047 [US3] Create admin dashboard template at templates/admin/dashboard.php (widgets: total projects, posts, unread messages)
- [X] T048 [P] [US3] Create User model in app/Models/User.php (findByUsername, verifyPassword, updateLastLogin)
- [X] T049 [P] [US3] Create Media model in app/Models/Media.php (CRUD operations)
- [X] T050 [US3] Implement admin project CRUD controller in app/Admin/ProjectController.php (CRUD with image upload)
- [X] T051 [US3] Create admin project list template at templates/admin/projects/index.php
- [X] T052 [US3] Create admin project form template at templates/admin/projects/form.php (create/edit)
- [X] T053 [US3] Implement admin post CRUD controller in app/Admin/PostController.php (CRUD with categories/tags)
- [X] T054 [US3] Create admin post list template at templates/admin/posts/index.php
- [X] T055 [US3] Create admin post form template at templates/admin/posts/form.php (create/edit)
- [X] T056 [US3] Implement admin skill CRUD controller in app/Admin/SkillController.php
- [X] T057 [US3] Create admin skill management template at templates/admin/skills.php
- [X] T058 [US3] Implement admin message controller in app/Admin/MessageController.php (list, show, markRead, delete)
- [X] T059 [US3] Create admin message inbox template at templates/admin/messages/index.php
- [X] T060 [US3] Create admin message detail template at templates/admin/messages/show.php
- [X] T061 [US3] Implement admin media controller in app/Admin/MediaController.php (upload, delete, list with thumbnails)
- [X] T062 [US3] Create admin media library template at templates/admin/media/index.php
- [X] T063 [US3] Implement admin settings controller in app/Admin/SettingController.php (list, update all groups)
- [X] T064 [US3] Create admin settings template at templates/admin/settings.php (SEO, homepage, social tabs)
- [X] T065 [US3] Implement image upload handling in app/Admin/MediaController.php (MIME validation, size check, resize)
- [X] T066 [US3] Implement content export helper in app/Helpers/Export.php (JSON/CSV generation)
- [X] T067 [US3] Implement admin export controller in app/Admin/ExportController.php (index, download)
- [X] T068 [US3] Create admin export template at templates/admin/export.php
- [X] T069 [US3] Lock admin routes behind Auth middleware in public/index.php (route group prefix /admin)
- [X] T070 [US3] Register all admin routes in public/index.php
- [X] T071 [US3] Create seed data SQL at database/seed.sql (default admin user, initial settings)

**Checkpoint**: Full CMS dashboard operational. Admin can manage all content types, upload images, and export data.

---

## Phase 6: User Story 4 - Contact via Form (Priority: P2)

**Goal**: Deliver a contact form with validation, rate limiting, spam protection, and messages visible in the CMS dashboard.

**Independent Test**: A visitor can submit the contact form, receive confirmation, and the admin can see the message in the dashboard.

### Implementation

- [X] T072 [P] [US4] Create Message model in app/Models/Message.php (CRUD, markRead)
- [X] T073 [US4] Implement contact form display in ContactController (index action) in app/Controllers/ContactController.php
- [X] T074 [US4] Implement contact form submission handler in app/Controllers/ContactController.php (validate, rate limit, store)
- [X] T075 [US4] Create contact page template at templates/pages/contact.php (form + social links)
- [X] T076 [US4] Implement rate limiting (max 1 per IP per 300s) and honeypot anti-spam in contact submission
- [X] T077 [US4] Register contact routes in public/index.php

**Checkpoint**: Contact form accepts submissions with validation, stores messages, and they appear in admin dashboard.

---

## Phase 7: User Story 5 - Browse Blog (Priority: P2)

**Goal**: Deliver a blog with category/tag filtering, individual post pages, and proper SEO metadata.

**Independent Test**: A visitor can browse blog posts, filter by category, and read a full post with correct Open Graph tags.

### Implementation

- [X] T078 [P] [US5] Create Category model in app/Models/Category.php (CRUD, findByName)
- [X] T079 [P] [US5] Create Tag model in app/Models/Tag.php (CRUD, findByName)
- [X] T080 [US5] Implement BlogController with index and show in app/Controllers/BlogController.php (filtering, pagination)
- [X] T081 [US5] Create blog list template at templates/pages/blog.php (filterable grid with category/tag)
- [X] T082 [US5] Create blog post detail template at templates/pages/blog-post.php (content, meta, share)
- [X] T083 [P] [US5] Create pagination component at templates/components/pagination.php
- [X] T084 [US5] Register blog routes in public/index.php
- [X] T085 [US5] Add blog post dynamic OG meta tags via Helpers/SEO.php integration in blog post template

**Checkpoint**: Blog renders with filterable list and full post pages with correct social preview metadata.

---

## Phase 8: User Story 6 - Switch Language (Priority: P3)

**Goal**: Deliver bilingual support with language toggle that switches all public content between Arabic and English with correct RTL/LTR layout.

**Independent Test**: A visitor on any public page can toggle languages and see all content switch with correct layout direction.

### Implementation

- [X] T086 [US6] Implement LanguageController in app/Controllers/LanguageController.php (switch locale in session)
- [X] T087 [P] [US6] Create English translation file at lang/en.php (all UI strings)
- [X] T088 [P] [US6] Create Arabic translation file at lang/ar.php (all UI strings, RTL-aware)
- [X] T089 [US6] Create language switcher component at templates/components/language-switcher.php
- [X] T090 [US6] Wire language switcher into header component at templates/components/header.php
- [X] T091 [US6] Add RTL CSS support in public/assets/css/input.css (html[dir="rtl"] overrides for glassmorphism)
- [X] T092 [US6] Register language switch route in public/index.php
- [X] T093 [US6] Apply locale-aware content loading across all public controllers (use Language helper for UI strings)

**Checkpoint**: Language toggle works on all pages. Arabic RTL layout renders correctly without broken elements.

---

## Phase 9: User Story 7 - View About Page (Priority: P3)

**Goal**: Deliver an about page with professional story, engineering philosophy, infrastructure mindset, learning journey, and volunteering sections.

**Independent Test**: A visitor can navigate to the about page and view all content sections.

### Implementation

- [X] T094 [US7] Implement AboutController in app/Controllers/AboutController.php (load settings for about content)
- [X] T095 [US7] Create about page template at templates/pages/about.php (all sections: story, philosophy, mindset, journey, volunteering)
- [X] T096 [US7] Register about route in public/index.php

**Checkpoint**: About page renders all sections with content managed via CMS settings.

---

## Phase 10: Polish & Cross-Cutting Concerns

**Purpose**: Improvements that affect multiple user stories

- [X] T097 [P] Implement SEO sitemap controller at app/Controllers/SEOController.php (dynamic XML sitemap)
- [X] T098 [P] Implement robots.txt controller at app/Controllers/SEOController.php (robots action)
- [X] T099 [P] Create 404 error page at templates/pages/404.php
- [X] T100 [P] Create 500 error page at templates/pages/500.php
- [X] T101 [P] Add 404/500 error handling in public/index.php router
- [X] T102 [P] Handle empty states in templates (no projects, no posts, no messages)
- [X] T103 [P] Finalize database/schema.sql with all tables, indexes, and foreign keys
- [X] T104 [P] Finalize config/nginx/portfolio.conf with HTTPS, PHP-FPM, assets caching, uploads size limit
- [X] T105 [P] Verify glassmorphism CSS is performant on mobile (test backdrop-filter, reduced blur)
- [X] T106 [P] Verify Lighthouse score targets (90+ performance, accessibility, best practices)
- [X] T107 [P] Run quickstart.md validation: clean install from scratch following all steps

---

## Dependencies & Execution Order

### Phase Dependencies

- **Setup (Phase 1)**: No dependencies — can start immediately
- **Foundational (Phase 2)**: Depends on Setup completion — BLOCKS all user stories
- **User Stories (Phase 3-9)**: All depend on Foundational phase completion
  - User stories proceed in priority order: US1 → US2 → US3 → US4 → US5 → US6 → US7
  - US1 (homepage) must be first since all other public pages reuse its components
  - US2 (case study) depends on US1 (project card from homepage links to detail page)
  - US3 (CMS) depends on US2 (CMS project CRUD feeds the public pages)
  - US4 (contact) is independent — can start after Foundational
  - US5 (blog) is independent — can start after Foundational
  - US6 (language) touches all pages — best done after core pages are built
  - US7 (about) is independent — can start after Foundational
- **Polish (Phase 10)**: Depends on all desired user stories

### User Story Dependencies

- **US1 - Homepage (P1)**: Can start after Foundational — BLOCKS US2, US6, US7
- **US2 - Case Study (P1)**: Depends on US1 (project cards link from homepage) — BLOCKS US3
- **US3 - CMS Dashboard (P1)**: Depends on US2 (projects in CMS feed public case studies)
- **US4 - Contact Form (P2)**: Independent — can start after Foundational
- **US5 - Blog (P2)**: Independent — can start after Foundational
- **US6 - Language Switch (P3)**: Depends on US1 (language switcher in header)
- **US7 - About Page (P3)**: Depends on US1 (nav link from header)

### Within Each User Story

- Models before controllers
- Controllers before templates
- Templates before route registration
- Story complete before moving to next priority

### Parallel Opportunities

- All Phase 1 tasks can run in parallel
- All Phase 2 [P] tasks can run in parallel
- US4 and US5 can run in parallel with each other (after Foundational, before US3 completes)
- Within each user story, [P] marked tasks can run in parallel

---

## Implementation Strategy

### MVP First (User Story 1 Only)

1. Complete Phase 1: Setup
2. Complete Phase 2: Foundational (CRITICAL — blocks all stories)
3. Complete Phase 3: User Story 1 (Homepage)
4. **STOP and VALIDATE**: Homepage renders with all sections
5. Deploy/demo if ready

### Incremental Delivery

1. Complete Setup + Foundational → Foundation ready
2. Add US1 (Homepage) → MVP — deployable homepage!
3. Add US2 (Case Study) → Core portfolio pages complete
4. Add US3 (CMS Dashboard) → Full content management
5. Add US4 (Contact) + US5 (Blog) → Interactive features
6. Add US6 (Language) + US7 (About) → Complete platform

### Parallel Team Strategy

With multiple developers:
1. Team completes Setup + Foundational together
2. Once Foundational is done:
   - Developer A: US1 → US2 → US3 (core portfolio pipeline)
   - Developer B: US4 (contact) + US7 (about) (independent pages)
   - Developer C: US5 (blog) + US6 (language) (content features)
3. Team reunites for Phase 10: Polish

---

## Notes

- [P] tasks = different files, no dependencies
- [Story] label maps task to specific user story for traceability
- Each user story is independently completable and testable
- No test tasks generated (manual validation per spec)
- Commit after each task or logical group
- Stop at any checkpoint to validate story independently
- Avoid: vague tasks, same file conflicts, cross-story dependencies that break independence
