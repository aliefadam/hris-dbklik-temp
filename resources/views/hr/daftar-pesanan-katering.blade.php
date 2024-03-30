@extends('layouts.hr')

@section('content')
    <div class="flex justify-between">
        <div class="shadow-xl bg-white flex gap-3 p-3 rounded-lg">
            <i class="bi bi-search text-dbklik"></i>
            <input type="search" id="customSearchBoxDaftarPengajuan" class="outline-none" placeholder="Cari">
        </div>
        <form action="/hr/daftar-pengajuan">
            <div class="flex gap-3">
                <div class="shadow-xl bg-white flex gap-3 p-3 rounded-lg">
                    <input required name="s" type="date" class="outline-none text-dbklik w-[120px]"
                        value="{{ isset($mulai) ? $mulai : '' }}">
                </div>
                <span class="self-center">-</span>
                <div class="shadow-xl bg-white flex gap-3 p-3 rounded-lg">
                    <input required name="e" type="date" class="outline-none text-dbklik w-[120px]"
                        value="{{ isset($akhir) ? $akhir : '' }}">
                </div>
                <button class="bg-gradient-to-r from-green-600 to-green-500 px-5 rounded-md text-white"><i
                        class="bi bi-funnel"></i> Filter</button>
                <button type="button"
                    class="relative btn-more-daftar-pengajuan duration-200 bg-gradient-to-r from-amber-600 to-amber-500 rounded-lg shadow-xl px-5"><i
                        class="bi bi-caret-down-fill text-white icon-more-daftar-pengajuan flex"></i>
                    <div
                        class="box-more-daftar-pengajuan hidden w-[200px] absolute z-[2] bottom-[-105px] right-0 bg-white shadow-[0_0_10px_rgba(0,0,0,0.3)] rounded-md overflow-hidden">
                        <a href="/hr/daftar-pengajuan"
                            class="flex gap-1 items-center py-3 px-5 text-black hover:bg-red-600 hover:text-white duration-200"><i
                                class="bi bi-trash"></i> Bersihkan Filter
                        </a>
                        <hr>
                        <a href="/hr/export-excel/{{ isset($mulai) ? $mulai : 'all' }}/{{ isset($akhir) ? $akhir : 'all' }}"
                            class="flex gap-1 items-center py-3 px-5 text-black duration-200 hover:bg-[#1D6F42] hover:text-white"><i
                                class="bi bi-file-earmark-excel-fill"></i> Export Excel
                        </a>
                    </div>
                </button>
            </div>
        </form>
    </div>

    @include('partials.table-daftar-pesanan-katering')


    <script>
        $(".btn-more-daftar-pengajuan").on("click", function() {
            if ($(".box-more-daftar-pengajuan").hasClass("hidden")) {
                $(".box-more-daftar-pengajuan").removeClass("hidden");
                $("icon-more-daftar-pengajuan").css("transform", "rotate(-90deg)");
            } else {
                $(".box-more-daftar-pengajuan").addClass("hidden");
            }
        });
    </script>
@endsection
