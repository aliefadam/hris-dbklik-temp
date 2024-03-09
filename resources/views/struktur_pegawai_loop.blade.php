<?php
function makeOrganigram($arr = [], $level = 1, $divisi = null, $sub_divisi = null)
{
    $organigram = [];

    foreach ($arr as $item) {
        if (
            $item["level"] === $level &&
            ($divisi === null || $item["divisi"] === $divisi) &&
            ($sub_divisi === null || $item["sub_divisi"] === $sub_divisi)
        ) {
            $item["subordinates"] = makeOrganigram($arr, $level + 1, $item["divisi"], $item["sub_divisi"]);
            $organigram[$item["name"]] = $item;
        }
    }

    return $organigram;
}
$organigram = makeOrganigram($data_brief,1);
?>

@extends('layouts.main')

@section('content')

<?php
function displayOrganizationalChart($arr, $indent = 0)
{
    foreach ($arr as $employee) {
    echo '<div class="wrap relative">
                <hr class="bg-indigo-600 opacity-100 absolute h-[2px] w-[calc(100%-200px)] -top-[25px] left-[50%] -translate-x-[50%]">
                
                <div class="manager flex gap-10">';
        echo '<div class="relative w-[200px] struktur-item bg-transparent border-2 border-indigo-600 rounded-lg p-5 flex flex-col items-center shadow-xl">';
        echo '<img src="' . asset('imgs/profil.png') . '" class="w-[100px] drop-shadow-xl">';
        echo '<span class="text-indigo-600 font-medium mt-2 text-xl text-center">' . $employee['name'] . '</span>';
        echo '<span class="italic text-[13px] leading-none">' . $employee['position'] . '</span>';
        echo '<div class="garis-menurun h-[20px] border border-indigo-600 absolute -bottom-[20px]"></div>';

        if (!empty($employee['subordinates'])) {
            echo '<div class="subordinates flex flex-col gap-10 absolute left-[-100%] top-0">';
            displayOrganizationalChart($employee['subordinates'], $indent + 1);
            echo '</div>';
        }

        echo '</div>';
    }
}

// Display the organizational chart
displayOrganizationalChart($organigram);
?>

@endsection