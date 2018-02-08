@extends('Layouts.MasterLayout')
<html>
<body style="background-color:#cccccc;">
@section('content')
    <div id="HeadingDiv" style="height:600px;background-color:#cccccc;min-height:86vh;">
        <div class="jumbotron" style="background-color:#cccccc;">
            <h1>Phlick </h1>
            <img src="assets/img/phlick.png"><br><br>
            <p>A new professional learning network</p>
            <p><a class="btn btn-default" role="button" href="Login" style="/*background-color:#f9a29d;*/margin:5px;">Log
                    In</a>
                <a class="btn btn-default" type="button" href="Register"
                   style="/*background-color:#63bb76;*/margin:5px;">Sign Up</a></p>
            <p>Sign up or login to connect with your fellow Phlickers!</p>
        </div>
    </div>
@endsection
</body>

</html>