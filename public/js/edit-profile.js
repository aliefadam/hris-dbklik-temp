$(".btn-edit-profile").on("click", function () {
    $(".overlay-edit-profile").removeClass("hidden");
    $(".overlay-edit-profile").addClass("flex");
});

$(".btn-close-overlay-edit-profile").on("click", function () {
    $(".container-overlay-edit-profile").removeClass("animate__fadeInDown");
    $(".container-overlay-edit-profile").addClass("animate__fadeOutUp");
    setTimeout(() => {
        $(".overlay-edit-profile").removeClass("flex");
        $(".overlay-edit-profile").addClass("hidden");
        $(".container-overlay-edit-profile").removeClass("animate__fadeOutUp");
        $(".container-overlay-edit-profile").addClass("animate__fadeInDown");
    }, 500);
});
