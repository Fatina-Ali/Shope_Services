<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    protected function successResponse($data = [] , $message='')
    {
        $status =200;
        $response = [
            'success' => true,
            'status' => 200 ,
            'data' => $data,
            'message' => $message,
        ];

        return response()->json($response);
    }


    public function errorResponse($message='', $code , $data = [])
    {
        $response = [
            'success' => false,
            'status' =>$code,
            'message' => $message,
            'data' => $data,

        ];

        return response()->json($response , $code);
    }
}
