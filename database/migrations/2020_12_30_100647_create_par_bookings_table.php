<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('par_bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('parlourbooking_id')->index();
            $table->unsignedBigInteger('parlour_id')->index();
            $table->foreign('parlourbooking_id')->references('id')->on('parlourbookings')->onDelete('cascade');
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
        Schema::dropIfExists('par_bookings');
    }
}
