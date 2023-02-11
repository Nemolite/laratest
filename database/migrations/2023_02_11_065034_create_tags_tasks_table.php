<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags_tasks', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('tags_id')->index('tags_idx');
            $table->unsignedBigInteger('tasks_id')->index('ttasks_idx');

            $table->foreign('tags_id','tags_fk')->on('tags')->references('id');
            $table->foreign('tasks_id','ttasks_fk')->on('tasks')->references('id');

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
        Schema::dropIfExists('tags_tasks');
    }
}
