<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserControler extends Controller
{
    public function change(Request $request){
        $item = User::where('id',$request->id)->first();
        $item->user_name = $request->user_name;
        $item->favorite_movie = $request->favorite_movie;
        $item->save();
        return response()->json([
            'data' => $item
        ]);
    }
}
