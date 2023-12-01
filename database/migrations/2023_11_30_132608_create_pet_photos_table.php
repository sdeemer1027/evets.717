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
        Schema::create('pet_photos', function (Blueprint $table) {
                       $table->id();
            $table->unsignedBigInteger('pet_id');
   //         $table->string('photo_path');
            $table->string('photo_path'); // Add this line
            // Add more columns as needed

            $table->timestamps();

            // Add foreign key constraint to link with the pets table
            $table->foreign('pet_id')->references('id')->on('mypets')->onDelete('cascade');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pet_photos');
    }
};
