@extends('layouts.head')

@section('content')
    <div class="bg-white rounded-xl shadow-xl w-[100%] h-[calc(100vh-148px)] flex">
        <div class="w-[60%] border-r overflow-auto notif-list relative">
            <div class="p-4 sticky bg-white top-0 left-0 border-b rounded-tl-xl">
                <h1>Semua Notifikasi</h1>
            </div>
            @foreach ($data_notifikasi as $notifikasi)
                @php
                    $pesan = json_decode($notifikasi->pesan, true);
                @endphp
                <div data-id="{{ $notifikasi->id }}" data-judul="{{ $pesan['judul'] }}" data-pesan="{{ $pesan['pesan'] }}"
                    data-tanggal="{{ $notifikasi->tanggal_jam }}" data-status="{{ $notifikasi->status_dibaca }}"
                    data-nama="{{ $pesan['nama'] }}" data-divisi="{{ $pesan['divisi'] }}" data-izin="{{ $pesan['izin'] }}"
                    data-tanggal-izin="{{ $pesan['tanggal_izin'] }}" data-catatan="{{ $pesan['catatan'] }}"
                    data-file-pendukung="{{ $pesan['file_pendukung'] }}" onclick="notifDetail(this)"
                    id="{{ $notifikasi->id }}"
                    class="flex items-center justify-between py-3 px-5 cursor-pointer {{ $notifikasi->status_dibaca ? 'bg-transparent hover:bg-gray-100' : 'bg-indigo-100 hover:bg-indigo-200' }}">
                    <div class="flex-2">
                        <h1 class="text-dbklik">{{ $pesan['judul'] }}</h1>
                        <span class="block text-[13px]">{{ substr($pesan['pesan'], 0, 40) }}...</span>
                    </div>
                    <span
                        class="text-sm text-primary flex-1 flex justify-end">{{ $notifikasi->created_at->diffForHumans() }}</span>
                </div>
                <hr>
            @endforeach
        </div>
        <div class="w-full border-l p-5 notifikasi-detail overflow-auto">
            <div class="h-full flex justify-center items-center">
                <h1 class="text-gray-400 font-semibold text-lg">Klik notifikasi disamping untuk melihat detail</h1>
            </div>
        </div>
    </div>

    <script>
        function notifDetail(notif) {
            const id = notif.getAttribute("data-id");
            const judul = notif.getAttribute("data-judul");
            const pesan = notif.getAttribute("data-pesan");
            const tanggal = notif.getAttribute("data-tanggal");
            const nama = notif.getAttribute("data-nama");
            const divisi = notif.getAttribute("data-divisi");
            const tanggalIzin = notif.getAttribute("data-tanggal-izin");
            const izin = notif.getAttribute("data-izin");
            const catatan = notif.getAttribute("data-catatan");
            const filePendukung = notif.getAttribute("data-file-pendukung");
            const status = notif.getAttribute("data-status");


            notif.classList.remove("bg-indigo-100", "hover:bg-indigo-200");
            notif.classList.add("hover:bg-gray-100");

            $(".notifikasi-detail").html(`
                <div class="scroll">
                    <div class="flex justify-between">
                        <h1 class="text-dbklik text-2xl font-medium notif-detail-judul">${judul}</h1>
                        <span class="text-primary notif-detail-tanggal">${tanggal}</span>
                    </div>
                    <p class="mt-2 text-sm notif-detail-pesan">${pesan}</p>
                    <div class="mt-5 flex gap-1 flex-col">
                        <span class="text-dbklik text-sm">Nama</span>
                        <span class="text-black text-[17px] leading-none">${nama}</span>
                    </div>
                    <div class="mt-3 flex gap-1 flex-col">
                        <span class="text-dbklik text-sm">Divisi</span>
                        <span class="text-black text-[17px] leading-none">${divisi}</span>
                    </div>
                    <div class="mt-3 flex gap-1 flex-col">
                        <span class="text-dbklik text-sm">Izin</span>
                        <span class="text-black text-[17px] leading-none">${izin}</span>
                    </div>
                    <div class="mt-3 flex gap-1 flex-col">
                        <span class="text-dbklik text-sm">Tanggal Izin</span>
                        <span class="text-black text-[17px] leading-none">${tanggalIzin}</span>
                    </div>
                    <div class="mt-3 flex gap-1 flex-col">
                        <span class="text-dbklik text-sm">Catatan</span>
                        <span class="text-black text-[17px] leading-none">${catatan}</span>
                    </div>
                    <div class="mt-3 flex gap-1 flex-col">
                        <span class="text-dbklik text-sm">File Pendukung</span>
                        <span class="text-black text-[17px] leading-none ${filePendukung != "-" ? `underline cursor-pointer open-file` : ''}">${filePendukung}</span>
                    </div>
                </div>
            `);

            $(".open-file").on("click", function() {
                window.open(`/upload/file_pendukung/${$(this).html()}`, "_blank");
            })

            // if (status != 1) {
            //     $.ajax({
            //         url: "/baca-notif",
            //         type: "put",
            //         data: {
            //             _token: $("meta[name=csrf-token]").attr("content"),
            //             id: id,
            //         }
            //     });
            // }
        }
    </script>
@endsection
