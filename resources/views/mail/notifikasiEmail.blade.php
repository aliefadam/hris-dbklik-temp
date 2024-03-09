{!! $dataEmail['message']['desc'] !!}

<div class="mt-5 flex gap-1 flex-col" style="margin-top: 20px">
    <span class="text-dbklik text-sm">Nama : </span>
    <span class="text-black text-[17px] leading-none">{{ $dataEmail['message']['nama'] }}</span>
</div>
<div class="mt-3 flex gap-1 flex-col">
    <span class="text-dbklik text-sm">Divisi : </span>
    <span class="text-black text-[17px] leading-none">{{ $dataEmail['message']['divisi'] }}</span>
</div>
<div class="mt-3 flex gap-1 flex-col">
    <span class="text-dbklik text-sm">Izin : </span>
    <span class="text-black text-[17px] leading-none">{{ $dataEmail['message']['izin'] }}</span>
</div>
<div class="mt-3 flex gap-1 flex-col">
    <span class="text-dbklik text-sm">Tanggal Izin : </span>
    <span class="text-black text-[17px] leading-none">{{ $dataEmail['message']['tanggal_izin'] }}</span>
</div>
<div class="mt-3 flex gap-1 flex-col">
    <span class="text-dbklik text-sm">Catatan : </span>
    <span class="text-black text-[17px] leading-none">{{ $dataEmail['message']['catatan'] }}</span>
</div>
<div class="mt-3 flex gap-1 flex-col">
    <span class="text-dbklik text-sm">File Pendukung : </span>
    @if ($dataEmail['message']['catatan'] != '-')
        <a href="{{ asset('upload/file_pendukung/' . $dataEmail['message']['file_pendukung']) }}"
            class="text-black text-[17px] leading-none underline"
            target="_blank">{{ $dataEmail['message']['file_pendukung'] }}</a>
    @else
        <span class="text-black text-[17px] leading-none">{{ $dataEmail['message']['file_pendukung'] }}</span>
    @endif
</div>
