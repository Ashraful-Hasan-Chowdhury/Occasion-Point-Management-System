<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHallownersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hallowners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('nid')->nullable();
            $table->string('hallname')->nullable();
            $table->string('document')->nullable();
            $table->string('address')->nullable();
            $table->string('hallimage')->nullable();
            $table->Integer('due')->default(0);
            $table->string('approve')->default('pending');
            $table->string('block')->default('false');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('hallowners');
    }
}
