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
                <div data-id="{{ $notifikasi->id }}" data-judul="{{ $pesan['judul'] }}" data-pesan="{{ $pesan['pesan'] }}"
                    data-feedback="{{ $pesan['feedback'] }}" data-tanggal="{{ $notifikasi->tanggal_jam }}"
                    data-status="{{ $notifikasi->status_dibaca }}" onclick="notifDetail(this)"
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
        <div class="w-full border-l p-5 notifikasi-detail">
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
            const feedback = notif.getAttribute("data-feedback");
            const tanggal = notif.getAttribute("data-tanggal");
            const status = notif.getAttribute("data-status");

            notif.classList.remove("bg-indigo-100", "hover:bg-indigo-200");
            notif.classList.add("hover:bg-gray-100");

            const feedbackView = `
            <div class="text-sm mt-4 notif-detail-feedback notif-detail-feedback">
                <span>Balasan Admin: ${feedback}</span>
            </div>`;

            $(".notifikasi-detail").html(`
                <div class="flex justify-between">
                    <h1 class="text-dbklik text-2xl font-medium notif-detail-judul">${judul}</h1>
                    <span class="text-primary notif-detail-tanggal">${tanggal}</span>
                </div>
                <p class="mt-2 text-sm notif-detail-pesan">${pesan}</p>
                ${feedback != "" ? feedbackView : ""}
            `);

            if (status != 1) {
                $.ajax({
                    url: "/baca-notif",
                    type: "put",
                    data: {
                        _token: $("meta[name=csrf-token]").attr("content"),
                        id: id,
                    }
                });
            }
        }
    </script>
@endsection
