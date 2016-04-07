<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('location');
            $table->string('cosanction');
            $table->string('deadline');
            $table->string('producer');
            $table->longText('notes');
            $table->string('dresscode');
            $table->string('option');
            $table->integer('timeonly');
            $table->integer('latefee');
            $table->integer('arenafee')->nullable();
            $table->integer('campingfee')->nullable();
            $table->integer('stallfee')->nullable();
            $table->integer('bbq')->nullable();
            $table->date('date');
            $table->integer('multiplier');
            $table->string('resultspath')->nullable();
            $table->boolean('uploadedresults')->default(0);
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
        Schema::drop('events');
    }
}
