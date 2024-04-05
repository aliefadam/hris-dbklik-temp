@if (isset($karyawan))
    <div
        class="overlay-edit-profile bg-[rgba(0,0,0,0.7)] fixed top-0 left-0 z-20 w-full h-screen hidden justify-center items-center">
        <div class="w-[50%] animate__animated animate__fadeInDown container-overlay-edit-profile">
            <div class="bg-dbklik px-4 py-3 flex justify-between items-center rounded-tl-lg rounded-tr-lg">
                <h1 class="text-yellow-dbklik text-lg font-semibold">Edit Profile Karyawan</h1>
                <i
                    class="bi bi-x-lg text-yellow-dbklik cursor-pointer flex hover:bg-slate-300 hover:text-dbklik duration-200 rounded-full p-3 font-semibold btn-close-overlay-edit-profile"></i>
            </div>
            <div class="bg-gray-100 p-5 rounded-bl-lg rounded-br-lg h-[50vh] overflow-auto form-edit-profile">
                <form action="/hr/edit-profile-karyawan/{{ $karyawan->id }}" class="w-full" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="flex gap-3 w-full">
                        <div class="flex flex-col gap-3 w-full">
                            <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                                <label for="email" class="text-dbklik">Email</label>
                                <input type="text" name="email" id="email"
                                    class="outline-none bg-transparent h-[26px]" value="{{ $karyawan->email }}">
                            </div>
                            <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                                <label for="alamat_domisili" class="text-dbklik">Alamat Domisili</label>
                                <input type="text" name="alamat_domisili" id="alamat_domisili"
                                    class="outline-none bg-transparent h-[26px]"
                                    value="{{ $karyawan->alamat_domisili }}">
                            </div>
                            <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                                <label for="no_telephone" class="text-dbklik">No Telephone</label>
                                <input type="text" name="no_telephone" id="no_telephone"
                                    class="outline-none bg-transparent h-[26px]" value="{{ $karyawan->no_telephone }}">
                            </div>
                            <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                                <label for="no_whatsapp" class="text-dbklik">No Whatsapp</label>
                                <input type="text" name="no_whatsapp" id="no_whatsapp"
                                    class="outline-none bg-transparent h-[26px]" value="{{ $karyawan->no_whatsapp }}">
                            </div>
                            <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                                <label for="status_pernikahan" class="text-dbklik">Status Menikah</label>
                                <select name="status_pernikahan" id="status_pernikahan"
                                    class="outline-none bg-transparent h-[26px]">
                                    <option {{ $karyawan->status_pernikahan == 'Belum Menikah' ? 'selected' : '' }}
                                        value="Belum Menikah">Belum Menikah</option>
                                    <option {{ $karyawan->status_pernikahan == 'Sudah Menikah' ? 'selected' : '' }}
                                        value="Sudah Menikah">Sudah Menikah</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                                <label for="no_bpjs_kes" class="text-dbklik">No BPJS Kesehatan</label>
                                <input type="text" name="no_bpjs_kes" id="no_bpjs_kes"
                                    class="outline-none bg-transparent h-[26px]" value="{{ $karyawan->no_bpjs_kes }}">
                            </div>
                            <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                                <label for="no_bpjs_ktk" class="text-dbklik">No BPJS Ketenagakerjaan</label>
                                <input type="text" name="no_bpjs_ktk" id="no_bpjs_ktk"
                                    class="outline-none bg-transparent h-[26px]" value="{{ $karyawan->no_bpjs_ktk }}">
                            </div>
                            <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                                <label for="kontak_darurat" class="text-dbklik">Kontak Darurat</label>
                                <input type="text" name="kontak_darurat" id="kontak_darurat"
                                    class="outline-none bg-transparent h-[26px]"
                                    value="{{ $karyawan->kontak_darurat }}">
                            </div>
                            <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                                <label for="inventaris_kantor" class="text-dbklik">Inventaris Kantor</label>
                                <input type="text" name="inventaris_kantor" id="inventaris_kantor"
                                    class="outline-none bg-transparent h-[26px]"
                                    value="{{ $karyawan->inventaris_kantor }}">
                            </div>
                        </div>
                        <div class="flex flex-col gap-3 w-full">
                            <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                                <label for="cv_file" class="text-dbklik">CV</label>
                                <input type="file" name="cv_file" id="cv_file"
                                    class="outline-none text-sm file:text-sm h-[26px]"
                                    value="{{ asset('storage/upload/file_pendukung/1_2024-03-17_00-49-39.pdf') }}">
                            </div>
                            <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                                <label for="ksk_file" class="text-dbklik">KSK</label>
                                <input type="file" name="ksk_file" id="ksk_file"
                                    class="outline-none text-sm file:text-sm h-[26px]">
                            </div>
                            <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                                <label for="ijazah_file" class="text-dbklik">Ijazah</label>
                                <input type="file" name="ijazah_file" id="ijazah_file"
                                    class="outline-none text-sm file:text-sm h-[26px]">
                            </div>
                            <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                                <label for="transkrip_nilai_file" class="text-dbklik">Transkrip Nilai</label>
                                <input type="file" name="transkrip_nilai_file" id="transkrip_nilai_file"
                                    class="outline-none text-sm file:text-sm h-[26px]">
                            </div>
                            <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                                <label for="ktp_file" class="text-dbklik">KTP</label>
                                <input type="file" name="ktp_file" id="ktp_file"
                                    class="outline-none text-sm file:text-sm h-[26px]">
                            </div>
                            <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                                <label for="bpjs_ktk_file" class="text-dbklik">BPJS Ketenagakerjaan</label>
                                <input type="file" name="bpjs_ktk_file" id="bpjs_ktk_file"
                                    class="outline-none text-sm file:text-sm h-[26px]">
                            </div>
                            <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                                <label for="bpjs_kes_file" class="text-dbklik">BPJS Kesehatan</label>
                                <input type="file" name="bpjs_kes_file" id="bpjs_kes_file"
                                    class="outline-none text-sm file:text-sm h-[26px]">
                            </div>
                            <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                                <label for="referensi_kerja_file" class="text-dbklik">Surat Referensi Kerja</label>
                                <input type="file" name="referensi_kerja_file" id="referensi_kerja_file"
                                    class="outline-none text-sm file:text-sm h-[26px]">
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end mt-3">
                        <button class="bg-yellow-dbklik px-10 py-2 rounded-lg font-medium">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
