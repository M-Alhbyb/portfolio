-- Elhabib Portfolio - Complete Seed Data

-- Admin user (password: mohpsh00)
INSERT INTO users (username, email, password_hash, display_name)
VALUES ('admin', 'admin@elhabib.dev', '$2y$12$rxMvgE3jO5t6PSVCodwC.e4sMf9fLYuQoHOVZmp3bSe2JNjq.0BPq', 'Admin')
ON CONFLICT (username) DO NOTHING;

INSERT INTO skills (name, category, proficiency, icon, sort_order) VALUES
('Python', 'Backend', 92, NULL, 1),
('FastAPI', 'Backend', 82, NULL, 2),
('Django', 'Backend', 88, NULL, 3),
('Django REST Framework', 'Backend', 85, NULL, 4),
('Laravel', 'Backend', 70, NULL, 5),
('REST APIs', 'Backend', 90, NULL, 6),
('SQLAlchemy', 'Backend', 78, NULL, 7),
('Celery', 'Backend', 83, NULL, 8),
('PostgreSQL', 'Database', 88, NULL, 9),
('MySQL', 'Database', 76, NULL, 10),
('Database Design', 'Database', 86, NULL, 11),
('HTML', 'Frontend', 88, NULL, 12),
('CSS', 'Frontend', 85, NULL, 13),
('JavaScript', 'Frontend', 82, NULL, 14),
('TailwindCSS', 'Frontend', 84, NULL, 15),
('Bootstrap', 'Frontend', 72, NULL, 16),
('HTMX', 'Frontend', 80, NULL, 17),
('React', 'Frontend', 65, NULL, 18),
('Git', 'DevOps', 90, NULL, 19),
('Linux', 'DevOps', 93, NULL, 20),
('Docker', 'DevOps', 88, NULL, 21),
('Redis', 'DevOps', 82, NULL, 22),
('Alembic', 'DevOps', 70, NULL, 23),
('System Architecture', 'Backend', 85, NULL, 24),
('Async Programming', 'Backend', 80, NULL, 25),
('Financial Systems', 'Backend', 78, NULL, 26),
('ERP Systems', 'Backend', 76, NULL, 27),
('POS Systems', 'Backend', 82, NULL, 28),
('API Integration', 'Backend', 86, NULL, 29),
('AI Integration', 'Backend', 72, NULL, 30)
ON CONFLICT DO NOTHING;

INSERT INTO timeline (type, period, title, organization, description, place, work_type, link, logo, sort_order) VALUES
('experience', 'Dec 2025 - Present', 'Full Stack Web Developer', 'Masirat Kum Company', 'Led core platform development serving 500+ users using Python and Django, streamlined DevOps workflows reducing deployment time by 60%, optimized PostgreSQL and Redis performance cutting query latency by 40%, and incorporated AI-powered platform features.', 'Riyadh, Saudi Arabic', 'Remote', 'https://cevehat.com', NULL, 1),
('experience', 'Jan 2026 - Present', 'Infrastructure & DevOps Lead', 'Finjan Investment LLC.', 'Directed infrastructure recovery operations in Qatar, migrated 28 breached websites to AWS infrastructure, secured +25 production systems, and coordinated technical crisis management for an enterprise portfolio.', 'Doha, Qatar', 'Remote', 'https://finjan.vc', NULL, 2),
('experience', 'Nov 2025 - Jan 2026', 'Junior Full Stack Developer', 'Elexplatform.online', 'Completed a full-stack training project gaining hands-on experience with Django, deployment workflows, and asynchronous backend architecture.', 'Portsudan, Sudan.', 'On-site', 'https://elexplatform.online', NULL, 3),
('experience', 'Sept 2025 - Present', 'IT Intern', 'Esh3ark', 'Gained hands-on experience in FinTech environments, studied system maintenance and web security protocols, and learned SEO optimization techniques in a production setting.', 'Portsudan, Sudan.', 'Hybrid', 'https://esh3ark.com', NULL, 4),
('experience', 'Sep 2025 - Present', 'Freelance Web Developer & Systems Administrator', 'Independent', 'Developed POS systems and inventory platforms for 5+ businesses, and administered Linux infrastructure and production hosting across 10+ servers.', '', 'Remote', NULL, NULL, 5),
('education', '2026 - Present', 'Bachelor of Information Technology', 'Sudan Open University', 'Currently studying Information Technology with focus on software systems and technical infrastructure.', 'Sudan', '', 'https://www.ous.edu.sd/', NULL, 6),
('education', '2019 - 2024', 'Bachelor of Arabic Language and Literature', 'Omdurman Islamic University', 'Graduated with honors and excellent academic performance.', 'Omdurman, Sudan', '', 'https://oiu.edu.sd', NULL, 7)
ON CONFLICT DO NOTHING;

