@extends('layouts.main')

@section('content')
    @php
        if ($apakah_katering_aktif) {
            if ($apakah_sudah_mengisi) {
                $class = 'h-[calc(100vh-148px)]';
            } else {
                $class = 'min-h-[calc(100vh-148px)]';
            }
        } else {
            $class = 'h-[calc(100vh-148px)]';
        }
    @endphp
    <div class="bg-white rounded-xl shadow-xl w-[100%] {{ $class }} flex">
        @if ($apakah_katering_aktif)
            @if ($apakah_sudah_mengisi)
                <div class="flex flex-col gap-1 w-full h-full justify-center items-center p-5">
                    <h1 class="text-gray-400 font-semibold text-2xl">Pemesanan Katering DB KLIK</h1>
                    <p class="text-gray-400">Anda sudah mengisi form katering untuk minggu ini, berikut menu yang anda pesan
                        :</p>

                    <div class="w-[90%] grid grid-cols-3 gap-3 mt-6">
                        @foreach ($data_katering_user as $katering)
                            <div
                                class="border border-dbklik rounded-md px-3 py-2 flex flex-col shadow-md relative overflow-hidden">
                                <div class="flex justify-between">
                                    <div class="">
                                        <span class="text-dbklik italic font-medium">{{ $katering->hari }}</span> -
                                        <span class="">{{ $katering->menu }}</span>
                                    </div>
                                </div>
                                <div class="">
                                    <span class="text-[13px]">Request : {{ $katering->request ?? '-' }}</span>
                                </div>
                                <div
                                    class="w-[25px] h-[25px] {{ $katering->setuju == 'Ya' ? 'bg-green-600' : 'bg-red-600' }} absolute -right-[13px] -top-[13px] rotate-45">
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex gap-3 mt-4">
                        <div class="flex items-center gap-1">
                            <div class="w-[15px] h-[15px] bg-green-600 rounded-full"></div>
                            <div class="leading-none">Dipesan</div>
                        </div>
                        <div class="flex items-center gap-1">
                            <div class="w-[15px] h-[15px] bg-red-600 rounded-full"></div>
                            <div class="leading-none">Tidak Dipesan</div>
                        </div>
                    </div>
                </div>
            @else
                <div class="flex flex-col gap-1 w-full h-full p-5">
                    <h1 class="font-semibold text-2xl">Pemesanan Katering DB KLIK</h1>
                    <p class="text-sm">Formulir ini digunakan untuk pemesanan menu katering mingguan karyawan CV. DB KLIK.
                        Harap dicek kembali, pastikan semua sudah terisi. Pemesanan tidak dapat di-cancel atau diubah
                        setelah data ini dikirimkan, kecuali sedang berhalangan hadir karena sakit mendadak dan telah
                        mengonfirmasi ke tim HR. Terima Kasih.</p>
                    <p class="text-sm mt-1">NB: Maksimal pengumpulan data ditanggal {{ $batas_akhir }} <span
                            class="sisa-waktu text-red-600" data-sisa-waktu="{{ $batas_akhir }}"></span></p>
                    <hr class="my-2">
                    <p class="text-sm">Berikut menu untuk {{ date('d-M-Y', strtotime($data_tanggal_awal)) }} <span
                            class="font-medium">sampai</span>
                        {{ date('d-M-Y', strtotime($data_tanggal_akhir)) }} :</p>
                    <form action="/pesan-katering" method="POST">
                        @csrf
                        <div class="grid grid-cols-3 gap-3 mt-2">
                            @foreach ($menu_katering as $katering)
                                <div
                                    class="border border-dbklik rounded-md px-3 py-2 pb-[13px] flex flex-col gap-1 shadow-md">
                                    <div class="">
                                        <span class="text-dbklik italic font-medium">{{ $katering->hari }}</span> -
                                        <span class="">{{ $katering->menu }}</span>
                                    </div>
                                    <div class="flex justify-between items-center mt-2">
                                        <div class="flex gap-2">
                                            <div class="">
                                                <input required type="radio" name="{{ $katering->hari }}"
                                                    id="{{ $katering->hari }}-Ya" class="translate-y-[1px]" value="Ya">
                                                <label class="text-sm" for="{{ $katering->hari }}-Ya">Ya</label>
                                            </div>
                                            <div class="">
                                                <input required type="radio" name="{{ $katering->hari }}"
                                                    id="{{ $katering->hari }}-Tidak" class="translate-y-[1px]"
                                                    value="Tidak">
                                                <label class="text-sm" for="{{ $katering->hari }}-Tidak">Tidak</label>
                                            </div>
                                        </div>
                                        <div class="flex gap-1">
                                            <input type="checkbox" name="{{ $katering->hari }}-request"
                                                id="{{ $katering->hari }}-request" class="translate-y-[1px]">
                                            <label for="{{ $katering->hari }}-request" class="text-sm">Request</label>
                                        </div>
                                    </div>
                                    <div class="">
                                        <input disabled type="text" name="{{ $katering->hari }}-isi-request"
                                            id="{{ $katering->hari }}-isi-request"
                                            class="text-sm input-request border border-gray-300 py-[8px] w-full rounded-md cursor-not-allowed placeholder:text-sm px-2"
                                            placeholder="Centang request bila ada">
                                    </div>
                                </div>
                            @endforeach
                            <div class="w-full">
                                <button class="bg-dbklik text-yellow-dbklik rounded-md px-10 py-2">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endif
        @else
            <div class="flex flex-col gap-1 w-full h-full justify-center items-center p-5">
                <h1 class="text-gray-400 font-semibold text-2xl">Pemesanan Katering DB KLIK</h1>
                <p class="text-gray-400">Pemesanan ditutup, hubungi HR jika mau memesan katering untuk hari ini.</p>
            </div>
        @endif
    </div>

    <script>
        const checkboxs = $("input[type=checkbox]");
        const inputRequest = $("input.input-request");

        $(checkboxs).each(function(index, cb) {
            $(this).on("change", function() {
                if (inputRequest[index].disabled) {
                    inputRequest[index].disabled = false;
                    inputRequest[index].classList.remove("cursor-not-allowed");
                } else {
                    inputRequest[index].value = "";
                    inputRequest[index].disabled = true;
                    inputRequest[index].classList.add("cursor-not-allowed");
                }
            });
        });

        function tampilBatasAkhir() {
            let waktuSekarang = new Date();
            let batasAkhir = new Date($(".sisa-waktu").attr("data-sisa-waktu"));

            let selisihWaktuMs = batasAkhir.getTime() - waktuSekarang.getTime();

            let sisaDetik = Math.floor(selisihWaktuMs / 1000) % 60;
            let sisaMenit = Math.floor(selisihWaktuMs / (1000 * 60)) % 60;
            let sisaJam = Math.floor(selisihWaktuMs / (1000 * 60 * 60)) % 24;
            let sisaHari = Math.floor(selisihWaktuMs / (1000 * 60 * 60 * 24));

            let sisaWaktuString = '';
            if (sisaHari > 0) {
                sisaJam += sisaHari * 24;
                sisaWaktuString = `${sisaJam} jam, ${sisaMenit} menit, ${sisaDetik} detik`;
            } else {
                sisaWaktuString = `${sisaJam} jam, ${sisaMenit} menit, ${sisaDetik} detik`;
            }

            if (sisaJam == 0 && sisaMenit == 0 && sisaDetik == 0) {
                window.location.href = `/hr/nonaktifkan-katering/`;
            } else {
                $(".sisa-waktu").html(`(${sisaWaktuString})`);
            }

        }

        setInterval(() => {
            tampilBatasAkhir();
        }, 1000);
        tampilBatasAkhir();
    </script>
@endsection
