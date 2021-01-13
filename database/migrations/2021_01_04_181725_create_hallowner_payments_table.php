<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHallownerPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hallowner_payments', function (Blueprint $table) {
            $table->unsignedBigInteger('hall_payment_id')->index();
            $table->unsignedBigInteger('hallowner_id')->index();
            $table->foreign('hall_payment_id')->references('id')->on('hall_payments')->onDelete('cascade');
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
        Schema::dropIfExists('hallowner_payments');
    }
}
