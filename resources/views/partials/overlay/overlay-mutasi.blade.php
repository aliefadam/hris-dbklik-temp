<div
    class="overlay-background overlay-mutasi bg-[rgba(0,0,0,0.7)] fixed top-0 left-0 z-20 w-full h-screen hidden justify-center items-center">
    <div class="w-[40%] animate__animated animate__fadeInDown container-overlay">
        <div class="bg-dbklik px-4 py-3 flex justify-between items-center rounded-tl-lg rounded-tr-lg">
            <h1 class="text-yellow-dbklik text-lg font-semibold">Tambah Mutasi</h1>
            <i
                class="bi bi-x-lg text-yellow-dbklik cursor-pointer flex hover:bg-slate-300 hover:text-dbklik duration-200 rounded-full p-3 font-semibold btn-close-overlay"></i>
        </div>
        <div class="bg-gray-100 p-5 rounded-bl-lg rounded-br-lg">
            <form action="/hr/tambahMutasi" class="w-full flex flex-col gap-3" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="karyawan_id" name="karyawan_id"
                    value="{{ isset($karyawan->id) ? $karyawan->id : '' }}">
                <input type="hidden" name="tujuanString" value="">
                <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                    <label for="jenis_mutasi" class="text-dbklik">Jenis Mutasi</label>
                    <select name="jenis_mutasi" id="jenis_mutasi" class="outline-none bg-transparent">
                        <option value="pindah-jabatan">Pindah Jabatan</option>
                        <option value="pindah-cabang">Pindah Cabang</option>
                        <option value="pindah-divisi">Pindah Divisi</option>
                        <option value="pindah-sub-divisi">Pindah Sub Divisi</option>
                    </select>
                </div>
                <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                    <label for="awal" class="text-dbklik">Awal </label>
                    <input readonly type="text" name="awal" id="awal" class="outline-none bg-transparent"
                        value={{ isset($karyawan) ? $karyawan->jabatan->nama_jabatan : '' }}>
                </div>
                <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                    <label for="tujuan" class="text-dbklik">Tujuan</label>
                    <select name="tujuan" id="tujuan" class="outline-none bg-transparent">
                        @if (isset($jabatan))
                            @foreach ($jabatan as $jabatan)
                                <option value={{ $jabatan->id }}>{{ $jabatan->nama_jabatan }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                    <label for="surat_mutasi" class="text-dbklik">Surat Mutasi</label>
                    <input required type="file" name="surat_mutasi" id="surat_mutasi" class="outline-none">
                </div>
                <div class="flex justify-end">
                    <button class="bg-yellow-dbklik px-10 py-2 rounded-lg font-medium">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
