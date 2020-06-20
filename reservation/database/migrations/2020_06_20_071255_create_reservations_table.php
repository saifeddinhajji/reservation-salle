<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('salle')->nullable();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('client_id')->unsigned()->index();
            $table->datetime('start_date')->nullable();
            $table->datetime('end_date')->nullable();
            $table->text('description')->nullable();
            $table->integer('prix')->nullable();
            $table->integer('avance')->nullable();
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
        Schema::dropIfExists('reservations');
    }
}
