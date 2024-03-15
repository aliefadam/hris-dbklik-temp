@extends('layouts.main')

@section('content')
    <div class="bg-white shadow-xl rounded-lg px-5 py-10 w-full">
        <div class="scroll flex justify-center items-center flex-col gap-10">
            @for ($i = $diatas_satu_level; $i <= 5; $i++)
                <div class="flex gap-10">
                    @php
                        $pegawaiPerJabatan = $data_pegawai->where('jabatan_id', $jabatan_id - ($jabatan_id - $i));
                        $jumlahPegawaiPerJabatan = $pegawaiPerJabatan->count();
                    @endphp
                    <!-- <hr class="bg-indigo-600 opacity-100 absolute h-[2px] w-[calc(100%-200px)] -top-[25px] left-[50%] -translate-x-[50%]"> -->
                    @foreach ($pegawaiPerJabatan as $index => $pegawai)
                        <div
                            class="relative w-[200px] struktur-item bg-transparent border-2 border-indigo-600 {{ $pegawai->id == auth()->user()->id ? 'bg-gradient-to-r from-dbklik to-indigo-600' : '' }} rounded-lg p-5 flex flex-col items-center shadow-xl">
                            <img src="{{ asset('imgs/profil.png') }}" class="w-[100px] drop-shadow-xl">
                            <span
                                class="text-indigo-600 {{ $pegawai->id == auth()->user()->id ? 'text-white' : '' }} font-medium mt-2 text-xl text-center">{{ $pegawai->nama_lengkap }}</span>
                            <span
                                class="italic text-[13px] leading-none {{ $pegawai->id == auth()->user()->id ? 'text-yellow-dbklik font-semibold' : 'font-semibold' }}">{{ $pegawai->jabatan->nama_jabatan }}
                                - {{ $pegawai->divisi->nama_divisi }}</span>
                            @if ($i != $diatas_satu_level && $loop->last -1)
                            
                                <div class="garis-menurun h-5 w-[calc(100%+40px)] border-b-transparent border-2 border-indigo-600 absolute -top-[20px] left-[50%]"></div>
                                <div class="garis-atas h-[22px] border border-indigo-600 absolute -top-[42px] translate-x-[120px]"></div>
                                
                            @endif
                            <!-- <div class="garis-menurun h-[40px] border border-indigo-600 absolute -top-[40px]"></div> -->
                            
                        </div>
                    @endforeach
                </div>
            @endfor

        </div>
    </div>
@endsection
