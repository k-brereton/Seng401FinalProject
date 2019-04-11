@extends('layouts.app')

<!--despite the name of this file, the $channel variable is actually stream, not user. -->

@section('content')


@foreach($streams as $stream)
<div style="display:inline-grid">
	<?php 

		$h = 125;
		$w = 240;
		$string=str_replace('{width}', $w, $stream->thumbnail_url);
   		$string=str_replace('{height}', $h, $string);
	?>
		<div style="float: left">

			<a href='/tusers/{{$stream->user_id}}'><h2 align="center" style="width: 240px;">{{$stream->user_name}}</h2></a>
  			<img src="{{$string}}" alt="Channel Image">
  			<p style="font-size:18px;"> Live: {{$stream->viewer_count}} viewers</p>

		</div>
  		
</div>

@endforeach
@endsection
