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
            $item->save();
        }   else{
            $param = [
                'user_id' => $request->user_id,
                'movie_id' => $request->movie_id,
                'content' => $request->content,
                'created_at' => $now,
                'updated_at' => $now,
            ];
            DB::table('comments')->insert($param);
            return response()->json([
                'message' => 'posted successfully',
                'data' => $param
            ], 200);
        }
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
