<?php

/**
 * Classe útil para manipulação de sessão
 *
 * @author Stephano Ramos Pinto <stephano.ramos.p@gmail.com>
 */

class Session {

    /**
     * Start new session if not started yet.
     *
     * @param  void
     * @return void
     */
    private static function start() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    /**
     * Store new item in the session.
     *
     * @param  mixed $key
     * @param  mixed $value
     * @return void
     */
    public static function put($key, $value = null) {
        self::start();
        $_SESSION[$key] = serialize($value);
    }
    
    /**
     * Get item from the session.
     *
     * @param  mixed $key
     * @return mixed
     */
    public static function get($key) {
        self::start();
        return unserialize($_SESSION[$key]);
    }

    /**
     * Remove item from the session.
     *
     * @param  mixed $key
     * @return void
     */
    public static function forget($key) {
        self::start();
        unset($_SESSION[$key]);
    }

    /**
     * Verify if item is set in the session.
     *
     * @param  mixed $key
     * @return boolean
     */
    public static function has($key) {
        self::start();
        return isset($_SESSION[$key]);
    }

}
