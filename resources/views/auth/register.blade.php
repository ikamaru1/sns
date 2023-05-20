@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>

<div class='container'>

  <h3>UserName</h3>
{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}
username
  <h3>MailAddress</h3>
{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}

  <h3>Password</h3>
{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }}

  <h3>Password confirm</h3>
{{ Form::label('パスワード確認') }}
{{ Form::text('password-confirm',null,['class' => 'input']) }}

<a href="">{{ Form::submit('REGISTER') }}</a>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
