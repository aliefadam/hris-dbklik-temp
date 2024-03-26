<nav
    class="fixed rounded-lg top-0 left-[70px] md:left-[calc(250px+40px)] w-[calc(100%-70px)] md:w-[calc(100%-250px-40px-40px)] h-[64px] flex items-center justify-between z-10 px-2 md:px-0">
    <div class="left flex items-center gap-2">
        <span
            class="text-[13px] md:text-[16px] jam bg-dbklik w-[80px] md:w-[100px] p-2 rounded-lg text-center text-yellow-dbklik block font-semibold"></span>
        <div class="flex flex-col md:flex-row md:gap-1">
            <span class="text-[13px] md:text-xl hari text-dbklik font-semibold"></span>
            <span class="text-[13px] md:text-xl tanggal text-dbklik font-semibold"></span>
        </div>
    </div>
    <div class="right flex gap-2 md:gap-3 text-dbklik">
        <div class="btn-notification relative">
            <i class="notif bi bi-bell-fill text-xl md:text-2xl cursor-pointer"></i>
            @if (App\Models\Notifikasi::where('karyawan_id', auth()->user()->id)->where('status_dibaca', false)->count() > 0)
                <div
                    class="jumlah absolute right-0 top-0 w-[10px] h-[10px] md:w-[12px] md:h-[12px] bg-yellow-dbklik text-black rounded-full">
                </div>
            @endif
        </div>
        <div class="flex items-center gap-0 md:gap-1 cursor-pointer btn-setting">
            <i class="gear bi bi-gear-fill text-xl md:text-2xl"></i>
            <i class="panah-bawah bi bi-caret-down-fill text-lg md:text-xl"></i>
        </div>
    </div>

    <div
        class="duration-300 setting-extra fixed top-[60px] right-[10px] md:right-[40px] bg-white flex-col rounded-lg md:rounded-xl shadow-[0_0_10px_1px_rgba(0,0,0,0.2)] hidden">
        <a class="text-sm md:text-[16px] text-dbklik flex items-center gap-2 px-3 md:px-6 py-2 md:py-3 hover:bg-dbklik rounded-tl-lg md:rounded-tl-xl rounded-tr-lg md:rounded-tr-xl hover:text-white"
            href="/profile"><i class="bi bi-person-fill"></i> Profil Saya</a>
        <a class="text-sm md:text-[16px] text-green-800 flex items-center gap-2 px-3 md:px-6 py-2 md:py-3 hover:bg-green-800 hover:text-white"
            href="/ganti-password"><i class="bi bi-shield-lock-fill"></i>
            Ganti Password</a>
        <a class="text-sm md:text-[16px] text-red-600 flex items-center gap-2 px-3 md:px-6 py-2 md:py-3 hover:bg-red-600 rounded-bl-lg md:rounded-bl-xl rounded-br-lg md:rounded-br-xl hover:text-white"
            href="/logout"><i class="bi bi-door-closed-fill"></i> Keluar</a>
    </div>

    <div
        class="duration-300 w-[250px] md:w-[400px] notification-extra fixed top-[60px] right-[50px] md:right-[90px] bg-white flex-col rounded-lg md:rounded-xl shadow-[0_0_10px_1px_rgba(0,0,0,0.2)] hidden">
        <div class="py-2 md:py-3 px-4 md:px-5 flex justify-between">
            <h1 class="text-sm md:text-[16px]">Notifikasi Baru</h1>
            <span
                class="text-sm md:text-[16px]">{{ App\Models\Notifikasi::where('karyawan_id', auth()->user()->id)->where('status_dibaca', false)->count() }}</span>
        </div>
        <hr>
        @foreach (App\Models\Notifikasi::where('karyawan_id', auth()->user()->id)->where('status_dibaca', false)->paginate(3) as $notifikasi)
            @php
                $pesan = json_decode($notifikasi->pesan, true);
            @endphp
            <a href="/notification/{{ $notifikasi->id }}"
                class="notification-list flex items-center justify-betweens py-2 md:py-3 px-3 md:px-5 hover:bg-gray-100 rounded-lg gap-1 md:gap-0">
                <div class="flex-[3] md:flex-[2]">
                    <h1 class="text-dbklik text-sm md:text-[16px]">{{ $pesan['judul'] }}</h1>
                    <span class="block text-[11px] md:text-[13px]">{{ substr($pesan['pesan'], 0, 30) }}...</span>
                </div>
                <span
                    class="text-[10px] md:text-[12px] text-primary flex-[1] text-center md:text-right">{{ $notifikasi->created_at->diffForHumans() }}</span>
            </a>
        @endforeach
        <hr>
        <a href="/notification"
            class="duration-200 py-2 md:py-3 flex justify-center hover:bg-dbklik hover:text-white text-black rounded-br-lg rounded-bl-lg text-sm md:text-[16px]">Lihat
            Semua
            Notifikasi</a>
    </div>
</nav>
