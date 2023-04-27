// noinspection JSUnresolvedFunction

window.onload = function () {
    // Initialize the Grid view
    $('.grid').masonry({itemSelector: '.grid-item'});

    $("#loading").fadeOut(315);
    $("body").css("overflow-y", "scroll");
    $("main").animate({opacity: 1}, 636);
};

// Translation
function translate(hl) {
    switch (hl) {
        case "fa":
            if (document.location.toString().indexOf("hl=en") !== -1)
                history.pushState({}, null, document.location.toString()
                    .replace("?hl=en", "").replace("&hl=en", ""));
            break;
        default:
            let goTo = document.location.toString();
            if (goTo.indexOf("hl=en") === -1) goTo += ((goTo.indexOf("?") === -1) ? "?" : "&") + "hl=en";
            document.location.assign(goTo);
            break;
    }
    if (["fa", "ar"].includes(hl))
        $("blockquote, .projDesc").css("direction", "rtl");
    $('.grid').masonry();
    $("#langSelect").attr("src", $("#lang li img[data-lang=" + hl + "]").attr("src"));
}

$("#lang li img").on('click', function () {
    translate($(this).attr("data-lang"));
});
if ($("#help").val() !== "en") switch ($("#country").val()) {
    case "IR":
        translate("fa");
        break;
}
