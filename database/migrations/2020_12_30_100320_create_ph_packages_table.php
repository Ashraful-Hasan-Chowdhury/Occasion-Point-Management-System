<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ph_packages', function (Blueprint $table) {
            $table->unsignedBigInteger('photographerpackage_id')->index();
            $table->unsignedBigInteger('photographer_id')->index();
            $table->foreign('photographerpackage_id')->references('id')->on('photographerpackages')->onDelete('cascade');
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
        Schema::dropIfExists('ph_packages');
    }
}
