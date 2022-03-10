<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserApiController;
use App\Http\Resources\Api\User\UserCollection;
use Illuminate\Http\Request;
use function App\Helper\sanctum_user;


class DashboardController extends UserApiController
{
    public function index( Request $request )
    {
        return $this ->res_ok([ 'user' => new UserCollection( sanctum_user() ) ]) ;
    }
}
