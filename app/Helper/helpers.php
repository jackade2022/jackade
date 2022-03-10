<?php

namespace App\Helper;


function sanctum_user(){
    if( request() -> user() )
        return  request() -> user() ;

    return abort(401) ;
}
