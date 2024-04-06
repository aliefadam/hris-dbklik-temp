<table class="w-full rounded-lg shadow-lg bg-white" id="table-daftar-pengajuan">
    <thead>
        <tr class="bg-dbklik text-yellow-dbklik">
            <th class="p-3">No</th>
            <th class="p-3">Divisi</th>
            <th class="p-3">Nama</th>
            <th class="p-3">Izin</th>
            <th class="p-3">Tanggal Diajukan</th>
            <th class="p-3">Tanggal Izin</th>
            @if ($tampil_catatan)
                <th class="p-3">Catatan</th>
            @endif
            <th class="p-3">Status</th>
        </tr>
    </thead>
    <tbody class="">
        @foreach ($data_perizinan as $perizinan)
            <tr data-filePendukung="{{ $perizinan->bukti_file == null ? '-' : $perizinan->bukti_file }}"
                data-catatan="{{ $perizinan->catatan ?? '-' }}" data-id="{{ $perizinan->id }}"
                data-feedback="{{ $perizinan->feedback ?? '-' }}"
                data-disetujui-oleh="{{ $perizinan->disetujui_oleh }}">
                <td class="">{{ $loop->iteration }}</td>
                <td class="">{{ $perizinan->karyawan->divisi->nama_divisi }}</td>
                <td class="">{{ $perizinan->karyawan->nama_lengkap }}</td>
                <td class="">{{ $perizinan->izin->jenis_izin }}</td>
                @php
                    $tanggalDiajukan = Carbon\Carbon::parse($perizinan->created_at)->translatedFormat('l, d-m-Y H:i');
                @endphp
                <td class="">{{ $tanggalDiajukan }}</td>
                <td class="">{{ $perizinan->tanggal_mulai }}
                    {{ $perizinan->jam ?? ' - ' . $perizinan->tanggal_akhir }} </td>
                @if ($tampil_catatan)
                    <td class="p-3">{{ $perizinan->catatan ?? '-' }}</td>
                @endif
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
