BEGIN;

TRUNCATE TABLE projects RESTART IDENTITY CASCADE;
TRUNCATE TABLE posts RESTART IDENTITY CASCADE;
TRUNCATE TABLE skills RESTART IDENTITY CASCADE;
TRUNCATE TABLE timeline RESTART IDENTITY CASCADE;
TRUNCATE TABLE settings RESTART IDENTITY CASCADE;

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
    status,
    featured,
    sort_order,
    created_at
) VALUES
(
    1,
    1,
    'Enterprise Recovery & Infrastructure Migration',
    'enterprise-recovery-infrastructure-migration',
    'Recovered and migrated 28 compromised websites to secure AWS infrastructure under high-pressure conditions.',
    '<h2>Enterprise Recovery & Infrastructure Migration</h2>

<p>This project focused on recovering and securing 28 breached production websites for a large business group operating in Qatar. The infrastructure had critical security vulnerabilities, unstable hosting environments, and damaged databases.</p>

<h3>Responsibilities</h3>
<ul>
<li>Investigated server breaches and isolated compromised services</li>
<li>Migrated websites from legacy infrastructure to AWS EC2 instances</li>
<li>Configured Docker-based deployments and Nginx reverse proxies</li>
<li>Cleaned infected databases and restored platform integrity</li>
<li>Implemented backup and monitoring workflows</li>
<li>Delivered technical reports to management teams</li>
</ul>

<h3>Technical Execution</h3>
<p>The migration process used containerized deployment workflows with Docker and Linux-based server administration. PostgreSQL and MySQL optimization improved system stability while Redis caching reduced server load.</p>

<h3>Security Improvements</h3>
<ul>
<li>Hardened Linux servers</li>
<li>Secured database access layers</li>
<li>Implemented HTTPS and firewall rules</li>
<li>Improved operational monitoring</li>
</ul>

<h3>Impact</h3>
<p>The infrastructure was stabilized in record time, restoring production systems while reducing operational risks.</p>',
    '["Python","Docker","Linux","AWS EC2","Nginx","PostgreSQL","Redis","Bash","CI/CD"]',
    'Distributed infrastructure architecture using Docker containers deployed on AWS EC2 instances with Nginx reverse proxy configuration and database optimization layers.',
    'Production deployment handled using Linux servers, Docker orchestration, AWS infrastructure, SSL configuration, and secure backup systems.',
    'Managing security breaches, restoring corrupted systems, handling urgent migrations, and maintaining service continuity under pressure.',
    'Successfully recovered 28 production websites and stabilized critical business infrastructure.',
    NULL,
    'published',
    true,
    1,
    NOW()
),
(
    2,
    1,
    'AI-Powered Educational Platform',
    'ai-powered-educational-platform',
    'Built and maintained an integrated educational platform with scalable backend architecture and asynchronous processing.',
    '<h2>AI-Powered Educational Platform</h2>

<p>This platform was developed to provide modern educational workflows including authentication systems, content management, student progress tracking, and asynchronous task handling.</p>

<h3>Main Features</h3>
<ul>
<li>User authentication and access control</li>
<li>Content management workflows</li>
<li>Student progress tracking</li>
<li>Background task processing</li>
<li>Scalable deployment infrastructure</li>
</ul>

<h3>Backend Architecture</h3>
<p>The backend relied on Django and Django REST Framework with Celery and Redis for asynchronous task execution. PostgreSQL handled relational data management.</p>

<h3>Frontend Stack</h3>
<p>The frontend used HTMX, Tailwind CSS, Alpine.js, and modern component-based workflows for responsive interfaces.</p>

<h3>Performance</h3>
<p>Infrastructure optimization improved responsiveness and ensured smooth user experience during peak activity.</p>',
    '["Python","Django","Django REST Framework","Celery","Redis","PostgreSQL","HTMX","Tailwind CSS","Alpine.js","Docker"]',
    'Modular Django architecture with asynchronous workers powered by Celery and Redis. PostgreSQL used for scalable relational data management.',
    'Dockerized deployment environment with Linux administration and Nginx configuration for reverse proxy handling.',
    'Maintaining responsiveness during concurrent operations and building scalable asynchronous workflows.',
    'Delivered a stable educational platform with scalable backend infrastructure.',
    NULL,
    'published',
    true,
    2,
    NOW()
),
(
    3,
    1,
    'POS & Multi-Warehouse Inventory System',
    'pos-multi-warehouse-inventory-system',
    'Developed integrated POS and inventory management systems for business operations and warehouse tracking.',
    '<h2>POS & Multi-Warehouse Inventory System</h2>

<p>This system was developed to support retail operations, inventory tracking, and warehouse synchronization across multiple business locations.</p>

<h3>Core Modules</h3>
<ul>
<li>Point of Sale workflows</li>
<li>Inventory synchronization</li>
<li>Warehouse management</li>
<li>Financial transaction tracking</li>
<li>Role-based authentication</li>
</ul>

<h3>System Goals</h3>
<p>The platform focused on reliability, speed, and operational simplicity for real-world business environments.</p>

<h3>Infrastructure</h3>
<p>Deployment environments used Linux servers with database optimization and secure backup practices.</p>',
    '["Python","FastAPI","PostgreSQL","MySQL","Docker","Linux","Nginx"]',
    'Backend services designed for warehouse synchronization and transactional consistency using relational databases and API-driven workflows.',
    'Self-managed Linux hosting environments with secure deployment workflows and database optimization.',
    'Handling real-time inventory consistency and ensuring system reliability for business-critical operations.',
    'Delivered practical systems for inventory management and sales operations.',
    NULL,
    'published',
    false,
    3,
    NOW()
),
(
    4,
    1,
    'Personal Infrastructure & Hosting Operations',
    'personal-infrastructure-hosting-operations',
    'Managed hosting infrastructure and deployment operations for multiple production platforms.',
    '<h2>Personal Infrastructure & Hosting Operations</h2>

<p>Managed hosting, deployment, optimization, and maintenance workflows for several production websites and platforms.</p>

<h3>Managed Platforms</h3>
<ul>
<li>asiabuildings.com</li>
<li>manfith.com</li>
<li>hasibh.com</li>
<li>etamkeen.net</li>
<li>finjan.vc</li>
</ul>

<h3>Responsibilities</h3>
<ul>
<li>Linux server administration</li>
<li>Database optimization</li>
<li>Docker deployment management</li>
<li>Nginx configuration</li>
<li>Security hardening</li>
<li>Backup automation</li>
</ul>

<h3>Approach</h3>
<p>Focused on practical infrastructure solutions with strong emphasis on reliability, security, and maintainability.</p>',
    '["Linux","Docker","Nginx","PostgreSQL","MySQL","AWS","GitHub","CI/CD"]',
    'Infrastructure-focused architecture using Linux-based hosting with containerized deployment pipelines.',
    'Managed deployments across VPS and cloud infrastructure environments.',
    'Balancing uptime, security, and scalability across multiple client systems.',
    'Maintained stable hosting operations for multiple production services.',
    NULL,
    'published',
    false,
    4,
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
    '<h2>How I Recovered 28 Breached Websites</h2>

<p>Infrastructure recovery requires speed, prioritization, and discipline. During a critical migration project, I worked on recovering compromised production websites and restoring operational stability.</p>

<p>The process included server hardening, malware cleanup, database recovery, AWS migration, Docker deployment, and infrastructure optimization.</p>

<p>The experience strengthened my ability to work under pressure while maintaining technical precision.</p>',
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
    '<h2>Building Scalable Django Systems</h2>

<p>Modern Django systems require clean architecture, asynchronous workflows, optimized databases, and reliable deployment pipelines.</p>

<p>I use Celery, Redis, PostgreSQL, Docker, and Linux infrastructure to build scalable backend systems focused on reliability and maintainability.</p>',
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
    '<h2>Why Linux Became My Primary Development Environment</h2>

<p>Linux provides flexibility, control, and performance for modern development workflows. My daily workflow relies heavily on Linux administration, terminal tooling, Docker environments, and server management.</p>

<p>Using Linux improved my understanding of infrastructure, deployment systems, and backend operations.</p>',
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
    '<h2>Asynchronous Tasks with Celery and Redis</h2>

<p>Asynchronous task queues improve application responsiveness and scalability. I use Celery with Redis to handle background jobs, notifications, processing tasks, and long-running workflows.</p>

<p>This architecture improves user experience and system performance under load.</p>',
    'Improving backend responsiveness using asynchronous task processing.',
    NULL,
    'published',
    'en',
    NOW()
)
ON CONFLICT DO NOTHING;

