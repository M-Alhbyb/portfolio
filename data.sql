BEGIN;

DELETE FROM projects;
DELETE FROM posts;
DELETE FROM skills;
DELETE FROM timeline;
DELETE FROM volunteering;
DELETE FROM languages;
DELETE FROM settings;
DELETE FROM sqlite_sequence;

INSERT OR IGNORE INTO skills (
    id,
    name,
    category,
    proficiency,
    icon,
    sort_order
) VALUES
-- AI & Automation
(40, 'LLM Integrations', 'AI & Automation', 75, NULL, 1),
(41, 'AI Agents', 'AI & Automation', 75, NULL, 2),
(42, 'MCP Workflows', 'AI & Automation', 70, NULL, 3),
(43, 'Prompt Engineering', 'AI & Automation', 85, NULL, 4),
(44, 'Gemini API Integration', 'AI & Automation', 80, NULL, 5),
(45, 'AI Automation', 'AI & Automation', 80, NULL, 6),
(46, 'AI-Assisted Development', 'AI & Automation', 90, NULL, 7),
(47, 'Spec-Driven Development', 'AI & Automation', 80, NULL, 8),
-- Architecture & Concepts
(24, 'System Architecture', 'Architecture & Concepts', 85, NULL, 1),
(25, 'Async Programming', 'Architecture & Concepts', 80, NULL, 2),
(27, 'ERP Systems', 'Architecture & Concepts', 76, NULL, 3),
(28, 'POS Systems', 'Architecture & Concepts', 82, NULL, 4),
(26, 'Financial Systems', 'Architecture & Concepts', 78, NULL, 5),
(29, 'API Integration', 'Architecture & Concepts', 86, NULL, 6),
(11, 'Database Design', 'Architecture & Concepts', 86, NULL, 7),
-- Backend
(1, 'Python', 'Backend', 92, NULL, 1),
(2, 'FastAPI', 'Backend', 82, NULL, 2),
(3, 'Django', 'Backend', 88, NULL, 3),
(4, 'Django REST Framework', 'Backend', 85, NULL, 4),
(5, 'Laravel', 'Backend', 70, NULL, 5),
(6, 'REST APIs', 'Backend', 90, NULL, 6),
(7, 'SQLAlchemy', 'Backend', 78, NULL, 7),
(8, 'Celery', 'Backend', 83, NULL, 8),
(30, 'AI Integration', 'Backend', 72, NULL, 9),
-- Database
(9, 'PostgreSQL', 'Database', 88, NULL, 1),
(10, 'MySQL', 'Database', 76, NULL, 2),
-- Frontend
(12, 'HTML', 'Frontend', 88, NULL, 1),
(13, 'CSS', 'Frontend', 85, NULL, 2),
(14, 'JavaScript', 'Frontend', 82, NULL, 3),
(15, 'TailwindCSS', 'Frontend', 84, NULL, 4),
(16, 'Bootstrap', 'Frontend', 72, NULL, 5),
(17, 'HTMX', 'Frontend', 80, NULL, 6),
(18, 'React', 'Frontend', 65, NULL, 7),
-- DevOps
(19, 'Git', 'DevOps', 90, NULL, 1),
(20, 'Linux', 'DevOps', 93, NULL, 2),
(21, 'Docker', 'DevOps', 88, NULL, 3),
(22, 'Redis', 'DevOps', 82, NULL, 4),
(23, 'Alembic', 'DevOps', 70, NULL, 5),
-- Soft
(31, 'Analytical Thinking', 'Soft Skills', 88, NULL, 1),
(32, 'Team Leadership', 'Soft Skills', 82, NULL, 2),
(33, 'Communication Skills', 'Soft Skills', 90, NULL, 3),
(34, 'Project Coordination', 'Soft Skills', 85, NULL, 4),
(35, 'Adaptability', 'Soft Skills', 90, NULL, 5),
(36, 'Critical Thinking', 'Soft Skills', 88, NULL, 6),
(37, 'Attention to Detail', 'Soft Skills', 92, NULL, 7),
(38, 'Client Communication', 'Soft Skills', 88, NULL, 8),
(39, 'Fast Learning', 'Soft Skills', 95, NULL, 9)
;

