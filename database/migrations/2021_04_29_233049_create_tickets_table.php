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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->integer('total');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

        });

        /* Schema::create('user_has_tickets', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('ticket_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('ticket_id')
                ->references('id')
                ->on('tickets')
                ->onDelete('cascade');

            $table->primary(['user_id', 'ticket_id'], 'user_has_tickets_ticket_id_user_id_primary');
        }); */

        /* Schema::table('tickets', function($table)
        {
            $table->foreign('place_id')
                ->references('name')->on('places');

            $table->foreign('lottery_id')
                ->references('name')->on('lotteries');
        }); */


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
