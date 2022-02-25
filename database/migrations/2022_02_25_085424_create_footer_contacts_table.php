<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFooterContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_contacts', function (Blueprint $table) {
            $table->id();

            $table->text('contact_ch')->nullable();
            $table->text('contact_en')->nullable();
            $table->text('contact_kh')->nullable();
            $table->text('contact_th')->nullable();
            
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
        Schema::dropIfExists('footer_contacts');
    }
}
