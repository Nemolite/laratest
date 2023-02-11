<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id')->index('users_idx');
            $table->unsignedBigInteger('tasks_id')->index('utasks_idx');

            $table->foreign('users_id','users_fk')->on('users')->references('id');
            $table->foreign('tasks_id','utasks_fk')->on('tasks')->references('id');

            $table->string('role',2)->default('r'); //r-read,rw - read and write

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
        Schema::dropIfExists('users_tasks');
    }
}
