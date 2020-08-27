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
            $table->integer('salle_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('client_id')->unsigned()->index();
            $table->datetime('start_date')->nullable();
            $table->datetime('end_date')->nullable();
            $table->text('description')->nullable();
            $table->float('prix')->nullable();
            $table->boolean('engagement')->default(0);
            $table->boolean('permisdefete')->default(0);
            $table->integer('prix_id')->unsigned()->index();
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
