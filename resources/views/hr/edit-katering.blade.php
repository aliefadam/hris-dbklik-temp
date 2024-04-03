@extends('layouts.hr')

@section('content')
    {{-- @dd($data_menu) --}}
    <div class="bg-white rounded-xl shadow-xl w-[100%] h-[calc(100vh-148px)] p-4">
        <form action="/hr/ubah-katering" method="POST" class="">
            @csrf
            @method('PUT')
            <div class="flex gap-2 items-center">
                {{-- <label for="" class="">Menu untuk tanggal : </label> --}}
                <input readonly type="date" name="tanggal_awal_menu" id="tanggal_awal_menu"
                    class="py-2 outline-none border border-dbklik  px-2 rounded-md bg-gray-200 cursor-not-allowed"
                    value="{{ $data_tanggal_awal }}">
                <div>-</div>
                <input readonly type="date" name="tanggal_akhir_menu" id="tanggal_akhir_menu"
                    class="py-2 outline-none border border-dbklik  px-2 rounded-md bg-gray-200 cursor-not-allowed"
                    value="{{ $data_tanggal_akhir }}">
            </div>
            <div class="grid grid-cols-3 gap-3 mt-3">
                @foreach ($data_menu as $menu)
                    <div
                        class="input-menu flex flex-col gap-1 border border-dbklik p-3 bg-gray-200 cursor-not-allowed rounded-md">
                        <label for="{{ $menu->hari }}"
                            class="input-menu text-dbklik cursor-not-allowed capitalize">{{ $menu->hari }}</label>
                        <input type="text" name="{{ $menu->hari }}" id="{{ $menu->hari }}"
                            class="cursor-not-allowed bg-transparent outline-none input-menu"
                            value="{{ $menu->menu ?? '' }}" readonly placeholder="{{ $menu->menu == null ? '-' : '' }}">
                    </div>
                @endforeach
            </div>
            <div class="mt-3 flex gap-2 justify-between">
                <div class="flex gap-2">
                    <button type="button"
                        class="shadow-lg edit btn-edit-menu-katering px-5 py-2 bg-yellow-400 rounded-md">Edit
                        Menu</button>
                    <button type="button"
                        class="hidden text-white shadow-lg btn-clear-menu-katering px-5 py-2 bg-orange-400 rounded-md">Bersihkan</button>
                </div>
                <div class="flex gap-2">
                    @if ($kontrol_katering->status == 'Aktif')
                        <label for="" class="self-center text-red-500 sisa-waktu"
                            data-sisa-waktu="{{ $kontrol_katering->batas_akhir }}"></label>
                    @else
                        <input type="datetime-local" name="batas_akhir" id="batas_akhir"
                            class="outline-none border border-cyan-500 px-2 rounded-md shadow-lg"
                            title="Batas Pengisian Form">
                    @endif
                    <button type="button"
                        class="{{ $kontrol_katering->status == 'Aktif' ? 'btn-nonaktifkan-katering' : 'btn-aktifkan-katering' }} shadow-lg text-white px-5 py-2 {{ $kontrol_katering->status == 'Aktif' ? 'bg-red-500' : 'bg-cyan-500' }} rounded-md">
                        {!! $kontrol_katering->status == 'Aktif'
                            ? '<i class="fas fa-ban"></i>'
                            : '<i class="fal fa-file-upload mr-1"></i>' !!}
                        {{ $kontrol_katering->status == 'Aktif' ? 'Nonaktifkan Sekarang' : 'Aktifkan Katering' }}</button>
                </div>
            </div>
        </form>
    </div>
    </div>

    <script>
        $(".btn-edit-menu-katering").on("click", function() {
            if ($(".btn-edit-menu-katering").hasClass("edit")) {
                $("div.input-menu").each(function(index, input) {
                    $(this).removeClass(["cursor-not-allowed", "bg-gray-200"]);
                    $("label.input-menu").removeClass("cursor-not-allowed");
                    $("input.input-menu").removeClass("cursor-not-allowed");
                    $("input.input-menu").attr("readonly", false);
                });

                $("input[name=tanggal_awal_menu]").removeClass(["cursor-not-allowed", "bg-gray-200"]);
                $("input[name=tanggal_akhir_menu]").removeClass(["cursor-not-allowed", "bg-gray-200"]);
                $("input[name=tanggal_awal_menu]").attr("readonly", false);
                $("input[name=tanggal_akhir_menu]").attr("readonly", false);

                $(".btn-edit-menu-katering").removeClass(["edit", "bg-yellow-400"]);
                $(".btn-edit-menu-katering").addClass(["bg-green-600", "text-white"]);

                $(".btn-clear-menu-katering").show();
                $(".btn-edit-menu-katering").html("Simpan");
            } else {
                $(this).attr("type", "submit");
            }
        });

        $(".btn-clear-menu-katering").on("click", function() {
            $("#tanggal_awal_menu").val("");
            $("#tanggal_akhir_menu").val("");
            $("input.input-menu").val("");
        });

        $(".btn-aktifkan-katering").on("click", function() {
            const batasAkhir = $(this).prev().val();
            window.location.href = `/hr/aktifkan-katering/${batasAkhir}`;
        });

        $(".btn-nonaktifkan-katering").on("click", function() {
            window.location.href = `/hr/nonaktifkan-katering/`;
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
                $(".sisa-waktu").html(sisaWaktuString);
            }

        }

        setInterval(() => {
            tampilBatasAkhir();
        }, 1000);
        tampilBatasAkhir();
    </script>
@endsection
