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
        Schema::create('ratings', function (Blueprint $table) {
            $table->unsignedBigInteger('customerId');
            $table->unsignedBigInteger('productId');
            $table->double('ratingPoint');
            $table->double('ratingPredict');
            $table->primary(['customerId', 'productId']);
            $table->foreign('customerId')->references('customer_id')->on('customers');
            $table->foreign('productId')->references('productId')->on('products');
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
        Schema::dropIfExists('ratings');
    }
};
