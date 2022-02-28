<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareerResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_resources', function (Blueprint $table) {
            $table->id();
            $table->string('post_img')->nullable();
            $table->string('title_ch')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_kh')->nullable();
            $table->string('title_th')->nullable();
            $table->longText('post_ch')->nullable();
            $table->longText('post_en')->nullable();
            $table->longText('post_kh')->nullable();
            $table->longText('post_th')->nullable();
            $table->string('type')->nullable();
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
        Schema::dropIfExists('career_resources');
    }
}
