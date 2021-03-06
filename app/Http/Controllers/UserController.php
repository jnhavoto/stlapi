<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\School;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\UserType;
use App\User;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Support\Facades\File;
//use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Illuminate\Http\Request;
//use Maatwebsite\Excel\Facades\Excel;
use Session;
use Excel;
use File;
use App\Http\Requests;
use ValidateRequests;


class UserController extends ModelController
{

    public function __construct()
    {
        $this->object = new User();
        $this->objectName = 'user';
        $this->objectNames = 'users';
        $this->relactionships = [];
    }

//    public function rules(Request $request)
//    {
//        return validate($request, [
//            'first_name' => 'required',
//            'password' => 'required',
//            'email' => 'unique',
//        ]);
//
//    }

    public function login(Request $request)
    {
//return $request;

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $credencias = $request->only(['email', 'password']);


        try {
            if (!$token = JWTAuth::attempt($credencias))
                return response()->json(['message' => 'Wrong username or password!'], 401);
        } catch (JWTException $ex) {
            return response()->json(['message' => 'Server error!'], 500);
        }

        $user = $this->getUserFromToken($token);


        return response()->json(['token' => $token, 'user' => $user], 200);
    }


    public function logout(Request $request)
    {
        try {
            return response()->json(['logout' => JWTAuth::invalidate($request->get('token'))]);
        } catch (JWTException $ex) {
            return response()->json(['message' => $ex], 500);
        }

    }


    /**
     * return the user associated with the token
     */
    public function getUserFromToken($token)
    {
        return $this->getUserKind(JWTAuth::toUser($token));
    }


    /**
     * Return the user Kind of the user: Teacher or studant
     */
    private function getUserKind($user)
    {
        if ($user->student)
            return $user->student;

        else {
            throw new \Exception('Not a Student!', 500);
        }

    }

    public function updateUserForm($id)
    {
        $userdata = User::find($id);
//        return $userdata;
        $userd = User::find($id);
        $user = \Illuminate\Support\Facades\Auth::user();
        $schools = School::all();
        $cities = City::all();
        $usertypes = UserType::all();
        $student_details = Student::where('users_id', $id)->first();
//      return $student_details;
        return view('design.update-user',
            ['userdata' => $userdata,
                'userd' => $userd,
                'user' => $user,
                'schools' => $schools,
                'cities' => $cities,
                'usertypes' => $usertypes,
                'student_details' => $student_details,
            ]);
    }

    public function addUserForm()
    {
        return view('design.form_add_user',
            [
                'user' => Auth::user(),
                'userd' => Auth::user(),
                'usertypes' => UserType::all(),
                'schools' => School::all(),
                'cities' => City::all(),
            ]);
    }

    public function createUser(Request $request)
    {
//        return $request;
//        $this->rules($request);

        $pass = bcrypt($request->password);
//        return $pass;
        //verify if the user of that email exists
        if (count(User::where('email', $request->email)->get())==0) {
            $newUser = User::create(
                [
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'telephone' => $request->telephone,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'user_types_id' => $request->user_types_id,
                    'schools_id' => $request->school_id,
                    'cities_id' => $request->city_id,
                ]);
//            return $pass;
            if ($request->user_types_id == 2) {
                Teacher::create(
                    [
                        'users_id' => $newUser->id,
                    ]);
            }
            if ($request->user_types_id == 3) {
                Student::create(
                    [
                        'users_id' => $newUser->id,
                    ]);
            }
            return redirect('users')->with('success', 'The user was created successfuly!');
        }
        else
            return redirect('users')->with('warning', 'A user with email '.$request->email.' exists!');
    }

    public function updateUsers(Request $request)
    {
        $userd = Auth::user();
        $user = User::find($request->user_id);
//        return $request;
        $pass = Hash::make($request->password);
        //do updates and save
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->telephone = $request->telephone;
        $user->email = $request->email;
        $user->password = $pass;
        $user->user_types_id = $request->user_type_id;
        $user->schools_id = $request->school_id;
        $user->cities_id = $request->city_id;
        $user->save();
//        if($request->user_type_id == 2)
//        {
//
//        }
        //get the updated data
        $user = User::find($request->user_id);
        $users = User::all();
        $login_users = User::whereNotNull('last_login')->orderBy('last_login')->get();

        return view('dashboard.admin_index', [
            'users' => $users,
            'lastlogin_users' => $login_users,
            'userd' => $userd,
        ]);
    }

