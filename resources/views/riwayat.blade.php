@extends('layouts.main')

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
            @foreach ($riwayat as $r)
                <tr data-nama="{{ $r->karyawan->nama_lengkap }}" data-filePendukung="{{ $r->bukti_file ?? '-' }}"
                    data-catatan="{{ $r->catatan }}" data-divisi="{{ $r->karyawan->subDivisi->divisi->nama_divisi }}"
                    data-feedback="{{ $r->feedback ?? '-' }}">
                    <td class="">{{ $loop->iteration }}</td>
                    <td class="">{{ $r->izin->jenis_izin }}</td>
                    <td class="">{{ $r->created_at }}</td>
                    <td class="">{{ $r->tanggal_mulai }} - {{ $r->tanggal_akhir }}</td>
                    <td class="">{{ $r->catatan ?? '-' }}</td>
                    @php
                        $status = $r->status;
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
