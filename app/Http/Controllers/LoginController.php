<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request){
        $item = User::where('email',$request->email)->first();
        if($item){
            if(Hash::check($request->password, $item->hashed_password)){
                return response()->json([
                    'auth' => true,
                    'data' => $item
                ],200);
            } else {
                return response()->json([
                    'auth' => false,
                    'message' => 'request failed'
                ],404);
            }
    }   else{
        return response()->json([
            'message' => 'cant find your acocunt'
        ],404);
    }
}
}