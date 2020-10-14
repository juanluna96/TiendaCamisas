<?php

require_once "autoload.php";


if (isset($_GET['controller'])) {
    $nombre_controlador = $_GET['controller'] . 'Controller';
} else {
    echo "<h1>La pagina que buscas no existe </h1>";
    exit;
}

if (isset($nombre_controlador) && class_exists($nombre_controlador)) {

    $controlador = new $nombre_controlador();

    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    } else {
        echo "<h1>La pagina que buscas no existe </h1>";
    }

} else {
    echo "<h1>La pagina que buscas no existe </h1>";
}
?>