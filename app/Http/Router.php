<?php

namespace App\Http;

class Router
{
    private $routes;

    public function __construct($routes = [])
    {
        $this->routes = $routes;
    }

    public function getActionData($uri)
    {
        $path = parse_url($uri, PHP_URL_PATH) ?: '/';

        foreach ($this->routes as $route => $actionData) {
            $pattern = preg_replace('#\{([a-zA-Z_][a-zA-Z0-9_]*)\}#', '(?P<$1>[^/]+)', $route);
            $pattern = '#^' . $pattern . '$#';

            if (preg_match($pattern, $path, $matches)) {
                $params = [];

                foreach ($matches as $key => $value) {
                    if (!is_int($key)) {
                        $params[$key] = ctype_digit($value) ? (int) $value : $value;
                    }
                }

                $actionData['params'] = $params;

                return $actionData;
            }
        }

        return [];
    }
}
