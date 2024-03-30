<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "karyawan_id" => 1,
            "email" => 'john.doe@example.com',
            "password" => "123",
            "roleLevel" => "4",
        ]);
        User::create([
            "karyawan_id" => 2,
            "email" => 'jane.smith@example.com',
            "password" => "123",
            "roleLevel" => "4",
        ]);
        User::create([
            "karyawan_id" => 3,
            "email" => 'alex.johnson@example.com',
            "password" => "123",
            "roleLevel" => "4",
        ]);
        User::create([
            "karyawan_id" => 4,
            "email" => 'eva.turner@example.com',
            "password" => "123",
            "roleLevel" => "2",
        ]);
        User::create([
            "karyawan_id" => 5,
            "email" => 'mark.bennett@example.com',
            "password" => "123",
            "roleLevel" => "3",
        ]);
        User::create([
            "karyawan_id" => 6,
            "email" => 'tom.holland@example.com',
            "password" => "123",
            "roleLevel" => "1",
        ]);
        User::create([
            "karyawan_id" => 7,
            "email" => 'aleefeyy@gmail.com',
            "password" => "123",
            "roleLevel" => "2",
        ]);
        User::create([
            "karyawan_id" => 8,
            "email" => 'lukman@example.com',
            "password" => "123",
            "roleLevel" => "2",
        ]);
    }
}
