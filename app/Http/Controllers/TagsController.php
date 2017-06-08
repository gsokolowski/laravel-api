<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Tag;
use Acme\Transformers\TagTransformer;

use Illuminate\Http\Request;
use App\Http\Requests;


class TagsController extends ApiController
{
    protected $tagTransformer;


    public function __construct(TagTransformer $tagTransformer)
    {
        $this->tagTransformer = $tagTransformer;
    }


    // GET http://localhost:8000/api/v1/lessons/23/tags - all tags for lesson ID
    // or
    // GET http://localhost:8000/api/v1/tags
    public function index($lessonId = null) {

        $tags = $this->getTags($lessonId);

        // Transform - works
        return $this->apiRespond([
            'data' => $this->tagTransformer->transformCollection($tags->all()) // here use transformCollection() because its collection of array's many tags
        ]);
    }


    private function getTags($lessonId)
    {
        if ($lessonId) {
            // if lesson id has been passed in url then get all tags for lesson - many tags belongs to lesson
            // but if lesson id doesn't exist e.g lessonId = 333 then
            // you need to catch this exception
            // Go to app/Exceptions/Handler.php to method render and there is done work around released exeption
            // do there dd($e) to find out of the name of through exception and then you can just return what you like
            //
            $tags = Lesson::findORFail($lessonId)->tags;
            return $tags;
        } else {
            $tags = Tag::all();
            return $tags;
        }
    }
}
