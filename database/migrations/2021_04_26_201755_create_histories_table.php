<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->date('day')-> default(DB::raw('CURRENT_TIMESTAMP'));;
            $table->string('winner');
            $table->string('total');
            $table->unsignedBigInteger('lottery_id')->nullable();
            $table->timestamps();
            $table->foreign('lottery_id')->references('id')->on('lotteries')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histories');
    }
}
