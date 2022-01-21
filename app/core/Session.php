<?php

namespace App\Core;

class Session
{
    public static function exits($name)
    {
        return (isset($_SESSION[$name])) ? true : false;
    }

    public static function get($name)
    {
        return $_SESSION[$name];
    }

    public static function set($name, $value)
    {
        if (!self::exits($name)) {
            return $_SESSION[$name] = $value;
        }
    }

    public static function delete($name)
    {
        if (self::exits($name)) {
            unset($_SESSION[$name]);
        }
    }

    public static function uagent_no_version()
    {
        $uagent = $_SERVER['HTTP_USER_AGENT'];
        $regx = '/\/[a-zA-Z0-9.]+/';
        return preg_replace($regx, '', $uagent);
    }
}
