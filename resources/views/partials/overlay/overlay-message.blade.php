@if (session('pesan'))
    @php
        $jenis = session('pesan')['jenis'];
        $body = session('pesan')['body'];
    @endphp
    <div class="overlay bg-[rgba(0,0,0,0.7)] fixed top-0 left-0 z-20 w-full h-screen flex justify-center items-center">
        <div class="w-[40%] animate__animated animate__fadeInDown container-overlay">
            <div class="bg-gray-100 px-5 py-10 rounded-lg flex justify-center flex-col gap-3 items-center relative">
                <img src="{{ asset($jenis == 'berhasil' ? 'imgs/checked.png' : 'imgs/cancel.png') }}" class="w-[130px]">
                <span class="text-dbklik text-3xl font-semibold capitalize">{{ $jenis }}</span>
                <span class="text-xl leading-none">{{ $body }}</span>
                <i
                    class="bi bi-x-lg text-dbklik absolute right-[10px] top-[10px] cursor-pointer flex hover:bg-slate-300 hover:text-dbklik duration-200 rounded-full p-3 font-semibold btn-close-overlay text-2xl"></i>
            </div>
        </div>
    </div>
@endif
