<?php

namespace App\Utils;


class Router {
    private $routes = [];


    public function get(string $pattern, callable $callback) {
        $this->routes[$pattern] = $callback;
    }


    public function process_request(): bool {
        $request = $_SERVER["REQUEST_URI"];

        $route_callback = null;
        $params = [];

        foreach ($this->routes as $pattern => $callback) {
            $matches = [];
            if (preg_match($pattern, $request, $matches) > 0) {
                $route_callback = $callback;
                $params = $matches;
                break;
            }
        }

        if ($route_callback != null) {
            $route_callback($params);
        }

        return ($route_callback != null);
    }
}