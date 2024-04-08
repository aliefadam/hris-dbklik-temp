<div
    class="overlay-background overlay-kontrak bg-[rgba(0,0,0,0.7)] fixed top-0 left-0 z-20 w-full h-screen hidden justify-center items-center">
    <div class="w-[40%] animate__animated animate__fadeInDown container-overlay">
        <div class="bg-dbklik px-4 py-3 flex justify-between items-center rounded-tl-lg rounded-tr-lg">
            <h1 class="text-yellow-dbklik text-lg font-semibold">Perpanjang Kontrak</h1>
            <i
                class="bi bi-x-lg text-yellow-dbklik cursor-pointer flex hover:bg-slate-300 hover:text-dbklik duration-200 rounded-full p-3 font-semibold btn-close-overlay"></i>
        </div>
        <div class="bg-gray-100 p-5 rounded-bl-lg rounded-br-lg">
            <form action="/hr/updateKontrak" method="post" class="w-full flex flex-col gap-3"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="karyawan_id" id="karyawan_id"
                    value="{{ isset($karyawan->id) ? $karyawan->id : '' }}">
                <div class="flex flex-col gap-1 leading-none">
                    <span class="text-dbklik text-sm">Tanggal Berakhir Kontrak</span>
                    <span
                        class="tanggal_akhir_kontrak text-xl">{{ isset($karyawan->berakhir_kerja) ? Carbon\Carbon::parse($karyawan->berakhir_kerja)->format('d M Y') : '' }}</span>
                </div>
                <div class="flex flex-col gap-1 leading-none">
                    <span class="text-dbklik text-sm">Tanggal Akhir Kontrak Baru</span>
                    <input id="tanggal_akhir_kontrak_baru" name="tanggal_akhir_kontrak_baru"
                        class="font-medium tanggal_akhir_kontrak_baru text-xl bg-transparent" value="-">
                </div>
                <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                    <label for="durasi" class="text-dbklik">Durasi</label>
                    <select name="durasi" id="durasi" class="outline-none bg-transparent">
                        <option disabled selected>-- Pilih Durasi --</option>
                        <option value=3>3 Bulan</option>
                        <option value=6>6 Bulan</option>
                        <option value=12>12 Bulan</option>
                        <option value=tetap>Tetap</option>
                    </select>
                </div>
                <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                    <label for="file_surat" class="text-dbklik">File Surat</label>
                    <input type="file" name="file_surat" id="file_surat" class="outline-none">
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-yellow-dbklik px-10 py-2 rounded-lg font-medium">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
