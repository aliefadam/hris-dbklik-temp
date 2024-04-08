$("#edit_foto").on("change", function () {
    const reader = new FileReader();
    reader.readAsDataURL(this.files[0]);
    reader.onload = ({ target }) => {
        $(".foto-preview").attr("src", target.result);
    };
    $(".after-select").show();
});

$(".btn-edit-image").on("click", function () {
    showOverlay("overlay-edit-foto");
});

$(".btn-close-overlay-edit-foto").on("click", function () {
    closeOverlay();
    setTimeout(() => {
        $("#edit_foto").val("");
        $(".after-select").hide();
    }, 500);
});
