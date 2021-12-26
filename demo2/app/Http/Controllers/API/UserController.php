<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // $validator = Validator::make($request->all(),[
        //     'name'=>'required',
        //     'email'=>"required",
        //     'password'=>'required',
        //     'c_password'=>'required'
        // ]);

        // if($validator->false()){
        //     $response = [
        //         'success' => false,
        //         'data' => 'Validation Error',
        //         "message" => $validator->errors(),
        //     ];
        //     return response()->json($response,404);

        // }

        $input = $request->all();
        $input['password']=$input['password'];
        $user= User::create($input);
        $success['token']=$user->createToken('MyApp')->accesToken;
        $success['name']=$user->name;

        $response = [
            'success' => true,
            'data' => $success,
            "message" => 'user register',
        ];
        return response()->json($response,200);
    }

    public function login()
    {
        if(Auth::attempt(['email'=>request('email'),'password'=>reuqest('password')])) 
        {
            $user = Auth::user();
            $success['token']= $user->createToken('MyApp')->accesToken;
            return response()->json('success' -> $success ,200);
        } else{
            
            return response()->json($error ,401);
        }
        
    }
}