<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class mediaSeeder extends Seeder
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
            $judul = $faker->sentence($nbWords = 4, $variableNbWords = true);
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $judul)));

    		DB::table('media')->insert([
                'photo' => "default.jpg",
                'company_id' => $faker->numberBetween($min = 1, $max = 100),
                'media_catagory_id' => $faker->numberBetween($min = 1, $max = 28),
                'title' => $judul,
                'slug' => $slug,
                'author' => $faker->company,
                'description' =>  $faker->text($maxNbChars = 1000),
                'content_type' => $faker->randomElement($array = array ('Mining Product','Concrete Products','Cement Americas','Quarry Equipment Marketplace','Rocks Products','The Asia Miner')),
                'view' => 0,
                'download' => 0,
                'keyword' => $faker->randomElement($array = array ('coal','mining','software')),
                'type' => $faker->randomElement($array = array ('Audio','Catalogue','E-Book','Image', 'Power Point', 'Video File', 'Video Link', 'Webinar','Case Study')),
                'file_name' => "txt",
                'created_at' => now(),
                'updated_at' => now()
    		]);
 
    	}
    }
}
