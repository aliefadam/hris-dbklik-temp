@extends('layouts.hr')

@section('content')
    <div class="flex justify-between">
        <div class="shadow-xl bg-white flex gap-3 p-3 rounded-lg">
            <i class="bi bi-search text-dbklik"></i>
            <input type="text" id="customSearchBox" class="outline-none" placeholder="Cari">
        </div>
        <form action="/hr/riwayat">
            <div class="flex gap-3">
                <div class="shadow-xl bg-white flex gap-3 p-3 rounded-lg">
                    <input required name="s" type="date" class="outline-none text-dbklik w-[120px]"
                        value="{{ isset($mulai) ? $mulai : '' }}">
                </div>
                <span class="self-center">-</span>
                <div class="shadow-xl bg-white flex gap-3 p-3 rounded-lg">
                    <input required name="e" type="date" class="outline-none text-dbklik w-[120px]"
                        value="{{ isset($akhir) ? $akhir : '' }}">
                </div>
                <button class="bg-gradient-to-r from-green-600 to-green-500 px-5 rounded-md text-white"><i
                        class="bi bi-funnel"></i> Filter</button>
                <a href="/hr/riwayat"
                    class="flex gap-1 items-center bg-gradient-to-r from-red-600 to-red-500 px-5 rounded-md text-white"><i
                        class="bi bi-trash"></i> Bersihkan Filter</a>
            </div>
        </form>
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
                    data-catatan="{{ $r->catatan }}" data-divisi="{{ $r->karyawan->divisi->nama_divisi }}"
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
