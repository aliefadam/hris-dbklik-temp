@extends('layouts.hr')

@section('content')
    <div class="flex justify-between">
        <div class="shadow-xl bg-white flex gap-3 p-3 rounded-lg">
            <i class="bi bi-search text-dbklik"></i>
            <input type="search" id="customSearchBox" class="outline-none" placeholder="Cari">
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

    <table class="w-full rounded-lg shadow-lg bg-white" id="table-riwayat">
        <thead>
            <tr class="bg-dbklik text-yellow-dbklik">
                <th class="p-3">No</th>
                <th class="p-3">Jenis</th>
                <th class="p-3">Tanggal Diajukan</th>
                <th class="p-3">Tanggal Izin</th>
                <th class="p-3">Catatan</th>
                <th class="p-3">Status</th>
            </tr>
        </thead>
        <tbody class="">
            @foreach ($data_pengajuan as $pengajuan)
                <tr data-nama="{{ $pengajuan['nama'] }}" data-filePendukung="{{ $pengajuan['file_pendukung'] }}"
                    data-catatan="{{ $pengajuan['catatan'] }}" data-divisi="{{ $pengajuan['divisi'] }}">
                    <td class="">{{ $loop->iteration }}</td>
                    <td class="">{{ $pengajuan['izin'] }}</td>
                    <td class="">{{ $pengajuan['tanggal_diajukan'] }}</td>
                    <td class="">{{ $pengajuan['tanggal_izin'] }}</td>
                    <td class="">{{ $pengajuan['catatan'] }}</td>
                    @php
                        $status = $pengajuan['status'];
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
