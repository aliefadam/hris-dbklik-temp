@extends('layouts.main')

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
                <div data-judul="{{ $pesan['judul'] }}" data-pesan="{{ $pesan['pesan'] }}" onclick="notifDetail(this)"
                    class="flex items-center justify-between py-3 px-5 cursor-pointer {{ $notifikasi->status_dibaca ? 'bg-transparent hover:bg-gray-100' : 'bg-indigo-100 hover:bg-indigo-200' }}">
                    <div class="flex-2">
                        <h1 class="text-dbklik">{{ $pesan['judul'] }}</h1>
                        <span class="block text-[13px]">{{ substr($pesan['pesan'], 0, 43) }}...</span>
                    </div>
                    <span
                        class="text-sm text-primary flex-1 flex justify-end">{{ $notifikasi->created_at->diffForHumans() }}</span>
                </div>
                <hr>
            @endforeach
        </div>
        <div class="w-full border-l p-5">
            <div class="flex justify-between">
                <h1 class="text-dbklik text-2xl font-medium notif-detail-judul">Pengajuan Izin Diterimaaaaaa</h1>
                <span class="text-primary notif-detail-tanggal">13-05-2024</span>
            </div>
            <p class="mt-2 text-sm notif-detail-pesan">Selamat Pengajuan izinmu telah disetujui</p>
            <div class="text-sm mt-4 notif-detail-feedback">
                <span>Balasan Admin: Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, magni.</span>
            </div>
        </div>
    </div>

    <script>
        function notifDetail(notif) {
            const judul = notif.getAttribute("data-judul");
            const pesan = notif.getAttribute("data-pesan");

            $(".notif-detail-judul").html(judul);
            $(".notif-detail-pesan").html(pesan);
        }
    </script>
@endsection
