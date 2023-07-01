<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $follows = DB::table('follows')
            ->where('follower',Auth::id())
            ->count();

        $followers = DB::table('follows')
            ->where('follow',Auth::id())
            ->count();

        $follow_ids = DB::table('follows')
            ->where('follow',Auth::id())
            ->pluck('follower');

        $follower_ids = DB::table('follows')
            ->where('follow',Auth::id())
            ->pluck('follow');

        $follow_posts = DB::table('posts')
            ->join('users','posts.user_id','=','users.id')
            ->whereIn('posts.user_id',$follow_ids)
            ->select('users.images','users.username','posts.posts','posts.created_at as created_at')
            ->get();
        
        $myposts = DB::table('posts')
            ->where('user_id',Auth::id())
            ->get();
        
        return view('posts.index',['follows' => $follows,'followers' => $followers,'follow_posts'=>$follow_posts,'myposts'=>$myposts]);
    }

    public function post(Request $request){
        $myposts=$request->input('post');
        DB::table('posts')
        ->insert([
            'posts'=>$myposts,
            'user_id'=>Auth::id(),
            'created_at'=>now()
        ]);
        return back();
}


}
