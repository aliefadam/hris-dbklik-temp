const btnResign = $(".btn-resign");
const btnKontrak = $(".btn-kontrak");
const btnCatatan = $(".btn-catatan");
const btnMutasi = $(".btn-mutasi");
const btnLembur = $(".btn-lembur");

btnResign.on("click", function () {
    showOverlay("overlay-resign");
    const id = this.getAttribute("data-id");
});
btnKontrak.on("click", function () {
    showOverlay("overlay-kontrak");
});
btnCatatan.on("click", function () {
    showOverlay("overlay-catatan");
});
btnMutasi.on("click", function () {
    showOverlay("overlay-mutasi");
});
btnLembur.on("click", function () {
    showOverlay("overlay-lembur");
});

const btnCloseOverlayResign = $(".btn-close-overlay-resign");
const btnCloseOverlayKontrak = $(".btn-close-overlay-kontrak");
const btnCloseOverlayCatatan = $(".btn-close-overlay-catatan");
const btnCloseOverlayMutasi = $(".btn-close-overlay-mutasi");
const btnCloseOverlayLembur = $(".btn-close-overlay-lembur");

btnCloseOverlayResign.on("click", function () {
    closeOverlay("overlay-resign", "container-overlay-resign");
});
btnCloseOverlayKontrak.on("click", function () {
    closeOverlay("overlay-kontrak", "container-overlay-kontrak");
});
btnCloseOverlayCatatan.on("click", function () {
    closeOverlay("overlay-catatan", "container-overlay-catatan");
});
btnCloseOverlayMutasi.on("click", function () {
    closeOverlay("overlay-mutasi", "container-overlay-mutasi");
});
btnCloseOverlayLembur.on("click", function () {
    closeOverlay("overlay-lembur", "container-overlay-lembur");
});

const btnCloseOverlayHead = $(".btn-close-overlay-head");
btnCloseOverlayHead.on("click", function () {
    $(".container-overlay-head").removeClass("animate__fadeInDown");
    $(".container-overlay-head").addClass("animate__fadeOutUp");
    setTimeout(() => {
        $(".overlay-head").removeClass("flex");
        $(".overlay-head").addClass("hidden");
        $(".container-overlay-head").removeClass("animate__fadeOutUp");
        $(".container-overlay-head").addClass("animate__fadeInDown");
    }, 500);
});

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

function showOverlay(overlay) {
    $(`.${overlay}`).removeClass("hidden");
    $(`.${overlay}`).addClass("flex");
}

function closeOverlay(overlay, container) {
    $(`.${container}`).removeClass("animate__fadeInDown");
    $(`.${container}`).addClass("animate__fadeOutUp");
    setTimeout(() => {
        $(`.${overlay}`).removeClass("flex");
        $(`.${overlay}`).addClass("hidden");
        $(`.${container}`).removeClass("animate__fadeOutUp");
        $(`.${container}`).addClass("animate__fadeInDown");
    }, 500);
}
