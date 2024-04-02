@extends('layouts.hr')

@section('content')
    <div class="w-full flex gap-4">
        <div class="flex-[1]">
            <div class="shadow-xl bg-white rounded-xl p-5 flex justify-center items-center h-fit">
                <div
                    class="w-[250px] h-[250px] rounded-full shadow-[rgba(60,64,67,0.3)_0px_1px_2px_0px,rgba(60,64,67,0.15)_0px_1px_3px_1px]">
                    @php $foto = $karyawan->foto ?? "no_image.png" @endphp
                    <img src="{{ asset("storage/upload/foto_user/$foto") }}" class="object-cover w-full h-full rounded-full">
                </div>
            </div>
            <div class="flex gap-[10px] mt-[10px]">
                <button
                    class="btn-catatan shadow-md flex gap-2 justify-center duration-500 mt-2 bg-gradient-to-r from-green-600 to-green-400 w-full text-white py-[10px] rounded-lg"><i
                        class="bi bi-pencil-square"></i> Edit Catatan</button>
                <button
                    class="{{ $karyawan->status_karyawan != 'Karyawan Tetap' ? 'btn-kontrak' : 'from-gray-600 to-gray-400 cursor-not-allowed' }} shadow-md flex gap-2 justify-center duration-500 mt-2 bg-gradient-to-r from-cyan-600 to-cyan-400 w-full text-white py-[10px] rounded-lg"><i
                        class="bi bi-file-earmark-plus"></i> Perpanjang Kontrak</button>
            </div>
            <button
                class="btn-resign shadow-md flex gap-2 justify-center duration-500 mt-[10px] bg-gradient-to-r from-red-600 to-red-400 w-full text-white py-[10px] px-3 rounded-lg">
                <i class="bi bi-door-open-fill"></i> Resign
            </button>

        </div>
        <div class="shadow-xl bg-white rounded-xl p-5 flex-[1.7] h-[420px]">
            <h1 class="text-dbklik text-3xl font-semibold text-center">Data Karyawan</h1>
            <div class="flex mt-5 gap-10 karyawan-detail overflow-auto h-[calc(100%-110px)]">
                <div class="flex-[1] flex flex-col gap-3">
                    @php $counter = 0; @endphp
                    @foreach (collect($biodata) as $columnName => $columnValue)
                        @if (strpos($columnName, 'id') === false && strpos($columnName, '_at') === false)
                            @if ($counter < count(collect($biodata)) / 2)
                                @php
                                    $columnNameFormatted = ucwords(str_replace('_', ' ', $columnName));
                                @endphp
                                <div class="flex flex-col">
                                    <span class="text-dbklik text-[14px]">{{ $columnNameFormatted }}</span>
                                    <span
                                        class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">{{ $columnValue }}</span>
                                </div>
                            @endif
                        @endif
                        @php $counter++; @endphp
                    @endforeach
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">Jatah Cuti</span>
                        <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">{{ $jatah_cuti }}</span>
                    </div>
                </div>
                <div class="flex-[1] flex flex-col gap-3 ">
                    @php $counter = 0; @endphp
                    @foreach (collect($biodata) as $columnName => $columnValue)
                        @if (strpos($columnName, 'id') === false && strpos($columnName, '_at') === false)
                            @if ($counter >= count(collect($biodata)) / 2)
                                @php
                                    $columnNameFormatted = ucwords(str_replace('_', ' ', $columnName));
                                @endphp
                                <div class="flex flex-col">
                                    <span class="text-dbklik text-[14px]">{{ $columnNameFormatted }}</span>
                                    <span
                                        class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium {{ strpos($columnName, 'file') ? 'underline cursor-pointer open-file' : '' }}">{{ $columnValue ?? '-' }}</span>
                                </div>
                            @endif
                        @endif
                        @php $counter++; @endphp
                    @endforeach
                </div>
            </div>
            <div class="flex justify-end">
                <button
                    class="btn-edit-profile shadow-lg flex gap-2 justify-center duration-500 mt-2 bg-gradient-to-r from-emerald-600 to-emerald-400 text-white py-[10px] px-3 rounded-lg w-fit"><i
                        class="bi bi-person-gear"></i> Edit Profile</button>
            </div>
        </div>
    </div>

    <div class="mt-10 flex justify-between leading-none items-center">
        <h1 class="text-dbklik font-semibold text-3xl">Riwayat Mutasi</h1>
        <button
            class="btn-mutasi bg-gradient-to-r from-dbklik to-indigo-600 text-white px-5 py-4 rounded-lg shadow-lg block"><i
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
            @foreach ($data_mutasi as $mutasi)
                <tr>
                    <td class="">{{ $loop->iteration }}</td>
                    <td class="">{{ $mutasi->created_at }}</td>
                    <td class="capitalize">{{ explode('-', $mutasi->jenis_mutasi)[0] }}
                        {{ explode('-', $mutasi->jenis_mutasi)[1] }}</td>
                    <td class="">{{ $mutasi->awal }}</td>
                    <td class="">{{ $mutasi->tujuan }}</td>
                    <td class="">
                        <a href="{{ asset("storage/upload/file_pendukung/$mutasi->surat_mutasi_file") }}"
                            class="underline underline-offset-2" target="_blank">
                            {{ $mutasi->surat_mutasi_file }}
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-10 flex justify-between leading-none items-center">
        <h1 class="text-dbklik font-semibold text-3xl">Riwayat Lembur</h1>
        <button
            class="btn-lembur bg-gradient-to-r from-dbklik to-indigo-600 text-white px-5 py-4 rounded-lg shadow-lg block"><i
                class="bi bi-plus-lg"></i>Tambah
            Lembur</button>
    </div>

    <table class="w-full rounded-lg shadow-lg bg-white" id="table-lembur">
        <thead>
            <tr class="bg-dbklik text-yellow-dbklik">
                <th class="p-3">No</th>
                <th class="p-3">Tanggal Lembur</th>
                <th class="p-3">Keperluan</th>
                <th class="p-3">Jam Lembur</th>
                <th class="p-3">Jumlah <span class="text-xs">(jam:menit)</span></th>
                <th class="p-3">Catatan</th>
            </tr>
        </thead>
        <tbody class="">
            @foreach ($data_lembur as $lembur)
                <tr>
                    <td class="">{{ $loop->iteration }}</td>
                    <td class="">{{ $lembur->tanggal }}</td>
                    <td class="">{{ $lembur->keperluan }}</td>
                    <td class="">{{ substr($lembur->jam_mulai, 0, 5) . " - " . substr($lembur->jam_selesai, 0, 5) }}</td>
                    <td class="">{{ $lembur->jumlah_jam_menit }}</td>
                    <td class="">{{ $lembur->catatan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-10">
        <div class="flex items-center">
            <h1 class="text-dbklik font-semibold text-3xl">Penilaian Kinerja</h1>
        </div>
        <table class="w-auto rounded-lg shadow-lg bg-white">
            <thead>
                <tr class="bg-dbklik text-yellow-dbklik">
                    <th class="p-3">No</th>
                    <th class="p-3">Nilai</th>
                    <th class="p-3">Apresiasi</th>
                    <th class="p-3">Periode</th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($data_lembur as $lembur)
                    <tr>
                        {{-- <td class="">{{ $loop->iteration }}</td>
                        <td class="">{{ $lembur->tanggal }}</td>
                        <td class="">{{ $lembur->keperluan }}</td>
                        <td class="">{{ substr($lembur->jam_mulai, 0, 5) . " - " . substr($lembur->jam_selesai, 0, 5) }}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    

    <script>
        $(".open-file").on("click", function() {
            window.open(`/storage/upload/file_pendukung/${$(this).html()}`, "_blank");
        });
    </script>
@endsection
