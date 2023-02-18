<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurdayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curday', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('num_lottery_id');
            $table->boolean('reboot')->default(false);
            $table->date('day');

            $table->foreign('num_lottery_id')
            ->references('id')
            ->on('num_lotteries')
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
        Schema::dropIfExists('curday');
    }
}
