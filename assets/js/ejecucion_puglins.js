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

});