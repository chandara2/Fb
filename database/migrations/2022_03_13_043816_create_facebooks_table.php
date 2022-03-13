<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacebooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facebooks', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('uid');
            $table->foreign('uid')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->date('date')->nullable();
            $table->string('create_by')->nullable();
            $table->string('status')->nullable();
            $table->string('fname')->nullable();
            $table->string('gname')->nullable();
            $table->string('email')->nullable();
            $table->string('email_pw')->nullable();
            $table->string('fb_id')->nullable();
            $table->string('fb_pw')->nullable();
            $table->string('twofa')->nullable();
            $table->string('friends')->nullable();
            $table->string('country')->nullable();
            $table->string('visa')->nullable();
            $table->date('visa_date')->nullable();
            $table->string('boost_by')->nullable();
            $table->date('boost_date')->nullable();

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
        Schema::dropIfExists('facebooks');
    }
}
