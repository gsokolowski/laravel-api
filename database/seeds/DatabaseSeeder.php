<?php

use App\Lesson as Lesson;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Lesson::truncate();
        //DB::table('lessons')->truncate();
        $this->call(LessonsTableSeeder::class);
    }
}
