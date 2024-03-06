@extends('layouts.secondary')

@section('content')
    <div class="bg-white w-[40%] rounded-xl px-7 py-10">
        <div class="login-brand flex items-center justify-center gap-2">
            <img src="{{ asset('imgs/db-logo.png') }}" width="40">
            <span class="text-3xl font-bold text-dbklik">HRIS DB KLIK</span>
        </div>
        <form action="" class="w-full mt-5" method="post">
            <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md">
                <label for="email" class="text-dbklik">Email</label>
                <input type="email" name="email" id="email" class="bg-transparent outline-none"
                    placeholder="your@email.com">
            </div>
            <div class="flex flex-col gap-1 border border-dbklik p-3 rounded-md mt-3">
                <label for="password" class="text-dbklik">Password</label>
                <div class="relative w-full container-kata-sandi-baru">
                    <input type="password" class="w-[95%] outline-none bg-transparent placeholder:translate-y-1"
                        name="kata_sandi_baru" id="kata_sandi_baru"
                        onfocus="eventFocus(this.parentElement, this.nextElementSibling)"
                        onblur="clearFocus(this.parentElement, this.nextElementSibling)" placeholder="************">
                    <i onclick="eventInput(this, this.previousElementSibling)"
                        class="text-primary bi bi-eye absolute right-0 text-lg cursor-pointer btnHidePasswordKataSandiLama"></i>
                </div>
            </div>
            <div class="mt-4 flex justify-between">
                <div class="left flex items-center gap-1">
                    <input type="checkbox" name="" id="ingat_saya">
                    <label for="ingat_saya" class="leading-none">Ingat saya</label>
                </div>
                <div class="right">
                    <a href="/" class="text-dbklik hover:underline">Lupa password ?</a>
                </div>
            </div>
            <div class="w-full flex justify-center mt-4">
                <button class="bg-gradient-to-r from-yellow-500 to-yellow-400 p-3 w-full rounded-lg">Masuk</button>
            </div>
        </form>
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
