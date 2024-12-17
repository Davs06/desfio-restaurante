<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use HttpResponses;

    protected $repository = User::class;

    public function __construct(User $user){
        $this->repository = $user;
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password')) === false) {
            return $this->error('Unauthorized', 401);
        }
        return $this->response('Authorized', 200, [
            'token' => $request->user()->createToken('authToken')->plainTextToken
        ]);

    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->response('Logged out', 200);
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            'email_verified_at' => 'required|date_format:Y-m-d H:i:s',
            'remenber_token' => 'required|string'
        ]);

        if ($validator->fails()) {
            $this->error('Data Invald', 422, $validator->errors());
        }


        $register = $this->repository->create($request->all());

        if(!$register){
            return $this->response('Erro ao cadastrar', 400);
        }

        return $this->response('Cadastrado com sucesso', 200, $register );

    }

//    //teste
//
//    public function index()
//    {
//        return $this->response('Authorized', 200);
//    }
}
