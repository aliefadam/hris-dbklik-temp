<div class="wrap relative">
    <hr class="bg-indigo-600 opacity-100 absolute h-[2px] w-[calc(100%-200px)] -top-[25px] left-[50%] -translate-x-[50%]">
    
    <div class="subordinates flex gap-10">
    <div class="relative w-[200px] struktur-item bg-transparent border-2 border-indigo-600 rounded-lg p-5 flex flex-col items-center shadow-xl">
        <img src="{{ asset('imgs/profil.png') }}" class="w-[100px] drop-shadow-xl">
        <span class="text-indigo-600 font-medium mt-2 text-xl text-center">{{ $employee["name"] }}</span>
        <span class="italic text-[13px] leading-none">{{ $employee["position"] }}</span>
        <div class="garis-menurun h-[20px] border border-indigo-600 absolute -bottom-[20px]"></div>

        @if (!empty($employee['subordinates']))
            <div class="subordinates flex gap-10">
                @foreach ($employee['subordinates'] as $subordinate)
                    @include('partials.employee', ['employee' => $subordinate])
                @endforeach
            </div>
        @endif
    </div>    
    </div>
</div>
