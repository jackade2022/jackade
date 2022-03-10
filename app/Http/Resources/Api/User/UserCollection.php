<?php

namespace App\Http\Resources\Api\User;

use Illuminate\Http\Resources\Json\ResourceCollection;
use function App\Helper\sanctum_user;

class UserCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        $user = sanctum_user() ;

        return [
            "First Name" => $user ->name ,
            "Last Name" => $user ->lastname ,
            "Email" => $user ->email ,
        ];
    }
}
