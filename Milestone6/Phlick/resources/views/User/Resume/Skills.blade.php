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
    return view('Guest/welcome');
}
$resume = DB::table('resume')->where('USER_ID', Session::get('ID'))->get();
?>
@extends('Layouts.MasterLayout')
<html>
<body style="background-color:#cccccc;">
@section('content')
    <div style="min-height:86vh;background-color:#cccccc;" align="center">
        <h1>Skills</h1>
        <p style="font-size:xx-small;">Only one is required</p>
        {!! Form::open(['url' => 'skills']) !!}
        <table class="table" border="0">
            <tr>
                <td align="left">
                    <div class="btn-group-vertical" role="group">
                        <a class="btn btn-default" href="/Phlick/Resume/Overview">Overview</a>
                        <a class="btn btn-default" href="/Phlick/Resume/Objective">Objective</a>
                        <a class="btn btn-default" href="/Phlick/Resume/Address">Address</a>
                        <a class="btn btn-default" href="/Phlick/Resume/Education">Education</a>
                        <a class="btn btn-default" href="/Phlick/Resume/Experience">Experience</a>
                        <a class="btn btn-primary" href="#">Skills</a>
                    </div>
                </td>
                <td style="width:80%">
                    {{ Form::label('skill', 'Skill or Trait') }}
                    {{ Form::text('skill', NULL, array('placeholder' => 'Skill or Trait', 'required' => 'required')) }}
                    <p style="font-size:xx-small;">Example: Leadership</p>
                    <br>
                    {{ Form::textarea('explanation', NULL, array('rows' => '5', 'cols' => '100',
                    'placeholder' => 'Explanation or brief description of this skill and how it relates to your desired job')) }}
                    <p style="font-size:xx-small;">Example: Showed leadership skills by successfully managing
                        100+ employees at (Company name here).</p>
                </td>
            </tr>
            <?php
            $name1 = "skill";
            $name2 = "explanation";
            ?>
            @for($i = 2; $i < 6; $i++)
            <tr>
                <td></td>
                <td style="width:80%;">
                    <br>
                    {{ Form::label($name1 . $i, 'Skill or Trait') }}
                    {{ Form::text($name1 . $i, NULL, array('placeholder' => 'Skill or Trait')) }}
                    <br>
                    {{ Form::textarea($name2 . $i, NULL, array('rows' => '5', 'cols' => '100',
                    'placeholder' => 'Explanation or brief description of this skill and how it relates to your desired job')) }}
                    <br><br>
                </td>
            </tr>
            @endfor
            <tr>
                <td></td>
                <td style="width:80%;">
                    @foreach($resume as $key => $data)
                        @if($data->SKILLS != NULL)
                            <?php
                            $unsData = unserialize($data->SKILLS);
                            ?>
                            <b>Current Skills:</b><br><br>
                            @for($i = 0; $i < count($unsData); $i++)
                                @if($unsData[$i] != NULL)
                                    <?php
                                    $arrayData = explode(",", $unsData[$i]);
                                    ?>
                                    <b>{{ $arrayData[0] }}</b>- {{ $arrayData[1] }} <br>
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