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

    public function anadir_talla()
    {
        utilidades::ValidarAdmin();
        if (isset($_GET["producto_id"])) {
            $id = $_GET['producto_id'];

            $modelo_producto = new producto();
            $modelo_producto->setId($id);
            $productos = $modelo_producto->conseguirUno();

            foreach ($productos as $producto_ind) {
                $producto = $producto_ind;
            }
        }
        require_once "views/producto/anadir_talla.php";
    }

    public function add_talla()
    {
        if (isset($_POST)) {
            $id = $_GET['producto_id'];
            $talla = isset($_POST["talla"]) ? $_POST["talla"] : false;
            if ($id && $talla) {
                $producto = new producto();
                $producto->setId($id);
                $producto->setTalla_id($talla);

                $add_talla = $producto->add_talla();

                if ($add_talla) {
                    $_SESSION["tallaje"] = "agregado_exitoso";
                } else {
                    $_SESSION["tallaje"] = "agregado_fallido";
                }
            } else {
                $_SESSION["tallaje"] = "agregado_fallido";
            }
        } else {
            $_SESSION["tallaje"] = "agregado_fallido";
        }
        header('location:' . base_url . "productos/gestion");
    }

    public function anadir_color()
    {
        utilidades::ValidarAdmin();
        if (isset($_GET["producto_id"])) {
            $id = $_GET['producto_id'];

            $modelo_producto = new producto();
            $modelo_producto->setId($id);
            $productos = $modelo_producto->conseguirUno();
            $colores_producto = $modelo_producto->obtenerColoresProducto();

            foreach ($productos as $producto_ind) {
                $producto = $producto_ind;
            }
        }

        require_once "views/producto/anadir_color.php";
    }

    public function add_color()
    {
        if (isset($_POST) && isset($_FILES)) {
            $id = $_GET['producto_id'];
            $color = isset($_POST["color"]) ? $_POST["color"] : false;
            $array_color = explode('-', $color);

            $color_nombre = $array_color[0];
            $color_id = intval($array_color[1]);

            $nombre_carpeta_producto = isset($_POST["nombre_carpeta_producto"]) ? $_POST["nombre_carpeta_producto"] : false;

            if ($color && $nombre_carpeta_producto) {
                $producto = new producto();
                $producto->setId($id);
                $producto->setColor_id($color_id);


                $imagenes_productos = $_FILES['imagenes_productos'];
                $nombre_imagen  = $imagenes_productos['name'];
                $tipos    = $imagenes_productos['type'];
                $imagenes_validas = [];

                $ruta_imagenes_productos = 'assets/img/productos/' . $nombre_carpeta_producto . "/" . $color_nombre;

                foreach ($tipos as $key => $tipo) {
                    if ($tipo == "image/jpg" || $tipo == "image/png" || $tipo == "image/jpeg" || $tipo == "image/gif") {
                        if (!is_dir($ruta_imagenes_productos)) {
                            mkdir($ruta_imagenes_productos, 0777, true);
                            array_push($imagenes_validas, $nombre_imagen[$key]);
                            move_uploaded_file($imagenes_productos['tmp_name'][$key], $ruta_imagenes_productos . "/" . $nombre_imagen[$key]);
                        } else {
                            array_push($imagenes_validas, $nombre_imagen[$key]);
                            move_uploaded_file($imagenes_productos['tmp_name'][$key], $ruta_imagenes_productos . "/" . $nombre_imagen[$key]);
                        }
                    } else {
                        echo "No es un pdf";
                        die();
                    }
                }

                if (!empty($imagenes_validas)) {
                    $producto->setImagen1($imagenes_validas[0] ? $imagenes_validas[0] : null);
                    $producto->setImagen2($imagenes_validas[1] ? $imagenes_validas[1] : null);
                    $producto->setImagen3($imagenes_validas[2] ? $imagenes_validas[2] : null);
                    $producto->setImagen4($imagenes_validas[3] ? $imagenes_validas[3] : null);
                    $producto->setImagen5($imagenes_validas[4] ? $imagenes_validas[4] : null);

                    $color_producto = $producto->add_color();

                    if ($color_producto) {
                        $_SESSION["color"] = "agregado_exitoso";
                    } else {
                        $_SESSION["color"] = "agregado_fallido";
                    }
                } else {
                    $_SESSION["color"] = "agregado_fallido";
                }
            } else {
                $_SESSION["color"] = "agregado_fallido";
            }
        } else {
            $_SESSION["color"] = "agregado_fallido";
        }
        header('location:' . base_url . "productos/gestion");
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
                $_SESSION["producto"] = "editado_fallido";
            }
        } else {
            $_SESSION["producto"] = "editado_fallido";
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
