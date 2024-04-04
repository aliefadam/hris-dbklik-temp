let tableKaryawan = $("#table-karyawan").DataTable({
    searching: true,
    paging: true,
    info: false,
    lengthChange: false,
    pageLength: 5,
});

$("#customSearchBoxKaryawan").keyup(function () {
    tableKaryawan.search($(this).val()).draw();
});

const TR_TableKaryawan = $("#table-karyawan tbody tr");
TR_TableKaryawan.on("click", function () {
    const id = this.getAttribute("data-id");
    window.location.href = `/owner/data-karyawan/${id}`;
});
