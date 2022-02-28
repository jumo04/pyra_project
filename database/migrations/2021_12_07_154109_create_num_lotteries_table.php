<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNumLotteriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('num_lotteries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('num_id')->nullable();
            $table->unsignedBigInteger('lottery_id')->nullable();
            $table->integer('total_count');
            $table->integer('total');

            $table->foreign('num_id')
            ->references('id')
            ->on('num')
            ->onDelete('cascade');

            $table->foreign('lottery_id')
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
        Schema::dropIfExists('num_lotteries');
    }
}
