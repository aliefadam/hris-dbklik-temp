$("select[name=tujuan]").on("change", function () {
    const opt = $(this).find("option:selected").text();
    $("input[name=tujuanString]").val(opt);
});

$("select[name=jenis_mutasi]").on("change", function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $("meta[name=csrf-token]").attr("content"),
        },
    });
    $.ajax({
        url: "/hr/mutasi",
        type: "POST",
        data: {
            jenis_mutasi: $(this).val(),
            karyawan_id: $("#karyawan_id").val(),
        },
        beforeSend: function () {
            $("#awal").val("Loading..");
            $("#tujuan").html("<option value=''>Loading..</option>");
        },
        success: function (res) {
            $("select#tujuan").html("");
            $("input#awal").val(res.awal);
            if (res.jenis_mutasi == "pindah-cabang") {
                $.each(res.akhir, function (i, opt) {
                    $("select#tujuan").append(
                        `<option value="${opt.id}">${opt.nama_cabang}</option>`
                    );
                });
                $("input[name=tujuanString]").val(res.akhir[0].nama_cabang);
            } else if (res.jenis_mutasi == "pindah-divisi") {
                $.each(res.akhir, function (i, opt) {
                    $("select#tujuan").append(
                        `<option value="${opt.id}">${opt.nama_divisi}</option>`
                    );
                });
                $("input[name=tujuanString]").val(res.akhir[0].nama_divisi);
            } else if (res.jenis_mutasi == "pindah-sub-divisi") {
                $.each(res.akhir, function (i, opt) {
                    $("select#tujuan").append(
                        `<option value="${opt.id}">${opt.nama_sub_divisi}</option>`
                    );
                });
                $("input[name=tujuanString]").val(res.akhir[0].nama_sub_divisi);
            } else if (res.jenis_mutasi == "pindah-jabatan") {
                $.each(res.akhir, function (i, opt) {
                    $("select#tujuan").append(
                        `<option value="${opt.id}">${opt.nama_jabatan}</option>`
                    );
                });
                $("input[name=tujuanString]").val(res.akhir[0].nama_jabatan);
            }
        },
    });
});
