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
                    $_SESSION["producto"] = "Registro_exitoso";
                } else {
                    $_SESSION["producto"] = "Registro_fallido";
                }
            } else {
                $_SESSION["producto"] = "Registro_fallido";
            }
        } else {
            $_SESSION["producto"] = "Registro_fallido";
        }
        header('location:' . base_url . "productos/gestion");
    }

    public function anadir_color()
    {
        utilidades::ValidarAdmin();
        if (isset($_GET["producto_id"])) {
        }
        require_once "views/producto/anadir_color.php";
    }
    public function anadir_talla()
    {
        utilidades::ValidarAdmin();
        if (isset($_GET["producto_id"])) {
        }
        require_once "views/producto/anadir_talla.php";
    }
    public function editar()
    {
        utilidades::ValidarAdmin();
        if (isset($_GET["producto_id"])) {
        }
        require_once "views/producto/editar.php";
    }
    public function borrar()
    {
        utilidades::ValidarAdmin();
        if (isset($_GET["producto_id"])) {
            $id = $_GET['producto_id'];
            $producto = new producto();
            $producto->setId($id);
            $delete = $producto->borrar();

            if ($delete) {
                $_SESSION["borrado"] = "Borrado_exitoso";
            } else {
                $_SESSION["borrado"] = "Borrado_fallido";
            }
        } else {
            $_SESSION["borrado"] = "Borrado_fallido";
        }

        header('location:' . base_url . 'productos/gestion');
    }
}