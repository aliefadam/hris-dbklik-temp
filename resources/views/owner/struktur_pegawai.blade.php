@extends('layouts.owner')

@section('content')
    
    <div class="bg-white shadow-xl rounded-lg px-5 py-10 w-full flex flex-col">

        <div class="scroll flex justify-center items-center flex-col">

            @php
                $owner = $data_pegawai->where('jabatan_id', $jabatan_id);
            @endphp
            @foreach ($owner as $index => $own)

                <div
                    class="relative w-[200px] struktur-item bg-transparent border-2 border-indigo-600 {{ $own->id == auth()->user()->id ? 'bg-gradient-to-r from-dbklik to-indigo-600' : '' }} rounded-lg p-5 flex flex-col items-center shadow-xl">
                    <img src="{{ asset('imgs/profil.png') }}" class="w-[100px] drop-shadow-xl">
                    <span
                        class="text-indigo-600 {{ $own->id == auth()->user()->id ? 'text-white' : '' }} font-medium mt-2 text-xl text-center">{{ $own->nama_lengkap }}</span>
                    <span
                        class="italic text-[13px] leading-none {{ $own->id == auth()->user()->id ? 'text-yellow-dbklik font-semibold' : 'font-semibold' }}">{{ $own->jabatan->nama_jabatan }}
                    </span>
                </div>
                        
            @endforeach

            {{-- untuk manager tiap divisi --}}
            @php
                $managers = $data_pegawai->where('jabatan_id', $jabatan_id + 1 );
            @endphp
                
            <ul class="flex flex-row mt-10 justify-center">
                
                <div class="-mt-10 border-l-2 absolute h-10 border-indigo-600"></div>

                @foreach ($managers as $index => $manager)

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
                            <div class="text-center content-center">

                                <div
                                        class="relative m-auto w-[200px] struktur-item bg-transparent border-2 border-indigo-600 {{ $manager->id == auth()->user()->id ? 'bg-gradient-to-r from-dbklik to-indigo-600' : '' }} rounded-lg p-5 flex flex-col items-center shadow-xl">
                                    <img src="{{ asset('imgs/profil.png') }}" class="w-[100px] drop-shadow-xl">
                                    <span
                                        class="text-indigo-600 {{ $manager->id == auth()->user()->id ? 'text-white' : '' }} font-medium mt-2 text-xl text-center">{{ $manager->nama_lengkap }}</span>
                                    <span
                                        class="italic text-[13px] leading-none {{ $manager->id == auth()->user()->id ? 'text-yellow-dbklik font-semibold' : 'font-semibold' }}">{{ $manager->jabatan->nama_jabatan }}
                                        - {{ $manager->divisi->nama_divisi }}</span>
                                </div>


                                @php
                                    $heads = $data_pegawai  ->where('jabatan_id', $jabatan_id + 2 )
                                                            ->where('divisi_id', $manager->divisi->id);
                                @endphp

                                @if(!$heads->isEmpty())
                                    <ul class="flex flex-row mt-10 justify-center">
                                        {{-- untuk head tiap sub-divisi --}}
                                        <div class="-mt-10 border-l-2 absolute h-10 border-indigo-600"></div>

                                        @foreach ($heads as $index => $head)

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
                                                    <div class="text-center">

                                                        <div
                                                            class="relative w-[200px] struktur-item bg-transparent border-2 border-indigo-600 {{ $head->id == auth()->user()->id ? 'bg-gradient-to-r from-dbklik to-indigo-600' : '' }} rounded-lg p-5 flex flex-col items-center shadow-xl">
                                                            <img src="{{ asset('imgs/profil.png') }}" class="w-[100px] drop-shadow-xl">
                                                            <span
                                                                class="text-indigo-600 {{ $head->id == auth()->user()->id ? 'text-white' : '' }} font-medium mt-2 text-xl text-center">{{ $head->nama_lengkap }}</span>
                                                            <span
                                                                class="italic text-[13px] leading-none {{ $head->id == auth()->user()->id ? 'text-yellow-dbklik font-semibold' : 'font-semibold' }}">{{ $head->jabatan->nama_jabatan }}
                                                                - {{ $head->divisi->nama_divisi }}</span>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </li>

                                        @endforeach

                                    </ul>

                                @endif

                                
                            </div>
                            
                            
                        </div>

                    </li>

                @endforeach

            </ul>
                
        </div>

    </div>
@endsection