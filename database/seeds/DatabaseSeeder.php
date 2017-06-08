<?php

use App\Lesson as Lesson;
use App\Tag as Tag;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    private $dbTables = [
        'lessons',
        'tags',
        'lesson_tag',
    ];

    public function run()
    {
        $this->cleanDatabase();

        $this->call(LessonsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(LessonTagTableSeeder::class);
    }

    private function cleanDatabase()
    {
        // for error 1701
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach($this->dbTables as $tableName ) {

            DB::table($tableName)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
