let tablePengisianKPI = $("#table-daftar-pengisian-kpi").DataTable({
    searching: true,
    paging: false,
    info: false,
    lengthChange: false,
    pageLength: 50,
});

$("#customSearchBoxPengisianKPI").keyup(function () {
    tablePengisianKPI.search($(this).val()).draw();
});
