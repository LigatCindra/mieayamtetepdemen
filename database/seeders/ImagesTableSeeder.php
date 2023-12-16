<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('images')->insert([
            'details' => 'Banner Mie Ayam Tetep Demen',
            'url' => 'storage/uploads/IMG_04281.png'
        ]);

        DB::table('images')->insert([
            'details' => 'Gerobak depan',
            'url' => 'storage/uploads/IMG_04285.png'
        ]);

        DB::table('images')->insert([
            'details' => 'Logo',
            'url' => 'storage/uploads/logo.png'
        ]);

        DB::table('images')->insert([
            'details' => 'Whatsapp',
            'url' => 'storage/uploads/wa3.png'
        ]);


    }
}
