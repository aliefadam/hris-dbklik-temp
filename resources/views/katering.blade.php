@extends('layouts.main')

@section('content')
    <div class="bg-white rounded-xl shadow-xl w-[100%] {{ $apakah_katering_aktif ? 'min-' : '' }}h-[calc(100vh-148px)] flex">
        @if ($apakah_katering_aktif)
            <div class="flex flex-col gap-1 w-full h-full p-5">
                <h1 class="font-semibold text-2xl">Pemesanan Katering DB KLIK</h1>
                <p class="text-sm">Formulir ini digunakan untuk pemesanan menu katering mingguan karyawan CV. DB KLIK. Harap
                    dicek kembali, pastikan semua sudah terisi. Pemesanan tidak dapat di-cancel atau diubah setelah data ini
                    dikirimkan, kecuali sedang berhalangan hadir karena sakit mendadak dan telah mengonfirmasi ke tim HR.
                    Terima Kasih.</p>
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
                            <div class="border border-dbklik rounded-md px-3 py-2 pb-[13px] flex flex-col gap-1 shadow-md">
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
                                                id="{{ $katering->hari }}-Tidak" class="translate-y-[1px]" value="Tidak">
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