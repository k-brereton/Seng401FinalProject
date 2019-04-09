@extends('layouts.app')

@section('content')
@foreach($games as $game)
<!-- Shows 8 games per row-->
<div style='float:left; width:12.5%;'>
  <!-- Game titles -->
  <p style="text-align:center; width:100%; height:30px">
    <a href='tusers/byGame/{{$game->id}}'>{{$game->name}}</a>
  </p>

  <?php // Replace picture height/width parameters
    $w=170;
    $h=225;
    $string=str_replace('{width}', $w, $game->box_art_url);
    $string=str_replace('{height}', $h, $string);
  ?>

  <!-- Game pictures -->
  <a href='tusers/byGame/{{$game->id}}'>
    <img style="display:block; margin:auto; margin-bottom:45px;"
         src='{{$string}}' alt='{{$game->name}}'>
  </a>
</div>

@endforeach

@endsection
