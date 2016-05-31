<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCosanctionEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cosanction_event', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cosanction_id')->unsigned();;
            $table->foreign('cosanction_id')->references('id')->on('cosanctions')->onDelete('cascade');
            $table->integer('event_id')->unsigned();;
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
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
        Schema::drop('cosanction_event');
    }
}
