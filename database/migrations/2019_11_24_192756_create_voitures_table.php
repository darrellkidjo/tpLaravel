<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voitures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('marque');
            $table->string('designation');
            $table->integer('nbr_portiere');
            $table->integer('nbr_siege');
            $table->integer('nbr_place_bagage');
            $table->boolean('automatique');
            $table->boolean('climatisation');
            $table->text('plus_details');
            $table->string('image');
            $table->Integer('user_id')->nullable();
            $table->timestamps();
            /*$table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voitures');
    }
}
