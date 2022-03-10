<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\UserApiController;
use App\Http\Requests\Api\User\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends UserApiController
{
    public function login(LoginRequest $request)
    {
        $data = $request->validated() ;

        $user = User::where('email', $data['email'])->first();

        if (! $user || ! Hash::check($data['password'], $user->password)) {
            return $this -> res_error_optional("Password is wrong!") ;
        }

        return $this ->res_ok( [ 'token' => $user->createToken( 'api_user' )->plainTextToken ] , "Token create" ) ;
    }
}
