<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phlick-PHP3</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="{{ asset('assets/css/Footer-Basic.css') }}">
    <link rel="stylesheet" href="asset('assets/css/Header-Blue.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background-color:rgb(244,243,243);min-width:100vw;overflow-x:hidden;">
    <form>
        <div id="NavBarDiv">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header"><a class="navbar-brand" href="#">Phlick </a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
                    <div
                        class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li role="presentation"><a href="#">Other Sites</a></li>
                            <li role="presentation"><a href="#">Contact Us</a></li>
                            <li role="presentation" style="/*background-color:#f9a29d;*/"><a href="Login">Log In</a></li>
                            <li role="presentation"><a href="Register" style="/*background-color:#f5dc83;*/">Sign Up</a></li>
                        </ul>
                </div>
        </div>
        </nav>
        </div>
        <div id="HeadingDiv" style="min-height:82vh;width:100%" align="center">
            <div class="jumbotron">
                <h1>Phlick</h1>
                <p>A new professional learning network</p>
                <p><a class="btn btn-default" role="button" href="Login" style="/*background-color:#f9a29d;*/margin:5px;">Log In</a>
                <a class="btn btn-default" type="button" href="Register" style="/*background-color:#f5dc83;*/margin:5px;">Sign Up</a></p>
                <p>Sign up or login to connect with your fellow Phlickers!</p>
            </div>
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
    </form>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>