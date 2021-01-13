<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ph_payments', function (Blueprint $table) {
            $table->unsignedBigInteger('photographerpayment_id')->index();
            $table->unsignedBigInteger('photographer_id')->index();
            $table->foreign('photographerpayment_id')->references('id')->on('photographerpayments')->onDelete('cascade');
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
        Schema::dropIfExists('ph_payments');
    }
}