INSERT OR IGNORE INTO timeline (
    id,
    type,
    period,
    title,
    organization,
    description,
    place,
    work_type,
    link,
    logo,
    sort_order
) VALUES
(
    1,
    'experience',
    'Dec 2025 - Present',
    'Full Stack Web Developer',
    'Masirat Kum Company',
    'Led core platform development serving 500+ users using Python and Django, streamlined DevOps workflows reducing deployment time by 60%, optimized PostgreSQL and Redis performance cutting query latency by 40%, and incorporated AI-powered platform features.',
    'Riyadh, Saudi Arabic',
    'Remote',
    'https://cevehat.com',
    '',
    1
),
(
    2,
    'experience',
    'Jan 2026 - Present',
    'Infrastructure &amp; DevOps Lead',
    'Finjan Investment LLC.',
    'Directed infrastructure recovery operations in Qatar, migrated 28 breached websites to AWS infrastructure, secured +25 production systems, and coordinated technical crisis management for an enterprise portfolio.',
    'Doha, Qatar',
    'Remote',
    'https://finjan.vc',
    'uploads/timeline_6a06d4d308531.png',
    2
),
(
    3,
    'experience',
    'Nov 2025 - Jan 2026',
    'Junior Full Stack Developer',
    'Elexplatform.online',
    'Completed a full-stack training project gaining hands-on experience with Django, deployment workflows, and asynchronous backend architecture.',
    'Portsudan, Sudan.',
    'On-site',
    'https://elexplatform.online',
    '',
    3
),
(
    4,
    'experience',
    'Sept 2025 - Present',
    'IT Intern',
    'Esh3ark',
    'Gained hands-on experience in FinTech environments, studied system maintenance and web security protocols, and learned SEO optimization techniques in a production setting.',
    'Portsudan, Sudan.',
    'Hybrid',
    'https://esh3ark.com',
    'uploads/timeline_6a06d4fcdc548.png',
    4
),
(
    5,
    'experience',
    'Sep 2025 - Present',
    'Freelance Web Developer &amp; Systems Administrator',
    'Independent',
    'Developed POS systems and inventory platforms for 5+ businesses, and administered Linux infrastructure and production hosting across 10+ servers.',
    '',
    'Remote',
    NULL,
    NULL,
    5
),
(
    6,
    'education',
    '2026 - Present',
    'Bachelor of Information Technology',
    'Sudan Open University',
    'Currently studying Information Technology with focus on software systems and technical infrastructure.',
    'Sudan',
    '',
    'https://www.ous.edu.sd/',
    'uploads/timeline_6a06d56683cf6.png',
    6
),
(
    7,
    'education',
    '2019 - 2024',
    'Bachelor of Arabic Language and Literature',
    'Omdurman Islamic University',
    'Graduated with honors and excellent academic performance.',
    'Omdurman, Sudan',
    '',
    'https://oiu.edu.sd',
    'uploads/timeline_6a06d5a343bce.png',
    7
)
;

INSERT OR IGNORE INTO volunteering (id, title, organization, description, place, start_date, end_date, link, sort_order) VALUES
(1, 'Field Operations &amp; Campaign Coordinator', 'Takaful Charity Organization', 'Graduate of the Leadership Preparation Program, Batch 4. Managed and coordinated 5 field teams during Ramadan aid campaigns. Prepared operational and financial daily reports. Supervised field operations and solved team coordination issues. Supervised more than 30 charity kitchens serving over 1500 families daily during Ramadan. Managed distribution operations for Eid campaigns benefiting more than 700 families. Designed social media and campaign materials for multiple initiatives.', 'Sudan', '2021', 'Present', NULL, 1),
(2, 'Co-Founder &amp; Secretary General', 'Sawaed Al-Dhad Charity Association', 'Co-founder and Secretary General of the association. Managed winter clothing and food support initiatives. Participated in fundraising campaign planning and coordination. Supported more than 100 families through charitable initiatives. Prepared operational and organizational reports.', 'Sudan', '2022', '2022', NULL, 2),
(3, 'Media &amp; Event Organization Volunteer', 'Khutwa Charity Foundation', 'Participated in media and event organization activities. Assisted with graphic design and initiative support activities. Contributed to organizational event coordination.', 'Omdurman, Sudan', '2021', '2021', NULL, 3),
(4, 'Deputy Media Supervisor', 'Arabic Language Faculty Committee', 'Elected Deputy Media Supervisor. Designed media materials and student activity graphics. Participated in organizing student receptions, sports events, and cultural activities.', 'Omdurman Islamic University', '2022', '2022', NULL, 4)
;

