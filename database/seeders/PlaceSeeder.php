<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('places')->insert([
            'name' => 'Medellin',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('places')->insert([
            'name' => 'Apartada',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('places')->insert([
            'name' => 'Necocli',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
