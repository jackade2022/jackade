<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends UserApiController
{
    public function test(){
       return $this -> res_ok('test') ;
        return $this -> res_ok( [ 'user' => \request() ->user() ]) ;
    }
}
