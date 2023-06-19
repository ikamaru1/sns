<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;

class FollowsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function followList(){
        $follows = DB::table('follows')
            ->where('follower',Auth::id())
            ->count();

        $followers = DB::table('follows')
            ->where('follow',Auth::id())
            ->count();
       
        $follower_ids = DB::table('follows')
            ->where('follow',Auth::id())
            ->pluck('follow');
    
        $follow_icons = DB::table('users')
            ->whereIn('id',$follower_ids)
            ->select('id','images')
            ->get();
    
        $follow_posts = DB::table('posts')
                ->join('users','posts.user_id','=','users.id')
                ->whereIn('posts.user_id',$follower_ids)
                ->select('users.images','users.username','posts.posts','posts.created_at as created_at')
                ->get();

        return view('follows.followList',compact('follows', 'followers','follow_icons','follow_posts'));
    }
    
    public function followerList(){
        $follows = DB::table('follows')
            ->where('follower',Auth::id())
            ->count();

        $followers = DB::table('follows')
            ->where('follow',Auth::id())
            ->count();

        $follow_ids = DB::table('follows')
            ->where('follow',Auth::id())
            ->pluck('follower');

        $follower_icons = DB::table('users')
            ->whereIn('id',$follow_ids)
            ->select('id','images')
            ->get();

        $follower_posts = DB::table('posts')
            ->join('users','posts.user_id','=','users.id')
            ->whereIn('posts.user_id',$follow_ids)
            ->select('users.images','users.username','posts.posts','posts.created_at as created_at')
            ->get();

        return view('follows.followerList',compact('follows','followers','follower_icons','follower_posts'));
    }
    public function create(Request $request){
            $id=$request->id;
            DB::table('follows')
            ->insert([
                'follow'=>$id,
                'follower'=>Auth::id(),
                'created_at'=>now()
            ]);
            return back();
    }
    public function delete(Request $request){
        $id=$request->id;
        DB::table('follows')
        ->where([
            'follow'=>$id,
            'follower'=>Auth::id(),
        ])->delete();
        return back();
}
}
