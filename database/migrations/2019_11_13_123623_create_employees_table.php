<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Imię');
            $table->string('Nazwisko');
            $table->string('Pesel');
            $table->string('Stanowisko');
            $table->integer('Kwota dofinansowania')->nullable();
            $table->integer('Pozostała kwota')->nullable();
            $table->integer('Uprawnienia');
            $table->integer('Catering_id')->nullable()->unsigned();
            $table->foreign('Catering_id')
             ->references('id')->on('caterings')
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
        Schema::dropIfExists('employees');
    }
}
