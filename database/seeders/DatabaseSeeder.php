<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Barang;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create();

        Kategori::factory(1)->create();

        Kategori::factory()->create([
            'kategori' => 'Storage',
        ]);

        Kategori::factory()->create([
            'kategori' => 'Multimedia',
        ]);

        Kategori::factory()->create([
            'kategori' => 'Habis Pakai',
        ]);

        Kategori::factory()->create([
            'kategori' => 'PC',
        ]);

        Kategori::factory()->create([
            'kategori' => 'Access Point',
        ]);

        Kategori::factory()->create([
            'kategori' => 'Switch',
        ]);

        Kategori::factory()->create([
            'kategori' => 'Router',
        ]);

        Barang::factory(15)->create();
    }
}
