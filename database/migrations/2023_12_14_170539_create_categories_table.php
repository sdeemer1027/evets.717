<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });



  DB::table('categories')->insert([
            'name'     => 'Technology',
        ]);
   DB::table('categories')->insert([
            'name'     => 'Travel',
        ]);
         DB::table('categories')->insert([
            'name'     => 'Adoption',
        ]);
 DB::table('categories')->insert([
            'name'     => 'Dogs',
        ]);
  DB::table('categories')->insert([
            'name'     => 'Cats',
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
