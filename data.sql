BEGIN;

TRUNCATE TABLE projects RESTART IDENTITY CASCADE;
TRUNCATE TABLE posts RESTART IDENTITY CASCADE;
TRUNCATE TABLE skills RESTART IDENTITY CASCADE;
TRUNCATE TABLE timeline RESTART IDENTITY CASCADE;
TRUNCATE TABLE volunteering RESTART IDENTITY CASCADE;
TRUNCATE TABLE languages RESTART IDENTITY CASCADE;
TRUNCATE TABLE settings RESTART IDENTITY CASCADE;

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
(1, 'Python', 'Backend', 90, '', 1),
(2, 'Django', 'Backend', 85, '', 2),
(3, 'FastAPI', 'Backend', 75, '', 3),
(4, 'Django REST Framework', 'Backend', 80, '', 4),
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
(20, 'PHP', 'Backend', 60, '', 20),
(21, 'C', 'Backend', 40, '', 21),
(22, 'C++', 'Backend', 50, NULL, 22),
(23, 'SQL', 'Database', 86, NULL, 23),
(24, 'Bash Scripting', 'Tools', 84, NULL, 24),
(25, 'Celery', 'Backend', 83, NULL, 25),
(26, 'React Concepts', 'Frontend', 65, NULL, 26),
(27, 'Vue.js Concepts', 'Frontend', 60, NULL, 27),
(28, 'Figma', 'Tools', 60, '', 28),
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
    'Freelance Web Developer & Systems Administrator',
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
(1, 'Co-Founder &amp; Technical Lead', 'Swaed Aldad Charity Foundation', 'Participated in strategic planning, volunteer coordination, and humanitarian initiatives serving underprivileged communities.', 'Sudan', '2022', 'Present', 'https://swaedaldad.org', 1),
(2, 'Co-Founder &amp; Secretary-General', 'Swaed Aldad Charity Foundation', 'Among the founders of the association aimed at supporting financially struggling students at the College of Arabic Language. Served as Secretary-General, contributing to planning and organizational management of initiatives. Managed the Winter Clothing Project, distributing hundreds of clothing pieces to needy families. Supervised the Food Project and contributed to report writing and field work organization. Contributed to fundraising and planning successful support campaigns that benefited 100+ families. Represented the association and performed leadership duties as deputy to the association president when needed.', 'Sudan', '2022', 'Present', 'https://swaedaldad.org', 2),
(3, 'Media &amp; Organizing Volunteer', 'Khatwa Charity Foundation', 'Participated in media and organizational activities of the foundation at Omdurman Islamic University. Contributed to event management and graphic design for activities and initiatives.', 'Omdurman, Sudan', '2022', '2022', '', 3),
(4, 'Deputy Media Officer', 'Arabic Language College Committee', 'Elected as Deputy Media Officer. Designed media materials for student activities. Contributed to organizing student reception, cultural activities, and the college sports league.', 'Omdurman Islamic University', '2022', '2023', '', 4)
ON CONFLICT DO NOTHING;

INSERT INTO languages (id, name, proficiency, sort_order) VALUES
(1, 'English', 'Upper Intermediate', 1),
(2, 'Arabic', 'Native', 2)
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
(9, 'social_email', 'mohamed.elhabib@gmail.com', 'social', 'en')
ON CONFLICT DO NOTHING;

COMMIT;
