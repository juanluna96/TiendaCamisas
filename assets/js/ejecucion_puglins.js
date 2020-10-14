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

    $('#password').focus(function(e) {
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
    $('#password').blur(function(e) {
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
});