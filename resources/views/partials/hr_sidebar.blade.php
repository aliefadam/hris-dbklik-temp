<aside
    class="fixed top-0 left-0 shadow-lg w-[250px] h-screen bg-gradient-to-b to-indigo-600 from-dbklik from-60% overflow-y-scroll">
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
        <a href=""
            class="dropdown-menu duration-200 item flex flex-col md:flex-row justify-between items-center py-[8px] px-[16px] {{ $title == '' ? 'bg-white' : 'hover:bg-[#f3f3f32d]' }} rounded-lg">
            <div class="flex flex-col md:flex-row items-center gap-3">
                <i
                    class="icon-item fal fa-utensils py-[5.5px] flex {{ $title == '' ? 'text-dbklik' : 'text-white' }} text-[22px]"></i>
                <span
                    class="{{ $title == '' ? 'text-dbklik' : 'text-white' }} font-medium text-[9px] md:text-[16px] lg:text-[16px] xl:text-[16px] leading-none">Katering</span>
            </div>
            <i class="bi bi-chevron-right text-white"></i>
        </a>
        <div class="dropdown-extra hidden">
            <a href="/hr/katering"
                class="duration-200 item flex items-center gap-2 py-[8px] px-[16px] {{ $title == 'Katering' ? 'bg-white' : 'hover:bg-[#f3f3f32d]' }} rounded-lg">
                <span
                    class="{{ $title == 'Katering' ? 'text-dbklik' : 'text-white' }} py-2 ml-7 font-medium text-[16px] leading-none">Pesan
                    Katering</span>
            </a>
            <a href="/hr/edit-katering"
                class="duration-200 item flex items-center gap-2 py-[8px] px-[16px] {{ $title == 'Edit Menu' ? 'bg-white' : 'hover:bg-[#f3f3f32d]' }} rounded-lg">
                <span
                    class="{{ $title == 'Edit Menu' ? 'text-dbklik' : 'text-white' }} py-2 ml-7 font-medium text-[16px] leading-none">Edit
                    Menu</span>
            </a>
            <a href="/hr/daftar-pesanan-katering"
                class="duration-200 item flex items-center gap-2 py-[8px] px-[16px] {{ $title == 'Daftar Pesanan' ? 'bg-white' : 'hover:bg-[#f3f3f32d]' }} rounded-lg">
                <span
                    class="{{ $title == 'Daftar Pesanan' ? 'text-dbklik' : 'text-white' }} py-2 ml-7 font-medium text-[16px] leading-none">Daftar
                    Pesanan</span>
            </a>
        </div>

        <a href=""
            class="dropdown-menu-jadwal duration-200 item flex flex-col md:flex-row justify-between items-center py-[8px] px-[16px] {{ $title == '' ? 'bg-white' : 'hover:bg-[#f3f3f32d]' }} rounded-lg">
            <div class="flex flex-col md:flex-row items-center gap-3">
                <i
                    class="icon-item fas fa-clock py-[5.5px] flex {{ $title == '' ? 'text-dbklik' : 'text-white' }} text-[22px]"></i>
                <span
                    class="{{ $title == '' ? 'text-dbklik' : 'text-white' }} font-medium text-[9px] md:text-[16px] lg:text-[16px] xl:text-[16px] leading-none">Jadwal</span>
            </div>
            <i class="bi bi-chevron-right text-white"></i>
        </a>
        <div class="dropdown-extra-jadwal hidden">
            <a href="/hr/jam"
                class="duration-200 item flex items-center gap-2 py-[8px] px-[16px] {{ $title == 'Katering' ? 'bg-white' : 'hover:bg-[#f3f3f32d]' }} rounded-lg">
                <span
                    class="{{ $title == 'Katering' ? 'text-dbklik' : 'text-white' }} py-2 ml-7 font-medium text-[16px] leading-none">Jam</span>
            </a>

        </div>

        <a href="/hr/kpi"
            class="duration-200 item flex items-center gap-2 py-[8px] px-[16px] {{ $title == 'Penilaian KPI' ? 'bg-white' : 'hover:bg-[#f3f3f32d]' }} rounded-lg">
            <i
                class="icon-item fal fa-chart-line py-[5.5px] flex {{ $title == 'Penilaian KPI' ? 'text-dbklik' : 'text-white' }} text-[22px]"></i>
            <span
                class="{{ $title == 'Penilaian KPI' ? 'text-dbklik' : 'text-white' }} font-medium text-[16px] leading-none">Penilaian
                KPI</span>
        </a>
        <a href="/hr/struktur-pegawai"
            class="duration-200 item flex items-center gap-2 py-[8px] px-[16px] {{ $title == 'Struktur Pegawai' ? 'bg-white' : 'hover:bg-[#f3f3f32d]' }} rounded-lg">
            <i
                class="icon-item bi bi-diagram-3 {{ $title == 'Struktur Pegawai' ? 'text-dbklik' : 'text-white' }} text-[22px]"></i>
            <span
                class="{{ $title == 'Struktur Pegawai' ? 'text-dbklik' : 'text-white' }} font-medium text-[16px] leading-none">Struktur
                Pegawai</span>
        </a>

    </div>
</aside>

<script>
    $(".dropdown-menu").on("click", function(e) {
        e.preventDefault();
        if ($(".dropdown-extra").hasClass("hidden")) {
            $(".dropdown-extra").removeClass("hidden");
            $(this).children()[1].style.transform = "rotate(90deg)";
        } else {
            $(".dropdown-extra").addClass("hidden");
            $(this).children()[1].style.transform = "rotate(0)";
        }
    });

    $(".dropdown-menu-jadwal").on("click", function(e) {
        e.preventDefault();
        if ($(".dropdown-extra-jadwal").hasClass("hidden")) {
            $(".dropdown-extra-jadwal").removeClass("hidden");
            $(this).children()[1].style.transform = "rotate(90deg)";
        } else {
            $(".dropdown-extra-jadwal").addClass("hidden");
            $(this).children()[1].style.transform = "rotate(0)";
        }
    });

</script>
