<?php
namespace App\Core;

class Router
{
    private array $list = [];

    public function get(string $uri, string $action): void
    {
        $this->list['GET'][$uri] = $action;
    }

    public function post(string $uri, string $action): void
    {
        $this->list['POST'][$uri] = $action;
    }

    public function dispatch(): void
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        if (!isset($this->list[$method][$path])) {
            http_response_code(404);
            echo "Page non trouvée";
            return;
        }

        [$controllerName, $methodName] = explode('@', $this->list[$method][$path]);

        $controllerClass = "App\\Controllers\\$controllerName";

        $controller = new $controllerClass();
        $controller->$methodName();
    }
}
