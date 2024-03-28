<nav
    class="fixed rounded-lg top-0 left-[calc(250px+40px)] w-[calc(100%-250px-40px-40px)] h-[64px] flex items-center justify-between z-10">
    <div class="left flex items-center gap-2">
        <span class="jam bg-dbklik w-[100px] p-2 rounded-lg text-center text-yellow-dbklik block font-semibold"></span>
        <div class="flex flex-col md:flex-row md:gap-1">
            <span class="text-[13px] md:text-xl hari text-dbklik font-semibold"></span>
            <span class="text-[13px] md:text-xl tanggal text-dbklik font-semibold"></span>
        </div>
    </div>
    <div class="right flex gap-3 text-dbklik">
        <div class="btn-notification relative">
            <i class="notif bi bi-bell-fill text-2xl cursor-pointer"></i>
            @if (App\Models\Notifikasi::where('karyawan_id', auth()->user()->id)->where('status_dibaca', false)->count() > 0)
                <div class="jumlah absolute right-0 top-0 w-[12px] h-[12px] bg-yellow-dbklik text-black rounded-full">
                </div>
            @endif
        </div>
        <div class="flex items-center gap-1 cursor-pointer btn-setting">
            <i class="gear bi bi-gear-fill text-2xl"></i>
            <i class="panah-bawah bi bi-caret-down-fill"></i>
        </div>
    </div>

    <div
        class="duration-300 setting-extra fixed top-[60px] right-[40px] bg-white flex-col rounded-xl shadow-[0_0_10px_1px_rgba(0,0,0,0.2)] hidden">
        <a class="text-dbklik flex items-center gap-2 px-6 py-3 hover:bg-dbklik rounded-tl-xl rounded-tr-xl hover:text-white"
            href="/hr/profile"><i class="bi bi-person-fill"></i> Profil Saya</a>
        <a class="text-green-800 flex items-center gap-2 px-6 py-3 hover:bg-green-800 hover:text-white"
            href="/hr/ganti-password"><i class="bi bi-shield-lock-fill"></i>
            Ganti Password</a>
        <a class="text-red-600 flex items-center gap-2 px-6 py-3 hover:bg-red-600 rounded-bl-xl rounded-br-xl hover:text-white"
            href="/logout"><i class="bi bi-door-closed-fill"></i> Keluar</a>
    </div>

    <div
        class="duration-300 w-[400px] notification-extra fixed top-[60px] right-[90px] bg-white flex-col rounded-xl shadow-[0_0_10px_1px_rgba(0,0,0,0.2)] hidden">
        <div class="py-3 px-5 flex justify-between">
            <h1>Notifikasi Baru</h1>
            <span>{{ App\Models\Notifikasi::where('karyawan_id', auth()->user()->id)->where('status_dibaca', false)->count() }}</span>
        </div>
        <hr>
        @foreach (App\Models\Notifikasi::where('karyawan_id', auth()->user()->id)->where('status_dibaca', false)->paginate(3) as $notifikasi)
            @php
                $pesan = json_decode($notifikasi->pesan, true);
            @endphp
            <a href="/hr/notification/{{ $notifikasi->id }}"
                class="notification-list flex items-center justify-between py-3 px-5 hover:bg-gray-100 rounded-lg">
                <div class="flex-[2]">
                    <h1 class="text-dbklik">{{ $pesan['judul'] }}</h1>
                    <span class="block text-[13px]">{{ substr($pesan['pesan'], 0, 30) }}...</span>
                </div>
                <span
                    class="text-[12px] text-primary flex-[1] flex justify-end text-right">{{ $notifikasi->created_at->diffForHumans() }}</span>
            </a>
        @endforeach
        <hr>
        <a href="/hr/notification"
            class="duration-200 p-3 flex justify-center hover:bg-dbklik hover:text-white text-black rounded-br-lg rounded-bl-lg">Lihat
            Semua
            Notifikasi</a>
    </div>
</nav>
