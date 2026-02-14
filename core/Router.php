<?php

namespace Core;

class Router
{
    protected array $routes = [];

    public function add(string $method, $uri, string $controller): void {}

    public function dispatch(string $method, string $uri): void {}

    protected function findRoute(string $uri, string $method): ?array {}

    protected function matchRoute(string $routeUri, string $requestUri): ?array
    {
        $routeSegments = explode('/', trim($routeUri, '/'));
        $requestSegments = explode('/', trim($requestUri, '/'));

        if (count($routeSegments) !== count($requestSegments)) {
            return null;
        }
        $params = [];
        foreach ($routeSegments as $index => $routeSegment) {
            if (str_starts_with($routeSegment, '{') && str_ends_with($routeSegment, '}')) {
                $params[trim($routeSegment, '{}')] = $requestSegments[$index];
            } else if ($routeSegment !== $requestSegments[$index]) {
                return null;
            }
        }
        return $params;
    }
    protected function callAction(string $controller, string $action, array $params): string
    {
        $controllerClass = "App\\Controller\\$controller";
        return (new $controllerClass)->$action(...$params);
    }
}