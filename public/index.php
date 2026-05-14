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

spl_autoload_register(function (string $class): void {
    $vendorDir = __DIR__ . '/../vendor/';
    $vendorClasses = [
        'Dompdf\\Dompdf' => $vendorDir . 'dompdf/src/Dompdf.php',
        'Dompdf\\Options' => $vendorDir . 'dompdf/src/Options.php',
        'Dompdf\\Css\\Stylesheet' => $vendorDir . 'dompdf/src/Css/Stylesheet.php',
        'Dompdf\\DomDocument' => $vendorDir . 'dompdf/src/DomDocument.php',
        'Dompdf\\Frame\\Frame' => $vendorDir . 'dompdf/src/Frame.php',
        'Dompdf\\Frame\\FrameTree' => $vendorDir . 'dompdf/src/FrameTree.php',
        'Dompdf\\FrameDecorator\\FrameDecorator' => $vendorDir . 'dompdf/src/FrameDecorator/FrameDecorator.php',
        'Dompdf\\FrameRenderer\\FrameRenderer' => $vendorDir . 'dompdf/src/FrameRenderer/FrameRenderer.php',
        'Dompdf\\Image\\Cache' => $vendorDir . 'dompdf/src/Image/Cache.php',
        'Dompdf\\Adapter\\CPDF' => $vendorDir . 'dompdf/src/Adapter/CPDF.php',
        'Dompdf\\Renderer\\Renderer' => $vendorDir . 'dompdf/src/Renderer.php',
        'Dompdf\\Renderer\\AbstractRenderer' => $vendorDir . 'dompdf/src/Renderer/AbstractRenderer.php',
        'Dompdf\\Renderer\\TextRenderer' => $vendorDir . 'dompdf/src/Renderer/TextRenderer.php',
        'Dompdf\\Positioner\\Positioner' => $vendorDir . 'dompdf/src/Positioner.php',
        'Dompdf\\Positioner\\BlockPositioner' => $vendorDir . 'dompdf/src/Positioner/BlockPositioner.php',
        'Dompdf\\Inline\\FrameDecorator\\InlineFrameDecorator' => $vendorDir . 'dompdf/src/Inline/FrameDecorator/InlineFrameDecorator.php',
        'Dompdf\\Table\\Cell\\Cell' => $vendorDir . 'dompdf/src/Table/Cell.php',
        'Dompdf\\Table\\Row' => $vendorDir . 'dompdf/src/Table/Row.php',
        'Dompdf\\Table\\TableFrameReflower' => $vendorDir . 'dompdf/src/Table/TableFrameReflower.php',
        'Dompdf\\Table\\TableReflower' => $vendorDir . 'dompdf/src/Table/TableReflower.php',
        'Dompdf\\Block\\BlockFrameReflower' => $vendorDir . 'dompdf/src/Block/BlockFrameReflower.php',
        'Dompdf\\Block\\BlockRenderer' => $vendorDir . 'dompdf/src/Block/BlockRenderer.php',
        'Dompdf\\Inline\\InlineFrameReflower' => $vendorDir . 'dompdf/src/Inline/InlineFrameReflower.php',
        'Dompdf\\Inline\\InlineRenderer' => $vendorDir . 'dompdf/src/Inline/InlineRenderer.php',
        'Dompdf\\Image\\FrameRenderer\\ImageFrameRenderer' => $vendorDir . 'dompdf/src/Image/FrameRenderer/ImageFrameRenderer.php',
        'Dompdf\\Exception' => $vendorDir . 'dompdf/src/Exception.php',
        'Dompdf\\FontMetrics' => $vendorDir . 'dompdf/src/FontMetrics.php',
        'Dompdf\\Canvas' => $vendorDir . 'dompdf/src/Canvas.php',
        'Dompdf\\Canvas\\Pdf' => $vendorDir . 'dompdf/src/Canvas.php',
        'Dompdf\\Renderer\\PdfRenderer' => $vendorDir . 'dompdf/src/Renderer/PdfRenderer.php',
        'Svg\\Sanitize' => $vendorDir . 'phenx/php-svg-lib/src/Svg/Sanitize.php',
        'Svg\\Document' => $vendorDir . 'phenx/php-svg-lib/src/Svg/Document.php',
        'Svg\\Element' => $vendorDir . 'phenx/php-svg-lib/src/Svg/Element.php',
        'Svg\\Tag\\AbstractTag' => $vendorDir . 'phenx/php-svg-lib/src/Svg/Tag/AbstractTag.php',
        'Svg\\PaintServer\\PaintServer' => $vendorDir . 'phenx/php-svg-lib/src/Svg/PaintServer/PaintServer.php',
        'Font\\Lib\\FontManager' => $vendorDir . 'phenx/php-font-lib/src/FontLib/FontManager.php',
        'Font\\Lib\\Font' => $vendorDir . 'phenx/php-font-lib/src/FontLib/Font.php',
        'Font\\Lib\\BinaryStream' => $vendorDir . 'phenx/php-font-lib/src/FontLib/BinaryStream.php',
        'Font\\Lib\\Table\\Table' => $vendorDir . 'phenx/php-font-lib/src/FontLib/Table/Table.php',
        'Font\\Lib\\Table\\Type\\NameTable' => $vendorDir . 'phenx/php-font-lib/src/FontLib/Table/Type/NameTable.php',
        'Font\\Lib\\Encoding\\EncodingMap' => $vendorDir . 'phenx/php-font-lib/src/FontLib/Encoding/EncodingMap.php',
    ];

    if (isset($vendorClasses[$class])) {
        $file = $vendorClasses[$class];
        if (file_exists($file)) {
            require $file;
        }
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
$router->get('/admin/languages', 'Admin\\LanguageController@index');
$router->post('/admin/languages', 'Admin\\LanguageController@store');
$router->put('/admin/languages/{id}', 'Admin\\LanguageController@update');
$router->delete('/admin/languages/{id}', 'Admin\\LanguageController@destroy');
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
$router->get('/admin/export/cv/download', 'Admin\\ExportController@cv');
$router->get('/admin/volunteering', 'Admin\\VolunteerController@index');
$router->post('/admin/volunteering', 'Admin\\VolunteerController@store');
$router->put('/admin/volunteering/{id}', 'Admin\\VolunteerController@update');
$router->delete('/admin/volunteering/{id}', 'Admin\\VolunteerController@destroy');

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
    error_log('[500] ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine());
    error_log('[500] Stack trace: ' . $e->getTraceAsString());
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