INSERT INTO skills (
    id,
    name,
    category,
    proficiency,
    icon,
    sort_order
) VALUES
(1, 'Python', 'Backend', 92, NULL, 1),
(2, 'Django', 'Backend', 90, NULL, 2),
(3, 'FastAPI', 'Backend', 88, NULL, 3),
(4, 'Django REST Framework', 'Backend', 87, NULL, 4),
(5, 'PostgreSQL', 'Database', 86, NULL, 5),
(6, 'Redis', 'Database', 82, NULL, 6),
(7, 'Docker', 'DevOps', 88, NULL, 7),
(8, 'Linux Administration', 'DevOps', 93, NULL, 8),
(9, 'Nginx', 'DevOps', 85, NULL, 9),
(10, 'AWS EC2', 'Cloud', 80, NULL, 10),
(11, 'AWS S3', 'Cloud', 76, NULL, 11),
(12, 'Git & GitHub', 'Tools', 90, NULL, 12),
(13, 'CI/CD Pipelines', 'DevOps', 80, NULL, 13),
(14, 'HTML5', 'Frontend', 88, NULL, 14),
(15, 'CSS3', 'Frontend', 85, NULL, 15),
(16, 'Tailwind CSS', 'Frontend', 84, NULL, 16),
(17, 'HTMX', 'Frontend', 80, NULL, 17),
(18, 'Alpine.js', 'Frontend', 75, NULL, 18),
(19, 'JavaScript', 'Frontend', 82, NULL, 19),
(20, 'PHP', 'Backend', 72, NULL, 20),
(21, 'C', 'Backend', 55, NULL, 21),
(22, 'C++', 'Backend', 50, NULL, 22),
(23, 'SQL', 'Database', 86, NULL, 23),
(24, 'Bash Scripting', 'Tools', 84, NULL, 24),
(25, 'Celery', 'Backend', 83, NULL, 25),
(26, 'React Concepts', 'Frontend', 65, NULL, 26),
(27, 'Vue.js Concepts', 'Frontend', 60, NULL, 27),
(28, 'Figma', 'Tools', 72, NULL, 28),
(29, 'Canva', 'Tools', 78, NULL, 29),
(30, 'Postman', 'Tools', 85, NULL, 30)
ON CONFLICT DO NOTHING;

