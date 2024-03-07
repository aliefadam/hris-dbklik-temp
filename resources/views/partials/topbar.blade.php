<nav
    class="fixed rounded-lg top-0 left-[calc(250px+40px)] w-[calc(100%-250px-40px-40px)] h-[64px] flex items-center justify-between z-10">
    <div class="left flex items-center gap-2">
        <span class="jam bg-dbklik w-[100px] p-2 rounded-lg text-center text-yellow-dbklik block font-semibold"></span>
        <span class="hari text-dbklik text-xl font-semibold"></span>
    </div>
    <div class="right flex gap-3 text-dbklik">
        <div class="btn-notification">
            <i class="notif bi bi-bell-fill text-2xl cursor-pointer"></i>
        </div>
        <div class="flex items-center gap-1 cursor-pointer btn-setting">
            <i class="gear bi bi-gear-fill text-2xl"></i>
            <i class="panah-bawah bi bi-caret-down-fill"></i>
        </div>
    </div>

    <div
        class="duration-300 setting-extra fixed top-[60px] right-[40px] bg-white flex-col rounded-xl shadow-[0_0_10px_1px_rgba(0,0,0,0.2)] hidden">
        <a class="text-dbklik flex items-center gap-2 px-6 py-3 hover:bg-dbklik rounded-tl-xl rounded-tr-xl hover:text-white"
            href="/profile"><i class="bi bi-person-fill"></i> Profil Saya</a>
        <a class="text-green-800 flex items-center gap-2 px-6 py-3 hover:bg-green-800 hover:text-white"
            href="/ganti-password"><i class="bi bi-shield-lock-fill"></i>
            Ganti Password</a>
        <a class="text-red-600 flex items-center gap-2 px-6 py-3 hover:bg-red-600 rounded-bl-xl rounded-br-xl hover:text-white"
            href="/logout"><i class="bi bi-door-closed-fill"></i> Keluar</a>
    </div>

    <div
        class="duration-300 w-[400px] notification-extra fixed top-[60px] right-[90px] bg-white flex-col rounded-xl shadow-[0_0_10px_1px_rgba(0,0,0,0.2)] hidden">
        <div class="py-3 px-5">
            <h1>Notifikasi</h1>
        </div>
        <hr>
        <a href="" class="flex items-center justify-between py-3 px-5 hover:bg-gray-100 rounded-lg">
            <div class="flex-2">
                <h1 class="text-dbklik">Pengajuan Izin Diterima</h1>
                <span
                    class="block text-[13px]">{{ substr('Selamat pengajuan izinmu telah disetujui oleh sistem', 0, 35) }}...</span>
            </div>
            <span class="text-sm text-primary flex-1 flex justify-end">7 Hari Lalu</span>
        </a>
        <a href="" class="flex items-center justify-between py-3 px-5 hover:bg-gray-100 rounded-lg">
            <div class="flex-2">
                <h1 class="text-dbklik">Pengajuan Izin Diterima</h1>
                <span
                    class="block text-[13px]">{{ substr('Selamat pengajuan izinmu telah disetujui', 0, 35) }}...</span>
            </div>
            <span class="text-sm text-primary flex-1 flex justify-end">7 Hari Lalu</span>
        </a>
        <hr>
        <a href="/notification"
            class="duration-200 p-3 flex justify-center hover:bg-dbklik hover:text-white text-black rounded-br-lg rounded-bl-lg">Lihat
            Semua
            Notifikasi</a>
    </div>
</nav>
