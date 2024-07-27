<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'level' => 'Admin'
        ]);

        User::create([
            'nama' => 'Dokter',
            'email' => 'dokter@gmail.com',
            'password' => bcrypt('12345678'),
            'level' => 'Dokter'
        ]);

        User::create([
            'nama' => 'Pasien',
            'email' => 'pasien@gmail.com',
            'password' => bcrypt('12345678'),
            'level' => 'Pasien'
        ]);

        User::create([
            'nama' => 'Pemilik',
            'email' => 'pemilik@gmail.com',
            'password' => bcrypt('12345678'),
            'level' => 'Pemilik'
        ]);
    }
}