INSERT INTO volunteering (title, organization, description, place, start_date, end_date, link, sort_order) VALUES
('Field Operations & Campaign Coordinator', 'Takaful Charity Organization', 'Graduate of the Leadership Preparation Program, Batch 4. Managed and coordinated 5 field teams during Ramadan aid campaigns. Prepared operational and financial daily reports. Supervised field operations and solved team coordination issues. Supervised more than 30 charity kitchens serving over 1500 families daily during Ramadan. Managed distribution operations for Eid campaigns benefiting more than 700 families. Designed social media and campaign materials for multiple initiatives.', 'Sudan', '2021', 'Present', NULL, 1),
('Co-Founder & Secretary General', 'Sawaed Al-Dhad Charity Association', 'Co-founder and Secretary General of the association. Managed winter clothing and food support initiatives. Participated in fundraising campaign planning and coordination. Supported more than 100 families through charitable initiatives. Prepared operational and organizational reports.', 'Sudan', '2022', '2022', NULL, 2),
('Media & Event Organization Volunteer', 'Khutwa Charity Foundation', 'Participated in media and event organization activities. Assisted with graphic design and initiative support activities. Contributed to organizational event coordination.', 'Omdurman, Sudan', '2021', '2021', NULL, 3),
('Deputy Media Supervisor', 'Arabic Language Faculty Committee', 'Elected Deputy Media Supervisor. Designed media materials and student activity graphics. Participated in organizing student receptions, sports events, and cultural activities.', 'Omdurman Islamic University', '2022', '2022', NULL, 4)
ON CONFLICT DO NOTHING;

INSERT INTO languages (name, proficiency, sort_order) VALUES
('English', 'Upper Intermediate', 1),
('Arabic', 'Native', 2)
ON CONFLICT DO NOTHING;

