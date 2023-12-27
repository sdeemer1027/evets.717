<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Add this line
use Faker\Factory as FakerFactory;
use Faker\Provider\en_US\PhoneNumber as PhoneNumberProvider;

use App\Models\User;
//use App\Models\Mypet;


//  use 

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create();
        $faker->addProvider(new PhoneNumberProvider($faker));

        $zipCodes = ['07840', '33020']; //, '60601', '77001', '85001', '19101', '78201', '92101', '75201', '95101'];
foreach($zipCodes as $zipCode){
        foreach (range(1, 50) as $index) {
           // $zipCode = $zipCodes[array_rand($zipCodes)];

            DB::table('users')->insert([
                'name'     => $faker->userName,
                'fname'    => $faker->firstName,
                'lname'    => $faker->lastName,
                'phone'    => $faker->e164PhoneNumber, // USA-formatted phone number
                'city'     => '',
                'state'    => '',
                'zip'      => $zipCode,
                'email'    => $faker->email,
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
    
$userpet = User::all();

foreach($userpet as $mypet){
DB::table('mypets')->insert([
'name' => $faker->firstName, 
'species'=> 'Dog', 
'age' => 3, 
'userid' => $mypet->id,
]);
} 












    }
}
