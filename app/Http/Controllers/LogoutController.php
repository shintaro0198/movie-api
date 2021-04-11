<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class LogoutController extends Controller
{
    public function logout(){
        return response()->json([
            'auth' => false
        ],200);
    }
}
