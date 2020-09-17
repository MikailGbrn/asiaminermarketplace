<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class companySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 100; $i++){
 
            // insert data ke table pegawai menggunakan Faker
            $nama = $faker->company;
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $nama)));

    		DB::table('companies')->insert([
                'logo' => "default.jpg",
                'name' => $nama,
                'slug' => $slug,
                'website' => "www.".$slug.".com",
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'business_hour' => "08.00-17.00",
                'description' =>  $faker->text($maxNbChars = 255) ,
                'created_at' => now(),
                'updated_at' => now()
    		]);
 
    	}
    }
}
