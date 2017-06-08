<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LessonTest extends TestCase
{
    /** @test */
    public function is_welcome_page_is_laravel5()
    {
        $this->visit('/')
             ->see('Laravel 5');
    }


//    /** @test */
//    public function it_fatches_lessons() {
//
//        // arrange
//
//        $this->makeLesson();
//
//
//        // act
//        // get jason for url
//        $this->getJson('api/v1/lessons');
//
//
//
//        // assert
//        $this->assertResponseOk(); //assert that you have received status code 200
//
//    }
//
//    public function makeLesson($lessonFields = []) {
//
//    }
}
