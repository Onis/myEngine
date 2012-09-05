<?php

class Session
{
    /**
     * Начинает сессию
     */
    public static function init()
    {
        @session_start();
    }

    /**
     * Устанавливает значение
     * @param $key Ключ сессии
     * @param $value Значение, присваемое данной сессии
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Получает сессию
     * @param $key Ключ сессии
     * @return mixed
     */
    public static function get($key)
    {
        if (isset($_SESSION[$key]))
        return $_SESSION[$key];
    }

    /*
     * Заканчивает сессию
     */
    public static function destroy()
    {
        session_destroy();
    }
}