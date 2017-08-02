$(document).ready(function () {
    $('.main-menu li a').each(function () {
        $(this).focus(function () {
            $('.main-menu li a').each(function () {
                $(this).removeClass("active");
            });
            if (!$(this).hasClass("active")){
                $(this).addClass("active");
            }
        });
    })
});
