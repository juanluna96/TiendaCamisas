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
                    $_SESSION["tallaje"] = "registrado_exitoso";
                } else {
                    $_SESSION["tallaje"] = "registrado_fallido";
                }
            } else {
                $_SESSION["tallaje"] = "registrado_fallido";
            }
        } else {
            $_SESSION["tallaje"] = "registrado_fallido";
        }
        header('location:' . base_url . "tallas/index");
    }

    public function eliminar()
    {
        utilidades::ValidarAdmin();
        if (isset($_GET["talla_id"])) {
            $id = $_GET['talla_id'];
            $talla = new talla();
            $talla->setId($id);
            $delete = $talla->delete();

            if ($delete) {
                $_SESSION["tallaje"] = "borrado_exitoso";
            } else {
                $_SESSION["tallaje"] = "borrado_fallido";
            }
        } else {
            $_SESSION["tallaje"] = "borrado_fallido";
        }

        header('location:' . base_url . 'tallas/index');
    }
}
