<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHalladminHallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('halladmin_halls', function (Blueprint $table) {
            $table->unsignedBigInteger('hall_id')->index();
            $table->unsignedBigInteger('hallowner_id')->index();
            $table->foreign('hall_id')->references('id')->on('halls')->onDelete('cascade');
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
        Schema::dropIfExists('halladmin_halls');
    }
}
