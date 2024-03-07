@extends('layouts.hr')

@section('content')
    <div class="flex justify-between">
        <div class="shadow-xl bg-white flex gap-3 p-3 rounded-lg">
            <i class="bi bi-search text-dbklik"></i>
            <input type="search" id="customSearchBoxDaftarPengajuan" class="outline-none" placeholder="Cari">
        </div>
        <div class="flex gap-3">
            <div class="shadow-xl bg-white flex gap-3 p-3 rounded-lg">
                <input type="date" class="outline-none text-dbklik" placeholder="Dari">
            </div>
            <div class="shadow-xl bg-white flex gap-3 p-3 rounded-lg">
                <input type="date" class="outline-none text-dbklik" placeholder="Sampai">
            </div>
        </div>
    </div>

    <table class="w-full rounded-lg shadow-lg bg-white" id="table-daftar-pengajuan">
        <thead>
            <tr class="bg-dbklik text-yellow-dbklik">
                <th class="p-3">No</th>
                <th class="p-3">Divisi</th>
                <th class="p-3">Nama</th>
                <th class="p-3">Izin</th>
                <th class="p-3">Tanggal Diajukan</th>
                <th class="p-3">Tanggal Izin</th>
                <th class="p-3">Status</th>
            </tr>
        </thead>
        <tbody class="">
            @foreach ($data_perizinan as $perizinan)
                <tr data-filePendukung="{{ $perizinan->bukti_file == null ? '-' : $perizinan->bukti_file }}"
                    data-catatan="{{ $perizinan->catatan }}" data-id="{{ $perizinan->id }}">
                    <td class="">{{ $loop->iteration }}</td>
                    <td class="">{{ $perizinan->karyawan->subDivisi->divisi->nama_divisi }}</td>
                    <td class="">{{ $perizinan->karyawan->nama_lengkap }}</td>
                    <td class="">{{ $perizinan->izin->jenis_izin }}</td>
                    <td class="">{{ $perizinan->created_at }}</td>
                    <td class="">{{ $perizinan->tanggal_mulai }} - {{ $perizinan->tanggal_akhir }}</td>
                    @php
                        $status = $perizinan['status'];
                        if ($status == 'pending') {
                            $logo = 'bi-hourglass-top';
                        } elseif ($status == 'disetujui') {
                            $logo = 'bi-check-circle-fill';
                        } else {
                            $logo = 'bi-x-circle-fill';
                        }
                    @endphp
                    <td class="{{ $status }} capitalize"><i class="bi {{ $logo }}"></i>
                        <span class="status-text">{{ $status }}</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
