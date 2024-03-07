<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class UserAuthController extends Controller
{

    // This function for registration of user...
    public function register(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // hash password before save it in database for security issue...
        ]);
        $token = $user->createToken(env('PASSPORT_SECRET_KEY'))->accessToken;

        return response()->json(['token' => $token], 200);
    }

    // This function for the login logic

    public function login(Request $request) {
        
        // The Login depend on email and password...

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(auth()->attempt($data)){

            // if the user exsist in database should have generate token and sent it to the user...
            // generate token depend on secret key exsist in .env file...

            $token = auth()->user()->createToken(env('PASSPORT_SECRET_KEY'))->accessToken;
            return response()->json(['token' => $token], 200);
        }else {
            
            // if exsist an error for login functionality should sent the error

            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    // This function for get the user information that loged in from the database...

    public function userInfo() {
        $userDate = auth()->user();

        return response()->json(['user' => $userDate], 200);
    }

    public function index(){
        $users = User::all();
        return response()->json([
            "success" => true,
            "message" => "Users List",
            "data" => $users,
        ]);
    }


    public function show($id){

        $user = User::find($id);

        if(is_null($user)) {
            return response()->json([
                "success" => false,
                "message" => "Not Found...",
            ]);
        }
        return response()->json([
            "success" => true,
            "data" => $user,
        ]); 
    }

    // This function for delete user

    public function destroy(User $user, $id){

        $exsistUser = User::find($id);

        if (!$exsistUser) {
            return response()->json([
                "success" => false,
                "message" => 'User not found',
            ]);
        }

        $exsistUser->delete();

        return response()->json([
            "success" => true,
            "message" => 'User Deleted Successfully...',
            "data" => $exsistUser,
        ]); 
    }

    // This function for create user
    public function store(Request $request){

        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => "Failed...",
                "data" => $validator->errors(),
            ]);
        }
        $user = User::create($input);
        return response()->json([
            "success" => true,
            "message" => "User Created Successfully...",
            "data" => $user,
        ]);
    }

    // This function for update user

    public function update(Request $request, User $user){

        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => "Failed...",
                "data" => $validator->errors(),
            ]);
        }

        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = $input['password'];
        $user->type = $input['type'];
        $user->save();


        return response()->json([
            "success" => true,
            "message" => "User Updated Successfully...",
            "data" => $user,
        ]);
    }
}
