<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\File;
//use Illuminate\Support\Facades\Session;
use JWTAuth;
use Illuminate\Http\Request;
//use Maatwebsite\Excel\Facades\Excel;
use Session;
use Excel;
use File;


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
                return response()->json(['message' => 'Wrong Username or Password!'], 401);
        }catch (JWTException $ex){
            return response()->json(['message' => 'Server error!'], 500);
        }

        $user = $this->getUserFromToken($token);


        return response()->json(['token' => $token, 'user' => $user], 200);
    }



    public function logout(Request $request){
        try{
            return response()->json(['logout' => JWTAuth::invalidate($request->get('token'))]);
        }catch (JWTException $ex){
            return response()->json(['message' => $ex], 500);
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
            throw new \Exception( 'Not a Student!', 500);
        }
            
    }

    public function addUserForm()
    {
        return view('design.form_add_user', [
            'user' => Auth::user
            ()]);
    }

    public function createUser(Request $request)
    {
        return $request;

        return view('design.form_add_user', [
            'user' => Auth::user()
        ]);
    }

    public function uploadUsersForm()
    {
        return view('design.import-users',['user' => Auth::user()]);
    }

    public function importUsers(Request $request){
        //validate the xls file
        $this->validate($request, array(
            'file'      => 'required'
        ));

        if($request->hasFile('file')){
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {

                $path = $request->file->getRealPath();
                $data = Excel::load($path, function($reader) {
                })->get();
                if(!empty($data) && $data->count()){

                    foreach ($data as $key => $value) {
                        $insert[] = [
                            'first_name' => $value->PE_Förnamn,
                            'last_name' => $value->PE_Efternamn,
                            'telephone' => $value->PE_Mobiltelefon,
                            'email' => $value->PE_Epost,
                            'user_type' => 3,
                        ];
                    }

                    if(!empty($insert)){

                        $insertData = DB::table('users')->insert($insert);
                        if ($insertData) {
                            Session::flash('success', 'Your Data has successfully imported');
                        }else {
                            Session::flash('error', 'Error inserting the data..');
                            return back();
                        }
                    }
                }

                return back();

            }else {
                Session::flash('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');
                return back();
            }
        }
    }

}

