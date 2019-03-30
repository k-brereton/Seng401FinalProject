@extends('layouts.app')

<!--despite the name of this file, the $channel variable is actually stream, not user. -->

@section('content')
@foreach($streams as $stream)
<a href='/tusers/{{$stream->user_id}}'><h1>{{$stream->user_name}}</h1> </a>

@endforeach


@endsection