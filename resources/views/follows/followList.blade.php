@extends('layouts.login')

@section('content')
<h1>Follow list</h1>
@foreach($follow_icons as $follow_icon)
<img src="/images/{{ $follow_icon->images }}" alt="">
@endforeach

@foreach($follow_posts as $follow_post)
<img src="/images/{{ $follow_post->images }}" alt="">
<<p>{{$follow_post->username}}</p>>
<p>{{$follow_post->posts}}</p>
<<p>{{$follow_post->created_at}}</p>
@endforeach


@endsection