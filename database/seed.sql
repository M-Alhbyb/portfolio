-- Elhabib Portfolio - Complete Seed Data

-- Admin user (password: mohpsh00)
INSERT OR IGNORE INTO users (username, email, password_hash, display_name)
VALUES ('admin', 'admin@elhabib.dev', '$2y$12$rxMvgE3jO5t6PSVCodwC.e4sMf9fLYuQoHOVZmp3bSe2JNjq.0BPq', 'Admin')
;

INSERT OR IGNORE INTO skills (name, category, proficiency, icon, sort_order) VALUES
-- AI & Automation
('LLM Integrations', 'AI & Automation', 70, NULL, 1),
('AI Agents', 'AI & Automation', 65, NULL, 2),
('MCP Workflows', 'AI & Automation', 62, NULL, 3),
('Prompt Engineering', 'AI & Automation', 75, NULL, 4),
('Gemini API Integration', 'AI & Automation', 72, NULL, 5),
('AI Automation', 'AI & Automation', 70, NULL, 6),
('AI-Assisted Development', 'AI & Automation', 75, NULL, 7),
('Spec-Driven Development', 'AI & Automation', 68, NULL, 8),
-- Architecture & Concepts
('System Architecture', 'Architecture & Concepts', 80, NULL, 1),
('Async Programming', 'Architecture & Concepts', 78, NULL, 2),
('ERP Systems', 'Architecture & Concepts', 76, NULL, 3),
('POS Systems', 'Architecture & Concepts', 78, NULL, 4),
('Financial Systems', 'Architecture & Concepts', 78, NULL, 5),
('API Integration', 'Architecture & Concepts', 82, NULL, 6),
('Database Design', 'Architecture & Concepts', 82, NULL, 7),
-- Backend
('Python', 'Backend', 90, NULL, 1),
('FastAPI', 'Backend', 82, NULL, 2),
('Django', 'Backend', 86, NULL, 3),
('Django REST Framework', 'Backend', 82, NULL, 4),
('Laravel', 'Backend', 68, NULL, 5),
('REST APIs', 'Backend', 87, NULL, 6),
('SQLAlchemy', 'Backend', 75, NULL, 7),
('Celery', 'Backend', 78, NULL, 8),
('AI Integration', 'Backend', 68, NULL, 9),
-- Database
('PostgreSQL', 'Database', 85, NULL, 1),
('MySQL', 'Database', 74, NULL, 2),
-- Frontend
('HTML', 'Frontend', 85, NULL, 1),
('CSS', 'Frontend', 82, NULL, 2),
('JavaScript', 'Frontend', 80, NULL, 3),
('TailwindCSS', 'Frontend', 80, NULL, 4),
('Bootstrap', 'Frontend', 70, NULL, 5),
('HTMX', 'Frontend', 76, NULL, 6),
('React', 'Frontend', 65, NULL, 7),
-- DevOps
('Git', 'DevOps', 87, NULL, 1),
('Linux', 'DevOps', 90, NULL, 2),
('Docker', 'DevOps', 85, NULL, 3),
('Redis', 'DevOps', 78, NULL, 4),
('Alembic', 'DevOps', 68, NULL, 5),
('Nginx', 'DevOps', 78, NULL, 6),
('GitHub Actions', 'DevOps', 75, NULL, 7),
('CI/CD', 'DevOps', 78, NULL, 8),
('Bash', 'DevOps', 80, NULL, 9),
('PM2', 'DevOps', 68, NULL, 10),
('VPS Management', 'DevOps', 78, NULL, 11),
-- Soft
('Analytical Thinking', 'Soft Skills', 82, NULL, 1),
('Team Leadership', 'Soft Skills', 76, NULL, 2),
('Communication Skills', 'Soft Skills', 82, NULL, 3),
('Project Coordination', 'Soft Skills', 78, NULL, 4),
('Adaptability', 'Soft Skills', 83, NULL, 5),
('Critical Thinking', 'Soft Skills', 80, NULL, 6),
('Attention to Detail', 'Soft Skills', 85, NULL, 7),
('Client Communication', 'Soft Skills', 80, NULL, 8),
('Fast Learning', 'Soft Skills', 82, NULL, 9)
;

INSERT OR IGNORE INTO timeline (type, period, title, organization, description, place, work_type, link, logo, sort_order) VALUES
('experience', 'Dec 2025 - Present', 'Full Stack Web Developer', 'Masirat Kum Company', 'Led core platform development serving 500+ users using Python and Django, streamlined DevOps workflows reducing deployment time by 60%, optimized PostgreSQL and Redis performance cutting query latency by 40%, and incorporated AI-powered platform features.', 'Riyadh, Saudi Arabia', 'Remote', 'https://cevehat.com', NULL, 1),
('experience', 'Jan 2026 - Present', 'Infrastructure & DevOps Lead', 'Finjan Investment LLC.', 'Directed infrastructure recovery operations in Qatar, migrated 28 breached websites to AWS infrastructure, secured +25 production systems, and coordinated technical crisis management for an enterprise portfolio.', 'Doha, Qatar', 'Remote', 'https://finjan.vc', NULL, 2),
('experience', 'Nov 2025 - Jan 2026', 'Junior Full Stack Developer', 'Elexplatform.online', 'Completed a full-stack training project gaining hands-on experience with Django, deployment workflows, and asynchronous backend architecture.', 'Portsudan, Sudan.', 'On-site', 'https://elexplatform.online', NULL, 3),
('experience', 'Sept 2025 - Present', 'IT Intern', 'Esh3ark', 'Gained hands-on experience in FinTech environments, studied system maintenance and web security protocols, and learned SEO optimization techniques in a production setting.', 'Portsudan, Sudan.', 'Hybrid', 'https://esh3ark.com', NULL, 4),
('experience', 'Sep 2025 - Present', 'Freelance Web Developer & Systems Administrator', 'Independent', 'Developed POS systems and inventory platforms for 5+ businesses, and administered Linux infrastructure and production hosting across 10+ servers.', '', 'Remote', NULL, NULL, 5),
('education', '2026 - Present', 'Bachelor of Information Technology', 'Sudan Open University', 'Currently studying Information Technology with focus on software systems and technical infrastructure.', 'Sudan', '', 'https://www.ous.edu.sd/', NULL, 6),
('education', '2019 - 2024', 'Bachelor of Arabic Language and Literature', 'Omdurman Islamic University', 'Graduated with honors and excellent academic performance.', 'Omdurman, Sudan', '', 'https://oiu.edu.sd', NULL, 7)
;

INSERT OR IGNORE INTO volunteering (title, organization, description, place, start_date, end_date, link, sort_order) VALUES
('Field Operations & Campaign Coordinator', 'Takaful Charity Organization', 'Graduate of the Leadership Preparation Program, Batch 4. Managed and coordinated 5 field teams during Ramadan aid campaigns. Prepared operational and financial daily reports. Supervised field operations and solved team coordination issues. Supervised more than 30 charity kitchens serving over 1500 families daily during Ramadan. Managed distribution operations for Eid campaigns benefiting more than 700 families. Designed social media and campaign materials for multiple initiatives.', 'Sudan', '2021', 'Present', NULL, 1),
('Co-Founder & Secretary General', 'Sawaed Al-Dhad Charity Association', 'Co-founder and Secretary General of the association. Managed winter clothing and food support initiatives. Participated in fundraising campaign planning and coordination. Supported more than 100 families through charitable initiatives. Prepared operational and organizational reports.', 'Sudan', '2022', '2022', NULL, 2),
('Media & Event Organization Volunteer', 'Khutwa Charity Foundation', 'Participated in media and event organization activities. Assisted with graphic design and initiative support activities. Contributed to organizational event coordination.', 'Omdurman, Sudan', '2021', '2021', NULL, 3),
('Deputy Media Supervisor', 'Arabic Language Faculty Committee', 'Elected Deputy Media Supervisor. Designed media materials and student activity graphics. Participated in organizing student receptions, sports events, and cultural activities.', 'Omdurman Islamic University', '2022', '2022', NULL, 4)
;

INSERT OR IGNORE INTO languages (name, proficiency, sort_order) VALUES
('English', 'Upper Intermediate', 1),
('Arabic', 'Native', 2)
;

