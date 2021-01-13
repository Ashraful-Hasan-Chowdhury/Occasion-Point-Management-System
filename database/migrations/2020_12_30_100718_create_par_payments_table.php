<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('par_payments', function (Blueprint $table) {
            $table->unsignedBigInteger('parlourpayment_id')->index();
            $table->unsignedBigInteger('parlour_id')->index();
            $table->foreign('parlourpayment_id')->references('id')->on('parlourpayments')->onDelete('cascade');
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
        Schema::dropIfExists('par_payments');
    }
}
