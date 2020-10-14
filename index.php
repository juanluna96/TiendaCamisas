<?php require_once 'views/layout/header.php'; ?>
<?php require_once "autoload.php"; ?>




<div class="container-fluid mt-5 row pr-0" style="min-height: 100vh;">

    <?php require_once 'views/layout/sidebar.php';?>

    <!---------------------------------------------------------------------------- */
/*                                    PRODUCTOS                                  */
/* -------------------------------------------------------------------------- -->
    <div class="productos pr-0 col-12 col-lg-9 mt-3">
        <?php
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

    </div>
</div>



<?php require_once 'views/layout/footer.php'; ?>