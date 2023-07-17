<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('specialization')->nullable();
            // Add more columns as per your requirements
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->timestamps();
        });
        $veterinarians = [
            [
                'name' => 'Dr. Robert Wilson',
                'phone' => '954-123-4567',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33021',
            ],
            [
                'name' => 'Dr. Lisa Anderson',
                'phone' => '954-234-5678',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33025',
            ],
            [
                'name' => 'Dr. Michael Thompson',
                'phone' => '954-345-6789',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33024',
            ],
            [
                'name' => 'Dr. Jennifer Davis',
                'phone' => '954-456-7890',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33020',
            ],
            [
                'name' => 'Dr. David Miller',
                'phone' => '954-567-8901',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33023',
            ],
            [
                'name' => 'Dr. Laura Thompson',
                'phone' => '954-678-9012',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33019',
            ],
            [
                'name' => 'Dr. Daniel Wilson',
                'phone' => '954-789-0123',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33022',
            ],
            [
                'name' => 'Dr. Emily Johnson',
                'phone' => '954-890-1234',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33026',
            ],
            [
                'name' => 'Dr. James Brown',
                'phone' => '954-901-2345',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33027',
            ],
            [
                'name' => 'Dr. Olivia Davis',
                'phone' => '954-012-3456',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33028',
            ],
            [
                'name' => 'Dr. Ethan Wilson',
                'phone' => '954-123-4567',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33029',
            ],
            [
                'name' => 'Dr. Lily Johnson',
                'phone' => '954-234-5678',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33024',
            ],
            [
                'name' => 'Dr. Benjamin Miller',
                'phone' => '954-345-6789',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33020',
            ],
            [
                'name' => 'Dr. Chloe Thompson',
                'phone' => '954-456-7890',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33023',
            ],
            [
                'name' => 'Dr. William Anderson',
                'phone' => '954-567-8901',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33021',
            ],
            [
                'name' => 'Dr. Sophia Wilson',
                'phone' => '954-678-9012',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33025',
            ],
            [
                'name' => 'Dr. Noah Davis',
                'phone' => '954-789-0123',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33026',
            ],
            [
                'name' => 'Dr. Mia Johnson',
                'phone' => '954-890-1234',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33019',
            ],
            [
                'name' => 'Dr. Ethan Davis',
                'phone' => '954-901-2345',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33027',
            ],
            [
                'name' => 'Dr. Ava Brown',
                'phone' => '954-012-3456',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33020',
            ],
            [
                'name' => 'Dr. Oliver Thompson',
                'phone' => '954-123-4567',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33023',
            ],
            [
                'name' => 'Dr. Harper Miller',
                'phone' => '954-234-5678',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33024',
            ],
            [
                'name' => 'Dr. Jackson Wilson',
                'phone' => '954-345-6789',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33026',
            ],
            [
                'name' => 'Dr. Isabella Anderson',
                'phone' => '954-456-7890',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33027',
            ],
            [
                'name' => 'Dr. Aiden Thompson',
                'phone' => '954-567-8901',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33029',
            ],
            [
                'name' => 'Dr. Scarlett Johnson',
                'phone' => '954-678-9012',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33020',
            ],
            [
                'name' => 'Dr. Carter Davis',
                'phone' => '954-789-0123',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33023',
            ],
        ];

        foreach ($veterinarians as $veterinarian) {
       //     doctors::create($veterinarian);

            DB::table('doctors')->insert([
                $veterinarian
            ]);







        }



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
};
