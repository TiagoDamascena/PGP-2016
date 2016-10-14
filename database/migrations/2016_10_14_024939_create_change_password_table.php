<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChangePasswordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('change_password', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('user')->unsigned;
            $table->string('unique_key');
            $table->timestamps();

            $table->unique('unique_key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('change_password');
    }
}
