@extends('layouts.head')

@section('content')
    <div class="flex justify-between">
        <div class="shadow-xl bg-white flex gap-3 p-3 rounded-lg">
            <i class="bi bi-search text-dbklik"></i>
            <input type="search" id="search-daftar-penilaian-kpi-head" class="outline-none" placeholder="Cari">
        </div>
        {{-- <form action="/hr/daftar-pengajuan">
            <div class="flex gap-3">
                <div class="shadow-xl bg-white flex gap-3 p-3 rounded-lg">
                    <input required name="s" type="date" class="outline-none text-dbklik w-[120px]"
                        value="{{ isset($mulai) ? $mulai : '' }}">
                </div>
                <span class="self-center">-</span>
                <div class="shadow-xl bg-white flex gap-3 p-3 rounded-lg">
                    <input required name="e" type="date" class="outline-none text-dbklik w-[120px]"
                        value="{{ isset($akhir) ? $akhir : '' }}">
                </div>
                <button class="bg-gradient-to-r from-cyan-600 to-cyan-500 px-5 rounded-md text-white"><i
                        class="bi bi-funnel"></i> Filter</button>
                <button type="button"
                    class="relative btn-more-daftar-pengajuan duration-200 bg-gradient-to-r from-amber-600 to-amber-500 rounded-lg shadow-xl px-5"><i
                        class="duration-300 bi bi-caret-down-fill text-white icon-more-daftar-pengajuan flex"></i>
                    <div
                        class="box-more-daftar-pengajuan hidden w-[200px] absolute z-[2] bottom-[-105px] right-0 bg-white shadow-[0_0_10px_rgba(0,0,0,0.3)] rounded-md overflow-hidden">
                        <a href="/hr/daftar-pengajuan"
                            class="flex gap-1 items-center py-3 px-5 text-black hover:bg-red-600 hover:text-white duration-200"><i
                                class="bi bi-trash"></i> Bersihkan Filter
                        </a>
                        <hr>
                        <a href="/hr/export-excel/{{ isset($mulai) ? $mulai : 'all' }}/{{ isset($akhir) ? $akhir : 'all' }}"
                            class="flex gap-1 items-center py-3 px-5 text-black duration-200 hover:bg-[#1D6F42] hover:text-white"><i
                                class="bi bi-file-earmark-excel-fill"></i> Export Excel
                        </a>
                    </div>
                </button>
            </div>
        </form> --}}
    </div>

    <form id="pengisian-kpi-ajax" action="/head/isi-kpi" method="POST">
        @csrf
        <table class="w-full rounded-lg shadow-lg bg-white tbl-kpi" id="table-daftar-pengisian-kpi-head">
            <thead>
                <tr class="bg-dbklik text-yellow-dbklik">
                    <th class="p-3">No</th>
                    <th class="p-3">Nama Karyawan</th>
                    <th class="p-3">Nilai</th>
                    <th class="p-3">Apresiasi</th>
                    <th class="p-3">Kedisiplinan</th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($data_karyawan as $index => $karyawan)
                    @php
                        if (isset($data_kpi[$index])) {
                            $selected = $data_kpi[$index]->nilai;
                            $checked = $data_kpi[$index]->apresiasi;
                            $discipline = $data_kpi[$index]->kedisiplinan * 100;
                        } else {
                            $selected = '-';
                            $checked = false;
                            $discipline = 0.0;
                        }
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $karyawan->nama_lengkap }}</td>
                        <td>
                            <select data-id="{{ $karyawan->id }}" class="input-ajax-kpi" name="nilai_{{ $karyawan->id }}"
                                id="nilai_{{ $karyawan->id }}">
                                <option @selected($selected == '-') value="-">-
                                </option>
                                <option @selected($selected == 'A') value="A">A
                                </option>
                                <option @selected($selected == 'B') value="B">B
                                </option>
                                <option @selected($selected == 'C') value="C">C
                                </option>
                                <option @selected($selected == 'D') value="D">D
                                </option>
                            </select>
                        </td>
                        <td>
                            <input data-id="{{ $karyawan->id }}" class="input-ajax-kpi" @checked($checked)
                                type="checkbox" name="apresiasi_{{ $karyawan->id }}" id="apresiasi_{{ $karyawan->id }}">
                            <label for="apresiasi_{{ $karyawan->id }}">Dapat</label>
                        </td>
                        <td class="flex gap-1 items-center">
                            <input data-id="{{ $karyawan->id }}"
                                class="input-ajax-kpi w-[60px] outline-none p-2 focus:border focus:border-dbklik border border-transparent"
                                value="{{ $discipline }}" id="kedisiplinan_{{ $karyawan->id }}" type="text"
                                name="kedisiplinan_{{ $karyawan->id }}" min="0" max="100" placeholder="0">
                            <label class="font-semibold" for="kedisiplinan_{{ $karyawan->id }}">%</label>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- <div class="flex justify-end mt-3">
            <button class="bg-green-600 duration-200 hover:bg-green-700 text-white py-3 px-7 rounded-md">Simpan
                Data</button>
        </div> --}}
    </form>

    <script>
        $(".input-ajax-kpi").on("input", function() {
            const formData = $("#pengisian-kpi-ajax").serialize();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $("meta[name=csrf-token]").attr("content"),
                }
            });

            const id = $(this).attr("data-id");

            $.ajax({
                type: "POST",
                url: "/head/isi-kpi",
                data: {
                    id: id,
                    nilai: $(`select[name=nilai_${id}]`).val(),
                    apresiasi: $(`input[name=apresiasi_${id}]`).prop("checked") ? 1 : 0,
                    kedisiplinan: $(`input[name=kedisiplinan_${id}]`).val(),
                },
            });
        });
    </script>
@endsection


{{-- UNEXPECTED CODE --}}
{{-- @php $selected = isset($data_kpi[$index]->nilai) ?? isset($data_kpi[$index]->nilai) ? $data_kpi[$index]->nilai : "" @endphp
                    @php $checked = isset($data_kpi[$index]->apresiasi) ?? isset($data_kpi[$index]->apresiasi) ? $data_kpi[$index]->apresiasi : false @endphp --}}
