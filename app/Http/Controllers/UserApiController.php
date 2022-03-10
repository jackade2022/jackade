<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\LoginRequest;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function res_ok( array|string $data = [] , string $message = "Success you operation." , array $payload = []  )
    {
        return [
            'message' => $message ,
            'data' => $data ,
            'payload' => $payload
        ] ;
    }

    public function res_error_optional(  string $message = "Some things went wrong" , array|string $data = []   )
    {
        return [
            'status' => 470 ,
            'message' => $message ,
            'errors' => $data ,
        ] ;
    }

    public function res_server_error(  string $message = "Some things went wrong" , array|string $data = []   )
    {
        return [
            'status' => 570 ,
            'message' => $message ,
            'erorrs' => $data ,
        ] ;
    }
}
