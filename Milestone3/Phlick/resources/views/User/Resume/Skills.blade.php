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
            <tr>
                <td></td>
                <td style="width:80%;">
                    <br>
                    {{ Form::label('skill2', 'Skill or Trait') }}
                    {{ Form::text('skill2', NULL, array('placeholder' => 'Skill or Trait')) }}
                    <br>
                    {{ Form::textarea('explanation2', NULL, array('rows' => '5', 'cols' => '100',
                    'placeholder' => 'Explanation or brief description of this skill and how it relates to your desired job')) }}
                    <br><br>
                </td>
            </tr>
            <tr>
                <td></td>
                <td style="width:80%;">
                    <br>
                    {{ Form::label('skill3', 'Skill or Trait') }}
                    {{ Form::text('skill3', NULL, array('placeholder' => 'Skill or Trait')) }}
                    <br>
                    {{ Form::textarea('explanation3', NULL, array('rows' => '5', 'cols' => '100',
                    'placeholder' => 'Explanation or brief description of this skill and how it relates to your desired job')) }}
                    <br><br>
                </td>
            </tr>
            <tr>
                <td></td>
                <td style="width:80%;">
                    <br>
                    {{ Form::label('skill4', 'Skill or Trait') }}
                    {{ Form::text('skill4', NULL, array('placeholder' => 'Skill or Trait')) }}
                    <br>
                    {{ Form::textarea('explanation4', NULL, array('rows' => '5', 'cols' => '100',
                    'placeholder' => 'Explanation or brief description of this skill and how it relates to your desired job')) }}
                    <br><br>
                </td>
            </tr>
            <tr>
                <td></td>
                <td style="width:80%;">
                    <br>
                    {{ Form::label('skill5', 'Skill or Trait') }}
                    {{ Form::text('skill5', NULL, array('placeholder' => 'Skill or Trait')) }}
                    <br>
                    {{ Form::textarea('explanation5', NULL, array('rows' => '5', 'cols' => '100',
                    'placeholder' => 'Explanation or brief description of this skill and how it relates to your desired job')) }}
                    <br><br>
                </td>
            </tr>
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