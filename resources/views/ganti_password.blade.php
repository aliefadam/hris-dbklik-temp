@extends('layouts.main')

@section('content')
    <div class="bg-white rounded-xl shadow-xl w-[55%] p-5 flex flex-col gap-3">
        <div class="flex flex-col gap-2 w-full">
            <label for="kata_sandi_lama" class="">Kata Sandi Lama</label>
            <div class="relative w-full border-2 container-kata-sandi-lama rounded-lg px-3">
                <input type="password" class="w-[95%] outline-none rounded-lg text-[15px] py-2" name="kata_sandi_lama"
                    id="kata_sandi_lama" onfocus="eventFocus(this.parentElement, this.nextElementSibling)"
                    onblur="clearFocus(this.parentElement, this.nextElementSibling)">
                <i onclick="eventInput(this, this.previousElementSibling)"
                    class="text-primary bi bi-eye absolute top-1/2 translate-y-[-50%] right-3 text-lg cursor-pointer btnHidePasswordKataSandiLama"></i>
            </div>
        </div>
        <div class="flex flex-col gap-2 w-full">
            <label for="kata_sandi_baru" class="">Kata Sandi Baru</label>
            <div class="relative w-full border-2 container-kata-sandi-baru rounded-lg px-3">
                <input type="password" class="w-[95%] outline-none rounded-lg text-[15px] py-2" name="kata_sandi_baru"
                    id="kata_sandi_baru" onfocus="eventFocus(this.parentElement, this.nextElementSibling)"
                    onblur="clearFocus(this.parentElement, this.nextElementSibling)">
                <i onclick="eventInput(this, this.previousElementSibling)"
                    class="text-primary bi bi-eye absolute top-1/2 translate-y-[-50%] right-3 text-lg cursor-pointer btnHidePasswordKataSandiLama"></i>
            </div>
        </div>
        <div class="flex flex-col gap-2 w-full">
            <label for="konfirmasi_kata_sandi_baru" class="">Konfirmasi Kata Sandi Baru</label>
            <div class="relative w-full border-2 container-kata-sandi-baru rounded-lg px-3">
                <input type="password" class="w-[95%] outline-none rounded-lg text-[15px] py-2"
                    name="konfirmasi_kata_sandi_baru" id="konfirmasi_kata_sandi_baru"
                    onfocus="eventFocus(this.parentElement, this.nextElementSibling)"
                    onblur="clearFocus(this.parentElement, this.nextElementSibling)">
                <i onclick="eventInput(this, this.previousElementSibling)"
                    class="text-primary bi bi-eye absolute top-1/2 translate-y-[-50%] right-3 text-lg cursor-pointer btnHidePasswordKataSandiLama"></i>
            </div>
        </div>
        <div class="border mt-2">
            <button
                class="bg-gradient-to-r from-dbklik to-indigo-600 w-full text-white py-[10px] px-3 rounded-lg">Simpan</button>
        </div>
    </div>

    <script>
        function eventInput(eyeLogo, input) {
            if (input.type == "password") {
                input.type = "text";
                eyeLogo.classList.remove("bi-eye");
                eyeLogo.classList.add("bi-eye-slash");
            } else {
                input.type = "password";
                eyeLogo.classList.remove("bi-eye-slash");
                eyeLogo.classList.add("bi-eye");
            }
        }

        function eventFocus(container, eyeLogo) {
            container.classList.add("border-indigo-600");
            eyeLogo.classList.add("!text-indigo-600");
        }

        function clearFocus(container, eyeLogo) {
            container.classList.remove("border-indigo-600");
            eyeLogo.classList.remove("!text-indigo-600");
        }
    </script>
@endsection
