<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;

class AuthController extends Controller
{
    
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (\Auth::attempt($credentials)) {
            $user = \Auth::user();
            $token = $user->createToken('MyApp')->plainTextToken;
            $role = $user->level();
            return response()->json(['token' => $token, 'role'=> $role], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    // registe
    public function register(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;
        return response()->json(['success' => $success], 200);
    }
    
    public function logout(Request $request)
    {
        if($request->user()->currentAccessToken()->delete()){
            return response()->json(['success' => 'Logout Successfully'], 200);

        }else{
            return response()->json(['error' => 'Logout Unsuccessfully'], 401);
        }
    }
    
}
