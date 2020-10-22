<?php

require_once "models/color.php";

class ColoresController
{
    public function index()
    {
        utilidades::ValidarAdmin();
        $color = new color();
        $colores = $color->conseguirTodos();
        require_once "views/color/index.php";
    }
    public function crear()
    {
        utilidades::ValidarAdmin();
        require_once "views/color/crear.php";
    }

    public function guardar()
    {
        utilidades::ValidarAdmin();

        if (isset($_POST)) {
            $nombre_color = isset($_POST["nombre"]) ? str_replace(' ', '_', $_POST["nombre"]) : false;
            $codigo_color = isset($_POST["cod_color"]) ? $_POST["cod_color"] : false;
            if ($nombre_color && $codigo_color) {
                $color = new color();
                $color->setColor($nombre_color);
                $color->setCodigo_color($codigo_color);

                $save = $color->save();

                if ($save) {
                    $_SESSION["color"] = "Registro_exitoso";
                } else {
                    $_SESSION["color"] = "Registro_fallido";
                }
            } else {
                $_SESSION["color"] = "Registro_fallido";
            }
        } else {
            $_SESSION["color"] = "Registro_fallido";
        }
        header('location:' . base_url . "colores/index");
    }
}