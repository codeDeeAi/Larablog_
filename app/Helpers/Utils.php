<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

if (!function_exists('generate_user_initials')) {
    /**
     * Generate user initials
     * @param string $f_name User first name
     * @param string $l_name User last name
     * @return string User initials
     */
    function generate_user_initials(string $f_name, string $l_name): string
    {
        return $f_name[0] . $l_name[0];
    }
}

if (!function_exists('get_menu_active_state')) {
    /**
     * Checks if current route matches route lists
     * @param Array  Route Lists e.g [index, user.index] etc
     * @return Bool True/False 
     */
    function get_menu_active_state(array $route_list): bool
    {
        return (in_array(Route::currentRouteName(), $route_list)) ? true : false;
    }
}
