BEGIN;

TRUNCATE TABLE projects RESTART IDENTITY CASCADE;
TRUNCATE TABLE posts RESTART IDENTITY CASCADE;
TRUNCATE TABLE skills RESTART IDENTITY CASCADE;
TRUNCATE TABLE timeline RESTART IDENTITY CASCADE;
TRUNCATE TABLE volunteering RESTART IDENTITY CASCADE;
TRUNCATE TABLE languages RESTART IDENTITY CASCADE;
TRUNCATE TABLE settings RESTART IDENTITY CASCADE;

INSERT INTO skills (
    id,
    name,
    category,
    proficiency,
    icon,
    sort_order
) VALUES
(1, 'Python', 'Backend', 92, NULL, 1),
(2, 'FastAPI', 'Backend', 82, NULL, 2),
(3, 'Django', 'Backend', 88, NULL, 3),
(4, 'Django REST Framework', 'Backend', 85, NULL, 4),
(5, 'Laravel', 'Backend', 70, NULL, 5),
(6, 'REST APIs', 'Backend', 90, NULL, 6),
(7, 'SQLAlchemy', 'Backend', 78, NULL, 7),
(8, 'Celery', 'Backend', 83, NULL, 8),
(9, 'PostgreSQL', 'Database', 88, NULL, 9),
(10, 'MySQL', 'Database', 76, NULL, 10),
(11, 'Database Design', 'Database', 86, NULL, 11),
(12, 'HTML', 'Frontend', 88, NULL, 12),
(13, 'CSS', 'Frontend', 85, NULL, 13),
(14, 'JavaScript', 'Frontend', 82, NULL, 14),
(15, 'TailwindCSS', 'Frontend', 84, NULL, 15),
(16, 'Bootstrap', 'Frontend', 72, NULL, 16),
(17, 'HTMX', 'Frontend', 80, NULL, 17),
(18, 'React', 'Frontend', 65, NULL, 18),
(19, 'Git', 'DevOps', 90, NULL, 19),
(20, 'Linux', 'DevOps', 93, NULL, 20),
(21, 'Docker', 'DevOps', 88, NULL, 21),
(22, 'Redis', 'DevOps', 82, NULL, 22),
(23, 'Alembic', 'DevOps', 70, NULL, 23),
(24, 'System Architecture', 'Backend', 85, NULL, 24),
(25, 'Async Programming', 'Backend', 80, NULL, 25),
(26, 'Financial Systems', 'Backend', 78, NULL, 26),
(27, 'ERP Systems', 'Backend', 76, NULL, 27),
(28, 'POS Systems', 'Backend', 82, NULL, 28),
(29, 'API Integration', 'Backend', 86, NULL, 29),
(30, 'AI Integration', 'Backend', 72, NULL, 30)
ON CONFLICT DO NOTHING;

INSERT INTO timeline (
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
ON CONFLICT DO NOTHING;

INSERT INTO volunteering (id, title, organization, description, place, start_date, end_date, link, sort_order) VALUES
(1, 'Field Operations &amp; Campaign Coordinator', 'Takaful Charity Organization', 'Graduate of the Leadership Preparation Program, Batch 4. Managed and coordinated 5 field teams during Ramadan aid campaigns. Prepared operational and financial daily reports. Supervised field operations and solved team coordination issues. Supervised more than 30 charity kitchens serving over 1500 families daily during Ramadan. Managed distribution operations for Eid campaigns benefiting more than 700 families. Designed social media and campaign materials for multiple initiatives.', 'Sudan', '2021', 'Present', NULL, 1),
(2, 'Co-Founder &amp; Secretary General', 'Sawaed Al-Dhad Charity Association', 'Co-founder and Secretary General of the association. Managed winter clothing and food support initiatives. Participated in fundraising campaign planning and coordination. Supported more than 100 families through charitable initiatives. Prepared operational and organizational reports.', 'Sudan', '2022', '2022', NULL, 2),
(3, 'Media &amp; Event Organization Volunteer', 'Khutwa Charity Foundation', 'Participated in media and event organization activities. Assisted with graphic design and initiative support activities. Contributed to organizational event coordination.', 'Omdurman, Sudan', '2021', '2021', NULL, 3),
(4, 'Deputy Media Supervisor', 'Arabic Language Faculty Committee', 'Elected Deputy Media Supervisor. Designed media materials and student activity graphics. Participated in organizing student receptions, sports events, and cultural activities.', 'Omdurman Islamic University', '2022', '2022', NULL, 4)
ON CONFLICT DO NOTHING;

INSERT INTO languages (id, name, proficiency, sort_order) VALUES
(1, 'English', 'Upper Intermediate', 1),
(2, 'Arabic', 'Native', 2)
ON CONFLICT DO NOTHING;

INSERT INTO projects (
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
    'Enterprise-grade POS backend focused on financial accuracy, inventory management, and asynchronous operations using FastAPI and PostgreSQL.',
    '**Repository:** [GitHub - M-Alhbyb/ezoo_pos](https://github.com/M-Alhbyb/ezoo_pos)

EZOO POS is a backend-focused point-of-sale system designed for retail environments requiring reliable transaction handling and strict financial accuracy.

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
    1,
    NOW()
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
    2,
    NOW()
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
    3,
    NOW()
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
    true,
    4,
    NOW()
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
    5,
    NOW()
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
    6,
    NOW()
)
ON CONFLICT DO NOTHING;

INSERT INTO posts (
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
    NOW()
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
    NOW()
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
    NOW()
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
    NOW()
)
ON CONFLICT DO NOTHING;

INSERT INTO settings (
    id,
    key,
    value,
    group_name,
    locale
) VALUES
(1, 'site_title', 'Mohamed Elhabib | Backend Engineer &amp; Systems Architect', 'general', 'en'),
(2, 'site_description', 'Backend-heavy full stack developer building real systems -- financial platforms, ERP solutions, POS systems, and AI-powered tools.', 'general', 'en'),
(3, 'hero_title_en', 'Building Real Systems That Solve Business Problems', 'hero', 'en'),
(4, 'hero_title_ar', 'أبني أنظمة حقيقية تحل مشاكل الأعمال', 'hero', 'ar'),
(5, 'hero_subtitle_en', 'Backend engineer specializing in financial systems, ERP architecture, scalable APIs, and AI-powered platforms.', 'hero', 'en'),
(6, 'hero_subtitle_ar', 'مهندس backend متخصص في الأنظمة المالية، هندسة ERP، واجهات برمجية قابلة للتوسع، ومنصات ذكاء اصطناعي.', 'hero', 'ar'),
(7, 'social_github', 'https://github.com/M-Alhbyb', 'social', 'en'),
(8, 'social_linkedin', 'https://linkedin.com/in/m-elhabib', 'social', 'en'),
(9, 'social_email', 'mohamed.elhabib@gmail.com', 'social', 'en')
ON CONFLICT DO NOTHING;

COMMIT;
