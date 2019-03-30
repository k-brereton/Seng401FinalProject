@extends('layouts.app')

@section('content')
@foreach($games as $game)
<a href='tusers/byGame/{{$game->id}}'>{{$game->name}}</a>

@endforeach

@endsection