<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/added';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }


    // public function registerForm(){
    //     return view("auth.register");
    // }

    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            $this-> validator($data);
            $this->create($data);
            $request->session()->put('username',$request->username);
            return redirect('added');
        }
        return view('auth.register');
    }

    public function added(){
        return view('auth.added');
    }

    public function validator(array $data)
    {
        Validator::make($data,[
            'username' => ['required','between:4,12'],
            'mail' => ['required','between:4,50','unique:users,mail'],
            'password' => ['required','between:4,12', 'unique:users,password','alpha_dash'],
            'password-confirm' => ['required', 'alpha_dash','between:4,12', 'unique:users,password','same:password'],
        ],[
            'username.required' => 'ユーザー名は必須項目です',
            'username.between' => 'ユーザー名は4文字以上12文字以下で入力してください',
            'mail.required' => 'メールアドレスは必須項目です',
            'mail.between' => 'メールアドレスは4文字以上50文字以下で入力してください',
            'mail.unique' => 'このメールアドレスはすでに使用されています',
            'password.required' => 'パスワードは必須項目です',
            'password.between' => 'パスワードは4文字以上12文字以下で入力してください',
            'password.unique' => 'このパスワードはすでに使用されています',
            'password.alpha_dash' => '英数字のみで入力してください',
            'password-confirm.required' => 'パスワード確認必須項目です',
            'password-confirm.alpha_dash' => '英数字のみで入力してください',
            'password-confirm.between' => 'パスワード確認は4文字以上12文字以下で入力してください',
            'password-confirm.unique' => 'このパスワードはすでに使用されています',
            'password-confirm.same' => 'パスワードと確認用パスワードが一致していません',
        ])->validate(); //バリデーションに引っかかった場合前のページに戻る
    }




}