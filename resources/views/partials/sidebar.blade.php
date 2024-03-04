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
        @foreach ($data as $menu)
            <a href="{{ $menu['route'] }}"
                class="duration-200 item flex items-center gap-2 py-[8px] px-[16px] {{ $title == $menu['name'] ? 'bg-white' : 'hover:bg-[#f3f3f32d]' }}  rounded-lg">
                <i
                    class="icon-item bi {{ $menu['icon'] }} {{ $title == $menu['name'] ? 'text-dbklik' : 'text-white' }} text-[22px]"></i>
                <span
                    class="{{ $title == $menu['name'] ? 'text-dbklik' : 'text-white' }} font-medium text-[16px] leading-none">{{ $menu['name'] }}</span>
            </a>
        @endforeach
    </div>
</aside>
