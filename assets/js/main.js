$(document).ready(function() {

    /* -------------------------------------------------------------------------- */
    /*                         Reconocer el color elegido                         */
    /* -------------------------------------------------------------------------- */
    $("input[type='radio'][name='color']").click(function() {
        // console.log($('input[name=color]:checked').val());
        //console.log($(this).attr('data-img'));
        //console.log($(this).parent());
        var imagen_camiseta = $(this).parents('.caja-producto').find('.img-fluid');
        enlace_color_camiseta = $(this).attr("data-img");

        /* ---------- Metodo 1 para cambiar URL de la imagen con animacion ---------- */
        imagen_camiseta.stop().animate({ opacity: '0' }, function() {
            $(this).attr('src', enlace_color_camiseta);
        }).on("load", function() {
            $(this).stop().animate({ opacity: '1' });
        });

        /* ---------- Metodo 2 para cambiar URL de la imagen con animacion ---------- */
        // imagen_camiseta.fadeOut('fast', function() {
        //     console.log(enlace_color_camiseta);
        //     imagen_camiseta.attr("src", enlace_color_camiseta);
        //     imagen_camiseta.fadeIn('slow');
        // });

        // imagen_camiseta.attr("src", $(this).attr("data-img"));
    });

    /* -------------------------------------------------------------------------- */
    /*               Quitar sidebar(LOGIN) si estamos registrandonos              */
    /* -------------------------------------------------------------------------- */
    var URLactual = window.location.href;
    if (URLactual == enlace + 'usuarios/registro') {
        $('.login').addClass('d-none');
        $('.contenedor-principal').addClass('justify-content-center');
    }
});