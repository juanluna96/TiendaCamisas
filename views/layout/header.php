<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SHIRT SHOP</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <!-- PUGLINS -->
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/7507f7d910.js" crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="<?php echo base_url; ?>assets/puglins/Sticky-Mobile-Navigation-GRT-Responsive-Menu/grt-responsive-menu.css">
    <!-- Labelauty -->
    <link rel="stylesheet" href="<?php echo base_url; ?>assets\puglins\Labelauty\jquery-labelauty.css">
    <!-- Krajee Bootstrap inputFile -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/css/fileinput.min.css" media="all"
        rel="stylesheet" type="text/css" />
    <!-- Tiny Select Box -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url; ?>assets\puglins\Tiny_Select_Box\style.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="<?php echo base_url; ?>assets/scss/dist/estilos.css">

</head>

<body>
    <!---------------------------------------------------------------------------- */
/*                                    HEADER                                   */
/* -------------------------------------------------------------------------- -->
    <header>
        <div class="menu-container">
            <div class="container-fluid grt-menu-row">
                <div class="grt-menu-logo">
                    <a href="<?php echo base_url; ?>" class="grt-logo">
                        <img src="<?php echo base_url; ?>assets/img/logo_tienda_camisas_sin_fondo.png">
                    </a>
                </div>
                <div class="grt-menu-right">
                    <nav>
                        <button class="grt-mobile-button"><span class="line1"></span><span class="line2"></span><span
                                class="line3"></span></button>
                        <ul class="grt-menu">
                            <li class="active"><a href="<?php echo base_url; ?>">Inicio</a></li>
                            <li class="grt-dropdown"><a>Categorías</a>
                                <ul class="grt-dropdown-list">
                                    <?php $categorias = utilidades::mostrarCategorias(); ?>
                                    <?php foreach ($categorias as $categoria) : ?>
                                    <li><a href="#"><?php echo $categoria['nombre']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                            <li><a href="">Sobre nosotros</a></li>
                            <li><a href="">Portafolio</a></li>
                            <li><a href=""><i class="fas fa-shopping-cart mr-1"></i>Carrito</a></li>
                            <?php if (isset($_SESSION["usuario"])) : ?>
                            <li>
                                <a data-toggle="modal" data-target="#ajustes" class="pb-0 pt-2 modal">
                                    <img class="img-fluid rounded-circle"
                                        src="<?php echo base_url; ?>assets/img/avatares/<?php echo $_SESSION["usuario"]->image; ?>"
                                        alt="">
                                    <i class="fas fa-cog indigo-text"></i>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- FIN HEADER -->