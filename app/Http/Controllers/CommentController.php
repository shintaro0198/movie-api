<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function comment(Request $request){
        $now = Carbon::now();
        $item = Comment::where('user_id',$request->user_id)->first();
        if($item){
            $item->content = $request->content;
            $item->updated_at = $now;
            $item->save();
        }   else{
            $item = new Comment;
            $item->user_id = $request->user_id;
            $item->movie_id = $request->movie_id;
            $item->content = $request->content;
            $item->save();
            $item->created_at = $now;
            $item->updated_at = $now;
        }
        return response()->json([
            'message' => 'posted successfully',
            'data' => $item
        ], 200);
    }
    
    public function show($id)
    {
        $item = Comment::where('id', $id)->first();
        return response()->json([
            'data' => $item
        ], 200);
    }
    public function showAll(Request $request)
    {
        $item = Comment::where('movie_id', $request->movie_id)->get();
        return response()->json([
            'data' => $item
        ], 200);
    }
}
