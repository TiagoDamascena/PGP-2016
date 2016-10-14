<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolYearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_years', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner')->unsigned();
            $table->string('name');
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->timestamps();

            $table->unique(['owner', 'name']);
            $table->foreign('owner')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('school_years');
    }
}
