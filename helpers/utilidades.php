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

    public static function mostrarColores()
    {
        require_once 'models/color.php';
        $modelo_color = new color();
        $colores = $modelo_color->conseguirTodos();
        return $colores;
    }

    public static function mostrarTallas()
    {
        require_once 'models/talla.php';
        $modelo_talla = new talla();
        $tallas = $modelo_talla->conseguirTodos();
        return $tallas;
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

    public static function AlertOperacion($nombre_controlador, $nombre_operacion)
    {
        if (isset($_SESSION["$nombre_controlador"]) && $_SESSION["$nombre_controlador"] == '' . $nombre_operacion . '_exitoso') {
            echo '<div class="alert alert-success" role="alert">';
            echo "El $nombre_controlador se ha " . $nombre_operacion . " correctamente";
            echo "</div>";
        } elseif (isset($_SESSION["$nombre_controlador"]) && $_SESSION["$nombre_controlador"] == '' . $nombre_operacion . '_fallido') {
            echo '<div class="alert alert-danger" role="alert">';
            echo "El $nombre_controlador no ha podido ser " . $nombre_operacion . ", intente de nuevo";
            echo "</div>";
        }
    }
}
