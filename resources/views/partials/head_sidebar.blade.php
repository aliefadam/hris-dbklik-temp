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
        <a href="/head/"
            class="duration-200 item flex items-center gap-2 py-[8px] px-[16px] {{ $title == 'Beranda' ? 'bg-white' : 'hover:bg-[#f3f3f32d]' }} rounded-lg">
            <i class="icon-item bi bi-house {{ $title == 'Beranda' ? 'text-dbklik' : 'text-white' }} text-[22px]"></i>
            <span
                class="{{ $title == 'Beranda' ? 'text-dbklik' : 'text-white' }} font-medium text-[16px] leading-none">Beranda</span>
        </a>
        <a href="/head/form-perizinan"
            class="duration-200 item flex items-center gap-2 py-[8px] px-[16px] {{ $title == 'Perizinan' ? 'bg-white' : 'hover:bg-[#f3f3f32d]' }} rounded-lg">
            <i
                class="icon-item bi bi-clipboard-check {{ $title == 'Perizinan' ? 'text-dbklik' : 'text-white' }} text-[22px]"></i>
            <span
                class="{{ $title == 'Perizinan' ? 'text-dbklik' : 'text-white' }} font-medium text-[16px] leading-none">Perizinan</span>
        </a>
        <a href="/head/riwayat"
            class="duration-200 item flex items-center gap-2 py-[8px] px-[16px] {{ $title == 'Riwayat' ? 'bg-white' : 'hover:bg-[#f3f3f32d]' }} rounded-lg">
            <i
                class="icon-item bi bi-clock-history {{ $title == 'Riwayat' ? 'text-dbklik' : 'text-white' }} text-[22px]"></i>
            <span
                class="{{ $title == 'Riwayat' ? 'text-dbklik' : 'text-white' }} font-medium text-[16px] leading-none">Riwayat</span>
        </a>
        <a href="/head/daftar-pengajuan"
            class="duration-200 item flex items-center gap-2 py-[8px] px-[16px] {{ $title == 'Daftar Pengajuan' ? 'bg-white' : 'hover:bg-[#f3f3f32d]' }} rounded-lg">
            <i
                class="icon-item bi bi-list-task {{ $title == 'Daftar Pengajuan' ? 'text-dbklik' : 'text-white' }} text-[22px]"></i>
            <span
                class="{{ $title == 'Daftar Pengajuan' ? 'text-dbklik' : 'text-white' }} font-medium text-[16px] leading-none">Daftar
                Pengajuan</span>
        </a>
        <a href="/head/katering"
            class="duration-200 item flex flex-col md:flex-row lg:flex-row xl:flex-row items-center md:gap-2 lg:gap-2 xl:gap-2 py-[8px] px-[16px] {{ $title == 'Katering' ? 'bg-white' : 'hover:bg-[#f3f3f32d]' }} rounded-lg">
            <i
                class="icon-item fal fa-utensils  py-[5.5px] flex {{ $title == 'Katering' ? 'text-dbklik' : 'text-white' }} text-[22px]"></i>
            <span
                class="{{ $title == 'Katering' ? 'text-dbklik' : 'text-white' }} font-medium text-[9px] md:text-[16px] lg:text-[16px] xl:text-[16px] leading-none">Katering</span>
        </a>
        <a href="/head/pengisian-kpi"
            class="duration-200 item flex flex-col md:flex-row lg:flex-row xl:flex-row items-center md:gap-2 lg:gap-2 xl:gap-2 py-[8px] px-[16px] {{ $title == 'Penilaian KPI' ? 'bg-white' : 'hover:bg-[#f3f3f32d]' }} rounded-lg">
            <i
                class="icon-item fal fa-chart-line  py-[5.5px] flex {{ $title == 'Penilaian KPI' ? 'text-dbklik' : 'text-white' }} text-[22px]"></i>
            <span
                class="{{ $title == 'Penilaian KPI' ? 'text-dbklik' : 'text-white' }} font-medium text-[9px] md:text-[16px] lg:text-[16px] xl:text-[16px] leading-none">Penilaian
                KPI</span>
        </a>
        {{-- <a href="/head/pengisian-kpi"
            class="duration-200 item flex items-center gap-2 py-[8px] px-[16px] {{ $title == 'Penilaian KPI' ? 'bg-white' : 'hover:bg-[#f3f3f32d]' }} rounded-lg">
            <i
                class="icon-item fal fa-chart-line {{ $title == 'Penilaian KPI' ? 'text-dbklik' : 'text-white' }} text-[22px]"></i>
            <span
                class="{{ $title == 'Penilaian KPI' ? 'text-dbklik' : 'text-white' }} font-medium text-[16px] leading-none">Penilaian
                KPI</span>
        </a> --}}
        <a href="/head/struktur-pegawai"
            class="duration-200 item flex items-center gap-2 py-[8px] px-[16px] {{ $title == 'Struktur Pegawai' ? 'bg-white' : 'hover:bg-[#f3f3f32d]' }} rounded-lg">
            <i
                class="icon-item bi bi-diagram-3 {{ $title == 'Struktur Pegawai' ? 'text-dbklik' : 'text-white' }} text-[22px]"></i>
            <span
                class="{{ $title == 'Struktur Pegawai' ? 'text-dbklik' : 'text-white' }} font-medium text-[16px] leading-none">Struktur
                Pegawai</span>
        </a>
    </div>
</aside>
