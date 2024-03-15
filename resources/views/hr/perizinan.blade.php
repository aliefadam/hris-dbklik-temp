@extends('layouts.hr')

@section('content')
    <div class="flex gap-5">
        <div class="w-[60%]">
            <div class="grid grid-cols-4 gap-2 h-fit">
                <div class="bg-gradient-to-r from-blue-600 to-blue-400 shadow-xl rounded-lg px-5 py-6 gap-2 h-[150px]">
                    <h1 class="leading-none text-center h-[70px] text-white font-medium">SISA CUTI TAHUNAN</h1>
                    <span class="block text-center font-bold text-4xl text-yellow-dbklik">{{ $jatah_cuti }}</span>
                </div>
                <div class="bg-dbklik shadow-xl rounded-lg px-5 py-6 gap-2 h-[150px]">
                    <h1 class="leading-none text-center h-[70px] text-white font-medium">JATAH BERDUKA</h1>
                    <span class="block text-center font-bold text-xl text-yellow-dbklik">3 HARI</span>
                </div>
                <div class="bg-dbklik shadow-xl rounded-lg px-5 py-6 gap-2 h-[150px]">
                    <h1 class="leading-none text-center h-[70px] text-white font-medium">JATAH MENIKAH</h1>
                    <span class="block text-center font-bold text-xl text-yellow-dbklik">3 HARI</span>
                </div>
                <div class="bg-dbklik shadow-xl rounded-lg px-5 py-6 gap-2 h-[150px]">
                    <h1 class="leading-none text-center h-[70px] text-white font-medium">JATAH MELAHIRKAN</h1>
                    <span class="block text-center font-bold text-xl text-yellow-dbklik">3 BULAN</span>
                </div>
            </div>
            <div class="mt-4 bg-white shadow-xl rounded-lg px-5 py-6">
                <form action="/ajukan-perizinan" class="w-full" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="w-[50%] flex items-center gap-2">
                        {{-- <label for="" class="text-dbklik font-medium">Izin</label> --}}
                        <select name="jenis_izin" id=""
                            class="outline-none border border-dbklik p-2 rounded-md w-[100%]">
                            @foreach ($jenis_izin as $izin)
                                <option value="{{ $izin->id }}">{{ $izin->jenis_izin }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex mt-7 w-full gap-4">
                        <div class="flex flex-col gap-2 w-[50%]">
                            <div class="flex flex-col gap-2 p-3 border-dbklik border rounded-lg">
                                <label for="tanggal_mulai" class="text-dbklik font-medium">Tanggal Mulai</label>
                                <input required type="date" name="tanggal_mulai" id="tanggal_mulai" class="outline-none">
                            </div>
                            <div class="flex flex-col gap-2 p-3 border-dbklik border rounded-lg">
                                <label for="tanggal_akhir" class="text-dbklik font-medium">Tanggal Akhir</label>
                                <input required type="date" name="tanggal_akhir" id="tanggal_akhir" class="outline-none">
                            </div>
                            <div class="flex flex-col gap-2 p-3 border-dbklik border rounded-lg">
                                <label for="file_pendukung" class="text-dbklik font-medium">File Pendukung</label>
                                <input type="file" name="file_pendukung" id="file_pendukung" class="outline-none">
                            </div>
                        </div>
                        <div class="flex flex-col w-full">
                            <textarea name="catatan" id="catatan"
                                class="border border-dbklik resize-none rounded-lg h-full p-3 outline-none placeholder:text-dbklik"
                                placeholder="Catatan/Keterangan"></textarea>
                        </div>
                    </div>
                    <div class="mt-4 flex justify-end">
                        <button class="bg-yellow-dbklik px-10 py-2 rounded-lg font-medium">Ajukan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-[40%] h-fit flex flex-col gap-3">
            <div class="bg-white shadow-xl rounded-lg px-5 py-6 relative">
                <h1 class="text-2xl text-dbklik font-semibold text-center">Ketentuan Izin dan Cuti</h1>
                <ol class="list-decimal ml-2 mt-5 text-dbklik text-[15px] text-justify flex flex-col gap-2">
                    @foreach ($rulesHRD as $rules)
                        <li class="relative">
                            <input class="hidden py-1 px-2 outline-none border font-medium w-[85%]" type="text"
                                name="" id="">
                            <input class="hidden py-1 px-2 outline-none border italic text-sm w-[85%]" type="text"
                                name="" id="">
                            <span class="font-medium rules-judul">{{ $rules->judul }}</span>
                            <span class="block italic text-sm rules-aturan">{{ $rules->aturan }}</span>
                            <div data-show="true"
                                class="container-edit gap-1 absolute right-0 top-0 hidden bg-white shadow-lg border px-3 py-2 rounded-sm">
                                <i data-id="{{ $rules->id }}" data-isEdit="true"
                                    class="bi bi-pencil-square flex cursor-pointer btn-edit-izin"></i>
                                <i data-id="{{ $rules->id }}"
                                    class="bi bi-trash text-red-500 flex cursor-pointer btn-hapus-izin"></i>
                            </div>
                        </li>
                    @endforeach
                </ol>
            </div>
            <div class="tambah-aturan bg-white shadow-xl rounded-lg px-5 py-6 hidden">
                <form action="/hr/tambah-aturan" class="flex flex-col gap-2" method="post">
                    @csrf
                    <input
                        class="p-3 rounded-md border border-gray-800 placeholder:text-gray-800 focus:outline-dbklik focus:placeholder:text-dbklik text-dbklik"
                        type="text" name="judul" id="judul" placeholder="Masukkan judul">
                    <input
                        class="p-3 rounded-md border border-gray-800 placeholder:text-gray-800 focus:outline-dbklik focus:placeholder:text-dbklik text-dbklik"
                        type="text" name="aturan" id="aturan" placeholder="Masukkan aturan">
                    <div class="flex">
                        <button type="submit" class="py-2 px-5 rounded-md bg-yellow-dbklik text-black">Tambah</button>
                    </div>
                </form>
            </div>
            <button data-show="true"
                class="duration-300 bg-dbklik text-yellow-dbklik shadow-xl rounded-lg py-3 btn-handle-overlay">Edit
                Aturan</button>
        </div>
    </div>

    <script>
        $(".btn-handle-overlay").on("click", function() {
            if ($(".btn-handle-overlay").attr("data-show") == "true") {
                $(".tambah-aturan").css("display", "block");
                $(".tambah-aturan").css("animation", "fadeInDown 1000ms forwards");
                $(".btn-handle-overlay").css("animation", "fadeInDown 1000ms forwards");
                $(".btn-handle-overlay").attr("data-show", "false")

                $(".container-edit").removeClass("hidden");
                $(".container-edit").addClass("flex");

                $(".btn-handle-overlay").html("Tutup")
            } else {
                $(".tambah-aturan").css("animation", "fadeOutUp 1000ms forwards");
                $(".btn-handle-overlay").css("animation", "fadeOutUpBtn 1000ms");
                $(".btn-handle-overlay").attr("data-show", "true")
                $(".btn-handle-overlay").html("Edit Aturan")

                $(".container-edit").removeClass("flex");
                $(".container-edit").addClass("hidden");

                setTimeout(() => {
                    $(".tambah-aturan").css("display", "none");
                }, 1000);
            }
        });

        $(".btn-edit-izin").on("click", function() {
            if ($(this).attr("data-isEdit") == "true") {
                $(this).parent().prev().css("display", "none");
                $(this).parent().prev().prev().css("display", "none");

                $(this).parent().prev().prev().prev().removeClass("hidden");
                $(this).parent().prev().prev().prev().prev().removeClass("hidden");

                $(this).parent().prev().prev().prev().val($(this).parent().prev().html());
                $(this).parent().prev().prev().prev().prev().val($(this).parent().prev().prev().html());

                $(this).parent().prev().prev().prev().addClass("block");
                $(this).parent().prev().prev().prev().prev().addClass("block");

                $(this).removeClass("bi-pencil-square");
                $(this).addClass("bi-check2-square");
                $(this).addClass("text-emerald-700");

                $(this).attr("data-isEdit", "false");
            } else {
                $(this).parent().prev().css("display", "block");
                $(this).parent().prev().prev().css("display", "block");

                $(this).parent().prev().prev().prev().addClass("hidden");
                $(this).parent().prev().prev().prev().prev().addClass("hidden");

                $(this).removeClass("bi-check2-square");
                $(this).removeClass("text-emerald-700");
                $(this).addClass("bi-pencil-square");

                $(this).attr("data-isEdit", "true");

                $(this).parent().prev().prev().html($(this).parent().prev().prev().prev().prev().val());
                $(this).parent().prev().html($(this).parent().prev().prev().prev().val());

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: `/hr/edit-aturan/${$(this).attr("data-id")}`,
                    data: {
                        judul: $(this).parent().prev().prev().prev().prev().val(),
                        aturan: $(this).parent().prev().prev().prev().val(),
                    }
                });
            }
        });

        $(".btn-hapus-izin").on("click", function() {
            $(this).parent().parent().remove();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: `/hr/hapus-aturan/${$(this).attr("data-id")}`,
                data: {
                    judul: $(this).parent().prev().prev().prev().prev().val(),
                    aturan: $(this).parent().prev().prev().prev().val(),
                }
            });
        });
    </script>
@endsection
