@extends('layouts.head')

@section('content')
    <div class="bg-white shadow-xl rounded-lg px-5 py-6 w-[60%] flex gap-2">
        <div class="flex-1 flex justify-center">
            <div
                class="w-[250px] h-[250px] rounded-full shadow-[rgba(60,64,67,0.3)_0px_1px_2px_0px,rgba(60,64,67,0.15)_0px_1px_3px_1px]">
                @php $foto = $dataDiri["foto"] ?? "no_image.png" @endphp
                <img src="{{ asset("storage/upload/foto_user/$foto") }}" class="object-cover w-full h-full rounded-full">
            </div>
        </div>
        <div class="flex-1 justify-center flex flex-col">
            <h1 class="leading-none text-[35px] font-semibold text-dbklik">{{ $dataDiri['nama'] }}</h1>
            <div class="mt-4 flex flex-col gap-1">
                <span class="text-[13px] leading-none block text-dbklik">Divisi - Sub Divisi</span>
                <h1 class="leading-none text-yellow-dbklik drop-shadow-md font-medium text-lg">{{ $dataDiri['divisi'] }}
                    {{ $dataDiri['sub_divisi'] != null ? '- ' . $dataDiri['sub_divisi'] : '' }}</h1>
            </div>
            <div class="mt-4 flex flex-col gap-1">
                <span class="text-[13px] leading-none block text-dbklik">Jabatan</span>
                <h1 class="leading-none text-yellow-dbklik drop-shadow-md font-medium text-lg">{{ $dataDiri['jabatan'] }}
                </h1>
            </div>
            <div class="mt-4 flex flex-col gap-1">
                <span class="text-[13px] leading-none block text-dbklik">Cabang</span>
                <h1 class="leading-none text-yellow-dbklik drop-shadow-md font-medium text-lg">{{ $dataDiri['cabang'] }}
                </h1>
            </div>
        </div>
    </div>
    <div class="bg-white shadow-xl rounded-lg px-10 py-10 w-full mt-10">
        <h1 class="text-dbklik font-bold text-3xl text-center">Kehadiran Divisi {{ $dataDiri['divisi'] }}</h1>
        <div class="mt-5 w-full flex gap-10 overflow-x-scroll pb-10 pt-5 px-2 kehadiran-list">
            @foreach ($kehadiran as $data)
                <div
                    class="min-w-[250px] rounded-lg border-t-2 shadow-[0px_1px_1px_rgba(3,7,18,0.02),0px_3px_3px_rgba(3,7,18,0.04),0px_6px_6px_rgba(3,7,18,0.06),0px_10px_10px_rgba(3,7,18,0.08),0px_16px_16px_rgba(3,7,18,0.10)] px-3 py-5 flex flex-col justify-center items-center">
                    @php $foto = $data["foto"] ?? "no_image.png" @endphp
                    <img class="w-[130px] h-[130px] object-cover rounded-full shadow-[rgba(60,64,67,0.3)_0px_1px_2px_0px,rgba(60,64,67,0.15)_0px_1px_3px_1px]"
                        src="{{ asset("storage/upload/foto_user/$foto") }}">
                    <span class="text-dbklik font-semibold text-2xl mt-3">{{ $data['nama'] }}</span>
                    <span
                        class="text-yellow-dbklik drop-shadow-lg italic leading-none font-medium text-sm">{{ $data['jabatan'] }}
                        {{ $data['sub_divisi'] != null ? '- ' . $data['sub_divisi'] : '' }}</span>
                    @if ($data['status'] == 'Hadir')
                        <span class="mt-5 text-green-500 text-2xl font-bold drop-shadow-md">HADIR</span>
                    @else
                        <span class="mt-5 text-red-500 text-2xl font-bold drop-shadow-md">TIDAK HADIR</span>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
