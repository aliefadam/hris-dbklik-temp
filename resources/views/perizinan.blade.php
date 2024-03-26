@extends('layouts.main')

@section('content')
    <div class="flex flex-col md:flex-row gap-5">
        <div class="w-full md:w-[60%] order-last md:order-first">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-2 h-fit">
                <div
                    class="flex flex-col justify-center gap-3 bg-gradient-to-r from-blue-600 to-blue-400 shadow-xl rounded-lg px-3 md:px-5 py-3 md:py-6 h-[130px] md:h-[150px]">
                    <h1 class="leading-none text-center md:h-[70px] text-white text-[13px] md:text-[16px] font-medium">
                        SISA CUTI
                        TAHUNAN</h1>
                    <span class="block text-center font-bold text-4xl text-yellow-dbklik">{{ $jatah_cuti }}</span>
                </div>
                <div
                    class="flex flex-col justify-center gap-8 bg-dbklik shadow-xl rounded-lg px-3 md:px-5 py-3 md:py-6 h-[130px] md:h-[150px]">
                    <h1 class="leading-none text-center md:h-[70px] text-white text-[13px] md:text-[16px] font-medium">JATAH
                        BERDUKA</h1>
                    <span class="block text-center font-bold text-xl text-yellow-dbklik">3 HARI</span>
                </div>
                <div
                    class="flex flex-col justify-center gap-8 bg-dbklik shadow-xl rounded-lg px-3 md:px-5 py-3 md:py-6 h-[130px] md:h-[150px]">
                    <h1 class="leading-none text-center md:h-[70px] text-white text-[13px] md:text-[16px] font-medium">JATAH
                        MENIKAH</h1>
                    <span class="block text-center font-bold text-xl text-yellow-dbklik">3 HARI</span>
                </div>
                <div
                    class="flex flex-col justify-center gap-8 bg-dbklik shadow-xl rounded-lg px-3 md:px-5 py-3 md:py-6 h-[130px] md:h-[150px]">
                    <h1 class="leading-none text-center md:h-[70px] text-white text-[13px] md:text-[16px] font-medium">JATAH
                        MELAHIRKAN</h1>
                    <span class="block text-center font-bold text-xl text-yellow-dbklik">3 BULAN</span>
                </div>
            </div>
            <div class="mt-4 bg-white shadow-xl rounded-lg px-3 md:px-5 py-4 md:py-6">
                <form action="/ajukan-perizinan" class="w-full form-ajukan-perizinan" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="w-full md:w-[50%] flex items-center gap-2">
                        <select name="jenis_izin" id=""
                            class="outline-none border border-dbklik p-2 rounded-md w-[100%]">
                            @foreach ($jenis_izin as $izin)
                                <option value="{{ $izin->id }}">{{ $izin->jenis_izin }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col md:flex-row mt-3 md:mt-7 w-full gap-3 md:gap-4">
                        <div class="flex flex-col gap-2 w-full md:w-[50%]">
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
                                class="border border-dbklik resize-none rounded-lg h-[150px] md:h-full p-3 outline-none placeholder:text-dbklik"
                                placeholder="Catatan/Keterangan"></textarea>
                        </div>
                    </div>
                    <div class="mt-4 flex md:justify-end">
                        <button class="bg-yellow-dbklik px-10 py-2 rounded-lg font-medium w-full md:w-fit">Ajukan</button>
                    </div>
                </form>
            </div>
        </div>
        <div
            class="bg-white shadow-xl rounded-lg px-5 py-4 md:py-6 gap-2 w-full md:w-[40%] h-fit order-first md:order-last">
            <h1 class="text-xl md:text-2xl text-dbklik font-semibold text-center">Ketentuan Izin dan Cuti</h1>
            <ol class="list-decimal ml-2 mt-3 md:mt-5 text-dbklik text-[15px] text-justify flex flex-col gap-2">
                @foreach ($rulesHRD as $rules)
                    <li class="relative">
                        <span class="text-[14px] md:text-[16px] font-medium rules-judul">{{ $rules->judul }}</span>
                        <span class="text-[14px] block italic md:text-sm rules-aturan">{{ $rules->aturan }}</span>
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
@endsection
