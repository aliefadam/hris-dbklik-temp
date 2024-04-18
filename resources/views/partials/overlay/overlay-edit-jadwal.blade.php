<div
    class="overlay-background overlay-edit-shift bg-[rgba(0,0,0,0.7)] fixed top-0 left-0 z-20 w-full h-screen hidden justify-center items-center">
    <div class="w-[35%] animate__animated animate__fadeInDown container-overlay">
        <div class="bg-dbklik px-4 py-3 flex justify-between items-center rounded-tl-lg rounded-tr-lg">
            <h1 class="text-yellow-dbklik text-lg font-semibold">Edit Shift</h1>
            <i
                class="bi bi-x-lg text-yellow-dbklik cursor-pointer flex hover:bg-slate-300 hover:text-dbklik duration-200 rounded-full p-3 font-semibold btn-close-overlay"></i>
        </div>
        <div class="bg-gray-100 p-5 rounded-bl-lg rounded-br-lg">
            <form action="/hr/editShift" class="w-full flex flex-col gap-3" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                    <label for="shift" class="text-dbklik">Shift</label>
                    <input required type="text" name="shift" id="shift" class="outline-none bg-transparent">
                </div>
                <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                    <label for="jam_mulai" class="text-dbklik">Jam Mulai</label>
                    <select name="jam_mulai" id="jam_mulai" class="outline-none bg-transparent">
                        <option selected disabled>Pilih jam</option>
                        @if (isset($data_jam))
                            @foreach ($data_jam as $jam)
                                <option value={{ $jam->id }}>{{ $jam->jam }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                    <label for="jam_akhir" class="text-dbklik">Jam Akhir</label>
                    <select name="jam_akhir" id="jam_akhir" class="outline-none bg-transparent">
                        <option selected disabled>Pilih jam</option>
                        @if (isset($data_jam))
                            @foreach ($data_jam as $jam)
                                <option value={{ $jam->id }}>{{ $jam->jam }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="flex justify-end">
                    <button class="bg-yellow-dbklik px-10 py-2 rounded-lg font-medium">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
