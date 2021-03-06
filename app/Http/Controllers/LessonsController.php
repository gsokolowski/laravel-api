<?php

namespace App\Http\Controllers;

use App\Lesson;
use Acme\Transformers\LessonTransformer;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;


class LessonsController extends ApiController
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


        //$lessons = Lesson::all();

        // returns 5 entries
        //$lessons = Lesson::paginate(5);

        // http://localhost:8000/api/v1/lessons?limit=3&page=2
        // returns amount specisied by user in limit or if not specified then 3 elements
        $limit = Input::get('limit') ?: 3;
        $lessons = Lesson::paginate($limit); // returns 5 entries

        // this will give you list of class methods which you can use
        // dd(get_class_methods($lessons));


        // Quick display - works
        // return response()->json(compact('lessons'));

        // Rap up in data - works
        // return response()->json([
        //    'data' => $lessons->toArray()
        // ],200);

        // Transform - works
        return $this->setStatusCode(200)->apiRespond([
            'data' => $this->lessonTransformer->transformCollection($lessons->all()), // here use transformCollection() because its collection of array's many lessons
            'paginator' => [
                'total_count' => $lessons->total(),
                'total_pages' => ceil($lessons->total() / $lessons->perPage()),
                'current_page' => $lessons->currentPage(),
                'limit' => $lessons->perPage()
            ]
        ]);
    }

    public function show($id) {
        $lesson = Lesson::find($id);

        if( ! $lesson) {

            // from ApiController
            return $this->respondNotFound('Lesson does not exist');
        }

        //return response()->json(compact('lesson'));
        return $this->setStatusCode(200)->apiRespond([
            'data' => $this->lessonTransformer->transform($lesson) // here use transform() because its only one dimensional array single lesson
        ]);
    }
}
