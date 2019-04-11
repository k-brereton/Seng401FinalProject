@extends('layouts.app')


@section('content')


@foreach($entries as $clip)
<div style="display:inline-grid">
<div style="float:left">
	<iframe
    src="{{$clip->embed_url}}&autoplay=false"
    height="360"
    width="640"
    frameborder="1"
    scrolling="no"
    allowfullscreen="false"
    preload="auto">
</iframe>
<!-- <p>{{$clip->url}}</p> -->
</div>
</div>

@endforeach
	<?php echo $entries->render(); ?>
@endsection
