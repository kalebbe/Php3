@extends('Layouts.MasterLayout')
<html>

<body style="background-color:#cccccc;">
@section('content')
    <div class="register-photo" style="background-color:#cccccc;min-height:86vh;">
        <div class="form-container" align="center">
            {!! Form::open(['url' => 'register', 'style' => 'background-color:#63bb76']) !!}
            <h2 class="text-center"><strong>Create</strong> an account.</h2>
            <div class="form-group">
                {{ Form::text('first_name', NULL, array('class' => 'form-control', 'placeholder' => 'First Name', 'required' => 'required')) }}
            </div>
            <div class="form-group">
                {{ Form::text('last_name', NULL, array('class' => 'form-control', 'placeholder' => 'Last Name', 'required' => 'required')) }}
            </div>
            <div class="form-group">
                {{ Form::text('email', NULL, array('class' => 'form-control', 'placeholder' => 'Email', 'required' => 'required')) }}
            </div>
            <div class="form-group">
                {{ Form::password('pass', array('class' => 'form-control', 'placeholder' => 'Password', 'required' => 'required')) }}
            </div>
            <div class="form-group">
                {{ Form::password('repass', array('class' => 'form-control', 'placeholder' => 'Password (repeat)', 'required' => 'required')) }}
            </div>
            <div class="form-group">
                {{ Form::submit('Sign Up', array('class' => 'btn btn-primary btn-block', 'style' => 'background-color:rgb(49,66,101)')) }}
            </div>
            <a href="Login" class="already">You already have an account? Login here.</a>
            {!! Form::close() !!}
        </div>
    </div>
    @endsection
</body>

</html>