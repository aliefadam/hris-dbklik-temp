<table class="w-[640px] rounded-lg shadow-lg bg-white tbl-kpi text-center" id="table-daftar-penilaian-kpi">
    <thead>
        <tr class="bg-dbklik text-yellow-dbklik">
            <th class="p-3">No</th>
            <th class="p-3">Nama Karyawan</th>
            <th class="p-3"></th>
        </tr>
    </thead>
    <tbody class="">
        @foreach ($bawahan as $bawah)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $bawah->nama_lengkap}}</td>
                <td class="bi bi-pencil-square text-dbklik"></td>
            </tr>
        @endforeach
    </tbody>
</table>
