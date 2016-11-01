<?php

class Session {

    private static function start() {
        session_start();
    }

    public static function put($key, $value = null) {
        self::start();
        $_SESSION[$key] = serialize($value);
    }

    public static function get($key) {
        self::start();
        return unserialize($_SESSION[$key]);
    }

    public static function forget($key) {
        self::start();
        unset($_SESSION[$key]);
    }

    public static function has($key) {
        self::start();
        return isset($_SESSION[$key]);
    }

}