INSERT OR IGNORE INTO languages (id, name, proficiency, sort_order) VALUES
(1, 'English', 'Upper Intermediate', 1),
(2, 'Arabic', 'Native', 2)
;

INSERT OR IGNORE INTO projects (
    id,
    user_id,
    title,
    slug,
    short_description,
    content,
    tech_stack,
    architecture_details,
    deployment_notes,
    challenges,
    outcomes,
    thumbnail,
    link,
    status,
    featured,
    sort_order,
    created_at
) VALUES
(
    1,
    1,
    'EZOO POS System',
    'ezoo-pos-system',
    'POS and inventory backend built for Rayon Energy, a solar equipment and electrical supplies company, focused on financial accuracy, stock management, and asynchronous operations using FastAPI and PostgreSQL.',
    '**Repository:** [GitHub - M-Alhbyb/ezoo_pos](https://github.com/M-Alhbyb/ezoo_pos)

EZOO POS is a backend-focused point-of-sale and inventory system built for Rayon Energy, a company specializing in solar equipment and electrical supplies.

The system was developed using FastAPI with asynchronous database operations to support scalable performance and concurrent usage scenarios.

A major focus during development was preventing financial precision issues by using Decimal arithmetic instead of floating-point calculations.

The project includes inventory management, transaction processing, fee calculations, VAT support, immutable sales records, and structured validation using Pydantic schemas.

The backend architecture emphasizes explicit business rules, data consistency, maintainability, and backend authority over calculations and validations.',
    '["FastAPI","Python","PostgreSQL","SQLAlchemy","Alembic","Pydantic","WebSockets","Pytest"]',
    'Modular FastAPI architecture with separated API, schema, model, and service layers. PostgreSQL as the primary source of truth for inventory and financial operations. Async SQLAlchemy integration using asyncpg. Alembic migration system for schema versioning. Decimal-based financial calculations for transaction precision. WebSocket-ready architecture for future real-time POS synchronization.',
    'Backend-first architecture focused on reliability and maintainability. Built using PostgreSQL and Alembic for long-term schema consistency. Designed with scalability and testability as core priorities.',
    'Preventing floating-point precision errors in financial workflows. Designing immutable transaction workflows suitable for audit trails. Maintaining data integrity during asynchronous operations. Structuring reusable calculation systems for fees and VAT handling.',
    'Built a production-oriented backend suitable for retail systems. Implemented reliable financial calculation workflows using Decimal precision. Established scalable API architecture for future expansion.',
    NULL,
    'https://github.com/M-Alhbyb/ezoo_pos',
    'published',
    true,
    5,
    CURRENT_TIMESTAMP
),
(
    2,
    1,
    'Rose Gate ERP System',
    'rose-gate-erp-system',
    'Custom ERP system developed for a real store using Laravel and React with multi-role dashboards and operational management tools.',
    '*Private production deployment - client project.*

Rose Gate ERP is a full-stack business management system developed from scratch for a real client operating a retail store.

The system was built using Laravel for the backend and React for the frontend, providing responsive dashboards and operational management tools for multiple user roles.

The project includes role-based access control, administrative dashboards, business data management, and internal workflows designed to simplify store operations.

The application was deployed and actively used in a production environment, providing practical experience in client-focused development and operational business systems.',
    '["Laravel","React","MySQL","REST API"]',
    'Laravel backend with RESTful API architecture. React frontend with reusable dashboard components. Multi-role permission system for operational workflows. MySQL database for business data management. Structured backend services and API communication layers.',
    'Developed for a real client and deployed in production. Built using iterative delivery focused on practical business needs. Prioritized usability and operational simplicity.',
    'Designing role-based workflows for different operational users. Structuring frontend/backend integration cleanly through APIs. Building maintainable ERP workflows for real-world usage.',
    'Successfully deployed for real-world store operations. Improved operational organization through centralized workflows. Delivered a customized ERP solution for a production business.',
    NULL,
    NULL,
    'published',
    true,
    3,
    CURRENT_TIMESTAMP
),
(
    3,
    1,
    'AI Inventory Management System',
    'ai-inventory-management-system',
    'AI-powered inventory management platform with transaction tracking, Arabic localization, and predictive stock analytics.',
    '**Repository:** [GitHub - M-Alhbyb/Django_Inventory_System](https://github.com/M-Alhbyb/Django_Inventory_System)

An enterprise inventory management platform designed for merchants and representatives with AI-powered analytics and operational reporting.

The system integrates Google Gemini AI tools for natural language queries and Prophet time-series forecasting for stock prediction and inventory monitoring.

The application includes transaction management, merchant debt tracking, inventory calculations, reporting dashboards, and Arabic RTL localization.

The backend uses Django with Celery and Redis for asynchronous task processing and scalable background operations.',
    '["Django","Python","PostgreSQL","Google Gemini API","Prophet","Celery","Redis","TailwindCSS"]',
    'Modular Django architecture with separated business domains. AI service layer integrating Google Gemini APIs. Prophet forecasting integration for stock prediction. Celery and Redis for async background processing. Arabic RTL interface and reporting support.',
    'Designed for maintainability and operational scalability. Focused on modular architecture and reusable services. Built with real-world inventory workflows in mind.',
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
    4,
    1,
    'Django E-Commerce Platform',
    'django-ecommerce-platform',
    'Full-stack e-commerce platform with multi-role access control, REST APIs, and production deployment.',
    '**Repository:** [GitHub - M-Alhbyb/Django-E-Commerce-App](https://github.com/M-Alhbyb/Django-E-Commerce-App)
**Live Demo:** [django-e-commerce-app-34ro.onrender.com](https://django-e-commerce-app-34ro.onrender.com)

A full-stack e-commerce platform supporting customers, employees, and management through separate operational workflows.

The project includes role-based access control, REST API endpoints, dynamic shopping cart functionality, product management, and advanced filtering.

The system was deployed publicly and structured using modular Django applications for maintainability and future scalability.',
    '["Django","PostgreSQL","Django REST Framework","Bootstrap"]',
    'Modular Django architecture with separated application domains. REST API layer using Django REST Framework. Multi-role access control using decorators and permissions. PostgreSQL relational database structure.',
    'Deployed publicly using cloud hosting infrastructure. Built with scalability and maintainability in mind. Structured for future API integrations.',
    'Designing scalable role-based workflows. Structuring reusable API endpoints. Managing relational product and cart systems. Building maintainable multi-app architecture.',
    'Delivered a production-ready e-commerce platform. Implemented reusable API and authentication systems. Built scalable multi-role business workflows.',
    NULL,
    'https://django-e-commerce-app-34ro.onrender.com',
    'published',
    false,
    7,
    CURRENT_TIMESTAMP
),
(
    5,
    1,
    'Jitsi Meeting Dashboard',
    'jitsi-meeting-dashboard',
    'Management dashboard for Jitsi Meet infrastructure with JWT authentication and real-time monitoring.',
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
    6,
    1,
    'HTMX Finance Tracker',
    'htmx-finance-tracker',
    'Personal finance tracking application using HTMX for reactive server-driven UI interactions.',
    '**Repository:** [GitHub - M-Alhbyb/Django_HTMX_Finance_App](https://github.com/M-Alhbyb/Django_HTMX_Finance_App)
**Live Demo:** [pasha-finance-app.onrender.com](https://pasha-finance-app.onrender.com)

A finance tracking application built using Django and HTMX to provide dynamic interactions without relying heavily on frontend JavaScript frameworks.

The system includes transaction management, category-based analytics, real-time balance updates, and responsive dashboard interfaces.

The project demonstrates server-driven UI patterns and lightweight reactive workflows.',
    '["Django","HTMX","TailwindCSS","PostgreSQL"]',
    'Django server-rendered architecture. HTMX-based dynamic interactions. TailwindCSS responsive UI design. Transaction-based financial data structure.',
    'Focused on lightweight and maintainable frontend architecture. Built using modern server-driven UI patterns.',
    'Building reactive interfaces without heavy frontend frameworks. Managing real-time UI updates using server-rendered components. Structuring maintainable HTMX workflows.',
    'Delivered responsive real-time interactions with minimal frontend complexity. Demonstrated efficient server-driven UI architecture.',
    NULL,
    'https://pasha-finance-app.onrender.com',
    'published',
    false,
    9,
    CURRENT_TIMESTAMP
),
(
    7,
    1,
    'ETamkeen365',
    'etamkeen365',
    'Adaptive intervention and family-support platform for children with developmental and behavioral challenges using deterministic assessment and planning systems.',
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
Arabic RTL support with responsive dashboard interfaces

Challenges Solved:

Designing deterministic intervention workflows instead of unsafe autonomous AI behavior
Managing adaptive progression while preserving explainability and operational safety
Building reassessment and adherence systems with lifecycle-safe transitions
Structuring operational recovery and auditability systems
Handling complex caregiver, specialist, and administrator workflows in one platform

Deployment & Process Notes:

Designed for production-readiness and operational rollout
Focused on maintainability, auditability, and deterministic behavior
Built using gradual rollout and rollback-first operational philosophy
Security hardening and lifecycle testing integrated throughout development

Measurable Outcomes:

Built a production-oriented adaptive intervention platform
Implemented complete reassessment and adherence tracking systems
Delivered deterministic operational workflows suitable for real-world caregiving environments
Created scalable infrastructure for long-term platform expansion',
    '["Django","Django REST Framework","React","TypeScript","PostgreSQL","Celery","Redis","Zustand"]',
    'Modular Django monolith architecture with 20+ domain modules. Django REST Framework backend with service-layer architecture. React + TypeScript frontend with modular dashboard systems. PostgreSQL database with lifecycle-safe state transitions. Celery and Redis for deterministic scheduling and operational tasks. Zustand state management for frontend workflows. Ownership-first permission architecture and append-only audit logs. Arabic RTL support with responsive dashboard interfaces.',
    'Designed for production-readiness and operational rollout. Focused on maintainability, auditability, and deterministic behavior. Built using gradual rollout and rollback-first operational philosophy. Security hardening and lifecycle testing integrated throughout development.',
    'Designing deterministic intervention workflows instead of unsafe autonomous AI behavior. Managing adaptive progression while preserving explainability and operational safety. Building reassessment and adherence systems with lifecycle-safe transitions. Structuring operational recovery and auditability systems. Handling complex caregiver, specialist, and administrator workflows in one platform.',
    'Built a production-oriented adaptive intervention platform. Implemented complete reassessment and adherence tracking systems. Delivered deterministic operational workflows suitable for real-world caregiving environments. Created scalable infrastructure for long-term platform expansion.',
    NULL,
    'https://etamkeen.net',
    'published',
    true,
    2,
    CURRENT_TIMESTAMP
),
(
    8,
    1,
    'Manfith Logistics Platform',
    'manfith-logistics-platform',
    'Saudi logistics container management platform connecting cargo owners and logistics service providers through a unified digital marketplace.',
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
Structuring scalable multi-role operational dashboards
Designing unified workflows for vendors, clients, and administrators

Deployment & Process Notes:

CI/CD deployment pipelines using GitHub Actions
PM2-managed production backend infrastructure
Multi-application deployment architecture
Built for real-world operational logistics workflows

Measurable Outcomes:

Centralized logistics workflows into a unified platform
Enabled operational coordination between multiple logistics actors
Delivered scalable multi-role dashboards and real-time communication systems',
    '["Node.js","Express.js","MySQL","Sequelize","Vue 3","TailwindCSS","Socket.io","JWT"]',
    'Monorepo architecture with separated backend, website, and dashboard applications. Express.js backend with Sequelize ORM and MySQL database. Vue 3 frontend architecture using Vite and TailwindCSS. Socket.io real-time communication system. JWT authentication with OTP email verification workflows. Role-based access control with granular permissions. CI/CD automation using GitHub Actions and PM2 deployment pipelines. Arabic-first localization with RTL support.',
    'CI/CD deployment pipelines using GitHub Actions. PM2-managed production backend infrastructure. Multi-application deployment architecture. Built for real-world operational logistics workflows.',
    'Managing large operational workflows across multiple logistics providers. Building bilingual Arabic/English interfaces with RTL support. Implementing real-time communication and notifications. Structuring scalable multi-role operational dashboards. Designing unified workflows for vendors, clients, and administrators.',
    'Centralized logistics workflows into a unified platform. Enabled operational coordination between multiple logistics actors. Delivered scalable multi-role dashboards and real-time communication systems.',
    NULL,
    'https://manfith.com',
    'published',
    true,
    4,
    CURRENT_TIMESTAMP
),
(
    9,
    1,
    'Asia Buildings Platform',
    'asia-buildings-platform',
    'Business platform maintenance and optimization work including debugging, SEO improvements, and operational enhancements for a real company website.',
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
),
(
    10,
    1,
    'Bahnhofli Grill Ordering & Delivery Platform',
    'bahnhofli-grill-platform',
    'Restaurant ordering and POS platform with delivery and pickup management workflows built using the MERN stack.',
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
    'Worked on a live production restaurant platform. Focused on operational reliability and workflow stability. Added new business features while preserving existing order systems. Used Docker-based workflows for environment consistency.',
    'Fixing production issues in active restaurant workflows. Designing delivery and pickup operational logic. Maintaining stable order processing while extending platform functionality. Coordinating frontend and backend updates across ecommerce workflows.',
    'Expanded the platform with delivery and pickup management capabilities. Improved operational ordering workflows for restaurant staff and customers. Resolved production bugs affecting ecommerce and POS operations.',
    NULL,
    'https://bahnhofligrill.ch/',
    'published',
    true,
    1,
    CURRENT_TIMESTAMP
)
;

INSERT OR IGNORE INTO posts (
    id,
    user_id,
    title,
    slug,
    content,
    excerpt,
    featured_image,
    status,
    locale,
    published_at
) VALUES
(
    1,
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
    2,
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
    3,
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
    4,
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

INSERT OR IGNORE INTO settings (
    id,
    key,
    value,
    group_name,
    locale
) VALUES
(1, 'site_title', 'MohamedElhabib Mohamed | Full Stack &amp; AI Developer', 'general', 'en'),
(2, 'site_description', 'Backend-heavy full stack developer building real systems -- financial platforms, ERP solutions, POS systems, and AI-powered tools.', 'general', 'en'),
(3, 'hero_title_en', 'Building Real Systems That Solve Business Problems', 'hero', 'en'),
(4, 'hero_title_ar', 'أبني أنظمة حقيقية تحل مشاكل الأعمال', 'hero', 'ar'),
(5, 'hero_subtitle_en', 'Backend engineer specializing in financial systems, ERP architecture, scalable APIs, and AI-powered platforms.', 'hero', 'en'),
(6, 'hero_subtitle_ar', 'مهندس backend متخصص في الأنظمة المالية، هندسة ERP، واجهات برمجية قابلة للتوسع، ومنصات ذكاء اصطناعي.', 'hero', 'ar'),
(7, 'social_github', 'https://github.com/M-Alhbyb', 'social', 'en'),
(8, 'social_linkedin', 'https://linkedin.com/in/m-elhabib', 'social', 'en'),
(9, 'social_email', 'mohammedalhbyb@gmail.com', 'social', 'en')
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

INSERT OR IGNORE INTO posts (
    id,
    user_id,
    title,
    slug,
    content,
    excerpt,
    featured_image,
    status,
    meta_title,
    meta_description,
    locale,
    published_at
) VALUES
(
    5,
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
    6,
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
    7,
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
    8,
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
    9,
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
    10,
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
    11,
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
    12,
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
    13,
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
    14,
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
    15,
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
    16,
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
(5, 1), (5, 2),
(6, 3), (6, 4),
(7, 5), (7, 6),
(8, 1), (8, 7),
(9, 8), (9, 9),
(10, 10), (10, 2),
(11, 11), (11, 3),
(12, 8), (12, 12),
(13, 6), (13, 8),
(14, 4), (14, 3),
(15, 1), (15, 7),
(16, 12), (16, 8)
;

INSERT OR IGNORE INTO post_tags (post_id, tag_id) VALUES
(5, 1), (5, 2), (5, 3), (5, 4), (5, 5),
(6, 6), (6, 7), (6, 8), (6, 9), (6, 1),
(7, 10), (7, 11), (7, 12), (7, 13), (7, 14),
(8, 15), (8, 1), (8, 16), (8, 3), (8, 17),
(9, 18), (9, 19), (9, 20), (9, 5),
(10, 21), (10, 22), (10, 16), (10, 23),
(11, 6), (11, 24), (11, 8), (11, 13),
(12, 16), (12, 25), (12, 26), (12, 20),
(13, 12), (13, 4), (13, 23), (13, 16),
(14, 7), (14, 27), (14, 8), (14, 28),
(15, 1), (15, 3), (15, 30), (15, 29),
(16, 25), (16, 20), (16, 5), (16, 4)
;

COMMIT;
