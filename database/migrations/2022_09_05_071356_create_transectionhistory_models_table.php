<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transectionhistory_models', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sender_user_id')->unsigned();
            $table->foreign('sender_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('receiver_user_id')->unsigned();
            $table->foreign('receiver_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('amount');
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
        Schema::dropIfExists('transectionhistory_models');
    }
};
