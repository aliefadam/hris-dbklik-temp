@extends('layouts.hr')

@section('content')
    <div class="flex justify-between">
        <div class="shadow-xl bg-white flex gap-3 p-3 rounded-lg">
            <i class="bi bi-search text-dbklik"></i>
            <input type="search" id="customSearchBoxKaryawan" class="outline-none" placeholder="Cari">
        </div>
        {{-- <div class="flex gap-3">
            <div class="shadow-xl bg-white flex gap-3 p-3 rounded-lg">
                <input type="date" class="outline-none text-dbklik" placeholder="Dari">
            </div>
            <div class="shadow-xl bg-white flex gap-3 p-3 rounded-lg">
                <input type="date" class="outline-none text-dbklik" placeholder="Sampai">
            </div>
        </div> --}}
    </div>

    <table class="w-full rounded-lg shadow-lg bg-white" id="table-karyawan">
        <thead>
            <tr class="bg-dbklik text-yellow-dbklik">
                <th class="p-3">No</th>
                <th class="p-3">Nama</th>
                <th class="p-3">Divisi</th>
                <th class="p-3">Jabatan</th>
                <th class="p-3">Status</th>
                <th class="p-3">Cabang</th>
            </tr>
        </thead>
        <tbody class="">
            @foreach ($data_karyawan as $karyawan)
                <tr data-id="{{ $karyawan->id }}">
                    <td class="">{{ $loop->iteration }}</td>
                    <td class="">{{ $karyawan->nama_lengkap }}</td>
                    <td class="">{{ $karyawan->divisi->nama_divisi }}</td>
                    <td class="">{{ $karyawan->jabatan->nama_jabatan }}</td>
                    <td class="">{{ $karyawan->status_karyawan }}</td>
                    <td class="">{{ $karyawan->cabang->nama_cabang }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
