let tableKatering = $("#table-daftar-katering").DataTable({
    searching: true,
    paging: true,
    info: false,
    lengthChange: false,
    pageLength: 10,
    order: [],
    ordering: false,
});

$("#customSearchBoxDaftarKatering").keyup(function () {
    tableKatering.search($(this).val()).draw();
});
