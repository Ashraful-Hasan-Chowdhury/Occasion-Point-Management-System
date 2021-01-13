<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('halls', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name');
            $table->text('address');
            $table->text('details');
            $table->string('space');
            $table->string('amount');
            $table->string('discount');
            $table->string('discount_amount');
            $table->timestamps();
            // image name address details space amount discount discount_amount
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('halls');
    }
}
