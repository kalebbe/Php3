<?php
if (Session::get('ACCESS') < 1) {
    Session::flush();
    return view('Guest/welcome');
}

if ($id != NULL) {
    $job = DB:: table('jobs')->where('ID', $id)->get();
    foreach ($job as $key => $data) {
        $title = $data->TITLE;
        $des = $data->DESCRIPTION;
        $company = $data->COMPANY;
        $pay = $data->COMPENSATION;
        $loc = $data->LOCATION;
        $date = date("F jS, Y", strtotime($data->DATE_POSTED));
    }
}
?>
@extends('Layouts.MasterLayout')
<html>
<body style="background-color:#cccccc;">
@section('content')
    <div align="center" style="min-height:86vh;">
        <h1>{{ $title }}</h1>
        <p>Company: {{ $company }}</p>
        <br>
        <p style="font-size:x-small; opacity:0.5;">Posted on: {{ $date }}</p>
        <br>
        <p>Salary: {{ $pay }}</p>
        <br>
        <p>{{ $des }}</p>
    </div>
@endsection
</body>
</html>