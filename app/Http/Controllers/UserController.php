<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function __construct() {
        $this->object = new User();
        $this->objectName = 'user';
        $this->objectNames = 'users';
        $this->relactionships = [];
    }


    function login(Request $request){

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $credencias = $request->only(['email', 'password']);

        try{
            if(! $token = \Tymon\JWTAuth\JWTAuth::attempt($credencias))
                return response()->json(['mensagem' => 'Credencias Erradas', 'status' => 401], 401);
        }catch (JWTException $ex){
            return response()->json(['mensagem' => 'Erro ao gerar token', 'status' => 500], 500);
        }

        $user = $this->getUser(new Request(['token' => $token]));

        return response()->json(['token' => $token, 'user' => $user, 'status' => 200], 200);
    }

    function signup(){

    }

    function logout(){

    }




}
