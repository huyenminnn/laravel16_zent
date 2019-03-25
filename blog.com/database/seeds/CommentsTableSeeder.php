<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
    	for ($i = 0; $i < 50; $i++) {
            DB::table('comments')->insert([ //,
                'user_id' => $faker->integer(),
                'blog_id' => $faker->integer(),
                'comment' => $faker->text($maxNbChars = 100000),
            ]);
        }
    }
}
