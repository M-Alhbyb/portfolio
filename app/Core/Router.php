<?php

namespace App\Core;

class Router
{
    private array $routes = [];

    public function get(string $path, string $handler): void
    {
        $this->addRoute('GET', $path, $handler);
    }

    public function post(string $path, string $handler): void
    {
        $this->addRoute('POST', $path, $handler);
    }

    public function put(string $path, string $handler): void
    {
        $this->addRoute('PUT', $path, $handler);
    }

    public function delete(string $path, string $handler): void
    {
        $this->addRoute('DELETE', $path, $handler);
    }

    private function addRoute(string $method, string $path, string $handler): void
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler,
        ];
    }

    public function dispatch(string $method, string $uri): mixed
    {
        $uri = parse_url($uri, PHP_URL_PATH);
        $uri = rtrim($uri, '/') ?: '/';

        foreach ($this->routes as $route) {
            if ($route['method'] !== $method) {
                continue;
            }

            $params = $this->matchPath($route['path'], $uri);
            if ($params !== null) {
                $this->callHandler($route['handler'], $params);
                return true;
            }
        }

        return null;
    }

    private function matchPath(string $routePath, string $uri): ?array
    {
        $pattern = preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $routePath);
        $pattern = '#^' . $pattern . '$#';

        if (preg_match($pattern, $uri, $matches)) {
            return array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
        }

        return null;
    }

    private function callHandler(string $handler, array $params): mixed
    {
        $parts = explode('@', $handler);
        $class = $parts[0];
        $method = $parts[1] ?? 'index';

        if (!str_starts_with($class, 'App\\')) {
            $class = 'App\\' . $class;
        }

        $class = str_replace('/', '\\', $class);

        if (!class_exists($class)) {
            throw new \RuntimeException("Controller class '{$class}' not found");
        }

        $controller = new $class();
        return $controller->$method($params);
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }
}
