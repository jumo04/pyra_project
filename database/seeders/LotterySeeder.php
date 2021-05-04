<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LotterySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('lotteries')->insert([
            'name' => 'MEDELLIN',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('lotteries')->insert([
            'name' => 'BUCARAMANGA',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('lotteries')->insert([
            'name' => 'BOGOTA',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
