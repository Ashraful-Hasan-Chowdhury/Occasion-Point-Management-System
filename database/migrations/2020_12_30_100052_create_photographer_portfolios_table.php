<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotographerPortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photographer_portfolios', function (Blueprint $table) {
            $table->unsignedBigInteger('portfolio_id')->index();
            $table->unsignedBigInteger('photographer_id')->index();
            $table->foreign('portfolio_id')->references('id')->on('portfolios')->onDelete('cascade');
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
        Schema::dropIfExists('photographer_portfolios');
    }
}
