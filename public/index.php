<?php

spl_autoload_register(function (string $class): void {
    $prefix = 'App\\';
    $baseDir = __DIR__ . '/../app/';

    if (strncmp($prefix, $class, strlen($prefix)) !== 0) {
        return;
    }

    $relativeClass = substr($class, strlen($prefix));
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

use App\Core\Router;
use App\Core\Session;
use App\Core\Auth;
use App\Helpers\Language;

Session::start();

error_reporting(E_ALL);
$appConfig = __DIR__ . '/../app/Config/app.php';
if (file_exists($appConfig)) {
    $config = require $appConfig;
    if (!empty($config['debug'])) {
        ini_set('display_errors', '1');
    } else {
        ini_set('display_errors', '0');
    }
}

$router = new Router();

// Public routes
$router->get('/', 'Controllers\\HomeController@index');
$router->get('/projects', 'Controllers\\ProjectController@index');
$router->get('/projects/{slug}', 'Controllers\\ProjectController@show');
$router->get('/blog', 'Controllers\\BlogController@index');
$router->get('/blog/{slug}', 'Controllers\\BlogController@show');
$router->get('/about', 'Controllers\\AboutController@index');
$router->get('/contact', 'Controllers\\ContactController@index');
$router->post('/contact', 'Controllers\\ContactController@submit');
$router->get('/lang/{locale}', 'Controllers\\LanguageController@switch');
$router->get('/sitemap.xml', 'Controllers\\SEOController@sitemap');
$router->get('/robots.txt', 'Controllers\\SEOController@robots');

// Admin routes
$router->get('/admin/login', 'Admin\\AuthController@login');
$router->post('/admin/login', 'Admin\\AuthController@authenticate');
$router->post('/admin/logout', 'Admin\\AuthController@logout');
$router->get('/admin', 'Admin\\DashboardController@index');
$router->get('/admin/projects', 'Admin\\ProjectController@index');
$router->get('/admin/projects/create', 'Admin\\ProjectController@create');
$router->post('/admin/projects', 'Admin\\ProjectController@store');
$router->get('/admin/projects/{id}/edit', 'Admin\\ProjectController@edit');
$router->put('/admin/projects/{id}', 'Admin\\ProjectController@update');
$router->delete('/admin/projects/{id}', 'Admin\\ProjectController@destroy');
$router->get('/admin/posts', 'Admin\\PostController@index');
$router->get('/admin/posts/create', 'Admin\\PostController@create');
$router->post('/admin/posts', 'Admin\\PostController@store');
$router->get('/admin/posts/{id}/edit', 'Admin\\PostController@edit');
$router->put('/admin/posts/{id}', 'Admin\\PostController@update');
$router->delete('/admin/posts/{id}', 'Admin\\PostController@destroy');
$router->get('/admin/skills', 'Admin\\SkillController@index');
$router->post('/admin/skills', 'Admin\\SkillController@store');
$router->put('/admin/skills/{id}', 'Admin\\SkillController@update');
$router->delete('/admin/skills/{id}', 'Admin\\SkillController@destroy');
$router->get('/admin/timeline', 'Admin\\TimelineController@index');
$router->post('/admin/timeline', 'Admin\\TimelineController@store');
$router->put('/admin/timeline/{id}', 'Admin\\TimelineController@update');
$router->delete('/admin/timeline/{id}', 'Admin\\TimelineController@destroy');
$router->get('/admin/messages', 'Admin\\MessageController@index');
$router->get('/admin/messages/{id}', 'Admin\\MessageController@show');
$router->put('/admin/messages/{id}/read', 'Admin\\MessageController@markRead');
$router->delete('/admin/messages/{id}', 'Admin\\MessageController@destroy');
$router->get('/admin/media', 'Admin\\MediaController@index');
$router->post('/admin/media/upload', 'Admin\\MediaController@upload');
$router->delete('/admin/media/{id}', 'Admin\\MediaController@destroy');
$router->get('/admin/settings', 'Admin\\SettingController@index');
$router->put('/admin/settings', 'Admin\\SettingController@update');
$router->get('/admin/export', 'Admin\\ExportController@index');
$router->get('/admin/export/{type}', 'Admin\\ExportController@download');

// Set locale
Language::getLocale();

// Admin route protection middleware
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$uri = rtrim($uri, '/') ?: '/';

if (str_starts_with($uri, '/admin') && $uri !== '/admin/login') {
    Auth::requireLogin();
}

// Dispatch
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

if ($method === 'POST' && isset($_POST['_method'])) {
    $method = strtoupper($_POST['_method']);
}

try {
    $result = $router->dispatch($method, $_SERVER['REQUEST_URI'] ?? '/');
} catch (\Exception $e) {
    http_response_code(500);
    if (!empty($config['debug'])) {
        throw $e;
    }
    require __DIR__ . '/../templates/pages/500.php';
    return;
}

if ($result === null) {
    http_response_code(404);
    require __DIR__ . '/../templates/pages/404.php';
}
