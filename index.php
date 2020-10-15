<?php require_once "config/parameters.php";?>
<?php session_start();?>
<?php require_once "config/db.php";?>
<?php require_once "autoload.php";?>
<?php require_once 'views/layout/header.php';?>

<?php // Conexion base de datos
$db=Database::connect();?>


<div class="container-fluid mt-5 row pr-0" style="min-height: 100vh;">

    <?php require_once 'views/layout/sidebar.php';?>

    <!---------------------------------------------------------------------------- */
/*                                    PRODUCTOS                                  */
/* -------------------------------------------------------------------------- -->
    <div class="productos pr-0 col-12 col-lg-9 mt-3">
        <?php

function mostrar_error()
{
    $error = new ErrorController();
    $error->index();
}

if (isset($_GET['controller'])) {
    $nombre_controlador = $_GET['controller'] . 'Controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $nombre_controlador = controller_default;
} else {
    mostrar_error();
    exit;
}

if (isset($nombre_controlador) && class_exists($nombre_controlador)) {

    $controlador = new $nombre_controlador();

    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $action_default = action_default;
        $controlador->$action_default();
    } else {
        mostrar_error();
    }

} else {
    mostrar_error();
}
?>

    </div>
</div>

<script>
var enlace = "<?php echo base_url; ?>";
</script>

<?php require_once 'views/layout/footer.php';?>