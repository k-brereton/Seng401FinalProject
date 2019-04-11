@extends('layouts.app')


@section('content')

<div style="overflow:auto; width:800px; margin: auto;">
	<img src="{{$tuser->profile_image_url}}" alt="Channel Image" width="80" style="float:left">
	<h1 style="position: relative; top:15px; width: 300px; float:left;">{{$tuser->display_name}}</h1>
	@if(!$user->isSubscribedToTuser($tuser->id))
	<form action='/tusers/{{$tuser->id}}/subscribe' method="post">
	    {{csrf_field()}}
	<input type="submit" value="Subscribe" style="float:right; height:80px; font-size : 25px;">
	</form>
	@else
	<form action='/tusers/{{$tuser->id}}/unsubscribe' method="post">
	    {{csrf_field()}}
	<input type="submit" value="Unsubscribe" style="float:right; height:80px; font-size : 25px;">
	</form>
	@endif

	<!-- <img src="{{$tuser->offline_image_url}}" alt="Channel Image" width="800"> -->
	<iframe
    	src="https://player.twitch.tv/?channel={{$tuser->display_name}}&autoplay=false"
	    height="450"
	    width="800"
	    frameborder="<frameborder>"
	    scrolling="<scrolling>"
	    allowfullscreen="<allowfullscreen>">
</iframe>
</div>
@endsection