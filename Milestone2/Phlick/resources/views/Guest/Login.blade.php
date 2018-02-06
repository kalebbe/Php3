@extends('Layouts.MasterLayout')

<html>
<body style="background-color:#cccccc;">
@section('content')

    <div class="login-clean" style="background-color:#cccccc;min-height:86vh;">
        {!! Form::open(['url' => 'login', 'style' => 'background-color:#63bb76']) !!}
        <h2 class="sr-only">Login Form</h2>
        <div class="illustration" style="background-color:#63bb76;margin:10px;padding:5px;"><i
                    class="icon ion-ios-navigate" style="color:#314265;background-color:#63bb76;"></i></div>
        <div class="form-group">
            {{ Form::text('email', NULL, array('class' => 'form-control', 'placeholder' => 'Email')) }}
        </div>
        <div class="form-group">
            {{ Form::password('pass', array('class' => 'form-control', 'placeholder' => 'Password')) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Log In', array('class' => 'btn btn-primary btn-block', 'style' => 'background-color:#314165')) }}
        </div>
        <a href="Register" class="forgot">Forgot your email or password? Make a new account!</a>
        {!! Form::close() !!}
    </div>
    @endsection
</body>

</html>