    public function updateUsers1(Request $request)
    {
        $userd = Auth::user();
        $user = User::find($request->user_id);
//        return $request;
        $pass = Hash::make($request->password);
        //do updates and save
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->telephone = $request->telephone;
        $user->email = $request->email;
        $user->password = $pass;
        $user->user_types_id = $request->user_type_id;
        $user->schools_id = $request->school_id;
        $user->cities_id = $request->city_id;
        $user->save();

        //get the updated data
        $user = User::find($request->user_id);

        $users = User::all();

        $login_users = User::whereNotNull('last_login')->orderBy('last_login')->get();

        return view('design.admin_users', [
            'users' => $users,
            'lastlogin_users' => $login_users,
            'userd' => $userd,
        ]);
    }

    public function showUserDetails($id)
    {
        $userdata = User::find($id);
        $user = \Illuminate\Support\Facades\Auth::user();
        $schools = School::all();
        $cities = City::all();
        $usertypes = UserType::all();
        //check if is a student
        $student_details = Student::where('users_id', $id)->first();
//      return $student_details;
        return view('communications.user-details',
            ['userdata' => $userdata,
                'userd' => Auth::user(),
                'user' => $user,
                'schools' => $schools,
                'cities' => $cities,
                'usertypes' => $usertypes,
                'student_details' => $student_details,
            ]);
    }

    public function showContactDetails($id)
    {
        $userdata = User::find($id);
        $schools = School::all();
        $cities = City::all();
        $usertypes = UserType::all();
        $student_details = Student::where('users_id', $id)->first();
//      return $student_details;
        return view('communications.contact-details',
            ['userdata' => $userdata,
                'user' => Auth::user(),
                'schools' => $schools,
                'cities' => $cities,
                'usertypes' => $usertypes,
                'student_details' => $student_details,
            ]);
    }

    public function uploadUsersForm()
    {
        return view('design.import-users', ['user' => Auth::user(), 'userd' => Auth::user()]);
    }