INSERT INTO projects (user_id, title, slug, short_description, content, tech_stack, architecture_details, deployment_notes, challenges, outcomes, thumbnail, link, status, featured, sort_order, created_at) VALUES
(
    1,
    'EZOO POS System',
    'ezoo-pos-system',
    'Enterprise-grade POS backend focused on financial accuracy, inventory management, and asynchronous operations using FastAPI and PostgreSQL.',
    E'**Repository:** [GitHub - M-Alhbyb/ezoo_pos](https://github.com/M-Alhbyb/ezoo_pos)\n\nEZOO POS is a backend-focused point-of-sale system designed for retail environments requiring reliable transaction handling and strict financial accuracy.\n\nThe system was developed using FastAPI with asynchronous database operations to support scalable performance and concurrent usage scenarios.\n\nA major focus during development was preventing financial precision issues by using Decimal arithmetic instead of floating-point calculations.\n\nThe project includes inventory management, transaction processing, fee calculations, VAT support, immutable sales records, and structured validation using Pydantic schemas.\n\nThe backend architecture emphasizes explicit business rules, data consistency, maintainability, and backend authority over calculations and validations.',
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
    1,
    'Rose Gate ERP System',
    'rose-gate-erp-system',
    'Custom ERP system developed for a real store using Laravel and React with multi-role dashboards and operational management tools.',
    E'*Private production deployment - client project.*\n\nRose Gate ERP is a full-stack business management system developed from scratch for a real client operating a retail store.\n\nThe system was built using Laravel for the backend and React for the frontend, providing responsive dashboards and operational management tools for multiple user roles.\n\nThe project includes role-based access control, administrative dashboards, business data management, and internal workflows designed to simplify store operations.\n\nThe application was deployed and actively used in a production environment, providing practical experience in client-focused development and operational business systems.',
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
    1,
    'AI Inventory Management System',
    'ai-inventory-management-system',
    'AI-powered inventory management platform with transaction tracking, Arabic localization, and predictive stock analytics.',
    E'**Repository:** [GitHub - M-Alhbyb/Django_Inventory_System](https://github.com/M-Alhbyb/Django_Inventory_System)\n\nAn enterprise inventory management platform designed for merchants and representatives with AI-powered analytics and operational reporting.\n\nThe system integrates Google Gemini AI tools for natural language queries and Prophet time-series forecasting for stock prediction and inventory monitoring.\n\nThe application includes transaction management, merchant debt tracking, inventory calculations, reporting dashboards, and Arabic RTL localization.\n\nThe backend uses Django with Celery and Redis for asynchronous task processing and scalable background operations.',
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
    1,
    'Django E-Commerce Platform',
    'django-ecommerce-platform',
    'Full-stack e-commerce platform with multi-role access control, REST APIs, and production deployment.',
    E'**Repository:** [GitHub - M-Alhbyb/Django-E-Commerce-App](https://github.com/M-Alhbyb/Django-E-Commerce-App)\n**Live Demo:** [django-e-commerce-app-34ro.onrender.com](https://django-e-commerce-app-34ro.onrender.com)\n\nA full-stack e-commerce platform supporting customers, employees, and management through separate operational workflows.\n\nThe project includes role-based access control, REST API endpoints, dynamic shopping cart functionality, product management, and advanced filtering.\n\nThe system was deployed publicly and structured using modular Django applications for maintainability and future scalability.',
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
    1,
    'Jitsi Meeting Dashboard',
    'jitsi-meeting-dashboard',
    'Management dashboard for Jitsi Meet infrastructure with JWT authentication and real-time monitoring.',
    E'**Repository:** [GitHub - M-Alhbyb/jitsi-dashboard](https://github.com/M-Alhbyb/jitsi-dashboard)\n\nA Django-based dashboard for managing Jitsi Meet conferencing infrastructure and monitoring meeting operations.\n\nThe project integrates Jitsi APIs to manage meetings, monitor participants, and handle authentication workflows using JWT tokens.\n\nThe system also includes webhook handling and operational monitoring tools for conference management.',
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
    1,
    'HTMX Finance Tracker',
    'htmx-finance-tracker',
    'Personal finance tracking application using HTMX for reactive server-driven UI interactions.',
    E'**Repository:** [GitHub - M-Alhbyb/Django_HTMX_Finance_App](https://github.com/M-Alhbyb/Django_HTMX_Finance_App)\n**Live Demo:** [pasha-finance-app.onrender.com](https://pasha-finance-app.onrender.com)\n\nA finance tracking application built using Django and HTMX to provide dynamic interactions without relying heavily on frontend JavaScript frameworks.\n\nThe system includes transaction management, category-based analytics, real-time balance updates, and responsive dashboard interfaces.\n\nThe project demonstrates server-driven UI patterns and lightweight reactive workflows.',
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

INSERT INTO posts (user_id, title, slug, content, excerpt, featured_image, status, locale, published_at) VALUES
(
    1,
    'How I Recovered 28 Breached Websites',
    'how-i-recovered-28-breached-websites',
    E'## How I Recovered 28 Breached Websites\n\nInfrastructure recovery requires speed, prioritization, and discipline. During a critical migration project, I worked on recovering compromised production websites and restoring operational stability.\n\nThe process included server hardening, malware cleanup, database recovery, AWS migration, Docker deployment, and infrastructure optimization.\n\nThe experience strengthened my ability to work under pressure while maintaining technical precision.',
    'Lessons learned from recovering and migrating compromised production systems.',
    NULL,
    NULL,
    'published',
    'en',
    NOW()
),
(
    1,
    'Building Scalable Django Systems',
    'building-scalable-django-systems',
    E'## Building Scalable Django Systems\n\nModern Django systems require clean architecture, asynchronous workflows, optimized databases, and reliable deployment pipelines.\n\nI use Celery, Redis, PostgreSQL, Docker, and Linux infrastructure to build scalable backend systems focused on reliability and maintainability.',
    'Practical backend architecture patterns for scalable Django applications.',
    NULL,
    NULL,
    'published',
    'en',
    NOW()
),
(
    1,
    'Why Linux Became My Primary Development Environment',
    'why-linux-became-my-primary-development-environment',
    E'## Why Linux Became My Primary Development Environment\n\nLinux provides flexibility, control, and performance for modern development workflows. My daily workflow relies heavily on Linux administration, terminal tooling, Docker environments, and server management.\n\nUsing Linux improved my understanding of infrastructure, deployment systems, and backend operations.',
    'How Linux improved my workflow as a full-stack developer and DevOps engineer.',
    NULL,
    NULL,
    'published',
    'en',
    NOW()
),
(
    1,
    'Asynchronous Tasks with Celery and Redis',
    'asynchronous-tasks-with-celery-and-redis',
    E'## Asynchronous Tasks with Celery and Redis\n\nAsynchronous task queues improve application responsiveness and scalability. I use Celery with Redis to handle background jobs, notifications, processing tasks, and long-running workflows.\n\nThis architecture improves user experience and system performance under load.',
    'Improving backend responsiveness using asynchronous task processing.',
    NULL,
    NULL,
    'published',
    'en',
    NOW()
)
ON CONFLICT DO NOTHING;

INSERT INTO settings (key, value, group_name, locale) VALUES
('site_title', 'Mohamed Elhabib | Backend Engineer & Systems Architect', 'general', 'en'),
('site_description', 'Backend-heavy full stack developer building real systems -- financial platforms, ERP solutions, POS systems, and AI-powered tools.', 'general', 'en'),
('hero_title_en', 'Building Real Systems That Solve Business Problems', 'hero', 'en'),
('hero_title_ar', 'أبني أنظمة حقيقية تحل مشاكل الأعمال', 'hero', 'ar'),
('hero_subtitle_en', 'Backend engineer specializing in financial systems, ERP architecture, scalable APIs, and AI-powered platforms.', 'hero', 'en'),
('hero_subtitle_ar', 'مهندس backend متخصص في الأنظمة المالية، هندسة ERP، واجهات برمجية قابلة للتوسع، ومنصات ذكاء اصطناعي.', 'hero', 'ar'),
('social_github', 'https://github.com/M-Alhbyb', 'social', 'en'),
('social_linkedin', 'https://linkedin.com/in/m-elhabib', 'social', 'en'),
('social_email', 'mohamed.elhabib@gmail.com', 'social', 'en')
ON CONFLICT (key) DO NOTHING;
