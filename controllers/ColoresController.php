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
}