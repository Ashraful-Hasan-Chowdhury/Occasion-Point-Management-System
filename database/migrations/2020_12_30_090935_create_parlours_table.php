<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParloursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parlours', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('nid')->nullable();
            $table->string('parlourname')->nullable();
            $table->string('document')->nullable();
            $table->string('address')->nullable();
            $table->string('parlourimage')->nullable();
            $table->Integer('due')->default(0);
            $table->string('approve')->default('pending');
            $table->string('block')->default('false');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            // name image email phone nid parlourname document address parlourimage
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parlours');
    }
}
