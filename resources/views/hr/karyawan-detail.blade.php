@extends('layouts.hr')

@section('content')
    <div class="w-full flex gap-4">
        <div class="flex-[1]">
            <div class="shadow-xl bg-white rounded-xl p-5 flex justify-center items-center h-fit">
                <img src="{{ asset('imgs/profil.png') }}" class="w-[200px] h-[210px] drop-shadow-xl">
            </div>
            <button 
                class="btn-resign shadow-md flex gap-2 justify-center duration-500 mt-4 bg-gradient-to-r from-red-600 to-red-400 w-full text-white py-[10px] px-3 rounded-lg"><i
                    class="bi bi-door-open-fill"></i> Resign</button>
            <button
                class="btn-kontrak shadow-md flex gap-2 justify-center duration-500 mt-2 bg-gradient-to-r from-cyan-600 to-cyan-400 w-full text-white py-[10px] px-3 rounded-lg"><i
                    class="bi bi-file-earmark-plus"></i> Perpanjang Kontrak</button>
            <button  
                class="btn-catatan shadow-md flex gap-2 justify-center duration-500 mt-2 bg-gradient-to-r from-green-600 to-green-400 w-full text-white py-[10px] px-3 rounded-lg"><i
                    class="bi bi-pencil-square"></i> Edit Catatan</button>
        </div>
        <div class="shadow-xl bg-white rounded-xl p-5 flex-[1.7]">
            <h1 class="text-dbklik text-3xl font-semibold text-center">Data Karyawan</h1>
            <div class="flex mt-5 gap-10">
                <div class="flex-[1] flex flex-col gap-4 ">
                    <div class="flex flex-col">
                        {{-- <span class="text-dbklik text-[14px]">Nama</span> --}}
                        
                        @foreach ($data_karyawan as $karyawan ) 
                            @foreach ($karyawan->getAttributes() as $columnName => $columnValue ) 
                                @if((strpos($columnName, 'id') === false) && (strpos($columnName, '_at') === false))
                                    @php
                                        // Transform column name to readable format
                                        $columnNameFormatted = ucwords(str_replace('_', ' ', $columnName));
                                    @endphp
                                    <span class="text-dbklik text-[14px]">{{ $columnNameFormatted }}</span>
                                    <span class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">{{ $columnValue }}</span>
                                @endif
                            @endforeach                        
                        @endforeach
                        {{-- <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">{{ $data_karyawan->nama_lengkap }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">Email</span>
                        <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">{{ $data_karyawan->email }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">No Telephone</span>
                        <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">{{ $data_karyawan->no_telephone }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">No Telephone Whatsapp</span>
                        <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">{{ $data_karyawan->no_whatsapp }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">Alamat</span>
                        <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">{{ $data_karyawan->alamat_domisili }}</span>
                    </div>
                </div>
                <div class="flex-[1] flex flex-col gap-3 ">
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">Tanggal Mulai Kontrak</span>
                        <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">{{ $data_karyawan->tanggal_masuk_kerja }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">Tanggal Berakhir Kontrak</span>
                        <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">{{ $data_karyawan->berakhir_kerja }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">Nomor Rekening</span>
                        <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">{{ $data_karyawan->no_rekening_bca }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">Divisi - Sub Divisi</span>
                        <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">{{ $data_karyawan->subDivisi->divisi->nama_divisi }}
                            - {{ $data_karyawan->subDivisi->nama_sub_divisi }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">Jabatan</span>
                        <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">{{ $data_karyawan->jabatan->nama_jabatan }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">Lokasi Kerja</span>
                        <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">{{ $data_karyawan->cabang->nama_cabang }}</span>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="mt-10 flex justify-between leading-none items-center">
        <h1 class="text-dbklik font-semibold text-3xl">Riwayat Mutasi</h1>
        <button
            class="btn-mutasi bg-gradient-to-r from-dbklik to-indigo-600 text-white px-7 py-3 rounded-lg shadow-lg block"><i
                class="bi bi-plus-lg"></i>Tambah
            Mutasi</button>
    </div>

    <table class="w-full rounded-lg shadow-lg bg-white" id="table-mutasi">
        <thead>
            <tr class="bg-dbklik text-yellow-dbklik">
                <th class="p-3">No</th>
                <th class="p-3">Tanggal Mutasi</th>
                <th class="p-3">Jenis Mutasi</th>
                <th class="p-3">Awal</th>
                <th class="p-3">Tujuan</th>
                <th class="p-3">Surat Mutasi</th>
            </tr>
        </thead>
        <tbody class="">
            <tr>
                <td class="">1</td>
                <td class="">Senin 29, Januari 2024</td>
                <td class="">Perpindahan Cabang</td>
                <td class="">Surabaya</td>
                <td class="">Malang</td>
                <td class="">
                    <a href="" class="underline underline-offset-2">mutasi-01.pdf</a>
                </td>
            </tr>
            <tr>
                <td class="">2</td>
                <td class="">Senin 29, Januari 2024</td>
                <td class="">Perpindahan Divisi</td>
                <td class="">Marketing</td>
                <td class="">IT</td>
                <td class="">
                    <a href="" class="underline underline-offset-2">mutasi-02.pdf</a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
