<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function evaluate(Request $request){
        if(Review::where('user_id',$request->user_id)){
            $item = Review::where('movie_id',$request->movie_id)->first();
            if($item){
            return $item;
            }
        }
        $now = Carbon::now();
        if($item){
            $item->content = $request->content;
            $item->save();
        }   else{
            $item = new Review;
            $item->user_id = $request->user_id;
            $item->movie_id = $request->movie_id;
            $item->content = $request->content;
            $item->created_at = $now;
            $item->updated_at = $now;
            $item->save();
        }
        return response()->json([
            'message' => 'posted successfully',
            'data' => $item
        ],200);
    }
    public function show($id){
        $item = Review::where('id',$id)->first();
        return response()->json([
            'data' => $item
        ],200);
    }
    public function showAll(Request $request){
        $item = Review::where('movie_id',$request->movie_id)->get();
        return response()->json([
            'data' => $item
        ],200);
    }
}
