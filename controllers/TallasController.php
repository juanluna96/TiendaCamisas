<?php

require_once "models/talla.php";

class TallasController
{
    public function index()
    {
        utilidades::ValidarAdmin();
        $talla = new talla();
        $tallas = $talla->conseguirTodos();
        require_once "views/talla/index.php";
    }
    public function crear()
    {
        utilidades::ValidarAdmin();
        require_once "views/talla/crear.php";
    }

    public function guardar()
    {
        utilidades::ValidarAdmin();

        if (isset($_POST)) {
            $tamano = isset($_POST["tamano"]) ? str_replace(' ', '_', $_POST["tamano"]) : false;
            if ($tamano) {
                $talla = new talla();
                $talla->setTamano($tamano);

                $save = $talla->save();

                if ($save) {
                    $_SESSION["talla"] = "Registro_exitoso";
                } else {
                    $_SESSION["talla"] = "Registro_fallido";
                }
            } else {
                $_SESSION["talla"] = "Registro_fallido";
            }
        } else {
            $_SESSION["talla"] = "Registro_fallido";
        }
        header('location:' . base_url . "tallas/index");
    }
}
