@extends('layouts.hr')

@section('content')
    <div class="flex justify-between">
        <div class="shadow-xl bg-white flex gap-3 p-3 rounded-lg">
            <i class="bi bi-search text-dbklik"></i>
            <input type="search" id="search-daftar-jam" class="outline-none" placeholder="Cari">
        </div>
        <button onclick="showOverlay('overlay-tambah-jam')"
            class="bg-gradient-to-r from-dbklik to-indigo-600 px-4 rounded-lg text-white cursor-pointer"><i
                class="fas fa-plus"></i>
            Tambah
            Jam</button>
    </div>

    <table class="w-full rounded-lg shadow-lg bg-white" id="table-jam">
        <thead>
            <tr class="bg-dbklik text-yellow-dbklik">
                <th class="p-3">No</th>
                <th class="p-3">Jam</th>
                <th class="p-3">Aksi</th>
            </tr>
        </thead>
        <tbody class="">
            @foreach ($data_jam as $jam)
                <tr class="tbl-jam">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $jam->jam }}</td>
                    <td class="flex gap-2">
                        <button data-id="{{ $jam->id }}" data-jam="{{ $jam->jam }}"
                            class="btn-edit-jam bg-gradient-to-r from-yellow-600 to-yellow-400 px-5 py-2 rounded-md text-black"><i
                                class="fas fa-edit"></i> Edit</button>
                        <button data-id="{{ $jam->id }}" data-jam="{{ $jam->jam }}"
                            class="btn-hapus-jam bg-gradient-to-r from-red-600 to-red-400 px-5 py-2 rounded-md text-white"><i
                                class="fas fa-trash"></i> Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
