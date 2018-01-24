<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phlick-PHP3</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div id="NavBarDiv">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="#">Phlick </a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li role="presentation"><a href="#">Other Sites</a></li>
                        <li role="presentation"><a href="#">Contact Us</a></li>
                        <li role="presentation" style="/*background-color:#f9a29d;*/"><a href="#">Log In</a></li>
                        <li role="presentation"><a href="#" style="/*background-color:#f5dc83;*/">Sign Up</a></li>
                    </ul>
            </div>
    </div>
    </nav>
    </div>
    <div class="login-clean">
        <form method="post" style="background-color:#f9a29d;">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration" style="background-color:#f9a29d;margin:10px;padding:5px;"><i class="icon ion-ios-navigate" style="color:#8c8c8c;background-color:#f9a29d;"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Log In</button></div><a href="#" class="forgot">Forgot your email or password?</a></form>
    </div>
    <div id="FooterDiv" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.42857143;color:#333;background-color:#fff;">
        <ul class="list-inline">
            <li><a href="#">Home</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Terms</a></li>
            <li><a href="#">Privacy Policy</a></li>
        </ul>
        <p class="copyright">Phlick © 2018</p>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>