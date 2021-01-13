<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('par_packages', function (Blueprint $table) {
            $table->unsignedBigInteger('parlourpackage_id')->index();
            $table->unsignedBigInteger('parlour_id')->index();
            $table->foreign('parlourpackage_id')->references('id')->on('parlourpackages')->onDelete('cascade');
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
        Schema::dropIfExists('par_packages');
    }
}
