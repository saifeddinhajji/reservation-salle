<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autres', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->integer('espace')->nullable();
            $table->string('type')->nullable();
            $table->integer('nombre_chambre')->nullable();
            $table->string('adresse')->nullable();
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
        Schema::dropIfExists('autres');
    }
}
