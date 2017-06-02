<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Response;

class LessonsController extends Controller
{

    public function index() {


        // Displaying all at once is bad practice because
        // 1. Returning all is bad
        // 2. No way to display meta data
        // 3. linking db structure to the API output
        // 4. No way to signal headers/response codes/ errors
        // return Lesson::all(); // bad practice



        // This is how it should be done

        $lessons = Lesson::all();

        // Quick display - works
        // return response()->json(compact('lessons'));

        // Rap up in data - works
        // return response()->json([
        //    'data' => $lessons->toArray()
        // ],200);

        // Transform - works
        return response()->json([
            'data' => $this->transformCollection($lessons) // here use transformCollection() because its collection of array's many lessons
        ],200);
    }

    public function show($id) {
        $lesson = Lesson::find($id);

        if( ! $lesson) {
            return response()->json([
               'error' => [
                   'message' => 'Lesson does not exist'
               ]
            ], 404 );
        }

        //return response()->json(compact('lesson'));
        return response()->json([
            'data' => $this->transform($lesson->toArray()) // here use transform() because its only one dimensional array single lesson
        ], 200);
    }


    private function transformCollection($lessons) {

        // array_map() function sends each value of an array $lessons->toArray() to function transform()
        // It then walks through the elements in the array $lessons->toArray() .
        // For each element, it calls your function transform()
        // with the element's value, and your callback function
        // needs to return the new value to use for the element.
        // call a method transform() on array_map
        return array_map( [$this, 'transform'], $lessons->toArray() );
    }

    private function transform($lesson) {

        return [
            'title' => $lesson['title'],
            'body' => $lesson['body'],
            'active' => (boolean) $lesson['some_bool'], // cast to boolean 
        ];
    }
}
