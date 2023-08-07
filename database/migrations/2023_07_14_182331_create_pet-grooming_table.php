<?php

use App\Models\petgroomers;
//use App\Models\Petgrooming;

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
        Schema::create('petgroomers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('local')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('phone')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

/* */
        $csvFile = fopen(base_path("database/data/petgrooming.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 20000, ",")) !== FALSE) {
            if (!$firstline) {
                petgroomers::create([
                    "name" => $data['1'],
                    "address" => $data['2'],
                    "local" =>$data['3'],
                    "city" =>$data['4'],
                    "state" =>$data['5'],
                    "zip" =>$data['6'],
                    "lat" =>$data['7'],
                    "lng" =>$data['8'],
                    "phone" =>$data['9'],
                    "description" => $data['10'],
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
/*
*/





    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pet-grooming');
    }
};
