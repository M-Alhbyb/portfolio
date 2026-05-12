# Routing Contract: Portfolio Website & CMS Dashboard

## Public Routes

All public routes are handled by `public/index.php` as a front controller.
Nginx `try_files` directs all non-asset requests to `index.php`.

| Method | Path | Controller | Description |
|--------|------|------------|-------------|
| GET | / | HomeController@index | Homepage |
| GET | /projects | ProjectController@index | Projects list |
| GET | /projects/{slug} | ProjectController@show | Case study detail |
| GET | /blog | BlogController@index | Blog list (supports ?category=X, ?tag=Y filters) |
| GET | /blog/{slug} | BlogController@show | Single blog post |
| GET | /about | AboutController@index | About page |
| GET | /contact | ContactController@index | Contact page |
| POST | /contact | ContactController@submit | Contact form submission |
| GET | /lang/{locale} | LanguageController@switch | Switch language (en/ar) |
| GET | /sitemap.xml | SEOController@sitemap | XML sitemap |
| GET | /robots.txt | SEOController@robots | Robots file |

## Admin Routes

All admin routes are prefixed with `/admin` and protected by Auth middleware.

| Method | Path | Controller | Description |
|--------|------|------------|-------------|
| GET | /admin/login | Admin\AuthController@login | Login form |
| POST | /admin/login | Admin\AuthController@authenticate | Login action |
| POST | /admin/logout | Admin\AuthController@logout | Logout |
| GET | /admin | Admin\DashboardController@index | Dashboard home |
| GET | /admin/projects | Admin\ProjectController@index | Project list |
| GET | /admin/projects/create | Admin\ProjectController@create | Create form |
| POST | /admin/projects | Admin\ProjectController@store | Create action |
| GET | /admin/projects/{id}/edit | Admin\ProjectController@edit | Edit form |
| PUT | /admin/projects/{id} | Admin\ProjectController@update | Update action |
| DELETE | /admin/projects/{id} | Admin\ProjectController@destroy | Delete action |
| GET | /admin/posts | Admin\PostController@index | Post list |
| GET | /admin/posts/create | Admin\PostController@create | Create form |
| POST | /admin/posts | Admin\PostController@store | Create action |
| GET | /admin/posts/{id}/edit | Admin\PostController@edit | Edit form |
| PUT | /admin/posts/{id} | Admin\PostController@update | Update action |
| DELETE | /admin/posts/{id} | Admin\PostController@destroy | Delete action |
| GET | /admin/skills | Admin\SkillController@index | Skill list |
| POST | /admin/skills | Admin\SkillController@store | Create skill |
| PUT | /admin/skills/{id} | Admin\SkillController@update | Update skill |
| DELETE | /admin/skills/{id} | Admin\SkillController@destroy | Delete skill |
| GET | /admin/messages | Admin\MessageController@index | Message inbox |
| GET | /admin/messages/{id} | Admin\MessageController@show | Message detail |
| PUT | /admin/messages/{id}/read | Admin\MessageController@markRead | Mark as read |
| DELETE | /admin/messages/{id} | Admin\MessageController@destroy | Delete message |
| GET | /admin/media | Admin\MediaController@index | Media library |
| POST | /admin/media/upload | Admin\MediaController@upload | Upload file |
| DELETE | /admin/media/{id} | Admin\MediaController@destroy | Delete file |
| GET | /admin/settings | Admin\SettingController@index | Settings form |
| PUT | /admin/settings | Admin\SettingController@update | Update settings |
| GET | /admin/export | Admin\ExportController@index | Export page |
| GET | /admin/export/{type} | Admin\ExportController@download | Download JSON/CSV |

## Static Assets

| Path | Type | Notes |
|------|------|-------|
| /assets/css/app.css | CSS | Compiled TailwindCSS |
| /assets/js/app.js | JS | Alpine.js + custom |
| /assets/images/* | Image | Static images |
| /uploads/* | Media | User-uploaded files |

Nginx serves these directly without passing through PHP.
