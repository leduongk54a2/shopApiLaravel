<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id("orderId");
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('userID')->on('users')->onDelete('cascade');
            $table->dateTime("shippedDate");
            $table->double("total");
            $table->string("customerInfo");
            $table->boolean("status");
            $table->string("comment");
            $table->string("address");
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
        Schema::dropIfExists('order');
    }
};
