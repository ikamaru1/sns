@extends('layouts.login')

@section('content')
<h1>Follower list</h1>
<div>
    @foreach($follower_icons as $follower_icon)
    <a href="/followsprofile/{{$follower_icon->id}}">
      <img src="/images/{{ $follower_icon->images }}" alt="">
    </a>
    @endforeach
</div>

<div>
    @foreach($follower_posts as $follower_post)
    <a href="/followsprofile/{{$follower_post->id}}">
      <img src="/images/{{ $follower_post->images }}" alt="">
    </a>
    <p>{{$follower_post->username}}</p>
    <p>{{$follower_post->posts}}</p>
    <p>{{$follower_post->created_at}}</p>
    @endforeach
</div>

@endsection