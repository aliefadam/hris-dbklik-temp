@extends('layouts.head')

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
                        <select name="jenis_izin" id="jenis_izin"
                            class="outline-none border border-dbklik p-2 rounded-md w-[100%]">
                            @foreach ($jenis_izin as $izin)
                                <option value="{{ $izin->id }}">{{ $izin->jenis_izin }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex mt-7 w-full gap-4">
                        <div class="flex flex-col gap-2 w-[50%]">
                            <div class="flex flex-col gap-2 p-3 border-dbklik border rounded-lg">
                                <label for="tanggal_mulai" class="text-dbklik font-medium" id="label_tanggal_mulai">Tanggal
                                    Mulai<span class="text-red-500"> *</span></label>
                                <input required type="date" name="tanggal_mulai" id="tanggal_mulai" class="outline-none">
                            </div>
                            <div class="flex flex-col gap-2 p-3 border-dbklik border rounded-lg">
                                <label for="tanggal_akhir" class="text-dbklik font-medium" id="label_tanggal_akhir">Tanggal
                                    Akhir<span class="text-red-500"> *</span></label>
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
        <div class="bg-white shadow-xl rounded-lg px-5 py-6 gap-2 w-[40%] h-fit">
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
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
    <script>
        var tanggal_akhir_input = document.getElementById('tanggal_akhir');
        var label_tanggal_mulai = document.getElementById('label_tanggal_mulai');
        var label_tanggal_akhir = document.getElementById('label_tanggal_akhir');
        
        $("#jenis_izin").on("change", function() {
            var selectedOption = this.options[this.selectedIndex].innerHTML;
            console.log(selectedOption);

            if (selectedOption === 'Terlambat' || selectedOption === 'Pulang Awal') {
                tanggal_akhir_input.type = 'time';
                label_tanggal_mulai.innerHTML = 'Tanggal<span class="text-red-500"> *</span>';
                label_tanggal_akhir.innerHTML = 'Jam<span class="text-red-500"> *</span>';
                tanggal_akhir_input.name = 'jam';
            } else {
                tanggal_akhir_input.type = 'date';
                label_tanggal_mulai.innerHTML = 'Tanggal Mulai<span class="text-red-500"> *</span>';
                label_tanggal_akhir.innerHTML = 'Tanggal Akhir<span class="text-red-500"> *</span>';
                tanggal_akhir_input.name = 'tanggal_akhir';
            }
        });
    </script>
@endsection
