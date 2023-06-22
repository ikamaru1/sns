@extends('layouts.login')

@section('content')
<form method="POST" action="/index">
      @csrf
      <input type="text" name="post" placeholder="何をつぶやこうか。。。？">
      <button type="submit">投稿</button>
</form>

@foreach($myposts as $mypost)
<p>{{$mypost->posts}}</p>
<p>{{$mypost->created_at}}</p>

@endforeach

@endsection