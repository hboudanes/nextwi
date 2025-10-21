<?php

if (!function_exists('isActiveRoute')) {
    /**
     * Check if the current route matches the given route name(s)
     * Supports wildcards and multiple route names
     *
     * @param string|array $routes
     * @param string $activeClass
     * @param string $inactiveClass
     * @return string
     */
    function isActiveRoute($routes, $activeClass = 'text-blue-600 bg-blue-50', $inactiveClass = 'text-gray-700')
    {
        $routes = is_array($routes) ? $routes : [$routes];

        foreach ($routes as $route) {
            if (request()->routeIs($route)) {
                return $activeClass;
            }
        }

        return $inactiveClass;
    }
}

if (!function_exists('isRouteActive')) {
    /**
     * Check if the current route matches (returns boolean)
     *
     * @param string|array $routes
     * @return bool
     */
    function isRouteActive($routes)
    {
        $routes = is_array($routes) ? $routes : [$routes];

        foreach ($routes as $route) {
            if (request()->routeIs($route)) {
                return true;
            }
        }

        return false;
    }
}
