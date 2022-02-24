<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_qualifications', function (Blueprint $table) {
            $table->id();
            $table->string('qualification_ch');
            $table->string('qualification_en');
            $table->string('qualification_kh');
            $table->string('qualification_th');
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
        Schema::dropIfExists('job_qualifications');
    }
}
