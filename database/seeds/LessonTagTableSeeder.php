<?php

use App\Tag as Tag;
use App\Lesson as Lesson;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;


class LessonTagTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $lessonIds = Lesson::lists('id'); // [1,2,3,4,5,6,7]
        $tagIds = Tag::lists('id'); // [1,2,3,4,5,6,7]

        foreach (range(1,30) as $index) {
            DB::table('lesson_tag')->insert([

                'lesson_id' => $faker->randomElement($lessonIds->toArray()),
                'tag_id' => $faker->randomElement($tagIds->toArray())
            ]);
        }

    }
}
