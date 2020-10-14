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
    <link rel="stylesheet" href="assets/puglins/Sticky-Mobile-Navigation-GRT-Responsive-Menu/grt-responsive-menu.css">
    <!-- Labelauty -->
    <link rel="stylesheet" href="assets\puglins\Labelauty\jquery-labelauty.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="assets/scss/dist/estilos.css">
</head>

<body>
    <!---------------------------------------------------------------------------- */
/*                                    HEADER                                   */
/* -------------------------------------------------------------------------- -->
    <header>
        <div class="menu-container">
            <div class="container-fluid grt-menu-row">
                <div class="grt-menu-logo">
                    <a href="#" class="grt-logo"><img src="assets/img/logo_tienda_camisas_sin_fondo.png"></a>
                </div>
                <div class="grt-menu-right">
                    <nav>
                        <button class="grt-mobile-button"><span class="line1"></span><span class="line2"></span><span
                                class="line3"></span></button>
                        <ul class="grt-menu">
                            <li class="active"><a href="">Inicio</a></li>
                            <li class="grt-dropdown"><a>Categorias</a>
                                <ul class="grt-dropdown-list">
                                    <li><a href="">Menu 1</a></li>
                                    <li><a href="">Menu 2</a></li>
                                    <li><a href="">Menu 3</a></li>
                                </ul>
                            </li>
                            <li><a href="">Sobre nosotros</a></li>
                            <li><a href="">Portafolio</a></li>
                            <li><a href=""><i class="fas fa-shopping-cart mr-1"></i>Carrito</a></li>
                            <li>
                                <a data-toggle="modal" data-target="#basicExampleModal" class="modal">
                                    <img class="img-fluid rounded-circle" src="assets/img/avatar.png" alt="">
                                    <i class="fas fa-cog indigo-text"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- FIN HEADER -->

    <!---------------------------------------------------------------------------- */
/*                                    MODAL                                   */
/* -------------------------------------------------------------------------- -->

    <div class="modal fade mt-5" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Información del usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <a href="" class="indigo-text"><i class="mr-2 fas fa-archive"></i>Mis pedidos</a>
                    <hr>
                    <a href="" class="indigo-text"><i class="mr-2 fas fa-tag"></i>Gestionar categorías</a>
                    <hr>
                    <a href="" class="indigo-text"><i class="mr-2 fas fa-tshirt"></i>Gestionar productos</a>
                    <hr>
                    <a href="" class="indigo-text"><i class="mr-2 fas fa-palette"></i>Gestionar colores</a>
                    <hr>
                    <a href="" class="indigo-text"><i class="mr-2 fas fa-ruler-combined"></i>Gestionar tallas</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>