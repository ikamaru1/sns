@extends('layouts.login')

@section('content')
<form method="POST" action="/index">
      @csrf
      <input type="text" name="post" placeholder="何をつぶやこうか。。。？">
      <button type="submit">投稿</button>
</form>

@foreach($myposts as $mypost)
<img src="" alt="">
<p>{{$mypost->posts}}</p>
<p>{{$mypost->created_at}}</p>

@endforeach

@foreach($follow_posts as $follow_post)
<img src="/images/{{ $follow_post->images }}" alt="">
<p>{{$follow_post->posts}}</p>
<p>{{$follow_post->created_at}}</p>
@endforeach


@endsection