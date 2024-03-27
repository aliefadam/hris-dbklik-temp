@extends('layouts.hr')

@section('content')
    <div class="bg-white rounded-xl shadow-xl w-[100%] h-[calc(100vh-148px)] p-4">
        <form action="/hr/ubah-katering" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-3 gap-3">
                @foreach ($data_menu as $menu)
                    <div
                        class="input-menu flex flex-col gap-1 border border-dbklik p-3 bg-gray-200 cursor-not-allowed rounded-md">
                        <label for="{{ $menu->hari }}"
                            class="input-menu text-dbklik cursor-not-allowed capitalize">{{ $menu->hari }}</label>
                        <input type="text" name="{{ $menu->hari }}" id="{{ $menu->hari }}"
                            class="cursor-not-allowed bg-transparent outline-none input-menu" value="{{ $menu->menu }}"
                            readonly>
                    </div>
                @endforeach
            </div>
            <div class="mt-3 flex">
                <button type="button" class="edit btn-edit-menu-katering px-5 py-2 bg-yellow-400 rounded-md">Edit
                    Menu</button>
            </div>
        </form>
    </div>
    </div>

    <script>
        $(".btn-edit-menu-katering").on("click", function() {
            if ($(".btn-edit-menu-katering").hasClass("edit")) {
                $("div.input-menu").each(function(index, input) {
                    $(this).removeClass(["cursor-not-allowed", "bg-gray-200"]);
                    $("label.input-menu").removeClass("cursor-not-allowed");
                    $("input.input-menu").removeClass("cursor-not-allowed");
                    $("input.input-menu").attr("readonly", false);
                });
                $(".btn-edit-menu-katering").removeClass(["edit", "bg-yellow-400"]);
                $(".btn-edit-menu-katering").addClass(["bg-green-600", "text-white"]);
                $(".btn-edit-menu-katering").html("Simpan");
            } else {
                $(this).attr("type", "submit");
            }
        })
    </script>
@endsection
