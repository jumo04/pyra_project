<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotteryTicket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lottery_ticket', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('lottery_id');
            $table->unsignedBigInteger('ticket_id');

            
            $table->foreign('lottery_id')
            ->references('id')
            ->on('lotteries')
            ->onDelete('cascade');

            $table->foreign('ticket_id')
            ->references('id')
            ->on('lotteries')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lottery_ticket');
    }
}
