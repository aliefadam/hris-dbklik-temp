function newDataTables(tableSelector, searchBoxSelector, options) {
    let table = $(tableSelector).DataTable({
        searching: true,
        paging: true,
        info: false,
        lengthChange: false,
        pageLength: options.pageLength || 5,
        ordering: options.ordering !== undefined ? options.ordering : true,
        order: options.order || [],
    });

    $(searchBoxSelector).keyup(function () {
        table.search($(this).val()).draw();
    });
}

newDataTables("#table-daftar-katering", "#search-daftar-katering", {
    pageLength: 10,
    ordering: false,
});
newDataTables("#table-riwayat", "#customSearchBox", {
    pageLength: 5,
});
newDataTables("#table-daftar-pengajuan", "#search-daftar-pengajuan", {
    pageLength: 5,
});
newDataTables("#table-karyawan", "#search-daftar-karyawan", {
    pageLength: 5,
});
newDataTables("#table-karyawan-owner", "#search-daftar-karyawan-owner", {
    pageLength: 5,
});
newDataTables("#table-lembur", null, {
    pageLength: 5,
});
newDataTables("#table-mutasi", null, {
    pageLength: 5,
});
newDataTables("#table-daftar-penilaian-kpi", "#search-daftar-penilaian-kpi", {
    pageLength: 20,
});
