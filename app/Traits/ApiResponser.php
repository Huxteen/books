<?php

namespace App\Traits;
use Illuminate\Http\Response;

trait ApiResponser
{   



    /**
     * Build success response
     * @param  ** string|array $data
     * @param ** int $code
     * @return Illuminate\Http\JsonResponse
     */
    public function successResponse($data, $code = Response::HTTP_OK)
    {
      return response()->json([
        'status_code' => $code,
        'status' => 'success',
        'data' => $data
      ]);
    }


    public function successResponseMessage($data, $msg, $code = Response::HTTP_OK)
    { 
      $name = $data['name'];
      if($msg == 'deleted'){$data = [];}
      return response()->json([
        'status_code' => $code,
        'status' => 'success',
        'message' => 'The book ['.$name.'] was '.$msg.' successfully',
        'data' => $data
      ]);
    }

    /**
     * Build error response
     * @param  ** string|array $data
     * @param ** int $code
     * @return Illuminate\Http\JsonResponse
     */
    public function errorResponse($message, $code)
    {
      return response()->json([
        'status_code' => $code,
        'status' => 'error',
        'error' => $message
      ],
      $code
    );
    }




}


?>