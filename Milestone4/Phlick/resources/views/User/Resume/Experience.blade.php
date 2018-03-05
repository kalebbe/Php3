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
        {!! Form::open(['url' => 'experience']) !!}
        <table class="table" align="center" border="0">
            <h1>Experience</h1>
            <p style="font-size:xx-small">Only one is required. Arrange newest to oldest</p>
            <tr>
                <td align="left">
                    <div class="btn-group-vertical" role="group">
                        <a class="btn btn-default" href="/Phlick/Resume/Overview">Overview</a>
                        <a class="btn btn-default" href="/Phlick/Resume/Objective">Objective</a>
                        <a class="btn btn-default" href="/Phlick/Resume/Address">Address</a>
                        <a class="btn btn-default" href="/Phlick/Resume/Education">Education</a>
                        <a class="btn btn-primary" href="#">Experience</a>
                        <a class="btn btn-default" href="/Phlick/Resume/Skills">Skills</a>
                    </div>
                </td>
                <td style="width:80%;">
                    {{ Form::label('name', 'Company Name') }}
                    {{ Form::text('name', NULL, array('placeholder' => 'Company Name', 'required' => 'required')) }}
                    &nbsp &nbsp
                    {{ Form::label('position', 'Job Title') }}
                    {{ Form::text('position', NULL, array('placeholder' => 'Job Title', 'required' => 'required')) }}
                    <br><br>
                    {{ Form::label('start', 'Start Date') }}
                    {{ Form::select('start', ['January' => 'January', 'February' => 'February', 'March' => 'March',
                                    'April' => 'April', 'May' => 'May', 'June' => 'June', 'July' => 'July', 'August' => 'August',
                                    'September' => 'September', 'October' => 'October', 'November' => 'November', 'December' => 'December']) }}
                    <select name="startyear">
                        @for($i = 2019; $i >= 1920; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    &nbsp &nbsp
                    {{ Form::label('end', 'End Date') }}
                    {{ Form::select('end', ['January' => 'January', 'February' => 'February', 'March' => 'March',
                                    'April' => 'April', 'May' => 'May', 'June' => 'June', 'July' => 'July', 'August' => 'August',
                                    'September' => 'September', 'October' => 'October', 'November' => 'November', 'December' => 'December']) }}
                    <select name="endyear">
                        @for($i = 2019; $i >= 1920; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    <br><br>
                    {{ Form::label('description', 'Job Description') }}<br>
                    {{ Form::textarea('description', NULL, array('rows' => '5', 'cols' => '100',
                        'placeholder' => 'Description of your duties at this job', 'required' => 'required')) }}
                    <br><br>
                </td>
            </tr>
            <?php
            $name1 = "name";
            $name2 = "position";
            $name3 = "start";
            $name4 = "startyear";
            $name5 = "end";
            $name6 = "endyear";
            $name7 = "description";
            ?>
            @for($i = 2; $i < 6; $i++)
            <tr>
                <td></td>
                <td>
                    <br>
                    {{ Form::label($name1 . $i, 'Company Name') }}
                    {{ Form::text($name1 . $i, NULL, array('placeholder' => 'Company Name')) }}
                    &nbsp &nbsp
                    {{ Form::label($name2 . $i, 'Job Title') }}
                    {{ Form::text($name2 . $i, NULL, array('placeholder' => 'Job Title')) }}
                    <br><br>
                    {{ Form::label($name3 . $i, 'Start Date') }}
                    {{ Form::select($name3 . $i, ['January' => 'January', 'February' => 'February', 'March' => 'March',
                                    'April' => 'April', 'May' => 'May', 'June' => 'June', 'July' => 'July', 'August' => 'August',
                                    'September' => 'September', 'October' => 'October', 'November' => 'November', 'December' => 'December']) }}
                    <select name="<?= $name4 . $i ?>">
                        @for($j = 2019; $j >= 1920; $j--)
                            <option value="{{ $j }}">{{ $j }}</option>
                        @endfor
                    </select>
                    &nbsp &nbsp
                    {{ Form::label($name5 . $i, 'End Date') }}
                    {{ Form::select($name5 . $i, ['January' => 'January', 'February' => 'February', 'March' => 'March',
                                    'April' => 'April', 'May' => 'May', 'June' => 'June', 'July' => 'July', 'August' => 'August',
                                    'September' => 'September', 'October' => 'October', 'November' => 'November', 'December' => 'December']) }}
                    <select name="<?= $name6 . $i ?>">
                        @for($j = 2019; $j >= 1920; $j--)
                            <option value="{{ $j }}">{{ $j }}</option>
                        @endfor
                    </select>
                    <br><br>
                    {{ Form::label($name7 . $i, 'Job Description') }}<br>
                    {{ Form::textarea($name7 . $i, NULL, array('rows' => '5', 'cols' => '100',
                        'placeholder' => 'Description of your duties at this job')) }}
                    <br><br>

                </td>
            </tr>
            @endfor
            <tr>
                <td></td>
                <td style="width:80%;">
                    @foreach($resume as $key => $data)
                        @if($data->EXPERIENCE != NULL)
                            <?php
                            $unsData = unserialize($data->EXPERIENCE);
                            ?>
                            <b>Current Experience:</b><br><br>
                            @for($i = 0; $i < count($unsData); $i++)
                                @if($unsData[$i] != NULL)
                                    <?php
                                    $arrayData = explode(",", $unsData[$i])
                                    ?>
                                    <b>Company Name:</b> {{ $arrayData[0] }}<br>
                                    <b>Job Title:</b> {{ $arrayData[1] }}<br>
                                    <b>Start Date:</b> {{ $arrayData[2] }}, {{ $arrayData[3] }}<br>
                                    <b>End Date:</b> {{ $arrayData[4] }}, {{ $arrayData[5] }}<br>
                                    <b>Description of Duties:</b> {{ $arrayData[6] }}<br><br>
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