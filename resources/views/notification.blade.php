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
                <div onclick="notifDetail(this)" id="{{ $notifikasi->id }}"
                    class="notifikasi-list flex items-center justify-between py-3 px-5 cursor-pointer {{ $notifikasi->status_dibaca ? 'bg-transparent hover:bg-gray-100' : 'bg-indigo-100 hover:bg-indigo-200' }} {{ session('selected_notifikasi') && session('selected_notifikasi')['id'] == $notifikasi->id ? '!bg-gray-100' : '' }}">
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
        <div class="w-full border-l p-5 notifikasi-detail">
            @if (session('selected_notifikasi'))
                @php
                    $selected_notifikasi = session('selected_notifikasi');
                    $pesan = json_decode($selected_notifikasi->pesan, true);
                @endphp
                <div class="scroll">
                    <div class="flex justify-between">
                        <h1 class="text-dbklik text-2xl font-medium notif-detail-judul">
                            {{ $pesan['judul'] }}
                        </h1>
                        <span class="text-primary notif-detail-tanggal">{{ $notifikasi->tanggal_jam }}</span>
                    </div>
                    <p class="mt-2 text-sm notif-detail-pesan">{{ $pesan['pesan'] }}</p>
                    <div class="text-sm mt-4 notif-detail-feedback notif-detail-feedback">
                        @php
                            $feedback = $pesan['feedback'];
                        @endphp
                        <span>{{ $feedback != null ? "Balasan dari Admin:  $feedback" : '' }}</span>
                    </div>`
                </div>
            @else
                <div class="h-full flex justify-center items-center notifikasi-hint">
                    <h1 class="text-gray-400 font-semibold text-lg">Klik notifikasi disamping untuk melihat detail</h1>
                </div>
            @endif
        </div>
    </div>

    <script>
        function notifDetail(notif) {

            $(".notifikasi-list").removeClass("!bg-gray-100");
            notif.classList.remove("bg-indigo-100", "hover:bg-indigo-200");
            notif.classList.add("hover:bg-gray-100", "!bg-gray-100");

            $.ajax({
                url: "/baca-notif",
                type: "put",
                data: {
                    _token: $("meta[name=csrf-token]").attr("content"),
                    id: notif.id,
                },
                beforeSend: function() {
                    $(".notifikasi-detail").html(`
                        <div class="h-full justify-center items-center flex loading-animation">
                            <h1>Loading.....</h1>
                        </div>
                    `);
                },
                success: function(data) {
                    const id = data.id;
                    const pesanJson = JSON.parse(data.pesan);
                    const judul = pesanJson.judul;
                    const pesan = pesanJson.pesan;
                    const feedback = pesanJson.feedback;
                    const tanggal = data.tanggal_jam;

                    const feedbackView = `
                    <div class="text-sm mt-4 notif-detail-feedback notif-detail-feedback">
                        <span>Balasan Admin: ${feedback}</span>
                    </div>`;

                    $(".notifikasi-detail").html(`
                        <div class="scroll">
                            <div class="flex justify-between">
                                <h1 class="text-dbklik text-2xl font-medium notif-detail-judul">${judul}</h1>
                                <span class="text-primary notif-detail-tanggal">${tanggal}</span>
                            </div>
                            <p class="mt-2 text-sm notif-detail-pesan">${pesan}</p>
                            ${feedback != null ? feedbackView : ""}
                        </div>
                    `);
                },
            });
        }
    </script>
@endsection
