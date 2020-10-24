$(document).ready(function() {

    /* -------------------------------------------------------------------------- */
    /*                                  LABELAUTY                                 */
    /* -------------------------------------------------------------------------- */
    $(".radio-buttons").labelauty({
        // Use icon?
        // If false, then only a text label represents the input
        icon: false
    });

    /* -------------------------------------------------------------------------- */
    /*                                   ICONATE                                  */
    /* -------------------------------------------------------------------------- */

    $('.password').focus(function(e) {
        e.preventDefault();
        var iconElement = document.getElementById('icon');
        var options = {
            from: 'fa-lock',
            to: 'fa-lock-open',
            animation: 'rubberBand',
            duration: 900
        };
        iconate(iconElement, options);
    });
    $('.password').blur(function(e) {
        e.preventDefault();
        var iconElement = document.getElementById('icon');
        var options = {
            from: 'fa-lock-open',
            to: 'fa-lock',
            animation: 'rubberBand',
            duration: 900
        };
        iconate(iconElement, options);
    });

    /* -------------------------------------------------------------------------- */
    /*                              TOOLTIP BOOTSTRAP                             */
    /* -------------------------------------------------------------------------- */

    $('[data-toggle="tooltip"]').tooltip();


    /* -------------------------------------------------------------------------- */
    /*                         Krajee Bootstrap inputFile                         */
    /* -------------------------------------------------------------------------- */

    $("#avatar").fileinput({
        theme: "fa",
        overwriteInitial: true,
        maxFileSize: 1500,
        showClose: false,
        showCaption: false,
        browseLabel: '',
        removeLabel: '',
        browseIcon: '<i class="fas fa-folder-open"></i>',
        removeIcon: '<i class="fas fa-trash-alt"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-1',
        msgErrorClass: 'alert alert-block alert-danger',
        defaultPreviewContent: '<img src="' + enlace + '/assets/img/avatar_placeholder.png" style="max-width: 80px" alt="Your Avatar">',
        layoutTemplates: { main2: '{preview} {remove} {browse}' },
        allowedFileExtensions: ["jpg", "png", "gif"]
    });

    $('.btn-file').addClass('btn-block');
    $('.fileinput-remove').addClass('btn-block mb-2');

    $("#imagenes_productos").fileinput({
        browseClass: "btn btn-indigo col-12 col-md-6 mx-0 mx-md-2",
        removeClass: "btn btn-default btn-secondary col-12 col-md-5 mx-0 mx-md-2",
        language: "es",
        showUpload: false,
        theme: "fa",
        uploadUrl: "/file-upload-batch/2",
        autoReplace: true,
        maxFileCount: 5,
        allowedFileExtensions: ["jpg", "png", "gif"],
    });


    $('.file-caption').removeClass('form-control');
    $('.file-caption').addClass('md-form w-100 my-1 pl-3');
    $('.file-caption-name').addClass('py-2');
    $('.input-group-append').addClass('w-100 flex-wrap justify-content-center');

    /* -------------------------------------------------------------------------- */
    /*                               Tiny_Select_Box                              */
    /* -------------------------------------------------------------------------- */

    $(".select").jselect_search({
        placeholder: 'Buscar',
        fillable: !0,
        searchable: !0
    })

    /* -------------------------------------------------------------------------- */
    /*                             Jquery-price-format                            */
    /* -------------------------------------------------------------------------- */
    $('#precio').priceFormat({
        prefix: 'COP$ ',
        thousandsSeparator: '.'
    });

    /* -------------------------------------------------------------------------- */
    /*                                 BASIC TABLE                                */
    /* -------------------------------------------------------------------------- */

    $('table').basictable();

    /* -------------------------------------------------------------------------- */
    /*                          jQuery MiniColors Plugin                          */
    /* -------------------------------------------------------------------------- */

    $('input#cod_color').minicolors();
});