<div
    class="overlay-background overlay-hapus-shift bg-[rgba(0,0,0,0.7)] fixed top-0 left-0 z-20 w-full h-screen hidden justify-center items-center">
    <div class="w-[35%] animate__animated animate__fadeInDown container-overlay">
        <div class="bg-dbklik px-4 py-3 flex justify-between items-center rounded-tl-lg rounded-tr-lg">
            <h1 class="text-yellow-dbklik text-lg font-semibold">Konfirmasi Hapus Shift</h1>
            <i
                class="bi bi-x-lg text-yellow-dbklik cursor-pointer flex hover:bg-slate-300 hover:text-dbklik duration-200 rounded-full p-3 font-semibold btn-close-overlay"></i>
        </div>
        <div class="bg-gray-100 p-5 rounded-bl-lg rounded-br-lg">
            <form action="/hr/hapusJam" class="w-full flex flex-col gap-3" method="post" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <p>Apakah yakin ingin menghapus shift ini?</p>
                <div class="flex justify-end mt-4">
                    <div class="flex gap-2">
                        <button type="button"
                            class="btn-close-overlay bg-red-600 text-white px-10 py-2 rounded-lg">Batal</button>
                        <button class="bg-green-600 px-10 py-2 rounded-lg text-white">Ya, Hapus!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
