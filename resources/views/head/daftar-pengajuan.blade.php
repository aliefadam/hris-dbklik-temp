@extends('layouts.head')

@section('content')
    <div class="flex justify-between">
        <div class="shadow-xl bg-white flex gap-3 p-3 rounded-lg">
            <i class="bi bi-search text-dbklik"></i>
            <input type="text" id="customSearchBoxDaftarPengajuan" class="outline-none" placeholder="Cari">
        </div>
        <form action="/head/daftar-pengajuan">
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
                <a href="/head/daftar-pengajuan"
                    class="flex gap-1 items-center bg-gradient-to-r from-red-600 to-red-500 px-5 rounded-md text-white"><i
                        class="bi bi-trash"></i> Bersihkan Filter</a>
            </div>
        </form>
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
                <tr data-filePendukung="{{ $perizinan->bukti_file ?? '-' }}" data-catatan="{{ $perizinan->catatan ?? '-' }}"
                    data-id="{{ $perizinan->id }}" data-feedback="{{ $perizinan->feedback ?? '-' }}"
                    data-disetujui-oleh="{{ $perizinan->disetujui_oleh }}">
                    <td class="">{{ $loop->iteration }}</td>
                    <td class="">{{ $perizinan->karyawan->divisi->nama_divisi }}</td>
                    <td class="">{{ $perizinan->karyawan->nama_lengkap }}</td>
                    <td class="">{{ $perizinan->izin->jenis_izin }}</td>
                    <td class="">{{ $perizinan->created_at }}</td>
                    <td class="">{{ $perizinan->tanggal_mulai }}
                        {{ $perizinan->jam ?? ' - ' . $perizinan->tanggal_akhir }} </td>
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
