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
        Schema::create('office_locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('website')->nullable();
            $table->timestamps();
        });

        $officeLocations = [
            [
                'name' => 'Hollywood Animal Hospital',
                'address' => '123 Main Street',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33019',
                'phone' => '954-123-4567',
                'website' => 'http://www.hollywoodanimalhospital.com',
            ],
            [
                'name' => 'Coastal Veterinary Clinic',
                'address' => '456 Elm Avenue',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33020',
                'phone' => '954-234-5678',
                'website' => 'http://www.coastalvetclinic.com',
            ],
            [
                'name' => 'Sunset Pet Hospital',
                'address' => '789 Oak Road',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33021',
                'phone' => '954-345-6789',
                'website' => 'http://www.sunsetpethospital.com',
            ],
            [
                'name' => 'Downtown Veterinary Clinic',
                'address' => '321 Maple Street',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33023',
                'phone' => '954-456-7890',
                'website' => 'http://www.downtownvetclinic.com',
            ],
            [
                'name' => 'Southside Animal Clinic',
                'address' => '555 Pine Avenue',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33024',
                'phone' => '954-567-8901',
                'website' => 'http://www.southsideanimalclinic.com',
            ],
            [
                'name' => 'Northwest Veterinary Hospital',
                'address' => '777 Cedar Lane',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33025',
                'phone' => '954-678-9012',
                'website' => 'http://www.nwvethospital.com',
            ],
            [
                'name' => 'Beachside Veterinary Clinic',
                'address' => '888 Seashore Blvd',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33026',
                'phone' => '954-789-0123',
                'website' => 'http://www.beachsidevetclinic.com',
            ],
            [
                'name' => 'Palm Tree Animal Clinic',
                'address' => '999 Palm Avenue',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33027',
                'phone' => '954-890-1234',
                'website' => 'http://www.palmtreeanimalclinic.com',
            ],
            [
                'name' => 'Oakwood Veterinary Hospital',
                'address' => '111 Oakwood Drive',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33019',
                'phone' => '954-901-2345',
                'website' => 'http://www.oakwoodvethospital.com',
            ],
            [
                'name' => 'Lakeview Animal Clinic',
                'address' => '222 Lakeview Avenue',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33020',
                'phone' => '954-012-3456',
                'website' => 'http://www.lakeviewanimalclinic.com',
            ],
            [
                'name' => 'Westside Veterinary Center',
                'address' => '333 Westside Street',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33021',
                'phone' => '954-123-4567',
                'website' => 'http://www.westsidevetcenter.com',
            ],
            [
                'name' => 'Hilltop Animal Hospital',
                'address' => '444 Hilltop Road',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33023',
                'phone' => '954-234-5678',
                'website' => 'http://www.hilltopanimalhospital.com',
            ],
            [
                'name' => 'Grove Veterinary Clinic',
                'address' => '555 Grove Lane',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33024',
                'phone' => '954-345-6789',
                'website' => 'http://www.grovevetclinic.com',
            ],
            [
                'name' => 'Central Animal Care',
                'address' => '666 Central Avenue',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33025',
                'phone' => '954-456-7890',
                'website' => 'http://www.centralanimalcare.com',
            ],
            [
                'name' => 'Bayside Animal Hospital',
                'address' => '777 Bayside Drive',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33026',
                'phone' => '954-567-8901',
                'website' => 'http://www.baysideanimalhospital.com',
            ],
            [
                'name' => 'Harmony Veterinary Clinic',
                'address' => '888 Harmony Avenue',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33027',
                'phone' => '954-678-9012',
                'website' => 'http://www.harmonyvetclinic.com',
            ],
            [
                'name' => 'Evergreen Pet Clinic',
                'address' => '999 Evergreen Blvd',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33019',
                'phone' => '954-789-0123',
                'website' => 'http://www.evergreenpetclinic.com',
            ],
            [
                'name' => 'Magnolia Veterinary Center',
                'address' => '111 Magnolia Street',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33020',
                'phone' => '954-890-1234',
                'website' => 'http://www.magnoliavetcenter.com',
            ],
            [
                'name' => 'Parkside Animal Hospital',
                'address' => '222 Parkside Drive',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33021',
                'phone' => '954-901-2345',
                'website' => 'http://www.parksideanimalhospital.com',
            ],
            [
                'name' => 'Sunnybrook Veterinary Clinic',
                'address' => '333 Sunnybrook Road',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33023',
                'phone' => '954-012-3456',
                'website' => 'http://www.sunnybrookvetclinic.com',
            ],
            [
                'name' => 'Whispering Pines Animal Clinic',
                'address' => '444 Whispering Pines Lane',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33024',
                'phone' => '954-123-4567',
                'website' => 'http://www.whisperingpinesvetclinic.com',
            ],
            [
                'name' => 'Coral Bay Animal Hospital',
                'address' => '555 Coral Bay Avenue',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33025',
                'phone' => '954-234-5678',
                'website' => 'http://www.coralbayanimalhospital.com',
            ],
            [
                'name' => 'Windsor Veterinary Clinic',
                'address' => '666 Windsor Street',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33026',
                'phone' => '954-345-6789',
                'website' => 'http://www.windsorvetclinic.com',
            ],
            [
                'name' => 'Pinecrest Animal Hospital',
                'address' => '777 Pinecrest Drive',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33027',
                'phone' => '954-456-7890',
                'website' => 'http://www.pinecrestanimalhospital.com',
            ],
            [
                'name' => 'Golden Gate Veterinary Center',
                'address' => '888 Golden Gate Lane',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33019',
                'phone' => '954-567-8901',
                'website' => 'http://www.goldengatevetcenter.com',
            ],
            [
                'name' => 'Sunrise Pet Clinic',
                'address' => '111 Sunrise Avenue',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33020',
                'phone' => '954-678-9012',
                'website' => 'http://www.sunrisepetclinic.com',
            ],
            [
                'name' => 'Valley Animal Hospital',
                'address' => '222 Valley Road',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33021',
                'phone' => '954-789-0123',
                'website' => 'http://www.valleyanimalhospital.com',
            ],
            [
                'name' => 'Westbrook Veterinary Clinic',
                'address' => '333 Westbrook Street',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33023',
                'phone' => '954-012-3456',
                'website' => 'http://www.westbrookvetclinic.com',
            ],
            [
                'name' => 'Riverbend Animal Care',
                'address' => '444 Riverbend Avenue',
                'city' => 'Hollywood',
                'state' => 'Florida',
                'zip' => '33024',
                'phone' => '954-123-4567',
                'website' => 'http://www.riverbendanimalcare.com',
            ],
        ];


        foreach ($officeLocations as $officeLocation) {
            //     doctors::create($veterinarian);

            DB::table('office_locations')->insert([
                $officeLocation
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
        Schema::dropIfExists('office_locations');
    }
};
