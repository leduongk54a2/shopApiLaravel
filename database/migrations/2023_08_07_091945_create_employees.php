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
        Schema::create('employees', function (Blueprint $table) {
            $table->id("employee_id");
            $table->unsignedBigInteger('user_id')->unique();
            $table->dateTime('birth');
            $table->double('salary');
            $table->boolean('gender');
            // Add other employee-specific attributes here
            $table->timestamps();
            $table->foreign('user_id')->references('userID')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
