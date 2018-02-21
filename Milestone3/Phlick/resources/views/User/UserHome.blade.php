<?php
if(Session::get('ACCESS') < 1){
    Session::flush();
    return view('welcome');
}
?>
@extends('Layouts.MasterLayout')
<html>
<body style="background-color:#cccccc;">
@section('content')
    <!--This is currently just a stub since there's no content-->
        <div id="HeadingDiv" style="min-height:86vh;background-color:#cccccc;"></div>
@endsection
</body>
</html>