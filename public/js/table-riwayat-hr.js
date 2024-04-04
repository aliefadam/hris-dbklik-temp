const TR_TableRiwayat = $("#table-riwayat tbody tr");
TR_TableRiwayat.on("click", function () {
    $(".kolom-feedback").html("");
    $(".overlay-disetujui-oleh").html("");

    const nama = this.getAttribute("data-nama");
    const divisi = this.getAttribute("data-divisi");
    const izin = this.children[1].innerHTML;
    const tanggalDiajukan = this.children[2].innerHTML;
    const tanggalIzin = this.children[3].innerHTML;
    const catatan = this.children[4].innerHTML;
    const filePendukung = this.getAttribute("data-filePendukung") ?? "-";
    const status = this.children[5].innerHTML;
    const statusText = this.children[5].children[1].innerHTML;
    const feedback = this.getAttribute("data-feedback") ?? "-";
    const disetujuiOleh = this.getAttribute("data-disetujui-oleh");

    $("span.overlay-status").removeClass("pending");
    $("span.overlay-status").removeClass("disetujui");
    $("span.overlay-status").removeClass("ditolak");
    $("span.overlay-file-pendukung").removeClass("underline");
    $("span.overlay-file-pendukung").removeClass("underline-offset-1");
    $("span.overlay-file-pendukung").removeClass("cursor-pointer");
    $("span.overlay-file-pendukung").off("click");
    $("span.overlay-status").addClass(statusText);

    if (filePendukung != "-") {
        $("span.overlay-file-pendukung").addClass("underline");
        $("span.overlay-file-pendukung").addClass("underline-offset-1");
        $("span.overlay-file-pendukung").addClass("cursor-pointer");
        $("span.overlay-file-pendukung").on("click", function () {
            window.open(
                `/storage/upload/file_pendukung/${$(this).html()}`,
                "_blank"
            );
        });
    }

    $("span.overlay-divisi").html(divisi);
    $("span.overlay-nama").html(nama);
    $("span.overlay-izin").html(izin);
    $("span.overlay-tanggal-diajukan").html(tanggalDiajukan);
    $("span.overlay-tanggal-izin").html(tanggalIzin);
    $("span.overlay-catatan").html(catatan);
    $("span.overlay-file-pendukung").html(filePendukung);
    $("span.overlay-status").html(status);

    if (statusText != "pending") {
        $(".kolom-feedback").html(`
                    <span class="text-dbklik text-[14px]">Feedback</span>
                    <span class="overlay-feedback drop-shadow-md text-lg leading-none font-medium cursor-pointer capitalize">${feedback}</span>
                `);

        $(".overlay-disetujui-oleh").html(`${disetujuiOleh}`);
    }

    $(".overlay").removeClass("hidden");
    $(".overlay").addClass("flex");
});
