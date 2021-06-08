<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSprintTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sprint_tasks', function (Blueprint $table) {

            $table->id();
            $table->integer('sprint_id');
            $table->integer('task_id');
            $table->string('priority')->nullable();
            $table->string('type')->nullable();
            $table->integer('assign_to')->nullable();
            $table->integer('checked_by')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('sprint_tasks');
    }
}
