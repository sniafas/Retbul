<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('datasets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('imgId');
            $table->integer('building');
            $table->string('url',65);
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
        Schema::drop('dataset');
    }
}
