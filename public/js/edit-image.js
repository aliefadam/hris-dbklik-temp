$(".btn-edit-image").on("click", function () {
    $(".overlay-edit-foto").removeClass("hidden");
    $(".overlay-edit-foto").addClass("flex");
});

$(".btn-close-overlay-edit-foto").on("click", function () {
    $(".container-overlay-edit-foto").removeClass("animate__fadeInDown");
    $(".container-overlay-edit-foto").addClass("animate__fadeOutUp");
    setTimeout(() => {
        $(".overlay-edit-foto").removeClass("flex");
        $(".overlay-edit-foto").addClass("hidden");
        $(".container-overlay-edit-foto").removeClass("animate__fadeOutUp");
        $(".container-overlay-edit-foto").addClass("animate__fadeInDown");
        $("#edit_foto").val("");
        $(".after-select").hide();
    }, 500);
});
