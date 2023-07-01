@extends('layouts.login')

@section('content')
<h1>Follow list</h1>
<div>
  @foreach($follow_icons as $follow_icon)
  <a href="/followsprofile/{{$follow_icon->id}}">
    <img src="/images/{{ $follow_icon->images }}" alt="">
  </a>
  @endforeach
</div>

<div>
  @foreach($follow_posts as $follow_post)
  <a href="/followsprofile/{{$follow_post->id}}">
    <img src="/images/{{ $follow_post->images }}" alt="">
  </a>
  <p>{{$follow_post->username}}</p>
  <p>{{$follow_post->posts}}</p>
  <p>{{$follow_post->created_at}}</p>
  @endforeach
</div>

@endsection