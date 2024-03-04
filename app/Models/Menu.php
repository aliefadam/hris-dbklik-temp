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

    public static function getMenu()
    {
        return Menu::$menu;
    }
}
