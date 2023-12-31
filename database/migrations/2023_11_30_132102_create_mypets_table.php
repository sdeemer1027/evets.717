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
        Schema::create('mypets', function (Blueprint $table) {
           $table->id();
            $table->string('name');
            $table->string('species');
            $table->integer('age');
            $table->unsignedBigInteger('userid'); // Assuming userid is of type unsigned big integer
            

            // Add more columns as needed

            $table->timestamps();
            
            // Add index to userid column
            $table->index('userid');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mypets');
    }
};
