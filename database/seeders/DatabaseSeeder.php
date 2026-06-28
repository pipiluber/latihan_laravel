<?php

namespace Database\Seeders;

use App\Models\Anggota;
use App\Models\User;
use App\Models\Kategori;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Anggota::create([
            'nama' => 'Budi',
            'hp' => '081234567890',
        ]);
        Anggota::create([
            'nama' => 'Siti',
            'hp' => '089876543210',
        ]);
        Anggota::create([
            'nama' => 'Andi',
            'hp' => '082112345678',
        ]);

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'role' => '1',
            'status' => 1,
            'hp' => '081234567890',
            'password' => bcrypt('p@55w0rd'),
        ]);

        User::create([
            'name' => 'Sopian',
            'email' => 'sopian@gmail.com',
            'role' => '0',
            'status' => 1,
            'hp' => '081234567891',
            'password' => bcrypt('p@55w0rd'),

        ]);
        Kategori::create([
            'nama_kategori' => 'Novel',
        ]);
        Kategori::create([
            'nama_kategori' => 'Non-Fiksi',
        ]);
        Kategori::create([
            'nama_kategori' => 'Manga',
        ]);
        Kategori::create([
            'nama_kategori' => 'Majalah',
        ]);
        Kategori::create([
            'nama_kategori' => 'Webnovel',
        ]);
    }
}
