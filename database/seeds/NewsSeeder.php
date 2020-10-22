<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class NewsSeeder extends Seeder
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

    		DB::table('news')->insert([
                'photo' => "public/news/defaultProduct.jpg",
                'company_id' => $faker->numberBetween($min = 1, $max = 100),
                'location' => "Bekasi, Jawa Barat",
                'topic' => 'mining',
                'title' => $judul,
                'slug' => $slug,
                'description' =>  $faker->text($maxNbChars = 1000),
                'created_at' => now(),
                'updated_at' => now()
    		]);
 
    	}
    }
}
