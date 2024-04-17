<div
    class="overlay-background overlay-tambah-jam bg-[rgba(0,0,0,0.7)] fixed top-0 left-0 z-20 w-full h-screen hidden justify-center items-center">
    <div class="w-[35%] animate__animated animate__fadeInDown container-overlay">
        <div class="bg-dbklik px-4 py-3 flex justify-between items-center rounded-tl-lg rounded-tr-lg">
            <h1 class="text-yellow-dbklik text-lg font-semibold">Tambah Jam</h1>
            <i
                class="bi bi-x-lg text-yellow-dbklik cursor-pointer flex hover:bg-slate-300 hover:text-dbklik duration-200 rounded-full p-3 font-semibold btn-close-overlay"></i>
        </div>
        <div class="bg-gray-100 p-5 rounded-bl-lg rounded-br-lg">
            <form action="/hr/tambahJam" class="w-full flex flex-col gap-3" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                    <label for="jam" class="text-dbklik">Jam</label>
                    <input required type="time" name="jam" id="jam" class="outline-none bg-transparent">
                </div>
                <div class="flex justify-end">
                    <button class="bg-yellow-dbklik px-10 py-2 rounded-lg font-medium">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
