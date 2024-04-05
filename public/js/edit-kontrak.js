$("select[name=durasi]").on("change", function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $("meta[name=csrf-token]").attr("content"),
        },
    });
    $.ajax({
        url: "/hr/kontrak",
        type: "POST",
        data: {
            durasi: $(this).val(),
            karyawan_id: $("#karyawan_id").val(),
        },
        success: function (res) {
            $("input[name=tanggal_akhir_kontrak_baru]").val(res.tanggal_baru);
        },
    });
});
