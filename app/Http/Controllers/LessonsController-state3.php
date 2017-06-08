<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Response;
use Acme\Transformers\LessonTransformer;

class LessonsController extends Controller
{

    protected $lessonTransformer;

    function __construct(LessonTransformer $lessonTransformer) {

        $this->lessonTransformer = $lessonTransformer;

    }
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
            'data' => $this->lessonTransformer->transformCollection($lessons->toArray()) // here use transformCollection() because its collection of array's many lessons
        ],200);
    }

    public function show($id) {
        $lesson = Lesson::find($id);

        if( ! $lesson) {

            return $this->respondNotFound('Lesson does not exist');
//            return response()->json([
//               'error' => [
//                   'message' => 'Lesson does not exist'
//               ]
//            ], 404 );
        }

        //return response()->json(compact('lesson'));
        return response()->json([
            'data' => $this->lessonTransformer->transform($lesson) // here use transform() because its only one dimensional array single lesson
        ], 200);
    }
}
