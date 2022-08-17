<?php

declare(strict_types=1);

if(!function_exists('generate_user_initials')){
    /**
     * Generate user initials
     * @param string $f_name User first name
     * @param string $l_name User last name
     * @return string User initials
     */
    function generate_user_initials(string $f_name, string $l_name): string {
        return $f_name[0].$l_name[0];
    }
}