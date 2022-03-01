<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvEmploymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv_employments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('uid');
            $table->foreign('uid')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->string('company')->nullable();
            $table->string('position')->nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->string('last_salary')->nullable();
            $table->string('leave')->nullable();

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
        Schema::dropIfExists('cv_employments');
    }
}
