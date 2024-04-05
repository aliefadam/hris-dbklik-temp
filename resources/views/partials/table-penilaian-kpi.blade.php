<table class="w-full rounded-lg shadow-lg bg-white" id="table-daftar-penilaian-kpi">
    <thead>
        <tr class="bg-dbklik text-yellow-dbklik">
            <th class="p-3">No</th>
            <th class="p-3">Nama Karyawan</th>
            <th class="p-3">Nilai</th>
            <th class="p-3">Apresiasi</th>
            <th class="p-3">Periode</th>
        </tr>
    </thead>
    <tbody class="">
        @foreach ($data_kpi as $kpi)
            <tr class="tbl-kpi">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $kpi->karyawan->nama_lengkap }}</td>
                <td>{{ $kpi->nilai }}</td>
                <td>{{ $kpi->apresiasi ? 'Dapat' : 'Tidak Dapat' }}</td>
                @php
                    $periode = date('Y-m', strtotime($kpi->periode));
                    $carbonPeriode = Carbon\Carbon::createFromFormat('Y-m', $periode);
                    $nama_bulan = $carbonPeriode->translatedFormat('F');
                    $tahun = $carbonPeriode->year;
                @endphp
                <td>{{ $nama_bulan }} {{ $tahun }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
