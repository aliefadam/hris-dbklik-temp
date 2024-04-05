const btnResign = $(".btn-resign");
const btnKontrak = $(".btn-kontrak");
const btnCatatan = $(".btn-catatan");
const btnMutasi = $(".btn-mutasi");
const btnLembur = $(".btn-lembur");

btnResign.on("click", function () {
    showOverlay("overlay-resign");
    const id = this.getAttribute("data-id");
});
btnKontrak.on("click", function () {
    showOverlay("overlay-kontrak");
});
btnCatatan.on("click", function () {
    showOverlay("overlay-catatan");
});
btnMutasi.on("click", function () {
    showOverlay("overlay-mutasi");
});
btnLembur.on("click", function () {
    showOverlay("overlay-lembur");
});

const btnCloseOverlayResign = $(".btn-close-overlay-resign");
const btnCloseOverlayKontrak = $(".btn-close-overlay-kontrak");
const btnCloseOverlayCatatan = $(".btn-close-overlay-catatan");
const btnCloseOverlayMutasi = $(".btn-close-overlay-mutasi");
const btnCloseOverlayLembur = $(".btn-close-overlay-lembur");

btnCloseOverlayResign.on("click", function () {
    closeOverlay("overlay-resign", "container-overlay-resign");
});
btnCloseOverlayKontrak.on("click", function () {
    closeOverlay("overlay-kontrak", "container-overlay-kontrak");
});
btnCloseOverlayCatatan.on("click", function () {
    closeOverlay("overlay-catatan", "container-overlay-catatan");
});
btnCloseOverlayMutasi.on("click", function () {
    closeOverlay("overlay-mutasi", "container-overlay-mutasi");
});
btnCloseOverlayLembur.on("click", function () {
    closeOverlay("overlay-lembur", "container-overlay-lembur");
});

const btnCloseOverlayHead = $(".btn-close-overlay-head");
btnCloseOverlayHead.on("click", function () {
    $(".container-overlay-head").removeClass("animate__fadeInDown");
    $(".container-overlay-head").addClass("animate__fadeOutUp");
    setTimeout(() => {
        $(".overlay-head").removeClass("flex");
        $(".overlay-head").addClass("hidden");
        $(".container-overlay-head").removeClass("animate__fadeOutUp");
        $(".container-overlay-head").addClass("animate__fadeInDown");
    }, 500);
});

const btnCloseOverlay = $(".btn-close-overlay");
btnCloseOverlay.on("click", function () {
    $(".container-overlay").removeClass("animate__fadeInDown");
    $(".container-overlay").addClass("animate__fadeOutUp");
    setTimeout(() => {
        $(".overlay").removeClass("flex");
        $(".overlay").addClass("hidden");
        $(".container-overlay").removeClass("animate__fadeOutUp");
        $(".container-overlay").addClass("animate__fadeInDown");
    }, 500);
});

function showOverlay(overlay) {
    $(`.${overlay}`).removeClass("hidden");
    $(`.${overlay}`).addClass("flex");
}

function closeOverlay(overlay, container) {
    $(`.${container}`).removeClass("animate__fadeInDown");
    $(`.${container}`).addClass("animate__fadeOutUp");
    setTimeout(() => {
        $(`.${overlay}`).removeClass("flex");
        $(`.${overlay}`).addClass("hidden");
        $(`.${container}`).removeClass("animate__fadeOutUp");
        $(`.${container}`).addClass("animate__fadeInDown");
    }, 500);
}

const TR_TABLE_RIWAYAT = $("#table-riwayat tbody tr");
TR_TABLE_RIWAYAT.on("click", function () {
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
    $("span.overlay-status").addClass(statusText);
    $("span.overlay-file-pendukung").off("click");

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

    if (statusText != "pending") {
        $(".kolom-feedback").html(`
                    <span class="text-dbklik text-[14px]">Feedback</span>
                    <span class="overlay-feedback drop-shadow-md text-lg leading-none font-medium cursor-pointer capitalize">${feedback}</span>
                `);

        $(".overlay-disetujui-oleh").html(`${disetujuiOleh}`);
    }

    $("span.overlay-divisi").html(divisi);
    $("span.overlay-nama").html(nama);
    $("span.overlay-izin").html(izin);
    $("span.overlay-tanggal-diajukan").html(tanggalDiajukan);
    $("span.overlay-tanggal-izin").html(tanggalIzin);
    $("span.overlay-catatan").html(catatan);
    $("span.overlay-file-pendukung").html(filePendukung);
    $("span.overlay-status").html(status);
    $("span.overlay-feedback").html(feedback);

    $(".overlay").removeClass("hidden");
    $(".overlay").addClass("flex");
});

const TR_TABLE_DAFTAR_PENGAJUAN = $("#table-daftar-pengajuan tbody tr");
TR_TABLE_DAFTAR_PENGAJUAN.on("click", function () {
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

const TR_TABLE_KARYAWAN = $("#table-karyawan tbody tr");
TR_TABLE_KARYAWAN.on("click", function () {
    const id = this.getAttribute("data-id");
    window.location.href = `/hr/biodata/${id}`;
});

const TR_TABLE_KARYAWAN_OWNER = $("#table-karyawan-owner tbody tr");
TR_TABLE_KARYAWAN_OWNER.on("click", function () {
    const id = this.getAttribute("data-id");
    window.location.href = `/owner/data-karyawan/${id}`;
});
