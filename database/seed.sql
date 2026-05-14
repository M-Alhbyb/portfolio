-- Elhabib Portfolio - Seed Data
-- Default admin user: admin / (set during first login setup, hash: placeholder)
-- Password should be changed on first login

INSERT INTO users (username, email, password_hash, display_name)
VALUES ('admin', 'admin@elhabib.dev', '$2y$12$LJ3m4ys3Lk0TSwHnbfOMi.RXK8GQ7HzQ7jYHqKX1vYR5VxO5KpJOy', 'Admin')
ON CONFLICT (username) DO NOTHING;

-- Default settings
INSERT INTO settings (key, value, group_name, locale) VALUES
    ('site_title', 'Mohamed Elhabib - Engineering Portfolio', 'seo', 'both'),
    ('site_description', 'Portfolio of Mohamed Elhabib, showcasing engineering projects, DevOps infrastructure, and technical expertise.', 'seo', 'both'),
    ('meta_keywords', 'devops, engineering, portfolio, php, infrastructure', 'seo', 'both'),
    ('hero_title_en', 'Senior DevOps Engineer & Full Stack Developer', 'homepage', 'en'),
    ('hero_title_ar', 'مهندس DevOps أول ومطور Full Stack', 'homepage', 'ar'),
    ('hero_subtitle_en', 'Architecting resilient infrastructure and building scalable solutions.', 'homepage', 'en'),
    ('hero_subtitle_ar', 'أُصمم بنية تحتية مرنة وأبني حلولاً قابلة للتوسع.', 'homepage', 'ar'),
    ('social_github', 'https://github.com/mohamedelhabib', 'social', 'both'),
    ('social_linkedin', 'https://linkedin.com/in/mohamedelhabib', 'social', 'both'),
    ('social_email', 'contact@elhabib.dev', 'social', 'both'),
    ('homepage_intro_en', 'Welcome to my engineering portfolio. Explore my projects, read my blog, and get in touch.', 'homepage', 'en'),
    ('homepage_intro_ar', 'مرحباً بك في ملفي الهندسي. استعرض مشاريعي، اقرأ مدونتي، وتواصل معي.', 'homepage', 'ar')
ON CONFLICT (key) DO NOTHING;

-- Timeline seed data
INSERT INTO timeline (type, period, title, organization, description, place, work_type, sort_order) VALUES
    ('experience', '2024 - Present', 'Senior DevOps Engineer', 'Leading Infrastructure & Automation', 'Architecting and managing cloud infrastructure, implementing CI/CD pipelines, and optimizing deployment workflows.', '', 'Remote', 1),
    ('experience', '2022 - 2024', 'Full Stack Developer', 'Building Scalable Applications', 'Developed and maintained full-stack web applications using modern technologies and best practices.', '', 'Remote', 2),
    ('experience', '2020 - 2022', 'Systems Engineer', 'Infrastructure & Operations', 'Managed server infrastructure, monitored system performance, and automated operational tasks.', '', 'On-site', 3),
    ('experience', '2018 - 2020', 'Junior Developer', 'Software Development', 'Contributed to feature development, wrote unit tests, and participated in code reviews.', '', 'On-site', 4),
    ('education', '2014 - 2018', 'B.Sc. Computer Engineering', 'University', 'Focused on software engineering, algorithms, and distributed systems.', '', '', 1)
ON CONFLICT DO NOTHING;

-- Languages seed data
INSERT INTO languages (name, proficiency, sort_order) VALUES
    ('English', 'Fluent', 1),
    ('Arabic', 'Native', 2),
    ('French', 'Intermediate', 3)
ON CONFLICT DO NOTHING;
