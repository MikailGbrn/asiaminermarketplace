<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 200; $i++){
 
            // insert data ke table pegawai menggunakan Faker
            $judul = $faker->sentence($nbWords = 4, $variableNbWords = true);
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $judul)));

    		DB::table('products')->insert([
                'photo' => "default.jpg",
                'company_id' => $faker->numberBetween($min = 1, $max = 100),
                'catagory_id' => $faker->numberBetween($min = 1, $max = 3),
                'name' => $judul,
                'slug' => $slug,
                'description' =>  $faker->text($maxNbChars = 1000),
                'view' => 0,
                'created_at' => now(),
                'updated_at' => now()
    		]);
 
    	}
    }
}
