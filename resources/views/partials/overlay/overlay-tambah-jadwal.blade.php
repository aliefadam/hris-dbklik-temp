<div
    class="overlay-background overlay-tambah-jadwal bg-[rgba(0,0,0,0.7)] fixed top-0 left-0 z-20 w-full h-screen hidden justify-center items-center">
    <div class="w-[35%] animate__animated animate__fadeInDown container-overlay">
        <div class="bg-dbklik px-4 py-3 flex justify-between items-center rounded-tl-lg rounded-tr-lg">
            <h1 class="text-yellow-dbklik text-lg font-semibold">Tambah Jadwal</h1>
            <i
                class="bi bi-x-lg text-yellow-dbklik cursor-pointer flex hover:bg-slate-300 hover:text-dbklik duration-200 rounded-full p-3 font-semibold btn-close-overlay"></i>
        </div>
        <div class="bg-gray-100 p-5 rounded-bl-lg rounded-br-lg">
            <form action="/hr/tambahJadwal" class="w-full flex flex-col gap-3" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                    <label for="karyawan" class="text-dbklik">Karyawan</label>
                    <input class="outline-none bg-transparent" name="karyawan" id="karyawan" type="text"
                        list="data-karyawan">
                    <datalist id="data-karyawan">
                        @if (isset($data_karyawan))
                            @foreach ($data_karyawan as $karyawan)
                                <option
                                    value="{{ $karyawan->nama_lengkap }} - {{ $karyawan->divisi->nama_divisi }} - {{ $karyawan->cabang->nama_cabang }}">
                                </option>
                            @endforeach
                        @endif
                    </datalist>
                    {{-- <select name="karyawan_id" id="karyawan_id" class="outline-none bg-transparent">
                        <option selected disabled>Pilih Karyawan</option>
                        @if (isset($data_karyawan))
                            @foreach ($data_karyawan as $karyawan)
                                <option value="{{ $karyawan->id }}">{{ $karyawan->nama_lengkap }} -
                                    <span class="font-bold">{{ $karyawan->divisi->nama_divisi }}</span> -
                                    <span class="italic">{{ $karyawan->cabang->nama_cabang }}</span>
                                </option>
                            @endforeach
                        @endif
                    </select> --}}
                </div>
                <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                    <label for="" class="text-dbklik">Periode Minggu</label>
                    <div class="flex w-full gap-1">
                        <input name="periode_awal" class="shadow-md p-2 border w-1/2 outline-none bg-transparent"
                            id="periode-awal" type="date">
                        <input name="periode_akhir" class="shadow-md p-2 border w-1/2 outline-none bg-transparent"
                            id="periode-akhir" type="date">
                    </div>
                </div>

                <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                    <label for="shift_id" class="text-dbklik">Shift</label>
                    <select name="shift_id" id="shift_id" class="outline-none bg-transparent">
                        <option selected disabled>Pilih Shift</option>
                        @if (isset($data_shift))
                            @foreach ($data_shift as $shift)
                                <option value={{ $shift->id }}>{{ $shift->shift }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="flex justify-end">
                    <button class="bg-yellow-dbklik px-10 py-2 rounded-lg font-medium">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
