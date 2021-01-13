<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParlourbookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parlourbookings', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('package_id');
            $table->string('bookingdate');
            $table->text('details');
            $table->string('trxid');
            $table->string('approve')->default('pending');
            $table->string('cancel')->default('false');
            $table->string('cancel_res')->nullable();
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
        Schema::dropIfExists('parlourbookings');
    }
}
