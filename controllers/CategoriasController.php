<?php

require_once "models/categoria.php";

class CategoriasController
{
    public function index()
    {
        utilidades::ValidarAdmin();
        $categoria = new categoria();
        $categorias = $categoria->conseguirTodos();
        require_once "views/categoria/index.php";
    }

    public function crear()
    {
        utilidades::ValidarAdmin();
        require_once "views/categoria/crear.php";
    }

    public function guardar()
    {
        utilidades::ValidarAdmin();

        if (isset($_POST) && isset($_POST["nombre"])) {

            $nombre = isset($_POST["nombre"]) ? $_POST['nombre'] : false;
            // Guardar la categoria en la bd

            $categoria = new categoria();
            $categoria->setNombre($nombre);
            $save = $categoria->save();
        }

        header('location:' . base_url . "categorias/index");
    }
}