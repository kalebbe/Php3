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
        <h1>Education</h1>
        <p style="font-size:xx-small;">Only one is required</p>
        {!! Form::open(['url' => 'education']) !!}
        <table class="table" align="center" border="0">
            <tr>
                <td align="left">
                    <div class="btn-group-vertical" role="group">
                        <a class="btn btn-default" href="/Phlick/Resume/Overview">Overview</a>
                        <a class="btn btn-default" href="/Phlick/Resume/Objective">Objective</a>
                        <a class="btn btn-default" href="/Phlick/Resume/Address">Address</a>
                        <a class="btn btn-primary" href="#">Education</a>
                        <a class="btn btn-default" href="/Phlick/Resume/Experience">Experience</a>
                        <a class="btn btn-default" href="/Phlick/Resume/Skills">Skills</a>
                    </div>
                </td>
                <td style="width:80%;">
                    {{ Form::label('school', 'Name of School') }}
                    {{ Form::text('school', NULL, array('placeholder' => 'Name of School', 'required' => 'required')) }}
                    <br><br>
                    {{ Form::label('year', 'Graduation Year') }}
                    <select id="year" name="year">
                        @for($i = 2030; $i >= 1920; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    <br><br>
                    {{ Form::label('major', 'Degree of Study') }}
                    {{ Form::text('major', NULL, array('placeholder' => 'Degree of Study', 'required' => 'required')) }}
                </td>
            </tr>
            <?php
            $name1 = "school";
            $name2 = "year";
            $name3 = "major";
            ?>
            @for($i = 2; $i < 4; $i++)
            <tr>
                <td></td>
                <td style="width:80%;">
                    <br>
                    {{ Form::label($name1 . $i, 'Name of School') }}
                    {{ Form::text($name1 . $i, NULL, array('placeholder' => 'Name of School')) }}
                    <br><br>
                    {{ Form::label($name2 . $i, 'Graduation Year') }}
                    <select id="<?= $name2 . $i ?>" name="<?= $name2 . $i ?>">
                        @for($j = 2030; $j >= 1920; $j--)
                            <option value="{{ $j }}">{{ $j }}</option>
                        @endfor
                    </select>
                    <br><br>
                    {{ Form::label($name3 . $i, 'Degree of Study') }}
                    {{ Form::text($name3 . $i, NULL, array('placeholder' => 'Degree of Study',)) }}
                    <br><br>
                </td>
            </tr>
            @endfor
            <tr>
                <td>
                </td>
                <td style="width:80%">
                    @foreach($resume as $key => $data)
                        @if($data->EDUCATION != NULL)
                            <?php
                            $unsData = unserialize($data->EDUCATION);
                            ?>
                            <br><br>
                            <b>Current Education:</b><br><br>
                            @for($i = 0; $i < count($unsData); $i++)
                                @if($unsData[$i] != NULL)
                                    <?php
                                    $arrayData = explode(",", $unsData[$i]);
                                    ?>
                                    <b>School name:</b> {{ $arrayData[0] }}<br>
                                    <b>Graduation year:</b> {{ $arrayData[1] }}<br>
                                    <b>Degree of study:</b> {{ $arrayData[2] }}<br><br>
                                @endif
                            @endfor
                        @endif
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