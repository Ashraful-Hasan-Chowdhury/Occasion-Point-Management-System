<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParlourpackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parlourpackages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->text('details');
            $table->string('price');
            $table->string('discount');
            $table->string('discount_price');
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
        Schema::dropIfExists('parlourpackages');
    }
}
