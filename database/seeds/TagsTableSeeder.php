<?php

use App\Tag as Tag;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;


class TagsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,10) as $index) {

            DB::table('tags')->insert([
                'name' => $faker->word,
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime
            ]);
        }

    }
}
