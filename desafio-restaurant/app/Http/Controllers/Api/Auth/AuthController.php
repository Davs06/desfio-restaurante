<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{


    public function login(Request $request){

        return $this->response('Authorized', 200);
    }
}
