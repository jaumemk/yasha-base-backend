<?php

/**
 * Custom helpers
 */

if (!function_exists('get_page_slug_from_id'))
{
    function get_page_slug_from_id($id)
    {
        if($page = Yasha\Backend\Models\Page::whereId($id)->first())
        {
            return $page->slug;
        }
        return '/#';
    }
}

if (!function_exists('replace_setting_values'))
{
    function replace_setting_values($string)
    {
        return preg_replace_callback('/%%_(.*?)_%%/', function($matches) { 
            return Setting::get($matches[1]);
        }, $string);
    }
}

