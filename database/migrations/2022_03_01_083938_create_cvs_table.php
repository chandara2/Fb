<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('uid');
            $table->foreign('uid')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->string('photo')->nullable();
            $table->string('position_apply')->nullable();
            $table->string('expected_salary')->nullable();
            $table->string('kname')->nullable();
            $table->string('ename')->nullable();
            $table->string('nname')->nullable();
            $table->string('house_no')->nullable();
            $table->string('streat_no')->nullable();
            $table->string('group_no')->nullable();
            $table->string('village')->nullable();
            $table->string('commune')->nullable();
            $table->string('district')->nullable();
            $table->string('province')->nullable();
            $table->string('country')->nullable();
            $table->string('dob')->nullable();
            $table->string('sex')->nullable();
            $table->string('email')->nullable();
            $table->string('kphone')->nullable();
            $table->string('country_code')->nullable();
            $table->string('passport')->nullable();
            $table->string('id_card')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('nationality')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('education_background')->nullable(); //need other db
            $table->string('employment_history')->nullable(); //need other db
            $table->string('language')->nullable(); //need other db
            $table->string('family')->nullable(); //need other db
            $table->string('computer')->nullable(); //need other db
            $table->string('emergency')->nullable(); //need other db
            $table->string('relationship')->nullable(); //need other db
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
        Schema::dropIfExists('cvs');
    }
}
