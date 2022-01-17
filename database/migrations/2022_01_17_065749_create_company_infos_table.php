<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_infos', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('uid');

            $table->string('company')->nullable();
            $table->string('logo')->nullable();
            $table->string('industry')->nullable();
            $table->string('number_staff')->nullable();
            $table->string('website')->nullable();
            $table->text('company_profile')->nullable();
            $table->string('province')->nullable();
            $table->string('detail_location')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_position')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();

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
        Schema::dropIfExists('company_infos');
    }
}
