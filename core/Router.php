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
    }

    protected function callAction(string $controller, string $action, array $params): string
    {
        $controllerClass = "App\\Controller\\$controller";
        return (new $controllerClass)->$action(...$params);
    }
}