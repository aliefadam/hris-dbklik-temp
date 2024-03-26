@extends('layouts.main')

@section('content')
    <div class="w-full">
        <div class="flex gap-2 md:gap-0 flex-col md:flex-row md:justify-between">
            <div class="shadow-xl bg-white flex gap-3 p-3 rounded-lg w-full md:w-fit">
                <i class="bi bi-search text-dbklik"></i>
                <input type="text" id="customSearchBox" class="outline-none" placeholder="Cari">
            </div>
            <form action="/riwayat">
                <div class="flex flex-col md:flex-row gap-2 md:gap-3">
                    <div class="flex md:gap-3 items-center">
                        <div class="shadow-xl bg-white p-2 md:p-3 rounded-md w-[47%] md:w-fit">
                            <input required name="s" type="date"
                                class="outline-none text-dbklik text-sm w-[100%] md:w-[120px]"
                                value="{{ isset($mulai) ? $mulai : '' }}">
                        </div>
                        <div class="w-[20px] md:w-[initial] text-center md:text-left">-</div>
                        <div class="shadow-xl bg-white p-2 md:p-3 rounded-md w-[47%] md:w-fit">
                            <input required name="e" type="date"
                                class="outline-none text-dbklik text-sm w-[100%] md:w-[120px]"
                                value="{{ isset($akhir) ? $akhir : '' }}">
                        </div>
                    </div>
                    <div class="flex gap-2 md:gap-3">
                        <button
                            class="w-fit py-2 md:py-0 bg-gradient-to-r from-green-600 to-green-500 px-5 rounded-md text-white"><i
                                class="bi bi-funnel"></i> Filter</button>
                        <a href="/riwayat"
                            class=" py-2 md:py-0 flex gap-1 items-center bg-gradient-to-r from-red-600 to-red-500 px-5 rounded-md text-white"><i
                                class="bi bi-trash"></i> Bersihkan Filter</a>
                    </div>
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
                        data-feedback="{{ $r->feedback ?? '-' }}" data-disetujui-oleh="{{ $r->disetujui_oleh }}">
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
    </div>
@endsection
