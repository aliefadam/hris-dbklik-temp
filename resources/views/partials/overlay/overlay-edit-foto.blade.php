<div
    class="overlay-edit-foto bg-[rgba(0,0,0,0.7)] fixed top-0 left-0 z-20 w-full h-screen hidden justify-center items-center">
    <div class="w-[30%] animate__animated animate__fadeInDown container-overlay-edit-foto">
        <div class="bg-dbklik px-4 py-3 flex justify-between items-center rounded-tl-lg rounded-tr-lg">
            <h1 class="text-yellow-dbklik text-lg font-semibold">Edit Foto</h1>
            <i
                class="bi bi-x-lg text-yellow-dbklik cursor-pointer flex hover:bg-slate-300 hover:text-dbklik duration-200 rounded-full p-3 font-semibold btn-close-overlay-edit-foto"></i>
        </div>
        <div class="bg-gray-100 p-5 rounded-bl-lg rounded-br-lg">
            <form action="/edit-foto" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                    <input type="file" accept="image/*" name="edit_foto" id="edit_foto"
                        class="outline-none bg-transparent">
                </div>
                <div class="after-select hidden">
                    <div class="mt-3 flex justify-center">
                        <div class="w-[250px] h-[250px] rounded-full shadow-lg">
                            <img src="{{ asset('imgs/profil.png') }}"
                                class="object-cover w-full h-full foto-preview rounded-full">
                        </div>
                    </div>
                    <div class="mt-5">
                        <button class="bg-yellow-dbklik px-10 py-3 rounded-lg font-medium w-full"><i
                                class="bi bi-floppy"></i>
                            Simpan Foto</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
