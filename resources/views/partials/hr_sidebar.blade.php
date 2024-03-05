<aside class="fixed top-0 left-0 shadow-lg w-[250px] h-screen bg-gradient-to-b to-indigo-600 from-dbklik from-60%">
    <div class="side-bar-header h-[64px] flex justify-between items-center px-[20px]">
        <div class="side-bar-title flex items-center gap-1">
            <img src="{{ asset('imgs/db-logo.png') }}" class="w-[25px]">
            <h1 class="font-bold text-xl leading-none text-white">HRIS DB KLIK</h1>
        </div>
        <i
            class="btn-hide-side bi bi-chevron-double-left text-yellow-dbklik hover:bg-[#f3f3f32d] flex p-2 rounded-full text-xl font-bold cursor-pointer"></i>
    </div>
    <div class="side-bar-item px-[10px] mt-[20px] flex flex-col gap-1">
        <a href="/hr/"
            class="duration-200 item flex items-center gap-2 py-[8px] px-[16px] {{ $title == 'Beranda' ? 'bg-white' : 'hover:bg-[#f3f3f32d]' }} rounded-lg">
            <i class="icon-item bi bi-house {{ $title == 'Beranda' ? 'text-dbklik' : 'text-white' }} text-[22px]"></i>
            <span
                class="{{ $title == 'Beranda' ? 'text-dbklik' : 'text-white' }} font-medium text-[16px] leading-none">Beranda</span>
        </a>
        <a href="/hr/form-perizinan"
            class="duration-200 item flex items-center gap-2 py-[8px] px-[16px] {{ $title == 'Perizinan' ? 'bg-white' : 'hover:bg-[#f3f3f32d]' }} rounded-lg">
            <i
                class="icon-item bi bi-clipboard-check {{ $title == 'Perizinan' ? 'text-dbklik' : 'text-white' }} text-[22px]"></i>
            <span
                class="{{ $title == 'Perizinan' ? 'text-dbklik' : 'text-white' }} font-medium text-[16px] leading-none">Perizinan</span>
        </a>
        <a href="/hr/riwayat"
            class="duration-200 item flex items-center gap-2 py-[8px] px-[16px] {{ $title == 'Riwayat' ? 'bg-white' : 'hover:bg-[#f3f3f32d]' }} rounded-lg">
            <i
                class="icon-item bi bi-clock-history {{ $title == 'Riwayat' ? 'text-dbklik' : 'text-white' }} text-[22px]"></i>
            <span
                class="{{ $title == 'Riwayat' ? 'text-dbklik' : 'text-white' }} font-medium text-[16px] leading-none">Riwayat</span>
        </a>
        <a href="/hr/daftar-pengajuan"
            class="duration-200 item flex items-center gap-2 py-[8px] px-[16px] {{ $title == 'Daftar Pengajuan' ? 'bg-white' : 'hover:bg-[#f3f3f32d]' }} rounded-lg">
            <i
                class="icon-item bi bi-list-task {{ $title == 'Daftar Pengajuan' ? 'text-dbklik' : 'text-white' }} text-[22px]"></i>
            <span
                class="{{ $title == 'Daftar Pengajuan' ? 'text-dbklik' : 'text-white' }} font-medium text-[16px] leading-none">Daftar
                Pengajuan</span>
        </a>
        <a href="/hr/daftar-karyawan"
            class="duration-200 item flex items-center gap-2 py-[8px] px-[16px] {{ $title == 'Daftar Karyawan' ? 'bg-white' : 'hover:bg-[#f3f3f32d]' }} rounded-lg">
            <i
                class="icon-item bi bi-people-fill {{ $title == 'Daftar Karyawan' ? 'text-dbklik' : 'text-white' }} text-[22px]"></i>
            <span
                class="{{ $title == 'Daftar Karyawan' ? 'text-dbklik' : 'text-white' }} font-medium text-[16px] leading-none">Daftar
                Karyawan</span>
        </a>
    </div>
</aside>
