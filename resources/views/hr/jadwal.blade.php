@extends('layouts.hr')

@section('content')
    <div class="flex gap-10">
        <div class="w-1/2">
            <div class="flex justify-between">
                <h1 class="text-2xl font-semibold self-end">Tabel Jam</h1>
                <button onclick="showOverlay('overlay-tambah-jam')"
                    class="bg-gradient-to-r from-dbklik to-indigo-600 px-4 py-[10px] rounded-lg text-white cursor-pointer"><i
                        class="fas fa-plus"></i>
                    Tambah
                    Jam</button>
            </div>

            <table class="w-full rounded-lg shadow-lg bg-white mt-5" id="table-jam">
                <thead>
                    <tr class="bg-dbklik text-yellow-dbklik">
                        <th class="p-3">No</th>
                        <th class="p-3">Jam</th>
                        <th class="p-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="">
                    @if ($data_jam->count() != 0)
                        @foreach ($data_jam as $jam)
                            <tr class="tbl-jam">
                                <td class="p-3">{{ $loop->iteration }}</td>
                                <td class="p-3">{{ $jam->jam }}</td>
                                <td class="flex gap-2 p-3">
                                    <button data-id="{{ $jam->id }}" data-jam="{{ $jam->jam }}"
                                        class="btn-edit-jam bg-gradient-to-r from-yellow-600 to-yellow-400 px-5 py-2 rounded-md text-black"><i
                                            class="fas fa-edit"></i> Edit</button>
                                    <button data-id="{{ $jam->id }}" data-jam="{{ $jam->jam }}"
                                        class="btn-hapus-jam bg-gradient-to-r from-red-600 to-red-400 px-5 py-2 rounded-md text-white"><i
                                            class="fas fa-trash"></i> Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3" class="p-3 text-center">No data available in table</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="w-1/2">
            <div class="flex justify-between">
                <h1 class="text-2xl font-semibold self-end">Tabel Shift</h1>
                <button onclick="showOverlay('overlay-tambah-shift')"
                    class="bg-gradient-to-r from-dbklik to-indigo-600 px-4 py-[10px] rounded-lg text-white cursor-pointer"><i
                        class="fas fa-plus"></i>
                    Tambah
                    Shift</button>
            </div>

            <table class="w-full rounded-lg shadow-lg bg-white mt-5" id="table-shift">
                <thead>
                    <tr class="bg-dbklik text-yellow-dbklik">
                        <th class="p-3">Shift</th>
                        <th class="p-3">Jam</th>
                        <th class="p-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="">
                    @if ($data_shift->count() != 0)
                        @foreach ($data_shift as $shift)
                            <tr class="tbl-shift">
                                <td class="p-3">{{ $shift->shift }}</td>
                                <td class="p-3">{{ $shift->jamMulai->jam . ' - ' . $shift->jamAkhir->jam }}</td>
                                <td class="flex gap-2 p-3">
                                    <button data-id="{{ $shift->id }}" data-shift="{{ $shift->shift }}"
                                        class="btn-edit-shift bg-gradient-to-r from-yellow-600 to-yellow-400 px-5 py-2 rounded-md text-black"><i
                                            class="fas fa-edit"></i> Edit</button>
                                    <button data-id="{{ $shift->id }}" data-shift="{{ $shift->shift }}"
                                        class="btn-hapus-shift bg-gradient-to-r from-red-600 to-red-400 px-5 py-2 rounded-md text-white"><i
                                            class="fas fa-trash"></i> Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3" class="p-3 text-center">No data available in table</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-[50px]">
        <div class="flex justify-between">
            <h1 class="text-2xl font-semibold self-end">Tabel Jadwal</h1>
            <div class="flex gap-3">
                <div class="shadow-xl bg-white flex gap-3 px-4 py-[10px] rounded-lg">
                    <i class="bi bi-search text-dbklik"></i>
                    <input type="search" id="search-jadwal" class="outline-none" placeholder="Cari">
                </div>
                <button onclick="showOverlay('overlay-tambah-jam')"
                    class="bg-gradient-to-r from-dbklik to-indigo-600 px-4 py-[10px] rounded-lg text-white cursor-pointer"><i
                        class="fas fa-plus"></i>
                    Tambah
                    Jadwal</button>
            </div>
        </div>

        <table class="w-full rounded-lg shadow-lg bg-white" id="table-jadwal">
            <thead>
                <tr class="bg-dbklik text-yellow-dbklik">
                    <th class="p-3">No</th>
                    <th class="p-3">Tanggal</th>
                    <th class="p-3">Karyawan</th>
                    <th class="p-3">Shift</th>
                </tr>
            </thead>
            <tbody class="">
                {{-- @foreach ($data_katering as $katering) --}}
                <tr>
                    {{-- <td>{{ $loop->iteration }}</td>
                        <td>{{ Carbon\Carbon::parse($katering->tanggal)->translatedFormat('l, d F Y') }}</td>
                        <td>{{ $katering->menu }}</td>
                        <td>{{ $katering->request ?? '-' }}</td> --}}
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                </tr>
                {{-- @endforeach --}}
            </tbody>
        </table>
    </div>
@endsection
