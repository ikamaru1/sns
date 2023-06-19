<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;

class UsersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(){
        return view('users.profile');
    }
    
    public function search(Request $request){
        $follows = DB::table('follows')
        ->where('follower',Auth::id())
        ->count();

        $followers = DB::table('follows')
            ->where('follow',Auth::id())
            ->count();
        
        $followings = DB::table('follows')
        ->where('follower',Auth::id())
        ->get();
        
        $search = $request->input('search');
        if(isset($search)){
            $users = DB::table('users')
                ->where('username', 'like', '%'.$search.'%')
                ->get();
        }else{
            $users = DB::table('users')
                ->get();
            // dd($users);
        }
        return view('users.search',['follows' => $follows,'followers' => $followers, 'users' => $users, 'followings' => $followings ]);
    }
}
