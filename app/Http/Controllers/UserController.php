<?php

namespace App\Http\Controllers;

use App\User;
use JWTAuth;
use Illuminate\Http\Request;

class UserController extends  ModelController
{

    public function __construct() {
        $this->object = new User();
        $this->objectName = 'user';
        $this->objectNames = 'users';
        $this->relactionships = [];
    }



    public function login(Request $request){

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $credencias = $request->only(['email', 'password']);

        try{
            if(! $token = JWTAuth::attempt($credencias))
                return response()->json(['mensagem' => 'Credencias Erradas'], 401);
        }catch (JWTException $ex){
            return response()->json(['mensagem' => 'Erro ao gerar token'], 500);
        }

        $user = $this->getUserFromToken($token);


        return response()->json(['token' => $token, 'user' => $user], 200);
    }



    public function logout(Request $request){
        try{
        return response()->json(['logout' => JWTAuth::invalidate($request->get('token'))]);
        }catch (JWTException $ex){
            return response()->json(['mensagem' => $ex], 500);
        }

    }


    /**
     * return the user associated with the token
     */
    public function getUserFromToken($token){
        return $this->getUserKind(JWTAuth::toUser($token));
    }


    /**
     * Return the user Kind of the user: Teacher or studant
     */
    private function getUserKind($user){
        if($user->student)
            return $user->student;

        else{
            return response()->json(['mensagem' => 'This User is not of a Student!'], 500);
        }
            
    }

}

