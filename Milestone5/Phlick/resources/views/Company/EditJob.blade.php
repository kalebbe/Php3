<!--
   -@Authors:      Kaleb Eberhart, Mick Torres, Will Bierer
   -@Project Name: Phlick Project
   -@Professor:    James Gordon
   -@Course:       CST-256
   -@Date:         03/04/18
 -->
<?php
if (Session::get('ACCESS') < 2) {
    Session::flush();
    return view('Guest/welcome');
}
$existing = false;
$title = "";
$des = "";
$comp = "";
$city = "";
$state = "";

if (isset($_GET['id'])) {
    $existing = true;
    $jobs = DB::table('jobs')->where('ID', $_GET['id'])->get();
    foreach ($jobs as $key => $data) {
        $title = $data->TITLE;
        $des = $data->DESCRIPTION;
        $comp = $data->COMPENSATION;
        $location = $data->LOCATION;
        $array = explode(',', $location);
        $city = $array[0];
        $state = $array[1];
    }
}
?>
@extends('Layouts.MasterLayout')
<html>
<body style="background-color:#cccccc;">
@section('content')
    <div align="center" style="min-height:86vh;">
        @if($existing)
            <h1>Edit Job</h1>
            {!! Form::open(['url' => 'editjob/' . $_GET['id']]) !!}
        @else
            {!! Form::open(['url' => 'NewJob']) !!}
            <h1>Create Job</h1>
        @endif
        <hr>
        {{ Form::text('title', $title, array('placeholder' => 'Job Title', 'required' => 'required')) }}
        <br><br>
        {{ Form::textarea('description', $des, array('rows' => '20', 'cols' => '100', 'placeholder' =>
        'Description of job duties and requirements', 'required' => 'required')) }}
        <br><br>
        {{ Form::text('pay', $comp, array('placeholder' => 'Compensation', 'required' => 'required')) }}
        <br><br>
        {{ Form::text('city', $city, array('placeholder' => 'City', 'required' => 'required')) }}
        {{ Form::text('state', $state, array('placeholder' => 'State (Ex: AZ)', 'required' => 'required', 'style' => 'width:100px;')) }}
        <br><br>
        @if($existing)
            {!! Form::submit('Update job', array('class' => 'btn btn-primary')) !!}
        @else
            {!! Form::submit('Add job', array('class' => 'btn btn-success')) !!}
        @endif
        {!! Form::close() !!}
    </div>
@endsection
</body>
</html>