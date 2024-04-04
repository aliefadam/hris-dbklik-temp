const btnCloseOverlay = $(".btn-close-overlay");
btnCloseOverlay.on("click", function () {
    $(".container-overlay").removeClass("animate__fadeInDown");
    $(".container-overlay").addClass("animate__fadeOutUp");
    setTimeout(() => {
        $(".overlay").removeClass("flex");
        $(".overlay").addClass("hidden");
        $(".container-overlay").removeClass("animate__fadeOutUp");
        $(".container-overlay").addClass("animate__fadeInDown");
    }, 500);
});
