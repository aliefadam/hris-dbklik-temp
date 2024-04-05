<div
    class="overlay-catatan bg-[rgba(0,0,0,0.7)] fixed top-0 left-0 z-20 w-full h-screen hidden justify-center items-center">
    <div class="w-[40%] animate__animated animate__fadeInDown container-overlay-catatan">
        <div class="bg-dbklik px-4 py-3 flex justify-between items-center rounded-tl-lg rounded-tr-lg">
            <h1 class="text-yellow-dbklik text-lg font-semibold">Edit Catatan</h1>
            <i
                class="bi bi-x-lg text-yellow-dbklik cursor-pointer flex hover:bg-slate-300 hover:text-dbklik duration-200 rounded-full p-3 font-semibold btn-close-overlay-catatan"></i>
        </div>
        <div class="bg-gray-100 p-5 rounded-bl-lg rounded-br-lg">
            <form action="/hr/updateCatatan/" method="post" class="w-full flex flex-col gap-3">
                @csrf
                <input type="hidden" name="karyawan_id" value="{{ isset($karyawan->id) ? $karyawan->id : '' }}">
                <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                    <label for="catatan" class="text-dbklik">Catatan</label>
                    <textarea name="catatan" id="catatan" class="bg-transparent outline-none resize-none h-[150px]">{{ isset($karyawan->catatan) ? $karyawan->catatan : '' }}</textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-yellow-dbklik px-10 py-2 rounded-lg font-medium">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
