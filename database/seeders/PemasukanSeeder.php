<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemasukanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        \App\Models\Pemasukan::factory()->create([
                'name' => 'Test User',
                'keterangan' => 'test',
                'nominal' => '20000',
                'tanggal' => '2023-05-20'
            ]);
    }
}
