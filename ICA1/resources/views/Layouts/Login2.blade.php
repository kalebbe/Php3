@extends('layouts.appmaster')
@section('title', 'Login Page')
@section('content')

{!! Form::open(['url' => 'login']) !!}

{{ Form::text('username', NULL, array('placeholder' => 'Username')) }}
{{ Form::password('password', array('placeholder' => 'Password')) }}
{{ Form::submit('Log in') }}

@endsection