<!--
   -@Authors:      Kaleb Eberhart, Mick Torres, Will Bierer
   -@Project Name: Phlick Project
   -@Professor:    James Gordon
   -@Course:       CST-256
   -@Date:         03/04/18
 -->
<?php
if (Session::get('ACCESS') < 1) {
    Session::flush();
    return view('welcome');
}

$resume = DB::table('resume')->where('USER_ID', Session::get('ID'))->get();
?>
@extends('Layouts.MasterLayout')
<html>
<body style="background-color:#cccccc;">
@section('content')
    <div style="min-height:86vh;background-color:#cccccc;" align="center">
        <h1>Objective</h1>
        {!! Form::open(['url' => 'objective']) !!}
        <table class="table">
            <tr>
                <td align="left">
                    <div class="btn-group-vertical" role="group">
                        <a class="btn btn-default" href="/Phlick/Resume/Overview">Overview</a>
                        <a class="btn btn-primary" href="/Phlick/Resume/Objective">Objective</a>
                        <a class="btn btn-default" href="/Phlick/Resume/Address">Address</a>
                        <a class="btn btn-default" href="/Phlick/Resume/Education">Education</a>
                        <a class="btn btn-default" href="/Phlick/Resume/Experience">Experience</a>
                        <a class="btn btn-default" href="/Phlick/Resume/Skills">Skills</a>
                    </div>
                </td>
                <td style="width:80%;">
                    <p style="font-size: small;">This is the objective of your job search. Typically,
                        you want to suck up a little bit here.</p>
                    <br>
                    @foreach($resume as $key => $data)
                        <textarea name="objective" rows="10" cols="100" required>{{$data->OBJECTIVE}}</textarea>
                        <p style="font-size:xx-small;">Example: My objective is to find a stable job in
                            an engineering field and to work my way up the ranks.</p>
                        <br><br>

                    @endforeach
                </td>
            </tr>
        </table>
        {!! Form::submit('Update', array('class' => 'btn btn-success')) !!}
        {!! Form::close() !!}
    </div>
@endsection
</body>
</html>