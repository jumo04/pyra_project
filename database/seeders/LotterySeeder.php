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
            'name' => 'CRUZ ROJA',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('lotteries')->insert([
            'name' => 'HUILA',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('lotteries')->insert([
            'name' => 'SINUANO',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('lotteries')->insert([
            'name' => 'CARIBEÑA',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('lotteries')->insert([
            'name' => 'RISARALDA',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('lotteries')->insert([
            'name' => 'SANTANDER',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('lotteries')->insert([
            'name' => 'BOYACA',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('lotteries')->insert([
            'name' => 'CAUCA',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('lotteries')->insert([
            'name' => 'QUINDIO',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('lotteries')->insert([
            'name' => 'TOLIMA',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('lotteries')->insert([
            'name' => 'CUNDINAMARCA',
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
