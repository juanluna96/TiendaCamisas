<?php

require_once "models/usuario.php";

class UsuariosController
{
    public function index()
    {
        echo "Controlador Usuarios, accion index";
    }

    public function registro()
    {
        require_once "views/usuario/registro.php";
    }

    public static function Guardar()
    {
        $enlace = base_url;
        if (isset($_POST) && isset($_FILES)) {
            $nombre = isset($_POST["nombre"]) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST["apellidos"]) ? $_POST['apellidos'] : false;
            $email = isset($_POST["email"]) ? $_POST['email'] : false;
            $password = isset($_POST["password"]) ? $_POST['password'] : false;
            $rol = isset($_POST["rol"]) ? $_POST['rol'] : false;

            if ($nombre && $apellidos && $email && $password && $rol) {
                $usuario = new usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
                $usuario->setRol($rol);

                $avatar = $_FILES['avatar'];
                $nombre_imagen  = $avatar['name'];
                $tipo    = $avatar['type'];
                $usuario->setImage($nombre_imagen);

                if ($tipo == "image/jpg" || $tipo == "image/png" || $tipo == "image/jpeg" || $tipo == "image/gif") {
                    if (!is_dir('assets/img/avatares')) {
                        mkdir('assets/img/avatares', 0777);
                    } else {
                        move_uploaded_file($avatar['tmp_name'], 'assets/img/avatares/' . $nombre_imagen);
                    }
                }

                $save = $usuario->save();

                if ($save) {
                    $_SESSION["register"] = "completado";
                } else {
                    $_SESSION["register"] = "fallido";
                }
            } else {
                $_SESSION["register"] = "fallido";
            }


            header("Location:" . $enlace . "usuarios/registro");
        } else {
            $_SESSION["register"] = "fallido";
            header("Location:" . $enlace . "usuarios/registro");
        }
    }

    public function login()
    {
        if (isset($_POST)) {
            // Identificar al usuario
            // Consulta a la base de datos

            $email = isset($_POST["nombre_usuario"]) ? $_POST['nombre_usuario'] : false;
            $password = isset($_POST["password"]) ? $_POST['password'] : false;

            $usuario = new usuario();
            $usuario->setEmail($email);
            $usuario->setPassword($password);
            $identidad = $usuario->login();

            // Crear una sesión

            if ($identidad && is_object($identidad)) {
                $_SESSION["usuario"] = $identidad;
            } else {
                $_SESSION["error_login"] = "Identificación fallida <br> Intenta de nuevo";
            }
        }
        header('location:' . base_url);
    }

    public function logout()
    {
        if (isset($_SESSION["usuario"])) {
            unset($_SESSION['usuario']);
        }

        if (isset($_SESSION["error_login"])) {
            unset($_SESSION['error_login']);
        }

        header('location:' . base_url);
    }
}