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
       Schema::create('ownerdetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Assuming you want to associate owner details with a user
            $table->unsignedBigInteger('pet_id');
            $table->boolean('name')->default(0);
            $table->boolean('fname')->default(0);
            $table->boolean('lname')->default(0);
            $table->boolean('email')->default(0);
            $table->boolean('phone')->default(0);
            $table->boolean('address')->default(0);
            $table->boolean('city')->default(0);
            $table->boolean('state')->default(0);
            $table->boolean('zip')->default(0);
            $table->boolean('show')->default(0); // Adding a boolean column with a default value of 0

            // Add more columns as needed

            $table->timestamps();

            // Define foreign key relationship with the users table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ownerdetails');
    }
};
