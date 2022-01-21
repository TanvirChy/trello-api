<?php

use App\Core\View;

function dd($data)
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    exit;
}

if (!function_exists('public_path')) {
    function public_path($path = null)
    {
        if ($path === null) return WEBROOT;
        else return WEBROOT . $path;
    }
}

if (!function_exists('css')) {
    function css($fileName)
    {
        return public_path("/css/$fileName.css");
    }
}

if (!function_exists('route')) {
    function route($url)
    {
        return WEBROOT . $url;
    }
}

if (!function_exists('redirectTo')) {
    function redirectTo($url)
    {
        $path = WEBROOT . $url;
        header("Location: $path");
    }
}

if (!function_exists('js')) {
    function js($fileName)
    {
        return public_path("/js/$fileName.js");
    }
}


if (!function_exists('img_path')) {
    function img_path($path)
    {
        return public_path(("/img/$path"));
    }
}

if (!function_exists('view')) {
    function view($path, $data = [])
    {
        $view = new View();
        return $view->LoadView($path, $data);
    }
}
