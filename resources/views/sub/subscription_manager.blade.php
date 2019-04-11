@extends('layouts.app')

@section('content')

<table>
  @foreach($subscriptions as $sub)
    <tr>
      <td>{{$sub->display_name}}</td> 
      <td>
        <form action="/tuser_manage_subscriptions/{{$sub->id}}/unsubscribe" method="post">
          {{csrf_field()}}
          <input type="submit" value="Unsubscribe"/>
        </form>
      </td>
    </tr>
  @endforeach
</table>
@endsection
