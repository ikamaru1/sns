@extends('layouts.login')

@section('content')
<h1>Follower list</h1>
@foreach($follower_icons as $follower_icon)
<img src="/images/{{ $follower_icon->images }}" alt="">
@endforeach

@foreach($follower_posts as $follower_post)
<img src="/images/{{ $follower_post->images }}" alt="">
<<p>{{$follower_post->username}}</p>>
<p>{{$follower_post->posts}}</p>
<<p>{{$follower_post->created_at}}</p>
@endforeach

@endsection