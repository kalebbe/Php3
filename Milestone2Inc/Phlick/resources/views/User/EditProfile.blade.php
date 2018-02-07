<?php

if(Session::get('ACCESS') < 1){
    Session::flush();
    return view('welcome');
}

$user = DB::table('users')->where('EMAIL', Session::get('EMAIL'))->first();
$user = json_decode(json_encode((array) $user), true);

$profile = DB::select("SELECT * FROM profile WHERE USER_ID='" . $user['ID'] . "'");
$profile = json_decode(json_encode((array) $user), true);

?>

@extends('Layouts.MasterLayout')
<html>

<body style="background-color:#cccccc;">
@section('content')
    <div id="HeadingDiv" style="min-height:86vh;background-color:#cccccc;">
        <h1 style="text-align:center;">Edit Profile</h1>
        <div class="container" style="width:100%">
            <div class="table-responsive">
                <table class="table" align="center">

                    <tbody>
                    <tr>
                        <td align="center">
                            <h4>Change Name</h4><br>
                            {!! Form::open(['url' => 'name']) !!}
                            {{ Form::text('first_name', NULL, array('placeholder' => 'First Name', 'required' => 'required')) }}
                            <br><br>
                            {{ Form::text('last_name', NULL, array('placeholder' => 'Last Name', 'required' => 'required')) }}
                            <p style="font-size:x-small">
                                Current name: <?= $user['FIRST_NAME'] . " " . $user['LAST_NAME'] ?>
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
								Current email: <?= $user['EMAIL'] ?>
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
                    <tr>
                        <td align="center">
                            <h4>Change Date of Birth</h4><br>
                            {!! Form::open(['url' => 'dob']) !!}
                            {{ Form::select('month', ['January', 'February', 'March', 'April', 'May', 'June', 'July',
                                'August', 'September', 'October', 'November', 'December']) }}
                            {{ Form::select('day', ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12',
                                '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26',
                                '27', '28', '29', '30', '31']) }}
                            {{ Form::select('year', ['2001', '2000', '1999', '1998', '1997', '1996', '1995', '1994',
                                '1993', '1992', '1991', '1990', '1989', '1988', '1987', '1986', '1985', '1984',
                                '1983', '1982', '1981', '1980', '1979', '1978', '1977', '1976', '1975', '1974',
                                '1973', '1972', '1971', '1970', '1969', '1968', '1967', '1966', '1965', '1964',
                                '1963', '1962', '1961', '1960', '1959', '1958', '1957', '1956', '1955', '1954',
                                '1953', '1952', '1951', '1950', '1949', '1948', '1947', '1946', '1945', '1944',
                                '1943', '1942', '1941', '1940', '1939', '1938', '1937', '1936', '1935', '1934',
                                '1933', '1932', '1931', '1930', '1929', '1928', '1927', '1926', '1925', '1924',
                                '1923', '1922', '1921', '1920', '1919', '1918', '1917', '1916', '1915', '1914',
                                '1913', '1912', '1911', '1910', '1909', '1908', '1907', '1906', '1905', '1904',
                                '1903', '1902', '1901', '1900']) }}
                            <br><br>
                            {{ Form::submit('Update Birthday', array('class' => 'btn btn-primary')) }}
                            {!! Form::close() !!}
                        </td>
                        <td align="center">
                            <h4>Change Gender</h4><br>
                            {!! Form::open(['url' => 'gender']) !!}
                            {{ Form::radio('gender', 'Male') }} Male
                            {{ Form::radio('gender', 'Female') }} Female
                            {{ Form::radio('gender', 'Other') }} Other<br><br>
                            {{ Form::submit('Update gender', array('class' => 'btn btn-primary')) }}
                            {!! Form::close() !!}
                        </td>
                        <td align="center">
                            <h4>Change Ethnicity</h4><br>
                            {!! Form::open(['url' => 'ethnicity']) !!}
                            {{ Form::text('ethnicity', NULL, array('placeholder' => 'Ethnicity', 'required' => 'required')) }}
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
                            {{ Form::select('state', ['AL', 'AK', 'AZ', 'AK', 'CA', 'CO', 'CT', 'DE', 'FL', 'GA',
                                'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'LA', 'ME', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO',
                                'MT', 'NE', 'NV', 'NH', 'NJ', 'NM', 'NY', 'NC', 'ND', 'OH', 'OK', 'OR', 'PA', 'RI',
                                'SC', 'SD', 'TN', 'TX', 'UT', 'VT', 'VA', 'WA', 'WV', 'WI', 'WY']) }}<br><br>
                            {{ Form::submit('Update location', array('class' => 'btn btn-primary')) }}
                            {{ Form::close() }}
                        </td>
                        <td align="center">
                            <h4>Change Phone Number</h4><br>
                            {!! Form::open(['url' => 'number']) !!}
                            {{ Form::text('number', NULL, array('placeholder' => 'Phone number', 'required' => 'required')) }}
                            <br><br>
                            {{ Form::submit('Update number', array('class' => 'btn btn-primary')) }}
                            {!! Form::close() !!}
                        </td>
                        <td align="center">
                            <h4>Change Education</h4><br>
                            {!! Form::open(['url' => 'education']) !!}
                            {{ Form::select('education', ['Some high school', 'GED or equivalent', 'High school diploma',
                                'Some college', 'Associate\'s degree', 'Bachelor\'s degree', 'Master\'s degree',
                                'Doctoral degree', 'Other']) }}<br><br>
                            {{ Form::submit('Update education', array('class' => 'btn btn-primary')) }}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <h4>Change Profession</h4><br>
                            {!! Form::open(['url' => 'job']) !!}
                            {{ Form::text('job', NULL, array('placeholder' => 'Profession', 'required' => 'required')) }}
                            <br><br>
                            {{ Form::submit('Update profession', array('class' => 'btn btn-primary')) }}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
</body>

</html>