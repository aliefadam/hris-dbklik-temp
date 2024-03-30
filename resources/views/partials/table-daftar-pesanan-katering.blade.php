<table class="w-full rounded-lg shadow-lg bg-white" id="table-daftar-pengajuan">
    <thead>
        <tr class="bg-dbklik text-yellow-dbklik">
            <th class="p-3">No</th>
            <th class="p-3">Karyawan</th>
            <th class="p-3">Divisi</th>
            @foreach ($data_hari as $hari)
                <th class="p-3">{{ $hari->hari }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody class="">
        @foreach (collect($data_pemesanan_group)->groupBy('karyawan_id') as $key => $pemesanan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ App\Models\PemesananKatering::find($key)->karyawan->nama_lengkap }}</td>
                <td>{{ App\Models\PemesananKatering::find($key)->karyawan->divisi->nama_divisi }}</td>
                @foreach ($data_hari as $hari)
                    <td class="p-3">
                        {{ App\Models\PemesananKatering::find($key)->setuju }} -
                        {{ App\Models\PemesananKatering::find($key)->setuju == 1 ? $hari->menu : 'Tidak Setuju' }}
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
