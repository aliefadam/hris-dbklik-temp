@extends('layouts.hr')

@section('content')
    <div class="bg-white shadow-xl rounded-lg px-5 py-6 w-[60%] flex gap-2">
        <div class="flex-1 flex justify-center">
            <img src="{{ asset('imgs/profil.png') }}" class="w-[200px] h-[210px] drop-shadow-xl">
        </div>
        <div class="flex-1 justify-center flex flex-col">
            <h1 class="leading-none text-[35px] font-semibold text-dbklik">{{ $dataDiri['nama'] }}</h1>
            <div class="mt-4 flex flex-col gap-1">
                <span class="text-[13px] leading-none block text-dbklik">Divisi - Sub Divisi</span>
                <h1 class="leading-none text-yellow-dbklik drop-shadow-md font-medium text-lg">{{ $dataDiri['divisi'] }}
                    -
                    {{ $dataDiri['sub_divisi'] }}</h1>
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
        <h1 class="text-dbklik font-bold text-3xl text-center">Kehadiran</h1>
        <div class="mt-5 w-full flex gap-10 overflow-x-scroll pb-10 pt-5 px-2 kehadiran-list">
            @foreach ($kehadiran as $data)
                <div
                    class="min-w-[250px] rounded-lg shadow-[0_0_10px_2px_rgba(0,0,0,0.2)] px-3 py-5 flex flex-col justify-center items-center">
                    <img class="w-[130px] drop-shadow-xl" src="{{ asset('imgs/kehadiran-1.png') }}">
                    <span class="text-dbklik font-semibold text-2xl mt-3">{{ $data['nama'] }}</span>
                    <span class="text-yellow-dbklik drop-shadow-lg italic leading-none font-medium text-sm">{{ $data['sub_divisi'] }}</span>
                    @if ($data['status']=="Hadir")
                        <span class="mt-5 text-green-500 text-2xl font-bold drop-shadow-md">HADIR</span>
                    @else            
                        <span class="mt-5 text-red-500 text-2xl font-bold drop-shadow-md">TIDAK HADIR</span>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
