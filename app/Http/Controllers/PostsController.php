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
        return view('posts.index',['follows' => $follows,'followers' => $followers ]);
    }


}
