<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->date('Dzien');
            $table->integer('Zamowienia_id')->unsigned();
            $table->foreign('Zamowienia_id')
             ->references('id')->on('orders')
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
        Schema::dropIfExists('daily_orders');
    }
}
