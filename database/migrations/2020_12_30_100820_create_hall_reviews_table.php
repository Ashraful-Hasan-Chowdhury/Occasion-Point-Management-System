<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHallReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hall_reviews', function (Blueprint $table) {
            $table->unsignedBigInteger('review_id')->index();
            $table->unsignedBigInteger('hall_id')->index();
            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade');
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
        Schema::dropIfExists('hall_reviews');
    }
}
