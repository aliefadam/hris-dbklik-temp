function dataTablesInit({ tableId, searchBoxId, pageLength, ordering, order }) {
    let table = $(`#${tableId}`).DataTable({
        searching: true,
        paging: true,
        info: false,
        lengthChange: false,
        pageLength: pageLength || 5,
        ordering: ordering !== undefined ? ordering : true,
        order: order || [],
    });
    $(`#${searchBoxId}`).keyup(function () {
        table.search($(this).val()).draw();
    });
}

function setHTML(selector, data) {
    $(`${selector}`).html(data);
}

function clearHTML(selector) {
    $(`${selector}`).html("");
}

function setClass(selector, className) {
    $(`${selector}`).addClass(className);
}

function removeClass(selector, className) {
    $(`${selector}`).removeClass(className);
}

function openFile(fileName) {
    window.open(`/storage/upload/file_pendukung/${fileName}`, "_blank");
}

function showOverlay(overlay) {
    $(`.${overlay}`).removeClass("hidden");
    $(`.${overlay}`).addClass("flex");
}

function closeOverlay() {
    removeClass(".container-overlay", "animate__fadeInDown");
    setClass(".container-overlay", "animate__fadeOutUp");
    setTimeout(() => {
        removeClass(".overlay-background", "flex");
        setClass(".overlay-background", "hidden");
        removeClass(".container-overlay", "animate__fadeOutUp");
        setClass(".container-overlay", "animate__fadeInDown");
    }, 500);
}
