@extends('layouts.main')

@section('content')
    <div class="w-full flex gap-4">
        <div class="flex-[1]">
            <div class="shadow-xl bg-white rounded-xl p-5 flex justify-center items-center h-fit relative">
                <div
                    class="w-[250px] h-[250px] rounded-full shadow-[rgba(60,64,67,0.3)_0px_1px_2px_0px,rgba(60,64,67,0.15)_0px_1px_3px_1px]">
                    @php $foto = $dataDiri["foto"] ?? "no_image.png" @endphp
                    <img src="{{ asset("storage/upload/foto_user/$foto") }}" class="object-cover w-full h-full rounded-full">
                </div>
            </div>
            <button
                class="btn-edit-image flex gap-2 justify-center duration-500 mt-4 bg-gradient-to-r from-dbklik to-indigo-600 w-full text-white py-[10px] px-3 rounded-lg"><i
                    class="bi bi-pencil-square"></i> Edit
                Foto Profil</button>
        </div>
        <div class="shadow-xl bg-white rounded-xl p-5 flex-[1.7]">
            <h1 class="text-dbklik text-3xl font-semibold text-center">Data Karyawan</h1>
            <div class="flex mt-5 gap-10">
                <div class="flex-[1] flex flex-col gap-4">
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">Nama</span>
                        <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">{{ $dataDiri['nama'] }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">Email</span>
                        <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">{{ $dataDiri['email'] }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">No Telephone</span>
                        <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">+62{{ $dataDiri['no_telephone'] }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">No Telephone Whatsapp</span>
                        <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">+62{{ $dataDiri['no_whatsapp'] }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">Alamat</span>
                        <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">{{ $dataDiri['alamat'] }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">Agama</span>
                        <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">{{ $dataDiri['agama'] }}</span>
                    </div>
                </div>
                <div class="flex-[1] flex flex-col gap-4">
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">Tanggal Mulai Kontrak</span>
                        <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">{{ $dataDiri['tanggal_mulai_kontrak'] }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">Tanggal Berakhir Kontrak</span>
                        <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">{{ $dataDiri['tanggal_akhir_kontrak'] }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">Nomor Rekening</span>
                        <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">{{ $dataDiri['no_rekening'] }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">Divisi - Sub Divisi</span>
                        <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">{{ $dataDiri['divisi'] }}
                            -
                            {{ $dataDiri['sub_divisi'] }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">Jabatan</span>
                        <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">{{ $dataDiri['jabatan'] }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-dbklik text-[14px]">Lokasi Kerja</span>
                        <span
                            class="text-yellow-dbklik drop-shadow-md text-lg leading-none font-medium">{{ $dataDiri['cabang'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
