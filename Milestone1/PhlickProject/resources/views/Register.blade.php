<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phlick</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button1.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background-color:#cccccc;">
    <div>
        <nav class="navbar navbar-default navigation-clean-button" style="background-color:#314265;">
            <div class="container">
                <div class="navbar-header"><a class="navbar-brand" href="Home" style="color:#ffffff;">Phlick </a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav">
                        <li class="active" role="presentation"><a href="#" style="color:#ffffff;">Other Sites</a></li>
                        <li role="presentation"><a href="#" style="color:#ffffff;">Contact Us</a></li>
                    </ul>
                    <p class="navbar-text navbar-right actions"><a class="navbar-link login" href="Login" style="color:#ffffff;">Log In</a> <a class="btn btn-default action-button" role="button" href="#" style="background-color:#63bb76;">Sign Up</a></p>
            </div>
    </div>
    </nav>
    </div>
    
   <?php 
   if (isset($_SESSION['message']) && !empty($_SESSION['message'])){
       if ($_SESSION['message_type'] == 1) {
           ?><h2 class='text-danger text-center'><?= $_SESSION['message'] ?></h2><?php
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    } else {
        ?><h2 class='text-center'><?= $_SESSION['message'] ?></h2><?php
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
        }
    }
   ?>
    
    <div class="register-photo" style="background-color:#cccccc;">
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
                	{{ Form::submit('Sign Up', array('class' => 'btn btn-primary btn-block')) }}
                </div>
                <a href="Login" class="already">You already have an account? Login here.</a>
			{!! Form::close() !!}
        </div>
    </div>
    <div id="FooterDiv" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.42857143;color:#333;background-color:#cccccc;">
        <ul class="list-inline">
            <li><a href="#">About</a></li>
            <li><a href="#">Team Members</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
        <p class="copyright">Phlick © 2018</p>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>