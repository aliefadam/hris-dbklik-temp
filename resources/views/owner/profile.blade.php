@extends('layouts.owner')

@section('content')
    <div class="w-full flex gap-4">
        <div class="flex-[1]">
            <div class="shadow-xl bg-white rounded-xl p-5 flex justify-center items-center h-fit">
                <img src="{{ asset('imgs/profil.png') }}" class="w-[200px] h-[210px] drop-shadow-xl">
            </div>
            <button
                class="flex gap-2 justify-center duration-500 mt-4 bg-gradient-to-r from-dbklik to-indigo-600 w-full text-white py-[10px] px-3 rounded-lg"><i
                    class="bi bi-pencil-square"></i> Edit
                Profil</button>
        </div>
        <div class="shadow-xl bg-white rounded-xl p-5 flex-[1.7]">
            <h1 class="text-dbklik text-3xl font-semibold text-center">Data Karyawan</h1>
            <div class="flex mt-5 gap-10">
                <div class="flex-[1] flex flex-col gap-4 ">
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">Nama</span>
                        <span class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">Alief Sya'arah
                            Adam</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">Email</span>
                        <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">aliefadam6@gmail.com</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">No Telephone</span>
                        <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">+62895364718840</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">No Telephone Whatsapp</span>
                        <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">+62895364718840</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">Alamat</span>
                        <span class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">JL. Bandarejo
                            Candi
                            3 No. 11 RT 11
                            RW 05, Sememi, Benowo, Surabaya.</span>
                    </div>
                </div>
                <div class="flex-[1] flex flex-col gap-3 ">
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">Tanggal Mulai Kontrak</span>
                        <span class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">26 Januari
                            2024</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">Tanggal Berakhir Kontrak</span>
                        <span class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">06 Mei 2024</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">Nomor Rekening</span>
                        <span class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">12345678</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">Divisi - Sub Divisi</span>
                        <span class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">IT -
                            Developer</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">Jabatan</span>
                        <span class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">Intern</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">Lokasi Kerja</span>
                        <span class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">Tenggilis</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
