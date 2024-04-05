<div
    class="overlay-lembur bg-[rgba(0,0,0,0.7)] fixed top-0 left-0 z-20 w-full h-screen hidden justify-center items-center">
    <div class="w-[40%] animate__animated animate__fadeInDown container-overlay-lembur">
        <div class="bg-dbklik px-4 py-3 flex justify-between items-center rounded-tl-lg rounded-tr-lg">
            <h1 class="text-yellow-dbklik text-lg font-semibold">Tambah Lembur</h1>
            <i
                class="bi bi-x-lg text-yellow-dbklik cursor-pointer flex hover:bg-slate-300 hover:text-dbklik duration-200 rounded-full p-3 font-semibold btn-close-overlay-lembur"></i>
        </div>
        <div class="bg-gray-100 p-5 rounded-bl-lg rounded-br-lg">
            <form action="/hr/lembur" class="w-full flex flex-col gap-3" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="karyawan_id" name="karyawan_id"
                    value="{{ isset($karyawan->id) ? $karyawan->id : '' }}">
                <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md bg-transparent">
                    <label for="tanggal" class="text-dbklik font-medium">Tanggal <span class="text-red-500">
                            *</span></label>
                    <input required type="date" name="tanggal" id="tanggal" class="outline-none bg-transparent">
                </div>
                <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                    <label for="keperluan" class="text-dbklik">Keperluan<span class="text-red-500"> *</span></label>
                    <input required type="text" name="keperluan" id="keperluan" class="outline-none bg-transparent">
                </div>
                <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md bg-transparent">
                    <label for="jam_mulai" class="text-dbklik font-medium">Jam
                        Mulai<span class="text-red-500"> *</span></label>
                    <input required type="time" name="jam_mulai" id="jam_mulai" class="outline-none bg-transparent">
                </div>
                <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md bg-transparent">
                    <label for="jam_selesai" class="text-dbklik font-medium">Jam
                        Selesai<span class="text-red-500"> *</span></label>
                    <input required type="time" name="jam_selesai" id="jam_selesai"
                        class="outline-none bg-transparent">
                </div>
                <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                    <label for="catatan" class="text-dbklik">Catatan <span class="text-xs text-blue-950">(misal:
                            laporan hasil stock opname)</span></label>
                    <textarea name="catatan" id="catatan" class="bg-transparent outline-none resize-none h-[100px]"></textarea>
                </div>
                <div class="flex justify-end">
                    <button class="bg-yellow-dbklik px-10 py-2 rounded-lg font-medium">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
