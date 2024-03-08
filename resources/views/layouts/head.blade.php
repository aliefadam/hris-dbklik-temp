<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- web icon --}}
    <link rel="icon" href="{{ asset('imgs/db-logo.png') }}">
    {{-- bootstrap icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css">
    {{-- font poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    {{-- tailwind vite --}}
    @vite('resources/css/app.css')
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

    {{-- animate css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<body class="relative top-0 left-0 w-full bg-gradient-to-b bg-gray-100 font-[poppins] pb-5">
    @include('overlay')
    @include('partials.head_sidebar')
    @include('partials.head_topbar')
    <main class="ml-[250px] mt-[84px] py-5 px-10">
        @yield('content')
    </main>

    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        $(document).ready(function() {
            let table = $('#table-riwayat').DataTable({
                searching: true,
                paging: true,
                info: false,
                lengthChange: false,
                pageLength: 5,
            });

            $('#customSearchBox').keyup(function() {
                table.search($(this).val())
                    .draw();
            });

            let tableDaftarPengajuan = $('#table-daftar-pengajuan').DataTable({
                searching: true,
                paging: true,
                info: false,
                lengthChange: false,
                pageLength: 5,
            });

            $('#customSearchBoxDaftarPengajuan').keyup(function() {
                tableDaftarPengajuan.search($(this).val())
                    .draw();
            });

            let tableKaryawan = $('#table-karyawan').DataTable({
                searching: true,
                paging: true,
                info: false,
                lengthChange: false,
                pageLength: 5,
            });

            $('#customSearchBoxKaryawan').keyup(function() {
                tableKaryawan.search($(this).val())
                    .draw();
            });

            let tableMutasi = $('#table-mutasi').DataTable({
                searching: true,
                paging: true,
                info: false,
                lengthChange: false,
                pageLength: 5,
            });

            // $('#customSearchBoxKaryawan').keyup(function() {
            //     tableMutasi.search($(this).val())
            //         .draw();
            // });
        });

        const rowData = $("#table-daftar-pengajuan tbody tr");
        rowData.on("click", function() {
            $(".kolom-feedback").html("");
            $(".kolom-balasan").html("");

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

            $("span.overlay-head-status").removeClass("pending")
            $("span.overlay-head-status").removeClass("disetujui")
            $("span.overlay-head-status").removeClass("ditolak")
            $("span.overlay-head-file-pendukung").removeClass("underline");
            $("span.overlay-head-file-pendukung").removeClass("underline-offset-1");
            $("span.overlay-head-file-pendukung").removeClass("cursor-pointer");
            $("span.overlay-head-file-pendukung").off("click");


            $("span.overlay-head-status").addClass(statusText);
            if (filePendukung != "-") {
                $("span.overlay-head-file-pendukung").addClass("underline");
                $("span.overlay-head-file-pendukung").addClass("underline-offset-1");
                $("span.overlay-head-file-pendukung").addClass("cursor-pointer");
                $("span.overlay-head-file-pendukung").on("click", function() {
                    window.open(`/upload/file_pendukung/${$(this).html()}`, "_blank");
                });
            }

            $(".form-balasan").attr("action", `/balas-perizinan/${id}`)
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

        const rowData2 = $("#table-riwayat tbody tr");
        rowData2.on("click", function() {
            const nama = this.getAttribute("data-nama");
            const divisi = this.getAttribute("data-divisi");
            const izin = this.children[1].innerHTML;
            const tanggalDiajukan = this.children[2].innerHTML;
            const tanggalIzin = this.children[3].innerHTML;
            const catatan = this.children[4].innerHTML;
            const filePendukung = this.getAttribute("data-filePendukung") ?? "-";
            const status = this.children[5].innerHTML;
            const statusText = this.children[5].children[1].innerHTML;

            $("span.overlay-status").removeClass("pending")
            $("span.overlay-status").removeClass("disetujui")
            $("span.overlay-status").removeClass("ditolak")
            $("span.overlay-file-pendukung").removeClass("underline");
            $("span.overlay-file-pendukung").removeClass("underline-offset-1");
            $("span.overlay-file-pendukung").removeClass("cursor-pointer");
            $("span.overlay-file-pendukung").off("click");
            $("span.overlay-status").addClass(statusText);

            if (filePendukung != "-") {
                $("span.overlay-file-pendukung").addClass("underline");
                $("span.overlay-file-pendukung").addClass("underline-offset-1");
                $("span.overlay-file-pendukung").addClass("cursor-pointer");
                $("span.overlay-file-pendukung").on("click", function() {
                    window.open(`/upload/file_pendukung/${$(this).html()}`, "_blank");
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

            $(".overlay").removeClass("hidden");
            $(".overlay").addClass("flex");
        });

        const rowData3 = $("#table-karyawan tbody tr");
        rowData3.on("click", function() {
            const id = this.getAttribute("data-id");
            window.location.href = `/hr/data-karyawan/${id}`;
        });

        const btnResign = $(".btn-resign");
        const btnKontrak = $(".btn-kontrak");
        const btnCatatan = $(".btn-catatan");
        const btnMutasi = $(".btn-mutasi");

        btnResign.on("click", function() {
            showOverlay("overlay-resign");
        });
        btnKontrak.on("click", function() {
            showOverlay("overlay-kontrak");
        });
        btnCatatan.on("click", function() {
            showOverlay("overlay-catatan");
        });
        btnMutasi.on("click", function() {
            showOverlay("overlay-mutasi");
        });

        const btnCloseOverlayResign = $(".btn-close-overlay-resign");
        const btnCloseOverlayKontrak = $(".btn-close-overlay-kontrak");
        const btnCloseOverlayCatatan = $(".btn-close-overlay-catatan");
        const btnCloseOverlayMutasi = $(".btn-close-overlay-mutasi");

        btnCloseOverlayResign.on("click", function() {
            closeOverlay("overlay-resign", "container-overlay-resign");
        });
        btnCloseOverlayKontrak.on("click", function() {
            closeOverlay("overlay-kontrak", "container-overlay-kontrak");
        });
        btnCloseOverlayCatatan.on("click", function() {
            closeOverlay("overlay-catatan", "container-overlay-catatan");
        });
        btnCloseOverlayMutasi.on("click", function() {
            closeOverlay("overlay-mutasi", "container-overlay-mutasi");
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


        const btnCloseOverlay = $(".btn-close-overlay");
        btnCloseOverlay.on("click", function() {
            $(".container-overlay").removeClass("animate__fadeInDown");
            $(".container-overlay").addClass("animate__fadeOutUp");
            setTimeout(() => {
                $(".overlay").removeClass("flex");
                $(".overlay").addClass("hidden");
                $(".container-overlay").removeClass("animate__fadeOutUp");
                $(".container-overlay").addClass("animate__fadeInDown");
            }, 500);
        });

        const btnCloseOverlayHead = $(".btn-close-overlay-head");
        btnCloseOverlayHead.on("click", function() {
            $(".container-overlay-head").removeClass("animate__fadeInDown");
            $(".container-overlay-head").addClass("animate__fadeOutUp");
            setTimeout(() => {
                $(".overlay-head").removeClass("flex");
                $(".overlay-head").addClass("hidden");
                $(".container-overlay-head").removeClass("animate__fadeOutUp");
                $(".container-overlay-head").addClass("animate__fadeInDown");
            }, 500);
        });
    </script>

</body>

</html>