INSERT INTO timeline (
    id,
    type,
    period,
    title,
    organization,
    description,
    sort_order
) VALUES
(
    1,
    'experience',
    'Dec 2025 - Present',
    'Full Stack Web Developer',
    'Masirat Kum Company',
    'Led core platform development using Python and Django, managed DevOps workflows, optimized PostgreSQL and Redis performance, and integrated AI-powered platform features.',
    1
),
(
    2,
    'experience',
    'Jan 2026 - Present',
    'Infrastructure & DevOps Lead',
    'Al Baker Group',
    'Managed infrastructure recovery operations, migrated 28 breached websites to AWS infrastructure, secured production systems, and coordinated technical crisis management.',
    2
),
(
    3,
    'experience',
    'Nov 2025 - Jan 2026',
    'Junior Full Stack Developer',
    'Elexplatform.online',
    'Built educational platform features, managed deployment environments, and implemented asynchronous backend workflows.',
    3
),
(
    4,
    'experience',
    'Sept 2025 - Present',
    'IT Intern',
    'Esh3ark',
    'Worked in FinTech environments, improved SEO performance, maintained systems, and applied web security protocols.',
    4
),
(
    5,
    'experience',
    'Sep 2025 - Present',
    'Freelance Web Developer & Systems Administrator',
    'Independent',
    'Developed POS systems, inventory platforms, Linux infrastructure, and production hosting environments for multiple businesses.',
    5
),
(
    6,
    'education',
    '2026 - Present',
    'Bachelor of Information Technology',
    'Sudan Open University',
    'Currently studying Information Technology with focus on software systems and technical infrastructure.',
    6
),
(
    7,
    'education',
    '2019 - 2024',
    'Bachelor of Arabic Language and Literature',
    'Omdurman Islamic University',
    'Graduated with honors and excellent academic performance.',
    7
),
(
    8,
    'experience',
    '2022 - Present',
    'Co-Founder',
    'Swaed Aldad Charity Foundation',
    'Participated in strategic planning, volunteer coordination, and humanitarian initiatives.',
    8
)
ON CONFLICT DO NOTHING;

INSERT INTO settings (
    id,
    key,
    value,
    group_name,
    locale
) VALUES
(1, 'site_title', 'Mohamed Elhabib | Full-Stack Web Developer', 'general', 'en'),
(2, 'site_description', 'Full-stack web developer specializing in backend systems, DevOps, Linux infrastructure, and scalable web platforms.', 'general', 'en'),
(3, 'hero_title_en', 'Building Reliable Systems With Code & Infrastructure', 'hero', 'en'),
(4, 'hero_title_ar', 'أبني أنظمة قوية تجمع بين البرمجة والبنية التحتية', 'hero', 'ar'),
(5, 'hero_subtitle_en', 'Full-stack developer focused on scalable backend systems, DevOps, cloud infrastructure, and AI-powered platforms.', 'hero', 'en'),
(6, 'hero_subtitle_ar', 'مطور ويب متكامل متخصص في الأنظمة الخلفية والبنية التحتية السحابية والمنصات المدعومة بالذكاء الاصطناعي.', 'hero', 'ar'),
(7, 'social_github', 'https://github.com/M-Alhbyb', 'social', 'en'),
(8, 'social_linkedin', 'https://linkedin.com/in/m-elhabib', 'social', 'en'),
(9, 'social_email', 'mohammedalhbyb@gmail.com', 'social', 'en')
ON CONFLICT DO NOTHING;

COMMIT;