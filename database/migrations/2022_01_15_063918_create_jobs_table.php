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

            $table->boolean('approved')->default(false);
            $table->string('company_id')->nullable();
            $table->string('title_ch')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_kh')->nullable();
            $table->string('title_th')->nullable();
            $table->string('age')->nullable();
            $table->string('contact')->nullable();
            $table->date('expired_job')->nullable();
            $table->date('expired_post')->nullable();
            $table->string('function')->nullable();
            $table->smallInteger('hiring')->nullable();
            $table->string('industry')->nullable();
            $table->string('language')->nullable();
            $table->string('level')->nullable();
            $table->string('location')->nullable();
            $table->string('qualification')->nullable();
            $table->string('salary')->nullable();
            $table->string('sex')->nullable();
            $table->string('term')->nullable();
            $table->string('year_of_exp')->nullable();
            $table->mediumText('detail')->nullable();

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
