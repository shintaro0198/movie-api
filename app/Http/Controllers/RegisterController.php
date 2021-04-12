<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request){
        $item = new User;
        $now = Carbon::now();
        $item->user_name = $request->user_name;
        $item->favorite_movie = "";
        $item->email = $request->email;
        $item->hashed_password = Hash::make($request->password);
        $item->created_at = $now;
        $item->updated_at = $now;
        $item->save();
        return response()->json([
            'message' => 'Created Successfully'
        ],200);
    }
    public function index(){
        $item = User::all();
        return response()->json([
            'data' => $item
        ]);
    }
}
