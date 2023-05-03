// noinspection JSUnresolvedFunction

// Initialise Masonry
window.onload = function () { // Initialize the Grid view
    $('.grid').masonry({itemSelector: '.grid-item'});

    $("#loading").fadeOut(315);
    $("body").css("overflow-y", "scroll");
    $("main").animate({opacity: 1}, 636);
};

// Change language
$("#lang li img").on('click', function () {
    let hl = $(this).attr("data-lang");
    let goTo = document.location.toString();
    if (goTo.indexOf("hl=") === -1) goTo += ((goTo.indexOf("?") === -1) ? "?" : "&") + "hl=" + hl;
    else {
        let index = goTo.indexOf("hl=") + 3;
        if (index === goTo.length) goTo += hl;
        else {
            let continuum = goTo.substring(index).indexOf("&");
            if (continuum === -1) goTo = goTo.substring(0, index) + hl;
            else goTo = goTo.substring(0, index) + hl + goTo.substring(index).substring(continuum);
        }
    }
    document.location.assign(goTo);
});
