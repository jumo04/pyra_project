<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Ticket;
use App\Models\Lottery;
use App\Models\User;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $user = User::first();
        
        $ticket = Ticket::create([
            'num' => [1524, 1458, 2014, 5689], 
            'name' => '47',
            'total' => 20000, 
            'created_at' => now()->format('Y-m-d'),
            'updated_at' => now()->format('Y-m-d')
        ]);

        $lotteries = Lottery::all()->random(3);
        $ticket->lotteries()->sync($lotteries);
        $user->tickets()->save($ticket);
        $ticket -> save();


        $ticket = Ticket::create([
            'num' => [4758, 457, 5698, 457], 
            'name' => '47',
            'total' => 20000, 
            'created_at' => now()->format('Y-m-d'),
            'updated_at' => now()->format('Y-m-d')
        ]);

        $lotteries = Lottery::all()->random(3);
        $ticket->lotteries()->sync($lotteries);
        $user->tickets()->save($ticket);
        $ticket -> save();

        $ticket = Ticket::create([
            'num' => [1474, 457, 236, 8987], 
            'name' => '47',
            'total' => 20000, 
            'created_at' => now()->format('Y-m-d'),
            'updated_at' => now()->format('Y-m-d')
        ]);

        $lotteries = Lottery::all()->random(3);
        $ticket->lotteries()->sync($lotteries);
        $user->tickets()->save($ticket);
        $ticket -> save();

        $ticket = Ticket::create([
            'num' => [2025, 1457, 1236, 4568], 
            'name' => '47',
            'total' => 20000, 
            'created_at' => now()->format('Y-m-d'),
            'updated_at' => now()->format('Y-m-d')
        ]);

        $lotteries = Lottery::all()->random(3);
        $ticket->lotteries()->sync($lotteries);
        $user->tickets()->save($ticket);
        $ticket -> save();
        
    }
}
