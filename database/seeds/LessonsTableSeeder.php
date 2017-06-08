<?php

use App\Lesson as Lesson;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class LessonsTableSeeder extends Seeder
{

    public function run()
    {
        //Lesson::truncate();
        //DB::table('lessons')->truncate();

        $faker = Faker::create();

        foreach (range(1,30) as $index) {
            DB::table('lessons')->insert([
                'title' => $faker->sentence(5),
                'body' => $faker->paragraph(4),
                'some_bool' => $faker->boolean(),
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime
            ]);
        }
    }
}
