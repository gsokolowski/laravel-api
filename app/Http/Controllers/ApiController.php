<?php
namespace App\Http\Controllers;

class ApiController extends Controller {

    protected $statusCode = 200;// default


    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }


    public function respondNotFound($message = 'Not Found')
    {
        return $this->setStatusCode(404)->respondWithError($message);

    }


    public function respondInternalServerError($message = 'Internal Server Error')
    {
        return $this->setStatusCode(500)->respondWithError($message);

    }


    public function respondWithError($message) {

        return $this->apiRespond([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }

    public function apiRespond($data, $headers = []) {

        return response()->json($data, $this->getStatusCode(), $headers);
    }
}
