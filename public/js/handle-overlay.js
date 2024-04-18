$(".btn-close-overlay").on("click", function () {
    closeOverlay();
});

const TR_TABLE_RIWAYAT = $("#table-riwayat tbody tr");
TR_TABLE_RIWAYAT.on("click", function () {
    clearHTML(".kolom-feedback");
    clearHTML(".overlay-disetujui-oleh");

    setHTML("span.overlay-nama", this.getAttribute("data-nama"));
    setHTML("span.overlay-tanggal-diajukan", this.children[2].innerHTML);
    setHTML("span.overlay-tanggal-izin", this.children[3].innerHTML);
    setHTML("span.overlay-izin", this.children[1].innerHTML);
    setHTML("span.overlay-catatan", this.children[4].innerHTML);

    const filePendukung = this.getAttribute("data-filePendukung") ?? "-";
    const status = this.children[5].innerHTML;
    const statusText = this.children[5].children[1].innerHTML;
    const feedback = this.getAttribute("data-feedback") ?? "-";
    const disetujuiOleh = this.getAttribute("data-disetujui-oleh");

    removeClass("span.overlay-status", ["pending", "disetujui", "ditolak"]);
    removeClass("span.overlay-file-pendukung", [
        "underline",
        "underline-offset-1",
        "cursor-pointer",
    ]);
    setClass("span.overlay-status", [statusText]);
    $("span.overlay-file-pendukung").off("click");

    if (filePendukung != "-") {
        setClass("span.overlay-file-pendukung", [
            "underline",
            "underline-offset-1",
            "cursor-pointer",
        ]);
        $("span.overlay-file-pendukung").on("click", function () {
            openFile($(this).html());
        });
    }

    if (statusText != "pending") {
        const elemenFeedback = `
            <span class="text-dbklik text-[14px]">Feedback</span>
            <span class="overlay-feedback drop-shadow-md text-lg leading-none font-medium cursor-pointer capitalize">${feedback}</span>
        `;
        setHTML(".kolom-feedback", elemenFeedback);
        setHTML(".overlay-disetujui-oleh", disetujuiOleh);
    }

    setHTML("span.overlay-file-pendukung", filePendukung);
    setHTML("span.overlay-status", status);
    setHTML("span.overlay-feedback", feedback);

    showOverlay("overlay");
});

const TR_TABLE_DAFTAR_PENGAJUAN = $("#table-daftar-pengajuan tbody tr");
TR_TABLE_DAFTAR_PENGAJUAN.on("click", function () {
    clearHTML(".kolom-feedback");
    clearHTML(".kolom-balasan");
    clearHTML(".overlay-head-disetujui-oleh");

    setHTML("span.overlay-head-divisi", this.children[1].innerHTML);
    setHTML("span.overlay-head-nama", this.children[2].innerHTML);
    setHTML("span.overlay-head-izin", this.children[3].innerHTML);
    setHTML("span.overlay-head-tanggal-diajukan", this.children[4].innerHTML);
    setHTML("span.overlay-head-tanggal-izin", this.children[5].innerHTML);
    setHTML(
        "span.overlay-head-catatan",
        this.getAttribute("data-catatan") ?? "-"
    );
    setHTML(
        "span.overlay-head-file-pendukung",
        this.getAttribute("data-filePendukung") ?? "-"
    );
    setHTML("span.overlay-head-status", this.children[6].innerHTML);

    const id = this.getAttribute("data-id");
    const filePendukung = this.getAttribute("data-filePendukung") ?? "-";
    const statusText = this.children[6].children[1].innerHTML;
    const feedback = this.getAttribute("data-feedback");
    const disetujuiOleh = this.getAttribute("data-disetujui-oleh");

    removeClass("span.overlay-head-status", [
        "pending",
        "disetujui",
        "ditolak",
    ]);
    removeClass("span.overlay-head-file-pendukung", [
        "underline",
        "underline-offset-1",
        "cursor-pointer",
    ]);
    setClass("span.overlay-head-status", [statusText]);
    $("span.overlay-head-file-pendukung").off("click");

    if (filePendukung != "-") {
        setClass("span.overlay-head-file-pendukung", [
            "underline",
            "underline-offset-1",
            "cursor-pointer",
        ]);
        $("span.overlay-head-file-pendukung").on("click", function () {
            openFile($(this).html());
        });
    }

    $(".form-balasan").attr("action", `/balas-perizinan/${id}`);

    if (statusText != "pending") {
        const elemenFeedback = `
            <span class="text-dbklik text-[14px]">Feedback</span>
            <span class="overlay-feedback drop-shadow-md text-lg leading-none font-medium cursor-pointer capitalize">${feedback}</span>
        `;
        setHTML(".kolom-feedback", elemenFeedback);
        setHTML(".overlay-head-disetujui-oleh", disetujuiOleh);
    } else {
        if ($("#user-login").attr("data-jabatan") != 1) {
            const elementBalasan = `
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
            `;
            setHTML(".kolom-balasan", elementBalasan);
        }
    }

    showOverlay("overlay-daftar-pengajuan");
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

const BUTTON_EDIT_JAM = $(".btn-edit-jam");
BUTTON_EDIT_JAM.on("click", function () {
    const jam = $(this).attr("data-jam");
    $(".overlay-edit-jam input[name=jam]").val(jam);
    $(".overlay-edit-jam form").attr(
        "action",
        `/hr/editJam/${$(this).attr("data-id")}`
    );
    showOverlay("overlay-edit-jam");
});

const BUTTON_HAPUS_JAM = $(".btn-hapus-jam");
BUTTON_HAPUS_JAM.on("click", function () {
    const jam = $(this).attr("data-jam");
    $(".overlay-hapus-jam form").attr(
        "action",
        `/hr/hapusJam/${$(this).attr("data-id")}`
    );
    showOverlay("overlay-hapus-jam");
});

const BUTTON_EDIT_SHIFT = $(".btn-edit-shift");
BUTTON_EDIT_SHIFT.on("click", function () {
    const shift = $(this).attr("data-shift");
    $(".overlay-edit-shift input[name=shift]").val(shift);
    $(".overlay-edit-shift form").attr(
        "action",
        `/hr/editShift/${$(this).attr("data-id")}`
    );
    showOverlay("overlay-edit-shift");
});

const BUTTON_HAPUS_SHIFT = $(".btn-hapus-shift");
BUTTON_HAPUS_SHIFT.on("click", function () {
    const shift = $(this).attr("data-shift");
    $(".overlay-hapus-shift form").attr(
        "action",
        `/hr/hapusShift/${$(this).attr("data-id")}`
    );
    showOverlay("overlay-hapus-shift");
});
