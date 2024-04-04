let tablePenilaianKPI = $("#table-daftar-penilaian-kpi").DataTable({
    searching: true,
    paging: true,
    info: false,
    lengthChange: false,
    pageLength: 20,
});

$("#customSearchBoxDaftarPenilaianKPI").keyup(function () {
    tablePenilaianKPI.search($(this).val()).draw();
});
