<?php

use App\Models\Menu;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        "data" => Menu::getMenu(),
        "title" => "Beranda",
    ]);
});

Route::get('/form-perizinan', function () {
    return view('perizinan', [
        "data" => Menu::getMenu(),
        "title" => "Perizinan",
    ]);
});

Route::get('/riwayat', function () {
    return view('riwayat', [
        "data" => Menu::getMenu(),
        "title" => "Riwayat",
    ]);
});

Route::get("/ganti-password", function () {
    return view("ganti_password", [
        "data" => Menu::getMenu(),
        "title" => "Ganti Password  ",
    ]);
});

Route::get("/notification", function () {
    return view("notification", [
        "data" => Menu::getMenu(),
        "title" => "Notifikasi",
    ]);
});

Route::get("/profile", function () {
    return view("profile", [
        "data" => Menu::getMenu(),
        "title" => "Notifikasi",
    ]);
});
