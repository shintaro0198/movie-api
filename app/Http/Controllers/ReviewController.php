<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function evaluate(Request $request){
        $query = Review::query();
        $query->where('user_id',$request->user_id);
        $query->where('movie_id',$request->movie_id);
        $item = $query->first();
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
    public function index(){
        $item = DB::table('reviews')->orderBy('content','desc')->get();
        return response()->json([
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