    public function importUsers(Request $request)
    {
        //validate the xls file
        $this->validate($request, array(
            'file' => 'required'
        ));

        if ($request->hasFile('file')) {
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
                $path = $request->file->getRealPath();
                $data = Excel::load($path, function ($reader) {
                })->get();
                if (!empty($data) && $data->count()) {
                    $new_entries = 0;
                    foreach ($data as $key) {
                        $password = Hash::make('123456');
                        $insert_users[] = [
                            'first_name' => $key->pe_fornamn,
                            'last_name' => $key->pe_efternamn,
                            'telephone' => $key->pe_mobiltelefon_for_sms,
                            'email' => $key->pe_e_post,
                            'user_types_id' => 3,
                            'password' => $password,
                        ];
                        if ($key->pe_kommun == null) {
                            $new_city = City::create(
                                [
                                    'city_name' => 'Ange kommun',
                                ]);
                        } else {
                            $find_city = City::where('city_name', $key->pe_kommun);
                            if ($find_city->count() == 0) {
                                $new_city = City::create(
                                    [
                                        'city_name' => $key->pe_kommun,
                                    ]);
                            } else
                                $new_city = $find_city->first();
                        }

                        if ($key->pe_skola == null) {
                            $new_school = School::create(
                                [
                                    'school_name' => 'Ange skola',
                                    'cities_id' => $new_city->id,
                                ]);
                        } else {
                            $find_school = School::where('school_name', $key->pe_skola);
                            if ($find_school->count() == 0) {
                                $new_school = School::create(
                                    [
                                        'school_name' => $key->pe_skola,
                                        'cities_id' => $new_city->id,
                                    ]);
                            } else {
                                $new_school = $find_school->first();
                            }
                        }

                        $new_user = User::where('email', $key->pe_e_post)->first();
                        if (User::where('email', $key->pe_e_post)->count() == 0) {
                            $user = User::create(
                                [
                                    'first_name' => $key->pe_fornamn,
                                    'last_name' => $key->pe_efternamn,
                                    'telephone' => $key->pe_mobiltelefon_for_sms,
                                    'email' => $key->pe_e_post,
                                    'user_types_id' => 3,
                                    'password' => $password,
                                    'schools_id' => $new_school->id,
                                    'cities_id' => $new_city->id,
                                ]);
                            Student::create(
                                [
                                    'users_id' => $user->id,
                                ]
                            );
                            $new_entries = $new_entries + 1;
                        } else {
                            $student = Student::where('users_id', $new_user->id);
//                            return $student->count();
                            if ($student->count() != 0) {
//                                return $student;
                                if ($student->first()->teaching_grade == null)
                                    if ($new_user->last_login == null) {
//                                        return Student::where('users_id', $new_user->id)->first();
//                                        Student::where('users_id', $new_user->id)->delete();
                                        $new_user->first_name = $key->pe_fornamn;
                                        $new_user->last_name = $key->pe_efternamn;
                                        $new_user->telephone = $key->pe_mobiltelefon_for_sms;
                                        $new_user->email = $key->pe_e_post;
//                                        $new_user->password = $pass;
//                                        $new_user->user_types_id = $request->user_type_id;
                                        $new_user->schools_id = $new_school->id;
                                        $new_user->cities_id = $new_city->id;
                                        $new_user->save();
                                        $new_entries = $new_entries + 1;
//                                        return 'User existed and deleted';
                                    }
                            }

                        }
//                        return $new_entries;
                    }
                    if ($new_entries != 0) {
                        return redirect('/users')->with('success', 'Your Data was successfully imported!');
//                        Session::flash('success', 'Your Data has successfully imported');
                    } else {
                        return redirect('/users')->with('warning', 'No Data was inserted');
//                        Session::flash('error', 'No Data was inserted');
//                        return back();
                    }
//                    }
                }

                return back();

            } else {
//                Session::flash('error', 'File is a ' . $extension . ' file.!! Please upload a valid xls/csv file..!!');
                return redirect()->back()->with('error', 'File is a ' . $extension . ' file.!! Please upload a valid xls/csv file..!!');
            }
        }
    }

    public function admin_listContacts()
    {
        $teachers = Teacher::all();
        $students = Student::all();
        $users = User::all();

        return view('design.admin_users',
            ['teachers' => $teachers,
                'students' => $students,
                'users' => $users,
                'userd' => Auth::user(),
                'user' => Auth::user()]);
    }

    public function listContacts()
    {
//        return Auth::user();

        $users = User::where('user_types_id', '!=', 1)->get();

        $numberParticipants = User::where('user_types_id', 3)->get();
        $numberInstructors = User::where('user_types_id', 2)->get();

        return view('communications.contacts',
            [
                'numParticipants' => $numberParticipants,
                'numInstructors' => $numberInstructors,
                'users' => $users,
                'user' => Auth::user()
            ]);
    }

    public function search_data(Request $request)
    {
//        return $request;
        $users = User::where('first_name', 'like', '%' . $request->searchwords . '%')
            ->orderBy('first_name')
            ->paginate(20);

        return view('design.admin_users',
            [
                'teachers' => Teacher::all(),
                'students' => Student::all(),
                'users' => $users,
                'userd' => Auth::user(),
                'user' => Auth::user()
            ]);
    }

    public function deleteUser($id)
    {
        //get details of the current user
        $current_user = Auth::user();
        //get user_type
        $userdetails = User::findOrFail($id);
        $user_type = $userdetails->user_types_id;
//        return $user_type;
        //if the user is the current admin, then don't allow to delete, else
        // if user_type = 2 then find the link with teacher table (if any) and delete, else
        // if user_type = 3 then find the link with student table (if any) and delete
        //if($user_type = 1 and )
        if ($user_type = 2) {
            $teacher_id = $id;
            //find the teacher and delete
            $teacher = Teacher::where('users_id', $teacher_id)->get();
            if ($teacher->count() == 0) {
                //delete the user
                User::where('id', $id)->get()->each->delete();
            } else {
                return 'trying to deleted';
                //delete the student
                Teacher::where('users_id', $id)->get()->each->delete();
                return 'teacher deleted';
                //delete the user
                User::where('id', $id)->get()->each->delete();
            }
        }
        if ($user_type = 3) {
            //find the student and delete
            $student = Student::where('users_id', $id)->get();
            if ($student->count() == 0) {
                //delete the user
                User::where('id', $id)->get()->each->delete();
            } else {
                //delete the student
                Student::where('users_id', $id)->get()->each->delete();
                //delete the user
                User::where('id', $id)->get()->each->delete();
            }
        }

        $users = User::all();
        return redirect('users');
    }

}

