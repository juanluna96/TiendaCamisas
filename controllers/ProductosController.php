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

    public function crear()
    {
        utilidades::ValidarAdmin();
        require_once "views/producto/crear.php";
    }

    public function guardar()
    {
        utilidades::ValidarAdmin();
        if (isset($_POST)) {
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : false;
            $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : false;
            $precio = isset($_POST["precio"]) ? str_replace(".", "", substr($_POST["precio"], 5, -3))  : false;
            $stock = isset($_POST["stock"]) ? $_POST["stock"] : false;
            $categoria = isset($_POST["categoria"]) ? $_POST["categoria"] : false;
            if ($nombre && $descripcion && $precio && $stock && $categoria) {
                $producto = new producto();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoria_id($categoria);

                $save = $producto->save();

                if ($save) {
                    $_SESSION["producto"] = "Exitoso";
                } else {
                    $_SESSION["producto"] = "Fallido";
                }
            } else {
                $_SESSION["producto"] = "Fallido";
            }
        } else {
            $_SESSION["producto"] = "Fallido";
        }
        header('location:' . base_url . "productos/gestion");
    }
}