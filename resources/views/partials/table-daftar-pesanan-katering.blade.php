<table class="w-full rounded-lg shadow-lg bg-white" id="table-daftar-katering">
    <thead>
        <tr class="bg-dbklik text-yellow-dbklik">
            <th class="p-3 text-sm">No</th>
            <th class="p-3 text-sm">Karyawan</th>
            <th class="p-3 text-sm">Divisi</th>
            <th class="p-3 text-sm">Cabang</th>
            <th class="p-3 text-sm">Setuju</th>
            <th class="p-3 text-sm">Request</th>
        </tr>
    </thead>
    <tbody class="">
        {{-- @foreach ($data_katering as $katering)
            <tr style="background-color: #152C89; cursor: default; color: #FCBE00;">
                <td></td>
                <td></td>
                <td class="sub-heading text-sm text-center font-medium">{{ $katering->hari }},
                    {{ date('d-m-Y', strtotime($katering->tanggal)) }} - {{ $katering->menu }}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="text-sm">{{ $loop->iteration }}</td>
                <td class="text-sm"><span style="font-weight: 600">{{ $katering->karyawan->nama_panggilan }}</span>
                    ({{ $katering->karyawan->nama_lengkap }})
                </td>
                <td class="text-sm">{{ $katering->karyawan->divisi->nama_divisi }}</td>
                <td class="text-sm">{{ $katering->karyawan->cabang->nama_cabang }}</td>
                <td class="text-sm">{{ $katering->setuju }}</td>
                <td class="text-sm">{{ $katering->request }}</td>
            </tr>
        @endforeach --}}
        @foreach ($data_menu as $menu)
            <tr style="background-color: #152C89; cursor: default; color: #FCBE00;">
                <td></td>
                <td></td>
                <td class="sub-heading text-sm text-center font-medium">{{ $menu->hari }},
                    {{ date('d-m-Y', strtotime($menu->tanggal)) }} - {{ $menu->menu }}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            @foreach ($data_katering->where('tanggal', $menu->tanggal) as $katering)
                <tr>
                    <td class="text-sm">{{ $loop->iteration }}</td>
                    <td class="text-sm"><span style="font-weight: 600">{{ $katering->karyawan->nama_panggilan }}</span>
                        ({{ $katering->karyawan->nama_lengkap }})
                    </td>
                    <td class="text-sm">{{ $katering->karyawan->divisi->nama_divisi }}</td>
                    <td class="text-sm">{{ $katering->karyawan->cabang->nama_cabang }}</td>
                    <td class="text-sm">{{ $katering->setuju }}</td>
                    <td class="text-sm">{{ $katering->request }}</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
