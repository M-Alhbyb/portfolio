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
