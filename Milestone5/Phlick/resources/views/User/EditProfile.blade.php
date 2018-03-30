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

$users = DB::table('users')->where('ID', Session::get('ID'))->get();
$profile = DB::table('profile')->where('USER_ID', Session::get('ID'))->get();
?>


@extends('Layouts.MasterLayout')
<html>

<body style="background-color:#cccccc;">
@section('content')
    <div id="HeadingDiv" style="min-height:86vh;background-color:#cccccc;">
        <div align="center">
            @foreach($profile as $key => $data)
                <h1 style="text-align:center;">Edit Profile</h1>
                <a class="btn btn-success"
                   @if($data->NUMBER != NULL)
                       href="Resume/Overview"
                   @else
                       href="#"
                   @endif
                >
                   Build Resume</a>
                <p style="font-size: xx-small">*Phone number must be filled out in your profile first</p>
            @endforeach
        </div>
        <div class="container" style="width:100%">
            <div class="table-responsive">
                <table class="table" align="center">
                    <tbody>
                    @foreach($users as $key => $data)
                        <tr>
                            <td align="center">
                                <h4>Change Name</h4><br>
                                {!! Form::open(['url' => 'name']) !!}
                                {{ Form::text('first_name', NULL, array('placeholder' => 'First Name', 'required' => 'required')) }}
                                <br><br>
                                {{ Form::text('last_name', NULL, array('placeholder' => 'Last Name', 'required' => 'required')) }}
                                <p style="font-size:x-small">
                                    Current name: {{$data->FIRST_NAME}} {{$data->LAST_NAME}}
                                </p>
                                <br><br>
                                {{ Form::submit('Update name', array('class' => 'btn btn-primary')) }}
                                {!! Form::close() !!}
                            </td>
                            <td align="center">
                                <h4>Change Email</h4><br>
                                {!! Form::open(['url' => 'email']) !!}
                                {{ Form::email('email', NULL, array('placeholder' => 'New Email', 'required' => 'required')) }}
                                <p style="font-size:x-small">
                                    Current email: {{$data->EMAIL}}
                                    <br><br>
                                {{ Form::submit('Update email', array('class' => 'btn btn-primary')) }}
                                {!! Form::close() !!}
                            </td>
                            <td align="center">
                                <h4>Change Password</h4><br>
                                {!! Form::open(['url' => 'password']) !!}
                                {{ Form::password('oldpass', array('placeholder' => 'Old password', 'required' => 'required')) }}
                                <br><br>
                                {{ Form::password('pass', array('placeholder' => 'New password', 'required' => 'required')) }}
                                <br><br>
                                {{ Form::password('repass', array('placeholder' => 'Confirm new password', 'required' => 'required')) }}
                                <br><br>
                                {{ Form::submit('Update password', array('class' => 'btn btn-primary')) }}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    @foreach($profile as $key => $data)
                        <tr>
                            <td align="center">
                                <h4>Change Date of Birth</h4><br>
                                {!! Form::open(['url' => 'dob']) !!}
                                {{ Form::select('month', ['January' => 'January', 'February' => 'February', 'March' => 'March',
                                    'April' => 'April', 'May' => 'May', 'June' => 'June', 'July' => 'July', 'August' => 'August',
                                    'September' => 'September', 'October' => 'October', 'November' => 'November', 'December' => 'December']) }}
                                <select name="day">
                                    @for($i = 1; $i <= 31; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                <select name="year">
                                    @for($i = 2001; $i >= 1900; $i--)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                <p style="font-size:x-small">
                                    @if($data->DOB != NULL)
                                        Current DOB: {{date("F jS, Y", strtotime($data->DOB))}}
                                    @endif
                                </p>
                                <br><br>
                                {{ Form::submit('Update Birthday', array('class' => 'btn btn-primary')) }}
                                {!! Form::close() !!}
                            </td>
                            <td align="center">
                                <h4>Change Gender</h4><br>
                                {!! Form::open(['url' => 'gender']) !!}
                                {{ Form::radio('gender', 'Male') }} Male
                                {{ Form::radio('gender', 'Female') }} Female
                                {{ Form::radio('gender', 'Other') }} Other
                                <p style="font-size:x-small">
                                    @if($data->GENDER != NULL)
                                        Current gender: {{$data->GENDER}}
                                    @endif
                                </p>
                                <br><br>
                                {{ Form::submit('Update gender', array('class' => 'btn btn-primary')) }}
                                {!! Form::close() !!}
                            </td>
                            <td align="center">
                                <h4>Change Ethnicity</h4><br>
                                {!! Form::open(['url' => 'ethnicity']) !!}
                                {{ Form::text('ethnicity', NULL, array('placeholder' => 'Ethnicity', 'required' => 'required')) }}
                                <p style="font-size:x-small">
                                    @if($data->ETHNICITY != NULL)
                                        Current ethnicity: {{$data->ETHNICITY}}
                                    @endif
                                </p>
                                <br><br>
                                {{ Form::submit('Update ethnicity', array('class' => 'btn btn-primary')) }}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <h4>Change Location</h4><br>
                                {!! Form::open(['url' => 'location']) !!}
                                {{ Form::text('city', NULL, array('placeholder' => 'City', 'required' => 'required')) }}
                                {{ Form::select('state', ['AL' => 'AL', 'AK' => 'AK', 'AZ' => 'AZ', 'CA' => 'CA', 'CO' => 'CO',
                                    'CT' => 'CT', 'DE' => 'DE', 'FL' => 'FL', 'GA' => 'GA', 'HI' => 'HI', 'ID' => 'ID',
                                    'IL' => 'IL', 'IN' => 'IN', 'IA' => 'IA', 'KS' => 'KS', 'LA' => 'LA', 'ME' => 'ME',
                                    'MD' => 'MD', 'MA' => 'MA', 'MI' => 'MI', 'MN' => 'MN', 'MS' => 'MS', 'MO' => 'MO',
                                    'MT' => 'MT', 'NE' => 'NE', 'NV' => 'NV', 'NH' => 'NH', 'NJ' => 'NJ', 'NM' => 'NM',
                                    'NY' => 'NY', 'NC' => 'NC', 'ND' => 'ND', 'OH' => 'OH', 'OK' => 'OK', 'OR' => 'OR',
                                    'PA' => 'PA', 'RI' => 'RI', 'SC' => 'SC', 'SD' => 'SD', 'TN' => 'TN', 'TX' => 'TX',
                                    'UT' => 'UT', 'VT' => 'VT', 'VA' => 'VA', 'WA' => 'WA', 'WV' => 'WV', 'WI' => 'WI',
                                    'WY' => 'WY']) }}
                                <p style="font-size:x-small">
                                    @if($data->LOCATION != NULL)
                                        Current location: {{$data->LOCATION}}
                                    @endif
                                </p>
                                <br><br>
                                {{ Form::submit('Update location', array('class' => 'btn btn-primary')) }}
                                {{ Form::close() }}
                            </td>
                            <td align="center">
                                <h4>Change Phone Number</h4><br>
                                {!! Form::open(['url' => 'number']) !!}
                                {{ Form::text('number', NULL, array('placeholder' => 'Phone number', 'required' => 'required')) }}
                                <p style="font-size:x-small">
                                    @if($data->NUMBER != NULL)
                                        Current number: {{$data->NUMBER}}
                                    @endif
                                </p>
                                <br><br>
                                {{ Form::submit('Update number', array('class' => 'btn btn-primary')) }}
                                {!! Form::close() !!}
                            </td>
                            <td align="center">
                                <h4>Change Education</h4><br>
                                {!! Form::open(['url' => 'education']) !!}
                                {{ Form::select('education', ['Some high school' => 'Some high school', 'GED or equivalent' =>
                                    'GED or equivalent', 'High school diploma' => 'High school diploma', 'Some college' =>
                                    'Some college', 'Associate\'s degree' => 'Associate\'s degree', 'Bachelor\'s degree' =>
                                    'Bachelor\'s degree', 'Master\'s degree' => 'Master\'s degree', 'Doctoral degree' =>
                                    'Doctoral degree', 'Other' => 'Other']) }}
                                <p style="font-size:x-small">
                                    @if($data->EDUCATION != NULL)
                                        Current education: {{$data->EDUCATION}}
                                    @endif
                                </p>
                                <br><br>
                                {{ Form::submit('Update education', array('class' => 'btn btn-primary')) }}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <h4>Change Profession</h4><br>
                                {!! Form::open(['url' => 'job']) !!}
                                {{ Form::text('job', NULL, array('placeholder' => 'Profession', 'required' => 'required')) }}
                                <p style="font-size:x-small">
                                    @if($data->PROFESSION != NULL)
                                        Current profession: {{$data->PROFESSION}}
                                    @endif
                                </p>
                                <br><br>
                                {{ Form::submit('Update profession', array('class' => 'btn btn-primary')) }}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
</body>

</html>