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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->unsignedBigInteger('cartId');
            $table->unsignedBigInteger('productId');
            $table->integer('quantity');
            $table->primary(['cartId', 'productId']);
            $table->foreign('cartId')->references('cartId')->on('carts');
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
        Schema::dropIfExists('cart_items');
    }
};
