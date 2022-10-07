<?php

declare(strict_types=1);

use App\Enums\UserTypesEnum;
use App\Models\User;
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

if (!function_exists('create_blog_slug')) {
    /**
     * Creates a new blog slug
     * @param String  Blog title
     * @return String Slug 
     */
    function create_blog_slug(string $title): string
    {
        $title_array = explode(' ', strtolower($title));
        return implode('_', $title_array) . now();
    }
}


if (!function_exists('generate_random_bg_col_class')) {
    /**
     * Generate random tailwind colour class
     * @return String Prefix
     * @return String Suffix
     * @return String string
     */
    function generate_random_bg_col_class(string $prefix = '', string $suffix = ''): string
    {
        $class_array = [
            'slate', 'gray', 'zinc', 'neutral', 'stone', 'red', 'orange', 'amber', 'yellow', 'lime', 'green', 'emerald', 'teal', 'cyan', 'sky', 'blue', 'indigo', 'violet', 'purple', 'fuchsia', 'pink', 'rose'
        ];
        return $prefix.$class_array[array_rand($class_array)].$suffix;
    }
}

if (!function_exists('get_recent_authors')) {
    /**
     * Gets recent authors
     * @param Int number of authors (default = 5)
     * @return Object authors
     */
    function get_recent_authors(int $number = 5): object
    {
        $users = User::where('user_type', UserTypesEnum::USER->value)
            ->select('first_name', 'last_name', 'username')
            ->inRandomOrder()->limit($number)->get();
        return $users;
    }
}
