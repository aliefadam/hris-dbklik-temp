@extends('layouts.hr')

@section('content')
    <div class="w-full flex gap-4">
        <div class="flex-[1]">
            <div class="shadow-xl bg-white rounded-xl p-5 flex justify-center items-center h-fit">
                <img src="{{ asset('imgs/profil.png') }}" class="w-[200px] h-[210px] drop-shadow-xl">
            </div>
            <button
                class="btn-resign shadow-md flex gap-2 justify-center duration-500 mt-4 bg-gradient-to-r from-red-600 to-red-400 w-full text-white py-[10px] px-3 rounded-lg"><i
                    class="bi bi-door-open-fill"></i> Resign</button>
            <button
                class="{{ $karyawan->status_karyawan != "Karyawan Tetap" ? "btn-kontrak" : "from-gray-600 to-gray-400 cursor-not-allowed" }} shadow-md flex gap-2 justify-center duration-500 mt-2 bg-gradient-to-r from-cyan-600 to-cyan-400 w-full text-white py-[10px] px-3 rounded-lg"><i
                    class="bi bi-file-earmark-plus"></i> Perpanjang Kontrak</button>
            <button
                class="btn-catatan shadow-md flex gap-2 justify-center duration-500 mt-2 bg-gradient-to-r from-green-600 to-green-400 w-full text-white py-[10px] px-3 rounded-lg"><i
                    class="bi bi-pencil-square"></i> Edit Catatan</button>
        </div>
        <div class="shadow-xl bg-white rounded-xl p-5 flex-[1.7] h-[420px]">
            <h1 class="text-dbklik text-3xl font-semibold text-center">Data Karyawan</h1>
            <div class="flex mt-5 gap-10 karyawan-detail overflow-auto h-[calc(100%-80px)]">
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
                                        class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium {{ strpos($columnName, 'file') ? 'underline cursor-pointer open-file' : '' }}">{{ $columnValue ?? "-" }}</span>
                                </div>
                            @endif
                        @endif
                        @php $counter++; @endphp
                    @endforeach
                </div>
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

    <script>
        $(".open-file").on("click", function() {
            window.open(`/storage/upload/file_pendukung/${$(this).html()}`, "_blank");
        });
    </script>
@endsection
