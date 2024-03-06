@extends('layouts.hr')

@section('content')
    <div class="bg-white shadow-xl rounded-lg px-5 py-10 w-full">
        <div class="scroll flex justify-center items-center flex-col gap-10">
            <div class="direktur">
                <div
                    class="relative w-[200px] struktur-item bg-transparent border-2 border-indigo-600 rounded-lg p-5 flex flex-col items-center shadow-xl">
                    <img src="{{ asset('imgs/profil.png') }}" class="w-[100px] drop-shadow-xl">
                    <span class="text-indigo-600 font-medium mt-2 text-xl text-center">John Mayer</span>
                    <span class="italic text-[13px] leading-none">Direktur</span>
                    <div class="garis-menurun h-[20px] border border-indigo-600 absolute -bottom-[20px]"></div>
                    <div class="garis-kesamping w-[123%] border border-indigo-600 absolute -bottom-[20px]"></div>
                </div>
            </div>
            <div class="manager flex gap-10">
                <div
                    class="relative struktur-item w-[200px] bg-transparent border-2 border-indigo-600 rounded-lg p-5 flex flex-col items-center shadow-xl">
                    <img src="{{ asset('imgs/profil.png') }}" class="w-[100px] drop-shadow-xl">
                    <span class="text-indigo-600 font-medium mt-3 text-xl text-center leading-none">John Mayer</span>
                    <span class="text-black italic text-[13px] leading-none mt-1">Manager</span>
                    <div class="garis-naik h-[25px] border border-indigo-600 absolute -top-[25px]"></div>
                </div>
                <div
                    class="relative struktur-item w-[200px] bg-transparent border-2 border-indigo-600 bg-gradient-to-r from-dbklik to-indigo-600 rounded-lg p-5 flex flex-col items-center shadow-xl">
                    <img src="{{ asset('imgs/profil.png') }}" class="w-[100px] drop-shadow-xl">
                    <span class="text-white font-medium mt-3 text-xl text-center leading-none">John Mayer</span>
                    <span class="text-yellow-dbklik font-semibold italic text-[13px] leading-none mt-1">Manager</span>
                    <div class="garis-naik h-[25px] border border-indigo-600 absolute -top-[25px]"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
