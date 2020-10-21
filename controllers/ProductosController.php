<?php
require_once "models/producto.php";

class ProductosController
{
    public function index()
    {
        // Renderizar vista
        require_once "views/producto/destacados.php";
    }

    public function gestion()
    {
        utilidades::ValidarAdmin();
        $modelo_producto = new producto();
        $productos = $modelo_producto->conseguirTodos();

        $colores_productos = $modelo_producto->obtenerColores();


        require_once 'views/producto/gestion.php';
    }
}