INSERT OR IGNORE INTO projects (user_id, title, slug, short_description, content, tech_stack, architecture_details, deployment_notes, challenges, outcomes, thumbnail, link, status, featured, sort_order, created_at) VALUES
(
    1,
    'ETamkeen365',
    'etamkeen365',
    'Adaptive intervention and family-support platform for children with developmental challenges using deterministic rule-based assessment and planning across 20+ Django modules.',
    'ETamkeen365 is an adaptive intervention and caregiver-support platform designed for children with developmental, behavioral, cognitive, sensory, and learning challenges.

The platform helps caregivers, specialists, and administrators collaborate through structured assessments, adaptive intervention plans, progress tracking, reassessment workflows, and operational monitoring.

The system was intentionally designed using a deterministic-first architecture where progression logic, assessments, scoring, and intervention decisions are rule-based and auditable before any optional AI enhancement layer.

The platform supports complete intervention lifecycles including onboarding, assessments, functional age estimation, adaptive plan generation, daily intervention execution, reassessment scheduling, adherence monitoring, notifications, and operational analytics.

Architecture Details:

Modular Django monolith architecture with 20+ domain modules
Django REST Framework backend with service-layer architecture
React + TypeScript frontend with modular dashboard systems
PostgreSQL database with lifecycle-safe state transitions
Celery and Redis for deterministic scheduling and operational tasks
Zustand state management for frontend workflows
Ownership-first permission architecture and append-only audit logs
Arabic RTL support with modular dashboard views

Challenges Solved:

Designing deterministic intervention workflows instead of unsafe autonomous AI behavior
Managing adaptive progression while preserving explainability and operational safety
Building reassessment and adherence systems with lifecycle-safe transitions
Structuring operational recovery and auditability systems
Handling complex caregiver, specialist, and administrator workflows in one platform

Deployment & Process Notes:

Security hardening and lifecycle testing integrated throughout development
Gradual rollout strategy with reversible deployment steps
Continuous monitoring and operational recovery procedures

Measurable Outcomes:

Implemented a rule-based intervention platform with full audit trails and lifecycle management
Delivered complete reassessment and adherence tracking systems
Built deterministic operational workflows suitable for caregiving environments
Established 20+ modular Django domains for long-term platform expansion',
    '["Django","Django REST Framework","React","TypeScript","PostgreSQL","Celery","Redis","Zustand"]',
    'Modular Django monolith architecture with 20+ domain modules. Django REST Framework backend with service-layer architecture. React + TypeScript frontend with modular dashboard systems. PostgreSQL database with lifecycle-safe state transitions. Celery and Redis for deterministic scheduling and operational tasks. Zustand state management for frontend workflows. Ownership-first permission architecture and append-only audit logs. Arabic RTL support with modular dashboard views.',
    'Security hardening and lifecycle testing integrated throughout development. Gradual rollout strategy with reversible deployment steps. Continuous monitoring and operational recovery procedures.',
    'Designing deterministic intervention workflows instead of unsafe autonomous AI behavior. Managing adaptive progression while preserving explainability and operational safety. Building reassessment and adherence systems with lifecycle-safe transitions. Structuring operational recovery and auditability systems. Handling complex caregiver, specialist, and administrator workflows in one platform.',
    'Implemented a rule-based intervention platform with full audit trails and lifecycle management. Delivered complete reassessment and adherence tracking systems. Built deterministic operational workflows suitable for caregiving environments. Established 20+ modular Django domains for long-term platform expansion.',
    NULL,
    'https://etamkeen.net',
    'published',
    true,
    1,
    CURRENT_TIMESTAMP
),
(
    1,
    'Manfith Logistics Platform',
    'manfith-logistics-platform',
    'Bilingual Saudi logistics marketplace connecting cargo owners with customs clearance, transport, and storage providers through real-time coordination workflows.',
    'Manfith is a large-scale logistics platform built for the Saudi market to connect cargo owners with customs clearance offices, transportation companies, storage yards, and logistics providers.

The system centralizes logistics workflows across sea ports, airports, and land crossings through a unified bilingual platform supporting operational management, negotiations, contracts, and real-time communication.

The project was structured as a monorepo containing backend APIs, a marketing website, and a multi-role operational dashboard.

The platform includes real-time chat, notifications, OTP authentication, multilingual support, analytics dashboards, employee management, and operational reporting.

Architecture Details:

Monorepo architecture with separated backend, website, and dashboard applications
Express.js backend with Sequelize ORM and MySQL database
Vue 3 frontend architecture using Vite and TailwindCSS
Socket.io real-time communication system
JWT authentication with OTP email verification workflows
Role-based access control with granular permissions
CI/CD automation using GitHub Actions and PM2 deployment pipelines
Arabic-first localization with RTL support

Challenges Solved:

Managing large operational workflows across multiple logistics providers
Building bilingual Arabic/English interfaces with RTL support
Implementing real-time communication and notifications
Structuring multi-role operational dashboards for vendors, clients, and administrators
Designing unified workflows across diverse logistics actors

Deployment & Process Notes:

CI/CD deployment pipelines using GitHub Actions
PM2-managed production backend infrastructure
Multi-application deployment architecture
Built for real-world operational logistics workflows

Measurable Outcomes:

Centralized logistics workflows into a unified platform
Enabled operational coordination between cargo owners, clearance offices, transport, and storage providers
Delivered multi-role dashboards and real-time communication systems for the Saudi logistics market',
    '["Node.js","Express.js","MySQL","Sequelize","Vue 3","TailwindCSS","Socket.io","JWT"]',
    'Monorepo architecture with separated backend, website, and dashboard applications. Express.js backend with Sequelize ORM and MySQL database. Vue 3 frontend architecture using Vite and TailwindCSS. Socket.io real-time communication system. JWT authentication with OTP email verification workflows. Role-based access control with granular permissions. CI/CD automation using GitHub Actions and PM2 deployment pipelines. Arabic-first localization with RTL support.',
    'CI/CD deployment pipelines using GitHub Actions. PM2-managed production backend infrastructure. Multi-application deployment architecture. Built for real-world operational logistics workflows.',
    'Managing large operational workflows across multiple logistics providers. Building bilingual Arabic/English interfaces with RTL support. Implementing real-time communication and notifications. Structuring multi-role operational dashboards for vendors, clients, and administrators. Designing unified workflows across diverse logistics actors.',
    'Centralized logistics workflows into a unified platform. Enabled operational coordination between cargo owners, clearance offices, transport, and storage providers. Delivered multi-role dashboards and real-time communication systems for the Saudi logistics market.',
    NULL,
    'https://manfith.com',
    'published',
    true,
    2,
    CURRENT_TIMESTAMP
),
(
    1,
    'EZOO POS System',
    'ezoo-pos-system',
    'POS and inventory backend for Rayon Energy built with FastAPI using Decimal-based financial calculations and immutable transaction records.',
    '**Repository:** [GitHub - M-Alhbyb/ezoo_pos](https://github.com/M-Alhbyb/ezoo_pos)

EZOO POS is a backend-focused point-of-sale and inventory system built for Rayon Energy, a company specializing in solar equipment and electrical supplies.

The system was developed using FastAPI with asynchronous database operations to handle concurrent usage across multiple terminals.

Financial precision was enforced through Decimal arithmetic instead of floating-point calculations, preventing rounding errors in pricing, fees, and VAT.

The project includes inventory management, transaction processing, fee calculations, VAT support, immutable sales records, and structured validation using Pydantic schemas.

The backend architecture enforces explicit business rules and backend authority over all financial calculations.',
    '["FastAPI","Python","PostgreSQL","SQLAlchemy","Alembic","Pydantic","WebSockets","Pytest"]',
    'Modular FastAPI architecture with separated API, schema, model, and service layers. PostgreSQL as the primary source of truth for inventory and financial operations. Async SQLAlchemy integration using asyncpg. Alembic migration system for schema versioning. Decimal-based financial calculations for transaction precision. WebSocket-ready architecture for future real-time POS synchronization.',
    'PostgreSQL with Alembic for schema versioning and long-term consistency. Backend-first architecture where all financial calculations are server-authoritative.',
    'Preventing floating-point precision errors in financial workflows with Decimal types. Designing immutable transaction workflows for audit trail compliance. Maintaining data integrity during async database operations. Structuring modular fee and VAT calculation systems.',
    'Delivered a Decimal-precision financial backend for retail operations. Implemented immutable transaction records suitable for audit trails. Established async API architecture for concurrent POS terminals.',
    NULL,
    'https://github.com/M-Alhbyb/ezoo_pos',
    'published',
    true,
    3,
    CURRENT_TIMESTAMP
),
(
    1,
    'Bahnhofli Grill Ordering & Delivery Platform',
    'bahnhofli-grill-platform',
    'Restaurant ordering and delivery platform for Bahnhofli Grill built on the MERN stack with Docker deployment and production debugging workflows.',
    'Bahnhofli Grill is a production restaurant platform supporting online ordering, POS operations, delivery management, and pickup workflows for a real restaurant business.

The project included ecommerce ordering functionality where customers place orders online and either request delivery or pick up orders directly from the restaurant.

My work focused on debugging existing operational workflows and implementing new delivery and pickup management systems across both frontend and backend services.

The platform was built using the MERN stack with Docker-based deployment workflows.

Architecture Details:

* MERN stack architecture with separated frontend and backend services
* MongoDB database for order and operational data
* React frontend for customer ordering workflows
* Express.js and Node.js backend APIs
* Docker-based containerized development and deployment workflows
* Operational order management and delivery tracking systems

Challenges Solved:

* Fixing production issues in active restaurant workflows
* Designing delivery and pickup operational logic
* Maintaining stable order processing while extending platform functionality
* Coordinating frontend and backend updates across ecommerce workflows

Deployment & Process Notes:

* Worked on a live production restaurant platform
* Focused on operational reliability and workflow stability
* Added new business features while preserving existing order systems
* Used Docker-based workflows for environment consistency

Measurable Outcomes:

* Expanded the platform with delivery and pickup management capabilities
* Improved operational ordering workflows for restaurant staff and customers
* Resolved production bugs affecting ecommerce and POS operations',
    '["MongoDB","Express.js","React","Node.js","Docker"]',
    'MERN stack architecture with separated frontend and backend services. MongoDB database for order and operational data. React frontend for customer ordering workflows. Express.js and Node.js backend APIs. Docker-based containerized development and deployment workflows. Operational order management and delivery tracking systems.',
    'Live production restaurant platform deployment. Docker-based environment consistency. New features added while preserving existing order systems.',
    'Fixing production issues in active restaurant workflows. Designing delivery and pickup operational logic. Maintaining stable order processing while extending platform functionality. Coordinating frontend and backend updates across ecommerce workflows.',
    'Expanded the platform with delivery and pickup management capabilities. Improved operational ordering workflows for restaurant staff and customers. Resolved production bugs affecting ecommerce and POS operations.',
    NULL,
    'https://bahnhofligrill.ch/',
    'published',
    true,
    4,
    CURRENT_TIMESTAMP
),
(
    1,
    'Rose Gate ERP System',
    'rose-gate-erp-system',
    'Custom ERP system built from scratch for a retail store using Laravel and React with multi-role dashboards and operational management tools.',
    '*Private production deployment - client project.*

Rose Gate ERP is a full-stack business management system developed from scratch for a real client operating a retail store.

The system was built using Laravel for the backend and React for the frontend, providing dashboards and management tools for multiple user roles including administrators, managers, and staff.

The project includes role-based access control, administrative dashboards, business data management, and internal workflows designed for day-to-day store operations.

The application was deployed and actively used in production, providing hands-on experience in client-driven development and operational business systems.',
    '["Laravel","React","MySQL","REST API"]',
    'Laravel backend with RESTful API architecture. React frontend with reusable dashboard components. Multi-role permission system for operational workflows. MySQL database for business data management. Structured backend services and API communication layers.',
    'Deployed for a real retail client in production. Iterative delivery focused on practical business needs. Prioritized usability and operational simplicity.',
    'Designing role-based workflows for different operational users. Structuring frontend/backend integration cleanly through APIs. Building maintainable ERP workflows for real-world usage.',
    'Successfully deployed for real store operations. Improved operational organization through centralized workflows. Delivered a customized ERP solution for a production business.',
    NULL,
    NULL,
    'published',
    true,
    5,
    CURRENT_TIMESTAMP
),
(
    1,
    'AI Inventory Management System',
    'ai-inventory-management-system',
    'Inventory management platform with Google Gemini AI queries, Prophet time-series forecasting, and Celery/Redis async task processing.',
    '**Repository:** [GitHub - M-Alhbyb/Django_Inventory_System](https://github.com/M-Alhbyb/Django_Inventory_System)

An enterprise inventory management platform designed for merchants and representatives with AI-powered analytics and operational reporting.

The system integrates Google Gemini AI tools for natural language queries and Prophet time-series forecasting for stock prediction and inventory monitoring.

The application includes transaction management, merchant debt tracking, inventory calculations, reporting dashboards, and Arabic RTL localization.

The backend uses Django with Celery and Redis for asynchronous task processing and background operations.',
    '["Django","Python","PostgreSQL","Google Gemini API","Prophet","Celery","Redis","TailwindCSS"]',
    'Modular Django architecture with separated business domains. AI service layer integrating Google Gemini APIs. Prophet forecasting integration for stock prediction. Celery and Redis for async background processing. Arabic RTL interface and reporting support.',
    'Modular architecture with reusable service layer. Built around real-world inventory workflows and merchant operations.',
    'Building AI-assisted workflows for inventory analytics. Managing transaction consistency across inventory and debt calculations. Supporting Arabic RTL rendering and localized exports. Handling asynchronous operations and reporting tasks.',
    'Automated inventory analysis and prediction workflows. Improved operational reporting and transaction visibility. Enabled AI-powered business insights through natural language tools.',
    NULL,
    'https://github.com/M-Alhbyb/Django_Inventory_System',
    'published',
    true,
    6,
    CURRENT_TIMESTAMP
),
(
    1,
    'Django E-Commerce Platform',
    'django-ecommerce-platform',
    'Multi-role e-commerce platform with role-based access control, REST APIs, and modular Django architecture.',
    '**Repository:** [GitHub - M-Alhbyb/Django-E-Commerce-App](https://github.com/M-Alhbyb/Django-E-Commerce-App)
**Live Demo:** [django-e-commerce-app-34ro.onrender.com](https://django-e-commerce-app-34ro.onrender.com)

A full-stack e-commerce platform supporting customers, employees, and management through separate operational workflows.

The project includes role-based access control, REST API endpoints, dynamic shopping cart functionality, product management, and advanced filtering.

The system was deployed publicly and structured using modular Django applications for future expansion.',
    '["Django","PostgreSQL","Django REST Framework","Bootstrap"]',
    'Modular Django architecture with separated application domains. REST API layer using Django REST Framework. Multi-role access control using decorators and permissions. PostgreSQL relational database structure.',
    'Deployed publicly using cloud hosting infrastructure. Structured for future API integrations.',
    'Designing role-based workflows for customers, employees, and management. Structuring reusable API endpoints. Managing relational product and cart systems. Building multi-app Django architecture.',
    'Delivered an e-commerce platform with separate customer, employee, and management workflows. Implemented reusable API and authentication systems.',
    NULL,
    'https://django-e-commerce-app-34ro.onrender.com',
    'published',
    false,
    7,
    CURRENT_TIMESTAMP
),
(
    1,
    'Jitsi Meeting Dashboard',
    'jitsi-meeting-dashboard',
    'Django-based management dashboard for Jitsi Meet conferencing with JWT authentication and webhook-driven monitoring.',
    '**Repository:** [GitHub - M-Alhbyb/jitsi-dashboard](https://github.com/M-Alhbyb/jitsi-dashboard)

A Django-based dashboard for managing Jitsi Meet conferencing infrastructure and monitoring meeting operations.

The project integrates Jitsi APIs to manage meetings, monitor participants, and handle authentication workflows using JWT tokens.

The system also includes webhook handling and operational monitoring tools for conference management.',
    '["Django","JWT","REST APIs","Jitsi Meet APIs"]',
    'Django backend with API integrations. JWT authentication workflows. Real-time monitoring integrations. Webhook processing architecture.',
    'Focused on API integration and operational tooling. Built around Jitsi ecosystem services and workflows.',
    'Integrating external Jitsi APIs. Managing secure conference authentication. Handling operational monitoring workflows.',
    'Centralized conference monitoring workflows. Simplified operational management for meetings.',
    NULL,
    'https://github.com/M-Alhbyb/jitsi-dashboard',
    'published',
    false,
    8,
    CURRENT_TIMESTAMP
),
(
    1,
    'HTMX Finance Tracker',
    'htmx-finance-tracker',
    'Finance tracking application using Django and HTMX for server-rendered dynamic interactions without client-side JavaScript frameworks.',
    '**Repository:** [GitHub - M-Alhbyb/Django_HTMX_Finance_App](https://github.com/M-Alhbyb/Django_HTMX_Finance_App)
**Live Demo:** [pasha-finance-app.onrender.com](https://pasha-finance-app.onrender.com)

A finance tracking application built using Django and HTMX to provide dynamic interactions without relying on frontend JavaScript frameworks.

The system includes transaction management, category-based analytics, real-time balance updates, and dashboard interfaces.

The project demonstrates server-rendered interactivity using HTMX partial page updates.',
    '["Django","HTMX","TailwindCSS","PostgreSQL"]',
    'Django server-rendered architecture. HTMX-based dynamic interactions. TailwindCSS responsive UI design. Transaction-based financial data structure.',
    'Lightweight frontend architecture using server-rendered HTML with HTMX for dynamic updates.',
    'Building reactive interfaces without client-side JavaScript frameworks. Managing real-time UI updates using server-rendered components. Structuring maintainable HTMX workflows.',
    'Delivered real-time interactions with minimal frontend complexity. Demonstrated server-driven UI architecture using HTMX.',
    NULL,
    'https://pasha-finance-app.onrender.com',
    'published',
    false,
    9,
    CURRENT_TIMESTAMP
),
(
    1,
    'Asia Buildings Platform',
    'asia-buildings-platform',
    'Maintenance and optimization of a production Laravel/React business platform including debugging, SEO improvements, and stability enhancements.',
    'Asia Buildings is a production business platform where I worked on debugging, SEO optimization, and operational improvements for a real company environment.

The work focused on identifying and resolving frontend and backend issues, improving application stability, enhancing search engine visibility, and refining overall site performance and usability.

The project involved working within an existing Laravel and React codebase while maintaining compatibility with production workflows and live business operations.

Architecture Details:

* Laravel backend with React frontend architecture
* Existing production business platform workflows
* SEO-focused frontend and metadata improvements
* Debugging and issue resolution across frontend and backend layers

Challenges Solved:

* Diagnosing and fixing production issues in an active system
* Improving SEO structure and search visibility
* Maintaining stability while applying fixes to live operational workflows
* Working within an existing large codebase efficiently

Deployment & Process Notes:

* Worked directly on a live production platform
* Focused on operational stability and incremental improvements
* Applied debugging and SEO optimizations without disrupting business workflows

Measurable Outcomes:

* Improved platform stability and issue resolution
* Enhanced SEO structure and discoverability
* Contributed to maintaining production business operations',
    '["Laravel","React","SEO","MySQL"]',
    'Laravel backend with React frontend architecture. Existing production business platform workflows. SEO-focused frontend and metadata improvements. Debugging and issue resolution across frontend and backend layers.',
    'Worked directly on a live production platform. Focused on operational stability and incremental improvements. Applied debugging and SEO optimizations without disrupting business workflows.',
    'Diagnosing and fixing production issues in an active system. Improving SEO structure and search visibility. Maintaining stability while applying fixes to live operational workflows. Working within an existing large codebase efficiently.',
    'Improved platform stability and issue resolution. Enhanced SEO structure and discoverability. Contributed to maintaining production business operations.',
    NULL,
    'https://asiabuildings.sa/',
    'published',
    false,
    10,
    CURRENT_TIMESTAMP
)
;

INSERT OR IGNORE INTO posts (user_id, title, slug, content, excerpt, featured_image, status, published_at) VALUES
(
    1,
    'How I Recovered 28 Breached Websites',
    'how-i-recovered-28-breached-websites',
    '## How I Recovered 28 Breached Websites

Infrastructure recovery requires speed, prioritization, and discipline. During a critical migration project, I worked on recovering compromised production websites and restoring operational stability.

The process included server hardening, malware cleanup, database recovery, AWS migration, Docker deployment, and infrastructure optimization.

The experience strengthened my ability to work under pressure while maintaining technical precision.',
    'Lessons learned from recovering and migrating compromised production systems.',
    NULL,
    'published',
    'en',
    CURRENT_TIMESTAMP
),
(
    1,
    'Building Scalable Django Systems',
    'building-scalable-django-systems',
    '## Building Scalable Django Systems

Modern Django systems require clean architecture, asynchronous workflows, optimized databases, and reliable deployment pipelines.

I use Celery, Redis, PostgreSQL, Docker, and Linux infrastructure to build scalable backend systems focused on reliability and maintainability.',
    'Practical backend architecture patterns for scalable Django applications.',
    NULL,
    'published',
    'en',
    CURRENT_TIMESTAMP
),
(
    1,
    'Why Linux Became My Primary Development Environment',
    'why-linux-became-my-primary-development-environment',
    '## Why Linux Became My Primary Development Environment

Linux provides flexibility, control, and performance for modern development workflows. My daily workflow relies heavily on Linux administration, terminal tooling, Docker environments, and server management.

Using Linux improved my understanding of infrastructure, deployment systems, and backend operations.',
    'How Linux improved my workflow as a full-stack developer and DevOps engineer.',
    NULL,
    'published',
    'en',
    CURRENT_TIMESTAMP
),
(
    1,
    'Asynchronous Tasks with Celery and Redis',
    'asynchronous-tasks-with-celery-and-redis',
    '## Asynchronous Tasks with Celery and Redis

Asynchronous task queues improve application responsiveness and scalability. I use Celery with Redis to handle background jobs, notifications, processing tasks, and long-running workflows.

This architecture improves user experience and system performance under load.',
    'Improving backend responsiveness using asynchronous task processing.',
    NULL,
    'published',
    'en',
    CURRENT_TIMESTAMP
)
;

INSERT OR IGNORE INTO settings (key, value, group_name, locale) VALUES
('site_title', 'MohamedElhabib Mohamed | Full Stack Developer & DevOps Engineer', 'general', 'en'),
('site_description', 'Backend-focused full stack developer building production systems -- financial platforms, ERP solutions, POS systems, and logistics platforms.', 'general', 'en'),
('hero_title_en', 'Building Real Systems That Solve Business Problems', 'hero', 'en'),
('hero_title_ar', 'أبني أنظمة حقيقية تحل مشاكل الأعمال', 'hero', 'ar'),
('hero_subtitle_en', 'Backend engineer specializing in Django, FastAPI, ERP architecture, and Linux infrastructure. I build production systems that handle money, inventory, and logistics.', 'hero', 'en'),
('hero_subtitle_ar', 'مهندس backend متخصص في Django و FastAPI وهندسة ERP والبنية التحتية للينكس. أبني أنظمة إنتاجية تدير المال والمخزون والخدمات اللوجستية.', 'hero', 'ar'),
(
    1,
    'كيف استعدت 28 موقعاً مخترقاً',
    'how-i-recovered-28-breached-websites-ar',
    '## كيف استعدت 28 موقعاً مخترقاً

استعادة البنية التحتية تتطلب السرعة والتحديد والانضباط. خلال مشروع ترحيل حاسم، عملت على استعادة مواقع إنتاج مخترقة وإعادة الاستقرار التشغيلي.

شملت العملية تعزيز الخوادم، تنظيف البرمجيات الخبيثة، استعادة قواعد البيانات، الترحيل إلى AWS، نشر Docker، وتحسين البنية التحتية.

عززت هذه التجربة قدرتي على العمل تحت الضغط مع الحفاظ على الدقة التقنية.',
    'دروس مستفادة من استعادة وترحيل أنظمة إنتاج مخترقة.',
    NULL,
    'published',
    'ar',
    CURRENT_TIMESTAMP
),
(
    1,
    'لماذا أصبح لينكس بيئة تطويري الرئيسية',
    'why-linux-became-my-primary-development-environment-ar',
    '## لماذا أصبح لينكس بيئة تطويري الرئيسية

لينكس يوفر المرونة والتحكم والأداء لسير العمل التطويري الحديث. يعتمد سير عملي اليومي بشكل كبير على إدارة لينكس، أدوات الطرفية، بيئات Docker، وإدارة الخوادم.

استخدام لينكس حسن فهمي للبنية التحتية وأنظمة النشر وعمليات الخوادم.',
    'كيف حسن لينكس سير عملي كمطور ويب كامل ومهندس DevOps.',
    NULL,
    'published',
    'ar',
    CURRENT_TIMESTAMP
),
(
    1,
    'بناء أنظمة Django قابلة للتوسع',
    'building-scalable-django-systems-ar',
    '## بناء أنظمة Django قابلة للتوسع

أنظمة Django الحديثة تتطلب بنية نظيفة وسير عمل غير متزامن وقواعد بيانات محسنة وخطوط نشر موثوقة.

أستخدم Celery و Redis و PostgreSQL و Docker والبنية التحتية للينكس لبناء أنظمة خادم قابلة للتوسع تركز على الموثوقية والصيانة.',
    'أنماط بنية خادم عملية لتطبيقات Django قابلة للتوسع.',
    NULL,
    'published',
    'ar',
    CURRENT_TIMESTAMP
),
(
    1,
    'المهام غير المتزامنة مع Celery و Redis',
    'asynchronous-tasks-with-celery-and-redis-ar',
    '## المهام غير المتزامنة مع Celery و Redis

قوائم المهام غير المتزامنة تحسن استجابة التطبيقات وقابليتها للتوسع. أستخدم Celery مع Redis لإدارة المهام الخلفية والإشعارات وعمليات المعالجة وسير العمل الطويل.

هذه البنية تحسن تجربة المستخدم وأداء النظام تحت الضغط.',
    'تحسين استجابة الخوادم باستخدام معالجة المهام غير المتزامنة.',
    NULL,
    'published',
    'ar',
    CURRENT_TIMESTAMP
),
('social_github', 'https://github.com/M-Alhbyb', 'social', 'en'),
('social_linkedin', 'https://linkedin.com/in/m-elhabib', 'social', 'en'),
('social_email', 'mohammedalhbyb@gmail.com', 'social', 'en'),
('about_bio_ar', 'أنا محمد الحبيب محمد، مطور ويب كامل من السودان. أبني تطبيقات ويب وأنظمة داخلية وأدوات أتمتة مع التركيز على الموثوقية والبساطة والاستدامة طويلة المدى.', 'about', 'ar'),
('about_philosophy_ar', 'نهجي في الهندسة عملي: اجعل الأنظمة بسيطة وقابلة للصيانة. أتمت المهام المتكررة كلما أمكن. ابنِ حلولاً بناءً على احتياجات حقيقية، لا اتجاهات. تعلم باستمرار وتحسن خطوة بخطوة.', 'about', 'ar'),
('about_interests_ar', 'تطبيقات تعمل بالذكاء الاصطناعي، أدوات المطورين والأتمتة، تصميم الأنظمة وهندسة الخوادم، منصات التعلم التكيفي، البرمجيات مفتوحة المصدر', 'about', 'ar'),
('about_journey_ar', 'أعتقد أن الهندسة القوية تأتي من الممارسة المستمرة والفضول. معظم مهاراتي اكتسبتها من بناء مشاريع حقيقية.', 'about', 'ar')
;

INSERT OR IGNORE INTO categories (id, name, slug, description) VALUES
(1, 'Linux', 'linux', NULL),
(2, 'Development', 'development', NULL),
(3, 'DevOps', 'devops', NULL),
(4, 'Backend', 'backend', NULL),
(5, 'Python', 'python', NULL),
(6, 'AI', 'ai', NULL),
(7, 'Productivity', 'productivity', NULL),
(8, 'Programming', 'programming', NULL),
(9, 'Tools', 'tools', NULL),
(10, 'Architecture', 'architecture', NULL),
(11, 'Docker', 'docker', NULL),
(12, 'Learning', 'learning', NULL)
;

INSERT OR IGNORE INTO tags (id, name, slug) VALUES
(1, 'linux', 'linux'),
(2, 'web-development', 'web-development'),
(3, 'terminal', 'terminal'),
(4, 'productivity', 'productivity'),
(5, 'programming', 'programming'),
(6, 'docker', 'docker'),
(7, 'nginx', 'nginx'),
(8, 'deployment', 'deployment'),
(9, 'devops', 'devops'),
(10, 'fastapi', 'fastapi'),
(11, 'python', 'python'),
(12, 'ai', 'ai'),
(13, 'backend', 'backend'),
(14, 'api', 'api'),
(15, 'neovim', 'neovim'),
(16, 'coding', 'coding'),
(17, 'vim', 'vim'),
(18, 'git', 'git'),
(19, 'github', 'github'),
(20, 'development', 'development'),
(21, 'architecture', 'architecture'),
(22, 'full-stack', 'full-stack'),
(23, 'software-engineering', 'software-engineering'),
(24, 'containers', 'containers'),
(25, 'learning', 'learning'),
(26, 'projects', 'projects'),
(27, 'reverse-proxy', 'reverse-proxy'),
(28, 'web-server', 'web-server'),
(29, 'command-line', 'command-line'),
(30, 'bash', 'bash')
;

INSERT OR IGNORE INTO posts (user_id, title, slug, content, excerpt, featured_image, status, meta_title, meta_description, locale, published_at) VALUES
(
    1,
    'Why I Use Linux for Web Development',
    'why-i-use-linux-for-web-development',
    '# Why I Use Linux for Web Development

I have used Linux for years in web development, backend engineering, and server management. After trying different operating systems, Linux became my main environment because it gives me speed, flexibility, and control.

## Better Development Workflow

Linux works naturally with developer tools:

- Git
- Docker
- Node.js
- Python
- PostgreSQL
- Nginx
- SSH

Most production servers also run Linux. This makes development and deployment more consistent.

## Powerful Terminal

The terminal is one of the biggest reasons I use Linux.

I use tools like:

- Tmux
- Neovim
- Bash
- SSH
- rsync

These tools improve productivity and reduce repetitive work.

## Better Performance

Linux uses fewer resources compared to many desktop operating systems. My laptop stays responsive even when running:

- Docker containers
- Local databases
- Frontend dev servers
- AI tools

## Full Control

Linux allows deep customization.

I can:
- automate workflows
- create scripts
- configure services
- optimize performance
- manage servers directly

## Final Thoughts

Linux is not only for system administrators. It is one of the best environments for modern web development.',
    'Linux gives developers speed, control, and stability. Here is why I use Linux daily for full stack development.',
    NULL,
    'published',
    'Why I Use Linux for Web Development',
    'Learn why Linux is one of the best operating systems for full stack web development and server management.',
    'en',
    CURRENT_TIMESTAMP
),
(
    1,
    'How I Deploy Full Stack Applications',
    'how-i-deploy-full-stack-applications',
    '# How I Deploy Full Stack Applications

Deploying applications is an important part of software engineering. A good deployment workflow reduces downtime and improves reliability.

## My Stack

I usually deploy applications using:

- Docker
- Docker Compose
- Nginx
- PostgreSQL
- Linux VPS servers

## Backend Deployment

For backend services, I commonly use:

- FastAPI
- Django
- Node.js

Each service runs inside isolated containers.

## Frontend Deployment

Frontend applications are usually built with:

- Next.js
- React
- Astro

I expose them through Nginx reverse proxy.

## CI/CD

I use GitHub Actions to automate:

- testing
- builds
- deployments

This reduces manual errors.

## Monitoring

I monitor:
- logs
- server resources
- container health
- application errors

Reliable monitoring improves stability.',
    'My deployment workflow for modern web applications using Docker, Nginx, and Linux servers.',
    NULL,
    'published',
    'How I Deploy Full Stack Applications',
    'A practical deployment workflow using Docker, Nginx, GitHub Actions, and Linux servers.',
    'en',
    CURRENT_TIMESTAMP
),
(
    1,
    'Building AI-Powered Applications with FastAPI',
    'building-ai-powered-applications-with-fastapi',
    '# Building AI-Powered Applications with FastAPI

FastAPI became one of my favorite backend frameworks because it is fast, modern, and developer friendly.

## Why FastAPI

FastAPI provides:

- high performance
- automatic API documentation
- async support
- type safety

These features make it suitable for AI applications.

## AI Integrations

I use FastAPI with:
- OpenAI APIs
- DeepSeek
- vector databases
- NLP pipelines

## Example Use Cases

Applications I build include:
- CV analysis systems
- AI content tools
- recommendation systems
- automation dashboards

## Async Performance

Async support helps applications handle many requests efficiently.

This becomes important in AI systems where requests may take time.

## Final Thoughts

FastAPI is an excellent choice for modern backend development.',
    'FastAPI is one of the best Python frameworks for AI-powered backend systems.',
    NULL,
    'published',
    'Building AI-Powered Applications with FastAPI',
    'Learn why FastAPI is great for scalable AI-powered backend systems and APIs.',
    'en',
    CURRENT_TIMESTAMP
),
(
    1,
    'My Neovim Setup for Productivity',
    'my-neovim-setup-for-productivity',
    '# My Neovim Setup for Productivity

Neovim is my primary editor for development work.

## Why Neovim

I prefer Neovim because it is:
- fast
- keyboard driven
- lightweight
- customizable

## Plugins I Use

Some useful plugins include:

- Telescope
- Treesitter
- LSP support
- Git integrations

## Workflow

I combine:
- Neovim
- Tmux
- terminal tools

This setup improves focus and speed.

## Final Thoughts

Neovim requires learning, but the productivity gains are worth it.',
    'A simple and fast Neovim workflow for programming and server management.',
    NULL,
    'published',
    'My Neovim Setup for Productivity',
    'A practical Neovim setup for developers who want a fast and efficient coding workflow.',
    'en',
    CURRENT_TIMESTAMP
),
(
    1,
    'Why Every Developer Should Learn Git',
    'why-every-developer-should-learn-git',
    '# Why Every Developer Should Learn Git

Git is an essential tool for software development.

## What Git Solves

Git helps developers:
- track changes
- collaborate
- recover old versions
- manage branches

## Important Commands

Some important commands:
```bash
git status
git add .
git commit
git push
git pull
```

## Branching

Branches help developers work safely without affecting production code.

## GitHub Integration

Platforms like GitHub improve collaboration and CI/CD workflows.

## Final Thoughts

Learning Git improves development workflow and teamwork.',
    'Git is one of the most important tools for developers working on modern software projects.',
    NULL,
    'published',
    'Why Every Developer Should Learn Git',
    'Learn why Git is an essential skill for modern software developers.',
    'en',
    CURRENT_TIMESTAMP
),
(
    1,
    'How I Organize Full Stack Projects',
    'how-i-organize-full-stack-projects',
    '# How I Organize Full Stack Projects

Project structure affects maintainability and scalability.

## Backend Structure

I separate:
- routes
- services
- models
- utilities
- configuration

## Frontend Structure

Frontend applications are divided into:
- components
- pages
- hooks
- services
- state management

## Environment Variables

Sensitive configuration should stay in environment files.

## Documentation

I always include:
- README files
- setup instructions
- deployment notes

## Final Thoughts

A clean structure saves time as projects grow.',
    'A clean project structure improves scalability and maintainability.',
    NULL,
    'published',
    'How I Organize Full Stack Projects',
    'Learn how to structure scalable full stack applications for better maintainability.',
    'en',
    CURRENT_TIMESTAMP
),
(
    1,
    'Why Docker Changed My Workflow',
    'why-docker-changed-my-workflow',
    '# Why Docker Changed My Workflow

Docker became one of the most important tools in my workflow.

## Consistent Environments

Docker removes the classic issue:
"It works on my machine."

## Easier Deployment

Applications become portable and reproducible.

## Services I Containerize

I use Docker for:
- databases
- backend APIs
- frontend apps
- Redis
- worker services

## Docker Compose

Docker Compose simplifies multi-service applications.

## Final Thoughts

Docker improves reliability and development speed.',
    'Docker simplified development, testing, and deployment across environments.',
    NULL,
    'published',
    'Why Docker Changed My Workflow',
    'Learn how Docker improves development workflows and deployment consistency.',
    'en',
    CURRENT_TIMESTAMP
),
(
    1,
    'Learning Programming Through Projects',
    'learning-programming-through-projects',
    '# Learning Programming Through Projects

Tutorials are useful, but projects teach deeper skills.

## Why Projects Matter

Projects force developers to:
- solve problems
- debug issues
- organize code
- deploy applications

## Start Small

Good beginner projects:
- todo apps
- blogs
- dashboards
- APIs

## Improve Gradually

Each project should introduce:
- new tools
- better architecture
- improved UI
- deployment workflows

## Final Thoughts

Consistency matters more than complexity.',
    'Building projects is one of the fastest ways to improve programming skills.',
    NULL,
    'published',
    'Learning Programming Through Projects',
    'Discover why building projects is one of the best ways to learn programming.',
    'en',
    CURRENT_TIMESTAMP
),
(
    1,
    'Using AI Tools as a Developer',
    'using-ai-tools-as-a-developer',
    '# Using AI Tools as a Developer

AI tools became part of modern development workflows.

## What AI Helps With

AI assists with:
- debugging
- documentation
- boilerplate generation
- code explanations

## Human Review Still Matters

Developers should review:
- architecture
- security
- performance
- business logic

## Best Use Cases

AI works best for:
- repetitive tasks
- research
- prototyping

## Final Thoughts

AI improves productivity when combined with strong engineering skills.',
    'AI tools improve developer productivity when used correctly.',
    NULL,
    'published',
    'Using AI Tools as a Developer',
    'Learn practical ways developers use AI tools to improve productivity.',
    'en',
    CURRENT_TIMESTAMP
),
(
    1,
    'Understanding Reverse Proxies with Nginx',
    'understanding-reverse-proxies-with-nginx',
    '# Understanding Reverse Proxies with Nginx

Nginx is one of the most widely used web servers.

## What Is a Reverse Proxy

A reverse proxy forwards requests from users to backend services.

## Common Uses

Nginx helps with:
- SSL
- load balancing
- caching
- static files

## Example Architecture

A common setup:
- Nginx
- FastAPI backend
- React frontend
- PostgreSQL database

## Final Thoughts

Understanding reverse proxies is important for deployment workflows.',
    'Nginx reverse proxies help manage modern web applications efficiently.',
    NULL,
    'published',
    'Understanding Reverse Proxies with Nginx',
    'Learn how reverse proxies work and why Nginx is widely used in modern deployments.',
    'en',
    CURRENT_TIMESTAMP
),
(
    1,
    'Why Developers Should Learn the Command Line',
    'why-developers-should-learn-the-command-line',
    '# Why Developers Should Learn the Command Line

The command line is an important skill for developers.

## Faster Workflow

Many tasks become faster through commands compared to graphical interfaces.

## Automation

Shell scripts help automate repetitive work.

## Useful Commands

Examples:
```bash
ls
grep
find
rsync
ssh
```

## Server Management

Most servers are managed through terminals.

## Final Thoughts

Terminal skills improve efficiency and technical understanding.',
    'Command line skills improve speed, automation, and system understanding.',
    NULL,
    'published',
    'Why Developers Should Learn the Command Line',
    'Learn why command line skills are important for modern software developers.',
    'en',
    CURRENT_TIMESTAMP
),
(
    1,
    'How I Learn New Technologies',
    'how-i-learn-new-technologies',
    '# How I Learn New Technologies

Technology changes quickly, so developers need effective learning strategies.

## My Learning Process

I usually:
1. read official documentation
2. build small projects
3. test features
4. deploy something real

## Avoid Tutorial Overload

Watching tutorials without building projects slows progress.

## Focus on Fundamentals

Core concepts remain useful across technologies.

## Final Thoughts

Consistent practice produces better long-term results.',
    'My process for learning frameworks, tools, and programming technologies efficiently.',
    NULL,
    'published',
    'How I Learn New Technologies',
    'A practical system for learning programming tools and technologies efficiently.',
    'en',
    CURRENT_TIMESTAMP
)
;

INSERT OR IGNORE INTO post_categories (post_id, category_id) VALUES
(9, 1), (9, 2),
(10, 3), (10, 4),
(11, 5), (11, 6),
(12, 1), (12, 7),
(13, 8), (13, 9),
(14, 10), (14, 2),
(15, 11), (15, 3),
(16, 8), (16, 12),
(17, 6), (17, 8),
(18, 4), (18, 3),
(19, 1), (19, 7),
(20, 12), (20, 8)
;

INSERT OR IGNORE INTO post_tags (post_id, tag_id) VALUES
(9, 1), (9, 2), (9, 3), (9, 4), (9, 5),
(10, 6), (10, 7), (10, 8), (10, 9), (10, 1),
(11, 10), (11, 11), (11, 12), (11, 13), (11, 14),
(12, 15), (12, 1), (12, 16), (12, 3), (12, 17),
(13, 18), (13, 19), (13, 20), (13, 5),
(14, 21), (14, 22), (14, 16), (14, 23),
(15, 6), (15, 24), (15, 8), (15, 13),
(16, 16), (16, 25), (16, 26), (16, 20),
(17, 12), (17, 4), (17, 23), (17, 16),
(18, 7), (18, 27), (18, 8), (18, 28),
(19, 1), (19, 3), (19, 30), (19, 29),
(20, 25), (20, 20), (20, 5), (20, 4)
;

INSERT OR IGNORE INTO posts (user_id, title, slug, content, excerpt, featured_image, status, meta_title, meta_description, locale, published_at) VALUES
(
    1,
    'لماذا أستخدم لينكس في تطوير الويب',
    'why-i-use-linux-for-web-development-ar',
    '## لماذا أستخدم لينكس في تطوير الويب

أستخدم لينكس منذ سنوات في تطوير الويب وهندسة الخوادم وإدارة الأنظمة. بعد تجربة أنظمة تشغيل مختلفة، أصبح لينكس بيئتي الأساسية لأنه يمنحني السرعة والمرونة والتحكم الكامل.

### سير عمل تطويري أفضل

لينكس يعمل بشكل طبيعي مع أدوات المطورين:

- Git و Docker و Node.js
- Python و PostgreSQL و Nginx
- SSH و أدوات الطرفية

معظم خوادم الإنتاج تعمل أيضاً على لينكس، مما يجعل التطوير والنشر أكثر اتساقاً.

### الطرفية القوية

الطرفية هي أحد أهم أسباب استخدامي للينكس. أعتمد على أدوات مثل Tmux و Neovim و Bash و rsync لتحسين الإنتاجية وتقليل العمل المتكرر.

### أداء أفضل

لينكس يستهلك موارد أقل مقارنة بأنظمة التشغيل الأخرى. حاسوبي يبقى سريعاً حتى عند تشغيل حاويات Docker وقواعد البيانات المحلية وخوادم التطوير وأدوات الذكاء الاصطناعي في نفس الوقت.

### تحكم كامل

لينكس يتيح تخصيصاً عميقاً. يمكنني أتمتة سير العمل، إنشاء نصوص برمجية، تكوين الخدمات، تحسين الأداء، وإدارة الخوادم مباشرة.

لينكس ليس فقط لمسؤولي الأنظمة، بل هو من أفضل بيئات تطوير الويب الحديثة.',
    'لينكس يمنح المطورين السرعة والتحكم والاستقرار. إليك لماذا أستخدمه يومياً في تطوير تطبيقات الويب الكاملة.',
    NULL,
    'published',
    'لماذا أستخدم لينكس في تطوير الويب',
    'تعرف على الأسباب التي تجعل لينكس من أفضل أنظمة التشغيل لتطوير الويب وإدارة الخوادم.',
    'ar',
    CURRENT_TIMESTAMP
),
(
    1,
    'كيف أنشر تطبيقات Full Stack',
    'how-i-deploy-full-stack-applications-ar',
    '## كيف أنشر تطبيقات Full Stack

نشر التطبيقات جزء مهم من هندسة البرمجيات. سير عمل نشر جيد يقلل وقت التوقف ويحسن الموثوقية.

### الأدوات التي أستخدمها

- Docker و Docker Compose لعزل الخدمات
- Nginx كخادم وكيل عكسي
- PostgreSQL لقواعد البيانات
- خوادم Linux VPS

### نشر الخادم

لخدمات الخادم، أستخدم FastAPI و Django و Node.js داخل حاويات معزولة لكل خدمة.

### نشر الواجهة الأمامية

تطبيقات الواجهة الأمامية تُبنى بـ Next.js أو React أو Astro ثم تُعرض عبر Nginx.

### التكامل المستمر CI/CD

أستخدم GitHub Actions لأتمتة الاختبار والبناء والنشر، مما يقلل الأخطاء اليدوية.

### المراقبة

أراقب السجلات وموارد الخادم وصحة الحاويات وأخطاء التطبيق. المراقبة الجيدة تحسن الاستقرار التشغيلي.',
    'سير عمل النشر الذي أتبعه لتطبيقات الويب الحديثة باستخدام Docker و Nginx وخوادم لينكس.',
    NULL,
    'published',
    'كيف أنشر تطبيقات Full Stack',
    'سير عمل نشر عملي باستخدام Docker و Nginx و GitHub Actions وخوادم لينكس.',
    'ar',
    CURRENT_TIMESTAMP
),
(
    1,
    'بناء تطبيقات الذكاء الاصطناعي مع FastAPI',
    'building-ai-powered-applications-with-fastapi-ar',
    '## بناء تطبيقات الذكاء الاصطناعي مع FastAPI

FastAPI أصبح أحد أطر الخادم المفضلة لدي لأنه سريع وحديث وصديق للمطورين.

### لماذا FastAPI

FastAPI يوفر أداء عالياً، توثيقاً تلقائياً للواجهات، دعم البرمجة غير المتزامنة، وأماناً في الأنواع. هذه الميزات تجعله مناسباً لتطبيقات الذكاء الاصطناعي.

### تكاملات الذكاء الاصطناعي

أستخدم FastAPI مع:
- واجهات OpenAI و DeepSeek
- قواعد بيانات المتجهات
- خطوط معالجة اللغة الطبيعية NLP

### حالات الاستخدام

من التطبيقات التي أبنيها: أنظمة تحليل السير الذاتية، أدوات المحتوى بالذكاء الاصطناعي، أنظمة التوصية، ولوحات تحكم الأتمتة.

### الأداء غير المتزامن

دعم العمليات غير المتزامنة يساعد التطبيقات على معالجة عدد كبير من الطلبات بكفاءة، وهو مهم في أنظمة الذكاء الاصطناعي حيث قد تستغرق الطلبات وقتاً.

FastAPI خيار ممتاز لتطوير الخوادم الحديثة.',
    'FastAPI من أفضل أطر بايثون لبناء أنظمة خادم تعمل بالذكاء الاصطناعي.',
    NULL,
    'published',
    'بناء تطبيقات الذكاء الاصطناعي مع FastAPI',
    'تعرف على لماذا FastAPI خيار ممتاز لأنظمة الذكاء الاصطناعي القابلة للتوسع.',
    'ar',
    CURRENT_TIMESTAMP
),
(
    1,
    'إعدادات Neovim للإنتاجية',
    'my-neovim-setup-for-productivity-ar',
    '## إعدادات Neovim للإنتاجية

Neovim هو محرري الأساسي في العمل التطويري اليومي.

### لماذا Neovim

أفضل Neovim لأنه سريع، يعتمد على لوحة المفاتيح، خفيف الوزن، وقابل للتخصيص بالكامل.

### الإضافات التي أستخدمها

- Telescope للبحث والتنقل
- Treesitter لتحليل الصياغة
- دعم LSP للإكمال التلقائي
- تكاملات Git

### سير العمل

أجمع Neovim مع Tmux وأدوات الطرفية الأخرى. هذا الإعداد يحسن التركيز والسرعة في البرمجة.

Neovim يتطلب تعلم بعض الوقت، لكن مكاسب الإنتاجية تستحق الجهد.',
    'سير عمل بسيط وسريع باستخدام Neovim للبرمجة وإدارة الخوادم.',
    NULL,
    'published',
    'إعدادات Neovim للإنتاجية',
    'إعدادات Neovim عملية للمطورين الذين يريدون سير عمل برمجي سريع وفعال.',
    'ar',
    CURRENT_TIMESTAMP
),
(
    1,
    'لماذا يجب على كل مطور تعلم Git',
    'why-every-developer-should-learn-git-ar',
    '## لماذا يجب على كل مطور تعلم Git

Git أداة أساسية في تطوير البرمجيات الحديثة. لا يمكن الاستغناء عنها في العمل الجماعي أو الفردي.

### ماذا يحل Git

Git يساعد المطورين على تتبع التغييرات، التعاون مع الفريق، استعادة الإصدارات القديمة، وإدارة الفروع بأمان.

### أوامر مهمة

```bash
git status
git add .
git commit -m "رسالة"
git push
git pull
```

### التفرع Branching

الفروع تساعد المطورين على العمل بأمان دون التأثير على كود الإنتاج. يمكن تطوير الميزات بشكل منفصل ثم دمجها.

### التكامل مع GitHub

منصات مثل GitHub تحسن التعاون وتكامل CI/CD. الطلبات Pull Requests تتيح مراجعة الكود قبل الدمج.

تعلم Git يحسن سير العمل التطويري والعمل الجماعي بشكل كبير.',
    'Git من أهم الأدوات للمطورين الذين يعملون على مشاريع برمجية حديثة.',
    NULL,
    'published',
    'لماذا يجب على كل مطور تعلم Git',
    'تعرف على لماذا Git مهارة أساسية لكل مطور برمجيات حديث.',
    'ar',
    CURRENT_TIMESTAMP
),
(
    1,
    'كيف أنظم مشاريع Full Stack',
    'how-i-organize-full-stack-projects-ar',
    '## كيف أنظم مشاريع Full Stack

هيكل المشروع يؤثر بشكل كبير على قابلية الصيانة والتوسع. تنظيم جيد يوفر الوقت مع نمو المشروع.

### هيكل الخادم

أفصل المسارات Routes عن الخدمات Services والنماذج Models والأدوات Utilities والإعدادات Configuration. كل طبقة لها مسؤولية محددة.

### هيكل الواجهة الأمامية

تطبيقات الواجهة تقسم إلى: مكونات Components، صفحات Pages، خطافات Hooks، خدمات Services، وإدارة الحالة State Management.

### المتغيرات البيئية

الإعدادات الحساسة توضع في ملفات البيئة Environment Files ولا ترتكب في مستودع الكود.

### التوثيق

أحرص على تضمين ملفات README مع تعليمات الإعداد وملاحظات النشر. التوثيق الجيد يساعد الفريق والمطورين الجدد.

هيكل نظيف يوفر وقتاً كبيراً مع توسع المشاريع.',
    'هيكل مشروع نظيف يحسن قابلية التوسع والصيانة على المدى الطويل.',
    NULL,
    'published',
    'كيف أنظم مشاريع Full Stack',
    'تعلم كيفية هيكلة تطبيقات Full Stack قابلة للتوسع لصيانة أفضل.',
    'ar',
    CURRENT_TIMESTAMP
),
(
    1,
    'لماذا غير Docker سير عملي',
    'why-docker-changed-my-workflow-ar',
    '## لماذا غير Docker سير عملي

Docker أصبح من أهم الأدوات في سير عملي اليومي. غيّر طريقة بناء التطبيقات ونشرها بشكل جذري.

### بيئات متسقة

Docker يزيل المشكلة الكلاسيكية: "يعمل على جهازي". الحاويات تضمن أن التطبيق يعمل بنفس الطريقة في كل مكان.

### نشر أسهل

التطبيقات تصبح محمولة وقابلة للتكرار. نشر تطبيق جديد يحتاج فقط إلى تشغيل الحاوية.

### الخدمات التي أحوِّنها إلى حاويات

أستخدم Docker لقواعد البيانات، واجهات API، تطبيقات الواجهة الأمامية، Redis، وخدمات العمال.

### Docker Compose

Docker Compose يبسط إدارة التطبيقات متعددة الخدمات. ملف واحد يحدد جميع الخدمات والشبكات والتخزين.

Docker يحسن الموثوقية وسرعة التطوير بشكل ملحوظ.',
    'Docker بسّط التطوير والاختبار والنشر عبر جميع البيئات.',
    NULL,
    'published',
    'لماذا غير Docker سير عملي',
    'تعرف على كيف يحسن Docker سير العمل التطويري واتساق النشر.',
    'ar',
    CURRENT_TIMESTAMP
),
(
    1,
    'تعلم البرمجة من خلال المشاريع',
    'learning-programming-through-projects-ar',
    '## تعلم البرمجة من خلال المشاريع

الدروس التعليمية مفيدة، لكن المشاريع تعلم مهارات أعمق. البناء الفعلي يختلف تماماً عن المشاهدة.

### لماذا المشاريع مهمة

المشاريع تجبر المطور على حل المشكلات الحقيقية، تصحيح الأخطاء، تنظيم الكود، ونشر التطبيقات. هذه مهارات لا تكتسب من الدروس وحدها.

### ابدأ صغيراً

مشاريع جيدة للمبتدئين: تطبيقات قائمة المهام، مدونات بسيطة، لوحات تحكم، وواجهات API.

### تحسن تدريجي

كل مشروع يجب أن يقدم أدوات جديدة، بنية أفضل، واجهات محسنة، وسير عمل نشر متطور.

### الاستمرارية أهم من التعقيد

التعلم المستمر بخطوات صغيرة أفضل من محاولة بناء مشاريع ضخمة من البداية.',
    'بناء المشاريع من أسرع الطرق لتحسين مهارات البرمجة.',
    NULL,
    'published',
    'تعلم البرمجة من خلال المشاريع',
    'اكتشف لماذا بناء المشاريع من أفضل طرق تعلم البرمجة.',
    'ar',
    CURRENT_TIMESTAMP
),
(
    1,
    'استخدام أدوات الذكاء الاصطناعي كمطور',
    'using-ai-tools-as-a-developer-ar',
    '## استخدام أدوات الذكاء الاصطناعي كمطور

أدوات الذكاء الاصطناعي أصبحت جزءاً من سير العمل التطويري الحديث. استخدامها الصحيح يحدث فرقاً كبيراً.

### ما يساعد فيه الذكاء الاصطناعي

- تصحيح الأخطاء وتحليل المشكلات
- كتابة التوثيق والشروحات
- توليد الكود التكراري
- شرح الكود المعقد

### المراجعة البشرية ضرورية

يجب على المطور مراجعة: البنية العامة، الأمان، الأداء، ومنطق الأعمال. الذكاء الاصطناعي ليس بديلاً عن الفهم الهندسي.

### أفضل حالات الاستخدام

الذكاء الاصطناعي يعمل بشكل أفضل في المهام المتكررة، البحث، والنمذجة الأولية Prototyping.

الأدوات الذكية تزيد الإنتاجية عندما تقترن بمهارات هندسية قوية وفهم عميق للمجال.',
    'أدوات الذكاء الاصطناعي تحسن إنتاجية المطورين عند استخدامها بشكل صحيح.',
    NULL,
    'published',
    'استخدام أدوات الذكاء الاصطناعي كمطور',
    'تعرف على الطرق العملية التي يستخدم بها المطورون أدوات الذكاء الاصطناعي لتحسين الإنتاجية.',
    'ar',
    CURRENT_TIMESTAMP
),
(
    1,
    'فهم الوكيل العكسي مع Nginx',
    'understanding-reverse-proxies-with-nginx-ar',
    '## فهم الوكيل العكسي مع Nginx

Nginx من أكثر خوادم الويب استخداماً في العالم. فهم كيفية عمله أساسي لأي مطور ينشر تطبيقات.

### ما هو الوكيل العكسي

الوكيل العكسي Reverse Proxy يستقبل طلبات المستخدمين ويوزعها على خدمات الخادم الخلفية. يخفي البنية الداخلية ويوفر طبقة أمان إضافية.

### الاستخدامات الشائعة

Nginx يساعد في:
- إنهاء شهادات SSL
- توزيع الأحمال Load Balancing
- التخزين المؤقت Caching
- خدمة الملفات الثابتة

### بنية مثال

إعداد شائع: Nginx مع FastAPI في الخلف و React في الواجهة و PostgreSQL كقاعدة بيانات.

فهم الوكلاء العكسيين مهم جداً لأنظمة النشر الحديثة وتحسين الأداء والأمان.',
    'وكلاء Nginx العكسي يساعدون في إدارة تطبيقات الويب الحديثة بكفاءة.',
    NULL,
    'published',
    'فهم الوكيل العكسي مع Nginx',
    'تعرف على كيفية عمل الوكلاء العكسيين ولماذا Nginx واسع الاستخدام في النشر الحديث.',
    'ar',
    CURRENT_TIMESTAMP
),
(
    1,
    'لماذا يجب على المطورين تعلم سطر الأوامر',
    'why-developers-should-learn-the-command-line-ar',
    '## لماذا يجب على المطورين تعلم سطر الأوامر

سطر الأوامر CLI مهارة أساسية لكل مطور برمجيات. فهمه يفتح آفاقاً واسعة من الإنتاجية.

### سير عمل أسرع

الكثير من المهام تصبح أسرع عبر الأوامر مقارنة بالواجهات الرسومية. نسخ الملفات، البحث، وإدارة العمليات تكون أكثر كفاءة.

### الأتمتة

النصوص البرمجية Shell Scripts تساعد في أتمتة العمل المتكرر. مهمات مثل النسخ الاحتياطي والنشر يمكن تشغيلها بأمر واحد.

### أوامر مفيدة

```bash
ls     # عرض الملفات
grep   # بحث في النصوص
find   # بحث متقدم عن الملفات
rsync  # مزامنة الملفات
ssh    # اتصال بالخوادم
```

### إدارة الخوادم

معظم الخوادم تدار عبر الطرفية. بدون معرفة سطر الأوامر، إدارة الخوادم تصبح شبه مستحيلة.

مهارات الطرفية تحسن الكفاءة والفهم التقني لأي مطور.',
    'مهارات سطر الأوامر تحسن السرعة والأتمتة والفهم التقني.',
    NULL,
    'published',
    'لماذا يجب على المطورين تعلم سطر الأوامر',
    'تعرف على لماذا مهارات سطر الأوامر مهمة لمطوري البرمجيات الحديثين.',
    'ar',
    CURRENT_TIMESTAMP
),
(
    1,
    'كيف أتعلم التقنيات الجديدة',
    'how-i-learn-new-technologies-ar',
    '## كيف أتعلم التقنيات الجديدة

التقنيات تتغير بسرعة، لذلك يحتاج المطورون استراتيجيات تعلم فعالة. أشارك هنا نظامي الشخصي.

### عملية التعلم

عادةً أتبع هذه الخطوات:
1. قراءة التوثيق الرسمي
2. بناء مشاريع صغيرة
3. اختبار الميزات
4. نشر شيء حقيقي

### تجنب فخ الدروس

مشاهدة الدروس التعليمية دون بناء مشاريع يبطئ التقدم. الممارسة الفعلية هي ما يثبت المعلومة.

### التركيز على الأساسيات

المفاهيم الأساسية مثل قواعد البيانات، البرمجة الشيئية، وهيكلة الكود تبقى مفيدة عبر جميع التقنيات. تعلم الأساسيات جيداً يسهل تعلم أي إطار جديد.

الممارسة المنتظمة تنتج نتائج أفضل على المدى الطويل من أي دورة مكثفة.',
    'نظام عملي لتعلم أطر العمل والأدوات والتقنيات البرمجية بكفاءة.',
    NULL,
    'published',
    'كيف أتعلم التقنيات الجديدة',
    'نظام عملي لتعلم أدوات وتقنيات البرمجة بكفاءة.',
    'ar',
    CURRENT_TIMESTAMP
)
;

INSERT OR IGNORE INTO post_categories (post_id, category_id) VALUES
(21, 1), (21, 2),
(22, 3), (22, 4),
(23, 5), (23, 6),
(24, 1), (24, 7),
(25, 8), (25, 9),
(26, 10), (26, 2),
(27, 11), (27, 3),
(28, 8), (28, 12),
(29, 6), (29, 8),
(30, 4), (30, 3),
(31, 1), (31, 7),
(32, 12), (32, 8)
;

INSERT OR IGNORE INTO post_tags (post_id, tag_id) VALUES
(21, 1), (21, 2), (21, 3), (21, 4), (21, 5),
(22, 6), (22, 7), (22, 8), (22, 9), (22, 1),
(23, 10), (23, 11), (23, 12), (23, 13), (23, 14),
(24, 15), (24, 1), (24, 16), (24, 3), (24, 17),
(25, 18), (25, 19), (25, 20), (25, 5),
(26, 21), (26, 22), (26, 16), (26, 23),
(27, 6), (27, 24), (27, 8), (27, 13),
(28, 16), (28, 25), (28, 26), (28, 20),
(29, 12), (29, 4), (29, 23), (29, 16),
(30, 7), (30, 27), (30, 8), (30, 28),
(31, 1), (31, 3), (31, 30), (31, 29),
(32, 25), (32, 20), (32, 5), (32, 4)
;

INSERT OR IGNORE INTO projects (user_id, title, slug, short_description, content, tech_stack, architecture_details, deployment_notes, challenges, outcomes, thumbnail, link, status, featured, sort_order, locale, created_at) VALUES
(
    1,
    'نظام EZOO لنقاط البيع',
    'ezoo-pos-system-ar',
    'نظام نقاط بيع وإدارة مخزون خلفي تم بناؤه لصالح شركة Rayon Energy لمعدات الطاقة الشمسية.',
    '**المستودع:** [GitHub - M-Alhbyb/ezoo_pos](https://github.com/M-Alhbyb/ezoo_pos)

EZOO POS هو نظام خلفي لنقاط البيع وإدارة المخزون صُمم لشركة Rayon Energy للطاقة الشمسية.

طُوّر باستخدام FastAPI مع عمليات قاعدة بيانات غير متزامنة.

التركيز على منع أخطاء الدقة المالية باستخدام الحسابات العشرية.

يتضمن إدارة المخزون، معالجة المعاملات، حساب الرسوم، دعم VAT، وسجلات مبيعات غير قابلة للتعديل.',
    '["FastAPI","Python","PostgreSQL","SQLAlchemy","Alembic","Pydantic","WebSockets","Pytest"]',
    'بنية FastAPI معيارية مع طبقات API ومخططات ونماذج وخدمات منفصلة. PostgreSQL كمصدر رئيسي. asyncpg لتكامل SQLAlchemy غير المتزامن. Alembic للترحيل. حسابات عشرية للدقة المالية.',
    'موثوقية وقابلية صيانة. PostgreSQL و Alembic لاتساق المخطط. قابلية التوسع والاختبار.',
    'منع أخطاء الفاصلة العائمة. تصميم معاملات غير قابلة للتعديل. سلامة البيانات في العمليات غير المتزامنة.',
    'نظام خلفي إنتاجي للبيع بالتجزئة. سير عمل مالي موثوق.',
    NULL,
    'https://github.com/M-Alhbyb/ezoo_pos',
    'published',
    true,
    5,
    'ar',
    CURRENT_TIMESTAMP
),
(
    1,
    'نظام Rose Gate لتخطيط الموارد',
    'rose-gate-erp-system-ar',
    'نظام ERP مخصص لمتجر حقيقي باستخدام Laravel و React مع لوحات تحكم متعددة الأدوار.',
    '*نشر إنتاجي خاص - مشروع عميل.*

Rose Gate ERP نظام متكامل طُوّر لعميل حقيقي. بُني باستخدام Laravel و React مع لوحات تحكم وأدوار متعددة.

يشمل التحكم في الوصول، لوحات إدارية، وإدارة بيانات الأعمال.',
    '["Laravel","React","MySQL","REST API"]',
    'Laravel خلفي مع RESTful API. React أمامي مع مكونات قابلة لإعادة الاستخدام. صلاحيات متعددة الأدوار. MySQL.',
    'طوّر لعميل حقيقي ونُشر في الإنتاج. تسليم متكرر.',
    'تصميم سير عمل قائم على الأدوار. تكامل نظيف للواجهات.',
    'نشر لمتجر حقيقي. تحسين التنظيم التشغيلي.',
    NULL,
    NULL,
    'published',
    true,
    3,
    'ar',
    CURRENT_TIMESTAMP
),
(
    1,
    'نظام إدارة المخزون بالذكاء الاصطناعي',
    'ai-inventory-management-system-ar',
    'منصة إدارة مخزون بالذكاء الاصطناعي مع تتبع المعاملات وتعريب وتحليلات تنبؤية.',
    '**المستودع:** [GitHub - M-Alhbyb/Django_Inventory_System](https://github.com/M-Alhbyb/Django_Inventory_System)

منصة مؤسسية للمخزون مع تحليلات بالذكاء الاصطناعي.

تدمج Google Gemini AI و Prophet للتنبؤ.

تشمل إدارة المعاملات، تتبع الديون، وتعريب كامل.',
    '["Django","Python","PostgreSQL","Google Gemini API","Prophet","Celery","Redis","TailwindCSS"]',
    'Django معياري مع مجالات منفصلة. طبقة AI مع Gemini. Prophet للتنبؤ. Celery و Redis للمعالجة غير المتزامنة. RTL.',
    'قابلية الصيانة والتوسع. معيارية وخدمات قابلة لإعادة الاستخدام.',
    'سير عمل AI للمخزون. اتساق المعاملات. دعم RTL.',
    'أتمتة تحليل المخزون. تحسين التقارير. رؤى أعمال بالذكاء الاصطناعي.',
    NULL,
    'https://github.com/M-Alhbyb/Django_Inventory_System',
    'published',
    true,
    6,
    'ar',
    CURRENT_TIMESTAMP
),
(
    1,
    'منصة التجارة الإلكترونية بـ Django',
    'django-ecommerce-platform-ar',
    'منصة تجارة إلكترونية كاملة مع تحكم في الوصول متعدد الأدوار و REST API.',
    '**المستودع:** [GitHub - M-Alhbyb/Django-E-Commerce-App](https://github.com/M-Alhbyb/Django-E-Commerce-App)
**عرض مباشر:** [django-e-commerce-app-34ro.onrender.com](https://django-e-commerce-app-34ro.onrender.com)

منصة تجارة إلكترونية تدعم العملاء والموظفين والإدارة.

تشمل التحكم بالأدوار، REST API، سلة تسوق، وإدارة منتجات.',
    '["Django","PostgreSQL","Django REST Framework","Bootstrap"]',
    'Django معياري. DRF لواجهات API. صلاحيات متعددة الأدوار. PostgreSQL.',
    'نشر سحابي. قابل للتوسع.',
    'تصميم سير عمل قابل للتوسع. هيكلة API قابلة لإعادة الاستخدام.',
    'منصة جاهزة للإنتاج.',
    NULL,
    'https://django-e-commerce-app-34ro.onrender.com',
    'published',
    false,
    7,
    'ar',
    CURRENT_TIMESTAMP
),
(
    1,
    'لوحة تحكم اجتماعات Jitsi',
    'jitsi-meeting-dashboard-ar',
    'لوحة تحكم لبنية Jitsi Meet مع مصادقة JWT ومراقبة فورية.',
    '**المستودع:** [GitHub - M-Alhbyb/jitsi-dashboard](https://github.com/M-Alhbyb/jitsi-dashboard)

لوحة تحكم بـ Django لإدارة Jitsi Meet.

تدمج Jitsi APIs لإدارة الاجتماعات والمشاركين مع مصادقة JWT.',
    '["Django","JWT","REST APIs","Jitsi Meet APIs"]',
    'Django مع تكاملات API. JWT للمصادقة. مراقبة فورية.',
    'تركيز على تكامل API.',
    'دمج Jitsi API. مصادقة آمنة.',
    'مراقبة مركزية للمؤتمرات.',
    NULL,
    'https://github.com/M-Alhbyb/jitsi-dashboard',
    'published',
    false,
    8,
    'ar',
    CURRENT_TIMESTAMP
),
(
    1,
    'متتبع التمويل بـ HTMX',
    'htmx-finance-tracker-ar',
    'تطبيق تتبع مالي بـ HTMX لتفاعلات واجهة مدفوعة من الخادم.',
    '**المستودع:** [GitHub - M-Alhbyb/Django_HTMX_Finance_App](https://github.com/M-Alhbyb/Django_HTMX_Finance_App)
**عرض مباشر:** [pasha-finance-app.onrender.com](https://pasha-finance-app.onrender.com)

تطبيق تتبع مالي بـ Django و HTMX لتفاعلات ديناميكية.

يشمل إدارة المعاملات وتحليلات وتحديثات فورية.',
    '["Django","HTMX","TailwindCSS","PostgreSQL"]',
    'Django مع HTMX. TailwindCSS للتصميم. هيكل مالي.',
    'خفيف الوزن وقابل للصيانة.',
    'تفاعلات دون أطر ثقيلة. تحديثات فورية.',
    'تفاعلات سريعة بتعقيد ضئيل.',
    NULL,
    'https://pasha-finance-app.onrender.com',
    'published',
    false,
    9,
    'ar',
    CURRENT_TIMESTAMP
),
(
    1,
    'إتقان 365',
    'etamkeen365-ar',
    'منصة تدخل تكيفي للأطفال ذوي التحديات النمائية باستخدام أنظمة تقييم حتمية.',
    'إتقان 365 منصة تدخل تكيفي للأطفال ذوي التحديات النمائية والسلوكية.

تساعد مقدمي الرعاية والمتخصصين على التعاون بتقييمات منظمة وخطط تدخل.

صُممت بهندسة حتمية قابلة للتدقيق.

تفاصيل البنية:

- Django معياري مع 20+ وحدة
- DRF مع طبقة خدمات
- React + TypeScript
- PostgreSQL
- Celery و Redis
- دعم عربي RTL',
    '["Django","Django REST Framework","React","TypeScript","PostgreSQL","Celery","Redis","Zustand"]',
    'Django معياري مع 20+ وحدة. DRF. React + TypeScript. PostgreSQL. Celery و Redis. RTL.',
    'جاهزية إنتاجية. قابلية الصيانة والتدقيق.',
    'سير عمل تدخل حتمي. تقدم تكيفي آمن.',
    'منصة تدخل تكيفي للإنتاج.',
    NULL,
    'https://etamkeen.net',
    'published',
    true,
    2,
    'ar',
    CURRENT_TIMESTAMP
),
(
    1,
    'منصة منفذ اللوجستية',
    'manfith-logistics-platform-ar',
    'منصة سعودية لوجستية تربط أصحاب البضائع بمقدمي الخدمات عبر سوق رقمي.',
    'منفذ منصة لوجستية للسوق السعودي تربط أصحاب البضائع بمكاتب التخليص وشركات النقل.

تشمل دردشة فورية، إشعارات، مصادقة OTP، ولوحات تحليل.

تفاصيل البنية:

- Express.js مع Sequelize و MySQL
- Vue 3 مع Vite و TailwindCSS
- Socket.io
- JWT مع OTP
- CI/CD بـ GitHub Actions
- تعريب مع RTL',
    '["Node.js","Express.js","MySQL","Sequelize","Vue 3","TailwindCSS","Socket.io","JWT"]',
    'Express.js مع Sequelize و MySQL. Vue 3 مع Vite. Socket.io. JWT. CI/CD. تعريب مع RTL.',
    'CI/CD بـ GitHub Actions. PM2 للإنتاج.',
    'سير عمل عبر مقدمي خدمات متعددين. واجهات ثنائية اللغة.',
    'مركزية سير العمل اللوجستي.',
    NULL,
    'https://manfith.com',
    'published',
    true,
    4,
    'ar',
    CURRENT_TIMESTAMP
),
(
    1,
    'منصة آسيا للمباني',
    'asia-buildings-platform-ar',
    'صيانة وتحسين منصة حقيقية شملت التصحيح وتحسين SEO والتحسينات التشغيلية.',
    'آسيا للمباني منصة أعمال إنتاجية. عملت على التصحيح وتحسين SEO والتحسينات التشغيلية.

تضمن العمل ضمن Laravel و React مع الحفاظ على الإنتاج.',
    '["Laravel","React","SEO","MySQL"]',
    'Laravel مع React. تحسينات SEO.',
    'عمل على منصة حية. استقرار تشغيلي.',
    'تشخيص مشكلات في نظام نشط. تحسين SEO.',
    'تحسين استقرار المنصة و SEO.',
    NULL,
    'https://asiabuildings.sa/',
    'published',
    false,
    10,
    'ar',
    CURRENT_TIMESTAMP
),
(
    1,
    'منصة بهنوفلي جريل للطلب والتوصيل',
    'bahnhofli-grill-platform-ar',
    'منصة طلبات ونقاط بيع لمطعم مع إدارة التوصيل والاستلام.',
    'باهنوفلي جريل منصة مطعم إنتاجية تدعم الطلب عبر الإنترنت والتوصيل والاستلام.

بُنيت بـ MERN stack مع Docker.

تفاصيل البنية:

- MERN stack
- MongoDB
- React
- Express.js و Node.js
- Docker',
    '["MongoDB","Express.js","React","Node.js","Docker"]',
    'MERN stack. MongoDB. React. Express.js و Node.js. Docker.',
    'منصة مطعم حية. Docker لاتساق البيئة.',
    'إصلاح مشكلات مطعم نشط. تصميم التوصيل والاستلام.',
    'توسيع المنصة بالتوصيل والاستلام.',
    NULL,
    'https://bahnhofligrill.ch/',
    'published',
    true,
    1,
    'ar',
    CURRENT_TIMESTAMP
)
;

INSERT OR IGNORE INTO timeline (type, period, title, organization, description, place, work_type, link, logo, sort_order, locale) VALUES
('experience', 'Dec 2025 - Present', 'مطور ويب كامل', 'شركة مسيرة قم', 'قاد تطوير المنصة الأساسية التي تخدم أكثر من 500 مستخدم باستخدام Python و Django. حسّن سير عمل DevOps مما قلل وقت النشر بنسبة 60%. حسّن أداء PostgreSQL و Redis مما قلل زمن الاستعلام بنسبة 40%. أضاف ميزات مدعومة بالذكاء الاصطناعي.', 'الرياض، السعودية', 'عن بعد', 'https://cevehat.com', NULL, 1, 'ar'),
('experience', 'Jan 2026 - Present', 'قائد البنية التحتية و DevOps', 'شركة فينان للاستثمار', 'أدار عمليات استعادة البنية التحتية في قطر. نقل 28 موقعاً مخترقاً إلى بنية AWS التحتية. أمّن أكثر من 25 نظام إنتاج. نسّق إدارة الأزمات التقنية لمحفظة مؤسسية.', 'الدوحة، قطر', 'عن بعد', 'https://finjan.vc', NULL, 2, 'ar'),
('experience', 'Nov 2025 - Jan 2026', 'مطور ويب كامل مبتدئ', 'Elexplatform.online', 'أكمل مشروع تدريبي كامل في تطوير الويب اكتسب خلاله خبرة عملية مع Django وسير عمل النشر وهندسة الخادم غير المتزامنة.', 'بورتسودان، السودان', 'حضوري', 'https://elexplatform.online', NULL, 3, 'ar'),
('experience', 'Sept 2025 - Present', 'متدرب تقنية معلومات', 'إشعارك', 'اكتسب خبرة عملية في بيئات التكنولوجيا المالية. درس صيانة الأنظمة وبروتوكولات أمن الويب. تعلّم تقنيات تحسين محركات البحث في بيئة إنتاجية.', 'بورتسودان، السودان', 'هجين', 'https://esh3ark.com', NULL, 4, 'ar'),
('experience', 'Sep 2025 - Present', 'مطور ويب مستقل ومدير أنظمة', 'مستقل', 'طوّر أنظمة نقاط بيع ومنصات مخزون لأكثر من 5 شركات. أدار البنية التحتية للينكس واستضافة الإنتاج عبر أكثر من 10 خوادم.', '', 'عن بعد', NULL, NULL, 5, 'ar'),
('education', '2026 - Present', 'بكالوريوس تقنية معلومات', 'جامعة السودان المفتوحة', 'يدرس حالياً تقنية المعلومات مع التركيز على الأنظمة البرمجية والبنية التحتية التقنية.', 'السودان', '', 'https://www.ous.edu.sd/', NULL, 6, 'ar'),
('education', '2019 - 2024', 'بكالوريوس اللغة العربية وآدابها', 'جامعة أم درمان الإسلامية', 'تخرج بتقدير امتياز وأداء أكاديمي متميز.', 'أم درمان، السودان', '', 'https://oiu.edu.sd', NULL, 7, 'ar')
;

INSERT OR IGNORE INTO volunteering (title, organization, description, place, start_date, end_date, link, sort_order, locale) VALUES
('منسق عمليات ميدانية وحملات', 'منظمة تكافل الخيرية', 'خريج برنامج إعداد القادة، الدفعة الرابعة. أدار ونسّق 5 فرق ميدانية خلال حملات رمضان. أعد تقارير يومية تشغيلية ومالية. أشرف على العمليات الميدانية وحل مشكلات التنسيق. أشرف على أكثر من 30 مطبخاً خيرياً يخدم أكثر من 1500 عائلة يومياً خلال رمضان. أدار عمليات توزيع حملات العيد لأكثر من 700 عائلة. صمم مواد إعلامية وحملات تواصل اجتماعي لمبادرات متعددة.', 'السودان', '2021', 'حتى الآن', NULL, 1, 'ar'),
('مؤسس مشارك وأمين عام', 'جمعية سواعد الضد الخيرية', 'مؤسس مشارك وأمين عام للجمعية. أدار مبادرات كسوة الشتاء والدعم الغذائي. شارك في تخطيط وتنسيق حملات جمع التبرعات. دعم أكثر من 100 عائلة من خلال المبادرات الخيرية. أعد تقارير تشغيلية وتنظيمية.', 'السودان', '2022', '2022', NULL, 2, 'ar'),
('متطوع إعلامي وتنظيم فعاليات', 'مؤسسة خطوة الخيرية', 'شارك في أنشطة إعلامية وتنظيم فعاليات. ساعد في التصميم الجرافيكي وأنشطة دعم المبادرات. ساهم في تنسيق الفعاليات التنظيمية.', 'أم درمان، السودان', '2021', '2021', NULL, 3, 'ar'),
('نائب المشرف الإعلامي', 'لجنة كلية اللغة العربية', 'انتُخب نائباً للمشرف الإعلامي. صمم مواد إعلامية ورسومات للأنشطة الطلابية. شارك في تنظيم حفلات استقبال الطلاب والفعاليات الرياضية والثقافية.', 'جامعة أم درمان الإسلامية', '2022', '2022', NULL, 4, 'ar')
;

INSERT OR IGNORE INTO languages (name, proficiency, sort_order, locale) VALUES
('إنجليزي', 'فوق المتوسط', 1, 'ar'),
('عربي', 'لغة أم', 2, 'ar')
;
