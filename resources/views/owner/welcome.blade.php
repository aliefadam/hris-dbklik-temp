@extends('layouts.owner')

@section('content')
    <div class="w-full flex gap-3">
        <div class="bg-white shadow-xl rounded-lg px-5 py-6 w-[45%] flex flex-col h-fit">
            <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                <label for="cabang" class="text-dbklik">Cabang</label>
                <select name="cabang" id="cabang" class="outline-none bg-transparent">
                    <option value="0">Semua Cabang</option>
                    @foreach ($dataCabang as $cabang)
                        <option class="" value="{{ $cabang->id }}">{{ $cabang->nama_cabang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="border border-indigo-600 mt-5">
                <div class="text-center bg-gradient-to-r from-dbklik to-indigo-600 p-3 text-white">
                    <h1 class="text-lg">Jumlah Izin</h1>
                </div>
                <div class="flex">
                    <div class="left flex flex-col gap-3 flex-[2] p-3 border-r border-indigo-600">
                        <span class=" text-[18px]">Hari Ini</span>
                        <span class=" text-[18px]">Bulan Ini</span>
                    </div>
                    <div class="right flex-[1] flex flex-col gap-3 p-3">
                        <span class="font-semibold text-[18px] hari-ini">{{ $data_yang_dikirim['data_hari_ini'] }}</span>
                        <span class="font-semibold text-[18px] bulan-ini">{{ $data_yang_dikirim['data_bulan_ini'] }}</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="bg-white shadow-xl rounded-lg px-5 py-6 w-[55%] flex items-center flex-col h-fit">
            <h1 class="text-dbklik text-3xl font-semibold">Jumlah Karyawan</h1>
            <canvas id="myChart" class="mt-5 !w-[70%] !h-[70%]"></canvas>
        </div> --}}
    </div>

    <script>
        $("select[name=cabang]").on("change", function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $("meta[name=csrf-token]").attr("content"),
                }
            })
            $.ajax({
                type: "POST",
                url: "/owner/tampil-jumlah-izin",
                data: {
                    id: $(this).val(),
                },
                beforeSend: function() {
                    $("span.hari-ini").html("Loading..");
                    $("span.bulan-ini").html("Loading..");
                },
                success: function(response) {
                    $("span.hari-ini").html(response.data_hari_ini);
                    $("span.bulan-ini").html(response.data_bulan_ini);
                },
            });
        });
    </script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}

    {{-- <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Divisi 1', 'Divisi 2', 'Divisi 3', 'Divisi 4', 'Divisi 5', 'Divisi 6'],
                datasets: [{
                    label: 'Jumlah Karyawan',
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 1,
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                }]
            },
            options: {}
        });
    </script> --}}
@endsection
