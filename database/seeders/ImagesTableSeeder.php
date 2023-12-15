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
            'url' => file_get_contents('uploads/IMG_04281.PNG')
        ]);
    }
}
