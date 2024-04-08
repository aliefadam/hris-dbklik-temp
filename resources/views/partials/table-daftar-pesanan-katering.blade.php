<table border="1" class="w-full rounded-lg shadow-lg bg-white">
    <thead>
        <tr class="bg-dbklik text-yellow-dbklik border-b border-yellow-dbklik">
            <th class="p-3 text-sm">No</th>
            <th class="p-3 text-sm">Karyawan</th>
            <th class="p-3 text-sm">Divisi</th>
            <th class="p-3 text-sm">Cabang</th>
            <th class="p-3 text-sm">Setuju</th>
            <th class="p-3 text-sm">Request</th>
        </tr>
    </thead>
    <tbody class="">
        @foreach ($data_menu as $menu)
            <tr style="background-color: #152C89; cursor: default; color: #FCBE00;">
                <td colspan="6" class="py-[10px] text-center sub-heading text-sm font-medium">
                    {{ $menu->hari }},
                    {{ date('d-m-Y', strtotime($menu->tanggal)) }} - {{ $menu->menu }}</td>
            </tr>
            @php
                if ($export) {
                    $new_data_katering = $data_katering->where('tanggal', $menu->tanggal)->where('setuju', 'Ya');
                } else {
                    $new_data_katering = $data_katering->where('tanggal', $menu->tanggal);
                }
            @endphp
            @foreach ($new_data_katering as $katering)
                <tr>
                    <td class="text-sm py-[10px] px-[12px]">{{ $loop->iteration }}</td>
                    <td class="text-sm py-[10px] px-[12px]"><span
                            style="font-weight: 600">{{ $katering->karyawan->nama_panggilan }}</span>
                        ({{ $katering->karyawan->nama_lengkap }})
                    </td>
                    <td class="text-sm py-[10px] px-[12px]">{{ $katering->karyawan->divisi->nama_divisi }}</td>
                    <td class="text-sm py-[10px] px-[12px]">{{ $katering->karyawan->cabang->nama_cabang }}</td>
                    <td class="text-sm py-[10px] px-[12px]">{{ $katering->setuju }}</td>
                    <td class="text-sm py-[10px] px-[12px]">{{ $katering->request }}</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
