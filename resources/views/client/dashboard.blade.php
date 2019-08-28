@extends('template.template')

@section('content')
<a href="{{ route('Client.edit', ['id' => base64_encode( Session::get('id') ) ] )  }}">Edit Profile</a>

@if(Session::has('message'))
    <div class="alert alert-block alert-success">
        <i class=" fa fa-check cool-green "></i>
        {{ nl2br(Session::get('message')) }}
    </div>
@endif

<h2>Welcome @if(Session::has('user'))  {{ nl2br(Session::get('user')->name ) }} @endif </h2>
@endsection

 

