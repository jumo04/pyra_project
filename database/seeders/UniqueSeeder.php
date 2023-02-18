<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UniqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unique')->insert([
            'time' => '06:00pm',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
