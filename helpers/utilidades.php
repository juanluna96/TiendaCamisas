<?php

class utilidades
{
    public static function borrarSession($nombre)
    {
        if (isset($_SESSION[$nombre])) {
            $_SESSION[$nombre] = null;
        }

        return $nombre;
    }

    public static function ValidarAdmin()
    {
        if (!isset($_SESSION["usuario"]) && $_SESSION["usuario"]->cargo != 'Admin') {
            header('location:' . base_url);
        } else {
            return true;
        }
    }
}