@extends('layouts.app')


@section('content')


{{$tuser->login}}
@if(!$user->isSubscribedToTuser($tuser->id))
<form action='/tusers/{{$tuser->id}}/subscribe' method="post">
    {{csrf_field()}}
<input type="submit" value="subscribe" >
</form>
@else
<form action='/tusers/{{$tuser->id}}/unsubscribe' method="post">
    {{csrf_field()}}
<input type="submit" value="unsubscribe">
</form>

@endif

@endsection