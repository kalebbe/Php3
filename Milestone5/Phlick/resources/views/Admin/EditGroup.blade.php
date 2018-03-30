<!--
   -@Authors:      Kaleb Eberhart, Mick Torres, Will Bierer
   -@Project Name: Phlick Project
   -@Professor:    James Gordon
   -@Course:       CST-256
   -@Date:         03/04/18
 -->
<?php
if (Session::get('ACCESS') < 3) {
    Session::flush();
    return view('Guest/welcome');
}
$existing = false;
$title = "";
$des = "";
if (isset($_GET['id'])) {
    $existing = true;
    $groups = DB::table('groups')->where('ID', $_GET['id'])->get();
    foreach ($groups as $key => $data) {
        $title = $data->TITLE;
        $des = $data->DESCRIPTION;
    }
}
?>
@extends('Layouts.MasterLayout')
<html>
<body style="background-color:#cccccc;">
@section('content')
    <div align="center" style="min-height:86vh;">
        @if($existing)
            <h1>Edit Group</h1>
            {!! Form::open(['url' => 'editgroup/' . $_GET['id']]) !!}
        @else
            {!! Form::open(['url' => 'NewGroup']) !!}
            <h1>Create Group</h1>
        @endif
        <hr>
        {{ Form::text('title', $title, array('placeholder' => 'Name of Group', 'required' => 'required')) }}
        <br><br>
        {{ Form::textarea('description', $des, array('rows' => '20', 'cols' => '100', 'placeholder' =>
        'Descripion of the group', 'required' => 'required')) }}
            <br><br>
        @if($existing)
            {!! Form::submit('Update group', array('class' => 'btn btn-primary')) !!}
        @else
            {!! Form::submit('Add group', array('class' => 'btn btn-success')) !!}
        @endif
        {!! Form::close() !!}
    </div>
@endsection
</body>
</html>
