$(".value-color span").click(function() {
    // var precio = $(this).parent().parent().parent().children().eq(0).children().eq(1);
    // var talla = $(this).parent().parent().parent().children().eq(2).children().eq(1);

    // console.log(talla.find('.active'));


    $(".value-color span").removeClass("active");
    $(this).addClass("active");

    // precio.css("color", $(this).attr("data-color"));

    // if ($(this).attr("data-color") == 'yellow' || $(this).attr("data-color") == 'lightgrey') {
    //     talla.children().css("color", 'black');
    //     talla.find('.active').css({
    //         "background": $(this).attr("data-color"),
    //         "color": 'black',
    //     });
    // } else {
    //     talla.children().css("color", $(this).attr("data-color"));
    //     talla.find('.active').css({
    //         "background": $(this).attr("data-color"),
    //         "color": 'white',
    //     });
    // }

    // $(".image img").attr("src", $(this).attr("data-img"));
    // $(".botones button").css({
    //     "background": $(this).attr("data-color"),
    //     "border-color": $(this).attr("data-color")
    // });
});

$(".value-size span").click(function() {
    $((".value-size span")).removeClass("active");
    $(this).addClass("active");
});