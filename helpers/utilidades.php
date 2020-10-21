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

    public static function mostrarCategorias()
    {
        require_once 'models/categoria.php';
        $categoria = new categoria();
        $categorias = $categoria->conseguirTodos();
        return $categorias;
    }

    public static function oscurecerColor($rgb, $darker = 2)
    {

        $hash = (strpos($rgb, '#') !== false) ? '#' : '';
        $rgb = (strlen($rgb) == 7) ? str_replace('#', '', $rgb) : ((strlen($rgb) == 6) ? $rgb : false);
        if (strlen($rgb) != 6) return $hash . '000000';
        $darker = ($darker > 1) ? $darker : 1;

        list($R16, $G16, $B16) = str_split($rgb, 2);

        $R = sprintf("%02X", floor(hexdec($R16) / $darker));
        $G = sprintf("%02X", floor(hexdec($G16) / $darker));
        $B = sprintf("%02X", floor(hexdec($B16) / $darker));

        return $hash . $R . $G . $B;
    }
}