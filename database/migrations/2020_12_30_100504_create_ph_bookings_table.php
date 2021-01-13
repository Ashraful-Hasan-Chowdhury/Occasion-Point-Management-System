<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ph_bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('photographerbooking_id')->index();
            $table->unsignedBigInteger('photographer_id')->index();
            $table->foreign('photographerbooking_id')->references('id')->on('photographerbookings')->onDelete('cascade');
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
        Schema::dropIfExists('ph_bookings');
    }
}
