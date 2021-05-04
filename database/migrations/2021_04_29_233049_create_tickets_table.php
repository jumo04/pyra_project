<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('num');
            $table->unsignedInteger('lottery_id');
            $table->unsignedInteger('place_id');
            $table->integer('total');
            $table->timestamps();
        });

        /* Schema::table('tickets', function($table)
        {
            $table->foreign('place_id')
                ->references('name')->on('places');

            $table->foreign('lottery_id')
                ->references('name')->on('lotteries');
        }); */

        Schema::enableForeignKeyConstraints();

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
