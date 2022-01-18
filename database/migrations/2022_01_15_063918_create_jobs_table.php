<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('uid');
            $table->foreign('uid')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->string('age')->nullable();
            $table->string('contact')->nullable();
            $table->date('deadline')->nullable();
            $table->text('detail')->nullable();
            $table->tinyInteger('hiring')->nullable();
            $table->string('industry')->nullable();
            $table->string('job_function')->nullable();
            $table->string('job_title')->nullable();
            $table->string('language')->nullable();
            $table->string('location')->nullable();
            $table->string('qualification')->nullable();
            $table->string('salary')->nullable();
            $table->string('sex')->nullable();
            $table->string('term')->nullable();
            $table->tinyInteger('year_of_exp')->nullable();
            $table->boolean('visible')->default(1);

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
        Schema::dropIfExists('jobs');
    }
}
