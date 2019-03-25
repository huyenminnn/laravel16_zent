<?php

use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
    	for ($i = 0; $i < 20; $i++) {
            DB::table('blogs')->insert([
        		'content' => $faker->text($maxNbChars = 1000),
        		'images' => $faker->imageUrl($width = 640, $height = 480),
            ]);
        }
    }
}
