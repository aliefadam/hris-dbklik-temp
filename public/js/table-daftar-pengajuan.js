let tableDaftarPengajuan = $("#table-daftar-pengajuan").DataTable({
    searching: true,
    paging: true,
    info: false,
    lengthChange: false,
    pageLength: 5,
});

$("#customSearchBoxDaftarPengajuan").keyup(function () {
    tableDaftarPengajuan.search($(this).val()).draw();
});

const TR_TableDaftarPengajuan = $("#table-daftar-pengajuan tbody tr");
TR_TableDaftarPengajuan.on("click", function () {
    $(".kolom-feedback").html("");
    $(".kolom-balasan").html("");
    $(".overlay-head-disetujui-oleh").html("");

    const id = this.getAttribute("data-id");
    const no = this.children[0].innerHTML;
    const divisi = this.children[1].innerHTML;
    const nama = this.children[2].innerHTML;
    const izin = this.children[3].innerHTML;
    const tanggalDiajukan = this.children[4].innerHTML;
    const tanggalIzin = this.children[5].innerHTML;
    const catatan = this.getAttribute("data-catatan") ?? "-";
    const filePendukung = this.getAttribute("data-filePendukung") ?? "-";
    const status = this.children[6].innerHTML;
    const statusText = this.children[6].children[1].innerHTML;
    const feedback = this.getAttribute("data-feedback");
    const disetujuiOleh = this.getAttribute("data-disetujui-oleh");

    $("span.overlay-head-status").removeClass("pending");
    $("span.overlay-head-status").removeClass("disetujui");
    $("span.overlay-head-status").removeClass("ditolak");
    $("span.overlay-head-file-pendukung").removeClass("underline");
    $("span.overlay-head-file-pendukung").removeClass("underline-offset-1");
    $("span.overlay-head-file-pendukung").removeClass("cursor-pointer");
    $("span.overlay-head-file-pendukung").off("click");
    $("span.overlay-head-status").addClass(statusText);

    if (filePendukung != "-") {
        $("span.overlay-head-file-pendukung").addClass("underline");
        $("span.overlay-head-file-pendukung").addClass("underline-offset-1");
        $("span.overlay-head-file-pendukung").addClass("cursor-pointer");
        $("span.overlay-head-file-pendukung").on("click", function () {
            window.open(
                `/storage/upload/file_pendukung/${$(this).html()}`,
                "_blank"
            );
        });
    }

    $(".form-balasan").attr("action", `/balas-perizinan/${id}`);
    $("span.overlay-head-divisi").html(divisi);
    $("span.overlay-head-nama").html(nama);
    $("span.overlay-head-izin").html(izin);
    $("span.overlay-head-tanggal-diajukan").html(tanggalDiajukan);
    $("span.overlay-head-tanggal-izin").html(tanggalIzin);
    $("span.overlay-head-catatan").html(catatan);
    $("span.overlay-head-file-pendukung").html(filePendukung);
    $("span.overlay-head-status").html(status);

    if (statusText != "pending") {
        $(".kolom-feedback").html(`
                    <span class="text-dbklik text-[14px]">Feedback</span>
                    <span class="overlay-feedback drop-shadow-md text-lg leading-none font-medium cursor-pointer capitalize">${feedback}</span>
                `);

        $(".overlay-head-disetujui-oleh").html(`${disetujuiOleh}`);
    }

    if (statusText == "pending") {
        $(".kolom-balasan").html(`
                    <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md mt-3">
                        <label for="feedback" class="text-dbklik">Beri Tanggapan</label>
                        <textarea name="feedback" id="feedback" class="bg-transparent outline-none resize-none h-[100px]"></textarea>
                    </div>
                    <div class="flex gap-3 border mt-3">
                        <button name="status" value="disetujui"
                            class="btn-terima-perizinan flex-[1] bg-gradient-to-r hover:from-green-900 hover:to-green-700 from-green-800 to-green-600 text-white p-3 rounded-lg">Terima</button>
                        <button name="status" value="ditolak"
                            class="btn-tolak-perizinan flex-[1] bg-gradient-to-r hover:from-red-900 hover:to-red-700 from-red-800 to-red-600 text-white p-3 rounded-lg">Tolak</button>
                    </div>
                `);
    }

    $(".overlay-head").removeClass("hidden");
    $(".overlay-head").addClass("flex");
});
