<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
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
        $this->call([PermissionTableSeeder::class]);
        $this->call([PlaceSeeder::class]);
        $this->call([UsersTableSeeder::class]);
        $this->call([CreateAdminUserSeeder::class]);
        $this->call([UniqueSeeder::class]);
        $this->call([LotterySeeder::class]);
        $this->call([TicketSeeder::class]);
    }
}
