@extends('layouts.login')

@section('content')
<form method="POST" action="/search">
@csrf
    <input type="text" placeholder="ユーザー名を入力" name="search">
    <button type="submit">検索</button>
</form>

@foreach($users as $user)
    <img src="/images/{{ $user->images }}" alt="">
    {{ $user->username }}
    @if($followings->contains('follow',$user->id))
    <form method="POST" action="/follow/delete">
      @csrf
      <input type="hidden" name="id" value="{{$user->id}}">
      <button class="follow-btn" type="submit">フォロー外す</button>
    </form>
    @else
    <form method="POST" action="/follow/create">
      @csrf
      <input type="hidden" name="id" value="{{$user->id}}">
      <button class="follow-btn" type="submit">フォローする</button>
    </form>
    @endif
        <br>
@endforeach




@endsection