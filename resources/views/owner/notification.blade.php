@extends('layouts.owner')

@section('content')
    <div class="bg-white rounded-xl shadow-xl w-[100%] h-[calc(100vh-148px)] flex">
        <div class="w-[60%] border-r overflow-auto notif-list relative">
            <div class="p-4 sticky bg-white top-0 left-0 border-b rounded-tl-xl">
                <h1>Semua Notifikasi</h1>
            </div>
            @for ($i = 0; $i < 10; $i++)
                <div class="">
                    <div class="flex items-center justify-between py-3 px-5 hover:bg-gray-100 cursor-pointer">
                        <div class="flex-2">
                            <h1 class="text-dbklik">Pengajuan Izin Diterima</h1>
                            <span
                                class="block text-[13px]">{{ substr('Selamat pengajuan izinmu telah disetujui', 0, 35) }}...</span>
                        </div>
                        <span class="text-sm text-primary flex-1 flex justify-end">{{ $i + 1 }} Hari Lalu</span>
                    </div>
                </div>
                <hr>
            @endfor
        </div>
        <div class="w-full border-l p-5">
            <div class="flex justify-between">
                <h1 class="text-dbklik text-2xl font-medium">Pengajuan Izin Diterima</h1>
                <span class="text-primary">13-05-2024</span>
            </div>
            <p class="mt-2 text-sm">Selamat Pengajuan izinmu telah disetujui</p>
            <div class="text-sm mt-4">
                <span>Balasan Admin: Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, magni.</span>
            </div>
        </div>
    </div>
@endsection
