@extends('layouts.secondary')

@section('content')
<div class="h-screen flex justify-center items-center">
    <div class="bg-white rounded-xl shadow-xl w-[30%] p-5 flex flex-col gap-3">
        <div class="items-center flex flex-row place-self-center mb-6 mt-3">
            <img src="{{ asset('imgs/db-logo.png') }}" class="w-[50px]" />
            <h1 class="font-bold text-3xl leading-none text-dbklik">HRIS DB KLIK</h1>
        </div>

        <div class="flex flex-col gap-2 py-2 px-3 border-dbklik border rounded-lg">
            <label for="email" class="text-dbklik font-medium">e-mail</label>
            <input type="email" class="w-[95%] outline-none rounded-lg py-2" name="email"
                   id="email" onfocus="eventFocus(this.parentElement, this.nextElementSibling)"
                   onblur="clearFocus(this.parentElement, this.nextElementSibling)">
            
        </div>

        <div class="flex flex-col gap-2 p-3 border-dbklik border rounded-lg">
            <label for="password" class="text-dbklik font-medium" id="labelPassword">Password</label>
            <div class="relative w-full container-kata-sandi-baru">
                <input type="password" class="w-[95%] outline-none rounded-lg text-[15px] py-2" name="password"
                       id="password" onfocus="eventFocus(this.parentElement.parentElement, this.nextElementSibling)"
                       onblur="clearFocus(this.parentElement.parentElement, this.nextElementSibling)">
                <i onclick="eventInput(this, this.previousElementSibling)"
                   class="text-primary bi bi-eye absolute top-1/2 translate-y-[-50%] right-3 text-lg cursor-pointer btnHidePasswordKataSandiLama">
                </i>
            </div>
        </div>

        <div class="justify-between flex flex-col-2">
            <label class="text-indigo-600">
                <input class="mr-1 checked:bg-black" type="checkbox" name="checkIngat">Ingat Saya
            </label>
            <p class="text-indigo-600">Lupa Password?</p>
        </div>

        <div>
            <button class="mt-6 bg-yellow-dbklik rounded-lg font-medium w-full p-4 hover:bg-yellow-600">LOGIN</button>
        </div>

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
            cannotEmpty(container.childElement)
        }

        function cannotEmpty(element)
        {
            if(element.value === '')
            {
                alert('cannot empty')
            }
        }
    </script>

@endsection