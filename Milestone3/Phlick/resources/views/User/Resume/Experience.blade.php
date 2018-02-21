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
                        @for($i = 1920; $i <= 2019; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    &nbsp &nbsp
                    {{ Form::label('end', 'End Date') }}
                    {{ Form::select('end', ['January' => 'January', 'February' => 'February', 'March' => 'March',
                                    'April' => 'April', 'May' => 'May', 'June' => 'June', 'July' => 'July', 'August' => 'August',
                                    'September' => 'September', 'October' => 'October', 'November' => 'November', 'December' => 'December']) }}
                    <select name="endyear">
                        @for($i = 1920; $i <= 2019; $i++)
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
            <tr>
                <td></td>
                <td>
                    <br>
                    {{ Form::label('name2', 'Company Name') }}
                    {{ Form::text('name2', NULL, array('placeholder' => 'Company Name')) }}
                    &nbsp &nbsp
                    {{ Form::label('position2', 'Job Title') }}
                    {{ Form::text('position2', NULL, array('placeholder' => 'Job Title')) }}
                    <br><br>
                    {{ Form::label('start2', 'Start Date') }}
                    {{ Form::select('start2', ['January' => 'January', 'February' => 'February', 'March' => 'March',
                                    'April' => 'April', 'May' => 'May', 'June' => 'June', 'July' => 'July', 'August' => 'August',
                                    'September' => 'September', 'October' => 'October', 'November' => 'November', 'December' => 'December']) }}
                    <select name="startyear2">
                        @for($i = 1920; $i <= 2019; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    &nbsp &nbsp
                    {{ Form::label('end2', 'End Date') }}
                    {{ Form::select('end2', ['January' => 'January', 'February' => 'February', 'March' => 'March',
                                    'April' => 'April', 'May' => 'May', 'June' => 'June', 'July' => 'July', 'August' => 'August',
                                    'September' => 'September', 'October' => 'October', 'November' => 'November', 'December' => 'December']) }}
                    <select name="endyear2">
                        @for($i = 1920; $i <= 2019; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    <br><br>
                    {{ Form::label('description2', 'Job Description') }}<br>
                    {{ Form::textarea('description2', NULL, array('rows' => '5', 'cols' => '100',
                        'placeholder' => 'Description of your duties at this job')) }}
                    <br><br>

                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <br>
                    {{ Form::label('name3', 'Company Name') }}
                    {{ Form::text('name3', NULL, array('placeholder' => 'Company Name')) }}
                    &nbsp &nbsp
                    {{ Form::label('position3', 'Job Title') }}
                    {{ Form::text('position3', NULL, array('placeholder' => 'Job Title')) }}
                    <br><br>
                    {{ Form::label('start3', 'Start Date') }}
                    {{ Form::select('start3', ['January' => 'January', 'February' => 'February', 'March' => 'March',
                                    'April' => 'April', 'May' => 'May', 'June' => 'June', 'July' => 'July', 'August' => 'August',
                                    'September' => 'September', 'October' => 'October', 'November' => 'November', 'December' => 'December']) }}
                    <select name="startyear3">
                        @for($i = 1920; $i <= 2019; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    &nbsp &nbsp
                    {{ Form::label('end3', 'End Date') }}
                    {{ Form::select('end3', ['January' => 'January', 'February' => 'February', 'March' => 'March',
                                    'April' => 'April', 'May' => 'May', 'June' => 'June', 'July' => 'July', 'August' => 'August',
                                    'September' => 'September', 'October' => 'October', 'November' => 'November', 'December' => 'December']) }}
                    <select name="endyear3">
                        @for($i = 1920; $i <= 2019; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    <br><br>
                    {{ Form::label('description3', 'Job Description') }}<br>
                    {{ Form::textarea('description3', NULL, array('rows' => '5', 'cols' => '100',
                        'placeholder' => 'Description of your duties at this job')) }}
                    <br><br>

                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <br>
                    {{ Form::label('name4', 'Company Name') }}
                    {{ Form::text('name4', NULL, array('placeholder' => 'Company Name')) }}
                    &nbsp &nbsp
                    {{ Form::label('position4', 'Job Title') }}
                    {{ Form::text('position4', NULL, array('placeholder' => 'Job Title')) }}
                    <br><br>
                    {{ Form::label('start4', 'Start Date') }}
                    {{ Form::select('start4', ['January' => 'January', 'February' => 'February', 'March' => 'March',
                                    'April' => 'April', 'May' => 'May', 'June' => 'June', 'July' => 'July', 'August' => 'August',
                                    'September' => 'September', 'October' => 'October', 'November' => 'November', 'December' => 'December']) }}
                    <select name="startyear4">
                        @for($i = 1920; $i <= 2019; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    &nbsp &nbsp
                    {{ Form::label('end4', 'End Date') }}
                    {{ Form::select('end4', ['January' => 'January', 'February' => 'February', 'March' => 'March',
                                    'April' => 'April', 'May' => 'May', 'June' => 'June', 'July' => 'July', 'August' => 'August',
                                    'September' => 'September', 'October' => 'October', 'November' => 'November', 'December' => 'December']) }}
                    <select name="endyear4">
                        @for($i = 1920; $i <= 2019; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    <br><br>
                    {{ Form::label('description4', 'Job Description') }}<br>
                    {{ Form::textarea('description4', NULL, array('rows' => '5', 'cols' => '100',
                        'placeholder' => 'Description of your duties at this job')) }}
                    <br><br>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    {{ Form::label('name5', 'Company Name') }}
                    {{ Form::text('name5', NULL, array('placeholder' => 'Company Name')) }}
                    &nbsp &nbsp
                    {{ Form::label('position5', 'Job Title') }}
                    {{ Form::text('position5', NULL, array('placeholder' => 'Job Title')) }}
                    <br><br>
                    {{ Form::label('start5', 'Start Date') }}
                    {{ Form::select('start5', ['January' => 'January', 'February' => 'February', 'March' => 'March',
                                    'April' => 'April', 'May' => 'May', 'June' => 'June', 'July' => 'July', 'August' => 'August',
                                    'September' => 'September', 'October' => 'October', 'November' => 'November', 'December' => 'December']) }}
                    <select name="startyear5">
                        @for($i = 1920; $i <= 2019; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    &nbsp &nbsp
                    {{ Form::label('end5', 'End Date') }}
                    {{ Form::select('end5', ['January' => 'January', 'February' => 'February', 'March' => 'March',
                                    'April' => 'April', 'May' => 'May', 'June' => 'June', 'July' => 'July', 'August' => 'August',
                                    'September' => 'September', 'October' => 'October', 'November' => 'November', 'December' => 'December']) }}
                    <select name="endyear5">
                        @for($i = 1920; $i <= 2019; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    <br><br>
                    {{ Form::label('description5', 'Job Description') }}<br>
                    {{ Form::textarea('description5', NULL, array('rows' => '5', 'cols' => '100',
                        'placeholder' => 'Description of your duties at this job')) }}
                    <br><br>
                </td>
            </tr>
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