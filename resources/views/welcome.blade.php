@extends('layouts.main')

@section('content')
    <div class="bg-white shadow-xl rounded-lg px-5 py-6 w-full md:w-[60%] flex flex-col md:flex-row gap-2">
        <div class="flex-1 flex justify-center">
            <div
                class="w-[150px] md:w-[250px] h-[150px] md:h-[250px] rounded-full shadow-[rgba(60,64,67,0.3)_0px_1px_2px_0px,rgba(60,64,67,0.15)_0px_1px_3px_1px]">
                @php $foto = $dataDiri["foto"] ?? "no_image.png" @endphp
                <img src="{{ asset("storage/upload/foto_user/$foto") }}" class="object-cover w-full h-full rounded-full">
            </div>
            {{-- <img src="{{ asset('imgs/profil.png') }}" class="w-[200px] h-[210px] drop-shadow-xl"> --}}
        </div>
        <div class="flex-1 justify-center flex flex-col gap-1 md:gap-0">
            <h1 class="leading-none text-center md:text-left text-[25px] md:text-[35px] font-semibold text-dbklik">
                {{ $dataDiri['nama'] }}</h1>
            <div class="mt-4 md:mt-4 flex flex-col gap-1">
                <span class="text-[12px] md:text-[13px] leading-none block text-dbklik">Divisi - Sub Divisi</span>
                <h1 class="leading-none text-yellow-dbklik drop-shadow-md font-medium text-[16px] md:text-lg">
                    {{ $dataDiri['divisi'] }}
                    -
                    {{ $dataDiri['sub_divisi'] }}</h1>
            </div>
            <div class="mt-1 md:mt-4 flex flex-col gap-1">
                <span class="text-[12px] md:text-[13px] leading-none block text-dbklik">Jabatan</span>
                <h1 class="leading-none text-yellow-dbklik drop-shadow-md font-medium text-[16px] md:text-lg">
                    {{ $dataDiri['jabatan'] }}
                </h1>
            </div>
            <div class="mt-1 md:mt-4 flex flex-col gap-1">
                <span class="text-[12px] md:text-[13px] leading-none block text-dbklik">Cabang</span>
                <h1 class="leading-none text-yellow-dbklik drop-shadow-md font-medium text-[16px] md:text-lg">
                    {{ $dataDiri['cabang'] }}
                </h1>
            </div>
        </div>
    </div>
    <div class="bg-white shadow-xl rounded-lg p-5 md:px-10 md:py-10 w-full mt-10">
        <h1 class="text-dbklik font-bold text-[20px] md:text-3xl text-center">Kehadiran Divisi {{ $dataDiri['divisi'] }}
        </h1>
        <div class="mt-3 md:mt-5 w-full flex gap-5 md:gap-10 overflow-x-scroll pb-1 md:pb-10 md:pt-5 px-2 kehadiran-list">
            @foreach ($kehadiran as $data)
                <div
                    class="min-w-[150px] md:min-w-[250px] rounded-lg border-t-2 shadow-[0px_1px_1px_rgba(3,7,18,0.02),0px_3px_3px_rgba(3,7,18,0.04),0px_6px_6px_rgba(3,7,18,0.06),0px_10px_10px_rgba(3,7,18,0.08),0px_16px_16px_rgba(3,7,18,0.10)] px-3 py-5 flex flex-col justify-center items-center">
                    @php $foto = $data["foto"] ?? "no_image.png" @endphp
                    <img class="w-[100px] md:w-[130px] h-[100px] md:h-[130px] object-cover rounded-full shadow-[rgba(60,64,67,0.3)_0px_1px_2px_0px,rgba(60,64,67,0.15)_0px_1px_3px_1px]"
                        src="{{ asset("storage/upload/foto_user/$foto") }}">
                    <span class="text-dbklik font-semibold md:text-2xl mt-3">{{ $data['nama'] }}</span>
                    <span
                        class="text-yellow-dbklik drop-shadow-lg italic leading-none font-medium text-[12px] md:text-sm">{{ $data['jabatan'] }}
                        {{ $data['sub_divisi'] != null ? '- ' . $data['sub_divisi'] : '' }}</span>
                    @if ($data['status'] == 'Hadir')
                        <span class="mt-2 md:mt-5 text-green-500 text-lg md:text-2xl font-bold drop-shadow-md">HADIR</span>
                    @else
                        <span class="mt-2 md:mt-5 text-red-500 text-lg md:text-2xl font-bold drop-shadow-md">TIDAK
                            HADIR</span>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
