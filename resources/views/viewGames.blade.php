@extends('layouts.app')

@section('content')
@foreach($games as $game)
<a href='tusers/byGame/{{$game->id}}'>{{$game->name}}</a>
<?php
$w=150;
$h=200;
$string=str_replace('{width}', $w, $game->box_art_url);
$string=str_replace('{height}', $h, $string);
?>
<img src='{{$string}}' alt='{{$game->name}}'>

@endforeach

@endsection
