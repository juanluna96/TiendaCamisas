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
                    $_SESSION["producto"] = "registrado_exitoso";
                } else {
                    $_SESSION["producto"] = "registrado_fallido";
                }
            } else {
                $_SESSION["producto"] = "registrado_fallido";
            }
        } else {
            $_SESSION["producto"] = "registrado_fallido";
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
            $editar = true;
            $id = $_GET['producto_id'];

            $producto = new producto();
            $producto->setId($id);
            $productos = $producto->conseguirUno();

            $producto_ind = '';
            foreach ($productos as $producto) {
                $producto_ind = $producto;
            }

            require_once "views/producto/crear.php";
        } else {
            header('location:' . base_url . "productos/gestion");
        }
    }

    public function edit()
    {
        utilidades::ValidarAdmin();
        if (isset($_POST)) {
            $id = $_GET['producto_id'];
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : false;
            $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : false;
            $precio = isset($_POST["precio"]) ? str_replace(".", "", substr($_POST["precio"], 5, -3))  : false;
            $stock = isset($_POST["stock"]) ? $_POST["stock"] : false;
            $categoria = isset($_POST["categoria"]) ? $_POST["categoria"] : false;
            if ($id && $nombre && $descripcion && $precio && $stock && $categoria) {
                $producto = new producto();
                $producto->setId($id);
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoria_id($categoria);

                $edit = $producto->edit();

                if ($edit) {
                    $_SESSION["producto"] = "editado_exitoso";
                } else {
                    $_SESSION["producto"] = "editado_fallido";
                }
            } else {
                $_SESSION["producto"] = "editado_fallida";
            }
        } else {
            $_SESSION["producto"] = "editado_fallida";
        }
        header('location:' . base_url . "productos/gestion");
    }

    public function eliminar()
    {
        utilidades::ValidarAdmin();
        if (isset($_GET["producto_id"])) {
            $id = $_GET['producto_id'];
            $producto = new producto();
            $producto->setId($id);
            $delete = $producto->delete();

            if ($delete) {
                $_SESSION["producto"] = "borrado_exitoso";
            } else {
                $_SESSION["producto"] = "borrado_fallido";
            }
        } else {
            $_SESSION["producto"] = "borrado_fallido";
        }

        header('location:' . base_url . 'productos/gestion');
    }
}
