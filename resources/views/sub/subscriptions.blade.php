@extends('layouts.app')


@section('content')
@foreach($clips as $clip)
<a href='{{$clip->url}}'><h1>{{$clip->title}}</h1></a>
@endforeach

@endsection