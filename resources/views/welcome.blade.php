@extends('layouts.main')

@section('content')
    <div class="bg-white shadow-xl rounded-lg px-5 py-6 w-[60%] flex gap-2">
        <div class="flex-1 flex justify-center">
            <img src="{{ asset('imgs/profil.png') }}" class="w-[200px] h-[210px] drop-shadow-xl">
        </div>
        <div class="flex-1 justify-center flex flex-col">
            <h1 class="leading-none text-[35px] font-semibold text-dbklik">Alief Adam</h1>
            <div class="mt-4 flex flex-col gap-1">
                <span class="text-[13px] leading-none block text-dbklik">Divisi - Sub Divisi</span>
                <h1 class="leading-none text-yellow-dbklik font-medium text-lg">IT - Developer</h1>
            </div>
            <div class="mt-4 flex flex-col gap-1">
                <span class="text-[13px] leading-none block text-dbklik">Jabatan</span>
                <h1 class="leading-none text-yellow-dbklik font-medium text-lg">Intern</h1>
            </div>
            <div class="mt-4 flex flex-col gap-1">
                <span class="text-[13px] leading-none block text-dbklik">Cabang</span>
                <h1 class="leading-none text-yellow-dbklik font-medium text-lg">Surabaya - Tenggilis</h1>
            </div>
        </div>
    </div>
@endsection
