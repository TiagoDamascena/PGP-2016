<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_terms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year')->unsigned();
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();

            $table->unique(['year', 'name']);
            $table->foreign('year')->references('id')->on('school_years')->onUpdate('cascade')->onDelete('cascade');
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
