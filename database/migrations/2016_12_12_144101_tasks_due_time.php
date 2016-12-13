<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TasksDueTime extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('tasks', function ($table) {
                $table->time('due_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {

    }
}
