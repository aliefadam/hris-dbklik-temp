<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public static $menu = [
        [
            "name" => "Beranda",
            "route" => "/",
            "icon" => "bi-house",
        ],
        [
            "name" => "Perizinan",
            "route" => "/form-perizinan",
            "icon" => "bi-clipboard-check",
        ],
        [
            "name" => "Riwayat",
            "route" => "/riwayat",
            "icon" => "bi-clock-history",
        ],
    ];

    public static $menuHr = [
        [
            "name" => "Beranda",
            "route" => "/hr/",
            "icon" => "bi-house",
        ],
        [
            "name" => "Perizinan",
            "route" => "/hr/form-perizinan",
            "icon" => "bi-clipboard-check",
        ],
        [
            "name" => "Riwayat",
            "route" => "/hr/riwayat",
            "icon" => "bi-clock-history",
        ],
        [
            "name" => "Daftar Pengajuan",
            "route" => "/hr/daftar-pengajuan",
            "icon" => "bi-list-task",
        ],
        [
            "name" => "Daftar Karyawan",
            "route" => "/hr/daftar-karyawan",
            "icon" => "bi-people-fill",
        ],
    ];

    public static function getMenu()
    {
        return Menu::$menu;
    }

    public static function getMenuHr()
    {
        return Menu::$menuHr;
    }
}
