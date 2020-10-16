<?php

require_once "models/categoria.php";

class CategoriasController
{
    public function index()
    {
        $categoria = new categoria();
        $categorias = $categoria->conseguirTodos();
        require_once "views/categoria/index.php";
    }
}