@extends('layouts.main')

@section('content')
    
    <div class="bg-white shadow-xl rounded-lg px-5 py-10 w-full flex flex-col">

        <div class="scroll flex justify-center items-center flex-col">

            @for ($i = $diatas_satu_level; $i <= 5; $i++)
                
                @php
                    $pegawaiPerJabatan = $data_pegawai->where('jabatan_id', $jabatan_id - ($jabatan_id - $i));
                    $jumlahPegawaiPerJabatan = $pegawaiPerJabatan->count();
                @endphp

                @if ($i == $diatas_satu_level)

                    @foreach ($pegawaiPerJabatan as $index => $pegawai)

                        <div
                            class="relative w-[200px] struktur-item bg-transparent border-2 border-indigo-600 {{ $pegawai->id == auth()->user()->id ? 'bg-gradient-to-r from-dbklik to-indigo-600' : '' }} rounded-lg p-5 flex flex-col items-center shadow-xl">
                            <img src="{{ asset('imgs/profil.png') }}" class="w-[100px] drop-shadow-xl">
                            <span
                                class="text-indigo-600 {{ $pegawai->id == auth()->user()->id ? 'text-white' : '' }} font-medium mt-2 text-xl text-center">{{ $pegawai->nama_lengkap }}</span>
                            <span
                                class="italic text-[13px] leading-none {{ $pegawai->id == auth()->user()->id ? 'text-yellow-dbklik font-semibold' : 'font-semibold' }}">{{ $pegawai->jabatan->nama_jabatan }}
                                - {{ $pegawai->divisi->nama_divisi }}</span>
                        </div>
                        
                    @endforeach
                    @continue

                @endif
                
                <ul class="flex flex-row mt-10 justify-center">
                    
                    <div class="-mt-10 border-l-2 absolute h-10 border-indigo-600"></div>
                    @foreach ($pegawaiPerJabatan as $index => $pegawai)
                        <li class="relative pt-6 px-6">
                            @if (!$loop->first && !$loop->last)
                                <div class="border-t-2 w-[100%] absolute h-8 border-indigo-600 top-0 left-0 right-0"></div>
                            @elseif ($loop->count > 1)
                                @if ($loop->last)
                                    <div class="border-t-2 w-[50%] absolute h-8 border-indigo-600 top-0 right-[50%]"></div>
                                @else
                                    <div class="border-t-2 w-[50%] absolute h-8 border-indigo-600 top-0 left-[50%]"></div>
                                @endif
                            @endif
                            <div class="relative flex justify-center">
                                <div class="-mt-6 border-l-2 absolute h-6 border-indigo-600 top-0"></div>
                                <div
                                    class="relative w-[200px] struktur-item bg-transparent border-2 border-indigo-600 {{ $pegawai->id == auth()->user()->id ? 'bg-gradient-to-r from-dbklik to-indigo-600' : '' }} rounded-lg p-5 flex flex-col items-center shadow-xl">
                                    <img src="{{ asset('imgs/profil.png') }}" class="w-[100px] drop-shadow-xl">
                                    <span
                                        class="text-indigo-600 {{ $pegawai->id == auth()->user()->id ? 'text-white' : '' }} font-medium mt-2 text-xl text-center">{{ $pegawai->nama_lengkap }}</span>
                                    <span
                                        class="italic text-[13px] leading-none {{ $pegawai->id == auth()->user()->id ? 'text-yellow-dbklik font-semibold' : 'font-semibold' }}">{{ $pegawai->jabatan->nama_jabatan }}
                                        - {{ $pegawai->divisi->nama_divisi }}</span>
                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>
            @endfor
        </div>

    </div>
@endsection
