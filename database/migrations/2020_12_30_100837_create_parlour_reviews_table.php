<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParlourReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parlour_reviews', function (Blueprint $table) {
            $table->unsignedBigInteger('review_id')->index();
            $table->unsignedBigInteger('parlour_id')->index();
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
        Schema::dropIfExists('parlour_reviews');
    }
}
