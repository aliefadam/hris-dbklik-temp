@extends('layouts.hr')

@section('content')
    <div class="flex gap-5">
        <div class="w-[60%]">
            <div class="grid grid-cols-4 gap-2 h-fit">
                <div class="bg-dbklik shadow-xl rounded-lg px-5 py-6 gap-2">
                    <h1 class="leading-none text-center h-[70px] text-white font-medium">JATAH CUTI</h1>
                    <span class="block text-center font-bold text-xl text-yellow-dbklik">3 HARI</span>
                </div>
                <div class="bg-dbklik shadow-xl rounded-lg px-5 py-6 gap-2">
                    <h1 class="leading-none text-center h-[70px] text-white font-medium">JATAH BERDUKA</h1>
                    <span class="block text-center font-bold text-xl text-yellow-dbklik">3 HARI</span>
                </div>
                <div class="bg-dbklik shadow-xl rounded-lg px-5 py-6 gap-2">
                    <h1 class="leading-none text-center h-[70px] text-white font-medium">JATAH MENIKAH</h1>
                    <span class="block text-center font-bold text-xl text-yellow-dbklik">3 HARI</span>
                </div>
                <div class="bg-dbklik shadow-xl rounded-lg px-5 py-6 gap-2">
                    <h1 class="leading-none text-center h-[70px] text-white font-medium">JATAH MELAHIRKAN</h1>
                    <span class="block text-center font-bold text-xl text-yellow-dbklik">3 HARI</span>
                </div>
            </div>
            <div class="mt-4 bg-white shadow-xl rounded-lg px-5 py-6">
                <form action="" class="w-full">
                    <div class="w-[50%] flex items-center gap-2">
                        {{-- <label for="" class="text-dbklik font-medium">Izin</label> --}}
                        <select name="" id=""
                            class="outline-none border border-dbklik p-2 rounded-md w-[100%]">
                            <option value="sakit">Sakit</option>
                            <option value="menikah">Menikah</option>
                            <option value="berduka">Berduka</option>
                            <option value="melahirkan">Melahirkan</option>
                        </select>
                    </div>
                    <div class="flex mt-7 w-full gap-4">
                        <div class="flex flex-col gap-2 w-[50%]">
                            <div class="flex flex-col gap-2 p-3 border-dbklik border rounded-lg">
                                <label for="" class="text-dbklik font-medium">Tanggal Mulai</label>
                                <input type="date" name="" id="" class="outline-none">
                            </div>
                            <div class="flex flex-col gap-2 p-3 border-dbklik border rounded-lg">
                                <label for="" class="text-dbklik font-medium">Tanggal Akhir</label>
                                <input type="date" name="" id="" class="outline-none">
                            </div>
                            <div class="flex flex-col gap-2 p-3 border-dbklik border rounded-lg">
                                <label for="" class="text-dbklik font-medium">File Pendukung</label>
                                <input type="file" name="" id="" class="outline-none">
                            </div>
                        </div>
                        <div class="flex flex-col w-full">
                            <textarea name="" id=""
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
                <li><span class="font-medium">Izin Cuti atau Tidak Masuk bagi yang belum punya jatah cuti (Max Diambil 2
                        Hari Berturut)</span><span class="block italic text-sm">Karyawan menulis form h-2 minggu sebelum
                        hari
                        cuti.</span></li>
                <li><span class="font-medium">Izin Sakit (akan masuk ke cuti-apabila memiliki cuti)</span><span
                        class="block italic text-sm">Karyawan
                        menulis form max jam 8 pagi di hari bekerja</span></li>
            </ol>
        </div>
    </div>
@endsection
