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
        <tbody class="border">
            <tr>
                <td class="">1</td>
                <td class="">Sakit</td>
                <td class="">Sabtu, 3 Maret 2024 - 08:45</td>
                <td class="">4 Maret - 5 Maret 2024</td>
                <td class="">-</td>
                <td class="">Pending</td>
            </tr>
            <tr>
                <td class="">2</td>
                <td class="">Dinas Luar</td>
                <td class="">Minggu, 4 Maret 2024 - 09:00</td>
                <td class="">5 Maret - 6 Maret 2024</td>
                <td class="">Jakarta</td>
                <td class="">Disetujui</td>
            </tr>
            <tr>
                <td class="">3</td>
                <td class="">Cuti Tahunan</td>
                <td class="">Senin, 5 Maret 2024 - 07:30</td>
                <td class="">6 Maret - 10 Maret 2024</td>
                <td class="">-</td>
                <td class="">Disetujui</td>
            </tr>
            <tr>
                <td class="">4</td>
                <td class="">Izin Keluarga</td>
                <td class="">Selasa, 6 Maret 2024 - 08:00</td>
                <td class="">7 Maret 2024</td>
                <td class="">-</td>
                <td class="">Pending</td>
            </tr>
            <tr>
                <td class="">5</td>
                <td class="">Sakit</td>
                <td class="">Rabu, 7 Maret 2024 - 08:15</td>
                <td class="">8 Maret - 9 Maret 2024</td>
                <td class="">-</td>
                <td class="">Disetujui</td>
            </tr>
            <tr>
                <td class="">6</td>
                <td class="">Workshop</td>
                <td class="">Kamis, 8 Maret 2024 - 09:00</td>
                <td class="">9 Maret - 10 Maret 2024</td>
                <td class="">Bandung</td>
                <td class="">Disetujui</td>
            </tr>
            <tr>
                <td class="">7</td>
                <td class="">Sakit</td>
                <td class="">Jumat, 9 Maret 2024 - 08:45</td>
                <td class="">10 Maret - 11 Maret 2024</td>
                <td class="">-</td>
                <td class="">Pending</td>
            </tr>
            <tr>
                <td class="">8</td>
                <td class="">Izin Mendadak</td>
                <td class="">Sabtu, 10 Maret 2024 - 10:00</td>
                <td class="">11 Maret 2024</td>
                <td class="">-</td>
                <td class="">Disetujui</td>
            </tr>
            <tr>
                <td class="">9</td>
                <td class="">Cuti Melahirkan</td>
                <td class="">Minggu, 11 Maret 2024 - 08:00</td>
                <td class="">12 Maret - 9 Mei 2024</td>
                <td class="">-</td>
                <td class="">Disetujui</td>
            </tr>
            <tr>
                <td class="">10</td>
                <td class="">Dinas Luar Kota</td>
                <td class="">Senin, 12 Maret 2024 - 09:30</td>
                <td class="">13 Maret - 15 Maret 2024</td>
                <td class="">Surabaya</td>
                <td class="">Pending</td>
            </tr>
            <tr>
                <td class="">11</td>
                <td class="">Pelatihan</td>
                <td class="">Selasa, 13 Maret 2024 - 08:00</td>
                <td class="">14 Maret - 16 Maret 2024</td>
                <td class="">Yogyakarta</td>
                <td class="">Disetujui</td>
            </tr>

            <tr>
                <td class="">12</td>
                <td class="">Menikah</td>
                <td class="">Sabtu, 2 Maret 2024 - 08:45</td>
                <td class="">4 Maret - 5 Maret 2024</td>
                <td class="">-</td>
                <td class="">Disetujui</td>
            </tr>
        </tbody>
    </table>
@endsection
