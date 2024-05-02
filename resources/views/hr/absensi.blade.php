@extends('layouts.hr')

@section('content')
        
    <div class="mt-[50px]">
        <div class="flex justify-between">
            <h1 class="text-2xl font-semibold self-end">Tabel Ceklog</h1>
            <div class="flex gap-3">
                <div class="shadow-xl bg-white flex gap-3 px-4 py-[10px] rounded-lg">
                    <i class="bi bi-search text-dbklik"></i>
                    <input type="search" id="search-jadwal" class="outline-none" placeholder="Cari">
                </div>
                
                <button onclick="showOverlay('overlay-upload-absensi')"
                    class="bg-gradient-to-r from-dbklik to-indigo-600 px-4 py-[10px] rounded-lg text-white cursor-pointer"><i
                        class="fas fa-plus"></i>
                    Upload</button>
            </div>
        </div>

        <table class="w-full rounded-lg shadow-lg bg-white" id="table-jadwal">
            <thead>
                <tr class="bg-dbklik text-yellow-dbklik">
                    <th class="p-3">NIP</th>
                    <th class="p-3">Nama</th>
                    <th class="p-3">Jabatan</th>
                    <th class="p-3">Divisi</th>
                    <th class="p-3">Cabang</th>
                    <th class="p-3">Tanggal</th>
                    <th class="p-3">Scan 1</th>
                    <th class="p-3">Scan 2</th>
                    <th class="p-3">Scan 3</th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($data_absensi as $absensi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$absensi->NIP  }}</td>
                        <td>{{$absensi->karyawan->nama_lengkap  }}</td>
                        <td>{{$absensi->karyawan->jabatan->nama_jabatan  }}</td>
                        <td>{{$absensi->karyawan->divisi->nama_divisi  }}</td>
                        <td>{{$absensi->karyawan->cabang->nama_cabang  }}</td>
                        <td>{{$absensi->Tanggal  }}</td>
                        <td>{{$absensi->Scan_1  }}</td>
                        <td>{{$absensi->Scan_2  }}</td>
                        <td>{{$absensi->Scan_3  }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection
