<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabePrixLcataires extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prix-loc', function (Blueprint $table) {
            $table->id();
            $table->date('datedebut')->nullable();
            $table->date('datefin')->nullable();
            $table->float('prix')->nullable();
            $table->integer('salle_id')->unsigned()->index();
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
        Schema::dropIfExists('prix-loc');
    }
}
