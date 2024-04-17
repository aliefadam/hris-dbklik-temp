@extends('layouts.main')

@section('content')
    <div class="w-full flex gap-[25px]">
        <div class="bg-white p-5 rounded-lg shadow-lg w-1/2">
            <div class="">
                <h1 class="text-2xl font-semibold leading-none">Data Kehadiran</h1>
                <div class="grid grid-cols-2 gap-4 mt-3">
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[16px]">Kehadiran</span>
                        <span class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">26</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[16px]">Lembur</span>
                        <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">{{ $data_lembur->jumlah_jam_menit ?? '0' }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[16px]">Dinas Luar</span>
                        <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">{{ $data_dinasLuar ?? '-' }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[16px]">Izin Luar Cuti</span>
                        <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">{{ $data_izinLuarCuti ?? '-' }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white p-5 rounded-lg shadow-lg w-1/2">
            <h1 class="text-2xl font-semibold leading-none">Kinerja Karyawan</h1>
            <div class="grid grid-cols-2 gap-4 mt-3">
                <div class="flex flex-col">
                    <span class="text-dbklik text-[16px]">Kedisiplinan</span>
                    <span class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">100%</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-dbklik text-[16px]">Penilaian Tanggung Jawab</span>
                    <span
                        class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">{{ isset($data_kpi->nilai) ? $data_kpi->nilai : '-' }}</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-dbklik text-[16px]">Penilaian Leader</span>
                    <span
                        class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">{{ isset($data_kpi->apresiasi) ? ($data_kpi->apresiasi ? 'Dapat' : 'Tidak Dapat') : '-' }}</span>
                </div>
            </div>
        </div>

    </div>
    <div class="mt-5">
        <h1 class="text-2xl font-semibold">Riwayat Pemesanan Katering</h1>
        <table class="w-full rounded-lg shadow-lg bg-white" id="table-riwayat-katering">
            <thead>
                <tr class="bg-dbklik text-yellow-dbklik">
                    <th class="p-3">No</th>
                    <th class="p-3">Tanggal</th>
                    <th class="p-3">Menu</th>
                    <th class="p-3">Request</th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($data_katering as $katering)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ Carbon\Carbon::parse($katering->tanggal)->translatedFormat('l, d F Y') }}</td>
                        <td>{{ $katering->menu }}</td>
                        <td>{{ $katering->request ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
