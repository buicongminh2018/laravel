<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhiShipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phi_ships', function (Blueprint $table) {
            $table->bigIncrements('phi_ship_id');
            $table->integer('phi_ship_matp');
            $table->integer('phi_ship_maqh');
            $table->integer('phi_ship_maxa');
            $table->string('phi_ship');
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
        Schema::dropIfExists('phi_ships');
    }
}
