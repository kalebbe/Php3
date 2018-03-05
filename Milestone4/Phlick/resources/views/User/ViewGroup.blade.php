<!--
   -@Authors:      Kaleb Eberhart, Mick Torres, Will Bierer
   -@Project Name: Phlick Project
   -@Professor:    James Gordon
   -@Course:       CST-256
   -@Date:         03/04/18
 -->
<?php
if(Session::get('ACCESS') < 1){
    Session::flush();
    return view('welcome');
}

if($id != NULL){
    $group = DB::table('groups')->where('ID', $id)->get();
    foreach($group as $key => $data){
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
        <h1>{{ $title }}</h1>
        <br><br>
        <p>{{ $des }}</p>
        <br><br>
        <a class="btn btn-success" href="/Phlick/joingroup/{{ $id }}">Join Group</a>
    </div>
@endsection
</body>
</html>
