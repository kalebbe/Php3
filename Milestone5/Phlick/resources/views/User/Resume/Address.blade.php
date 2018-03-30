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
        <h1>Address</h1>
        {!! Form::open(['url' => 'address']) !!}
        <table class="table" align="center" border="0">
            @foreach($resume as $key => $data)
                <tr>
                    <td align="left">
                        <div class="btn-group-vertical" role="group">
                            <a class="btn btn-default" href="/Phlick/Resume/Overview">Overview</a>
                            <a class="btn btn-default" href="/Phlick/Resume/Objective">Objective</a>
                            <a class="btn btn-primary" href="#">Address</a>
                            <a class="btn btn-default" href="/Phlick/Resume/Education">Education</a>
                            <a class="btn btn-default" href="/Phlick/Resume/Experience">Experience</a>
                            <a class="btn btn-default" href="/Phlick/Resume/Skills">Skills</a>
                        </div>
                    </td>
                    <td style="width:80%;">

                        {{ Form::text('add1', NULL, array('placeholder' => 'Address Line 1 (Street Address)', 'required' => 'required', 'style' => 'width:50%;')) }}
                        {{ Form::text('city', NULL, array('placeholder' => 'City', 'required' => 'required', 'style' => 'width:20%;')) }}
                        {{ Form::select('state', ['AL' => 'AL', 'AK' => 'AK', 'AZ' => 'AZ', 'CA' => 'CA', 'CO' => 'CO',
                                    'CT' => 'CT', 'DE' => 'DE', 'FL' => 'FL', 'GA' => 'GA', 'HI' => 'HI', 'ID' => 'ID',
                                    'IL' => 'IL', 'IN' => 'IN', 'IA' => 'IA', 'KS' => 'KS', 'LA' => 'LA', 'ME' => 'ME',
                                    'MD' => 'MD', 'MA' => 'MA', 'MI' => 'MI', 'MN' => 'MN', 'MS' => 'MS', 'MO' => 'MO',
                                    'MT' => 'MT', 'NE' => 'NE', 'NV' => 'NV', 'NH' => 'NH', 'NJ' => 'NJ', 'NM' => 'NM',
                                    'NY' => 'NY', 'NC' => 'NC', 'ND' => 'ND', 'OH' => 'OH', 'OK' => 'OK', 'OR' => 'OR',
                                    'PA' => 'PA', 'RI' => 'RI', 'SC' => 'SC', 'SD' => 'SD', 'TN' => 'TN', 'TX' => 'TX',
                                    'UT' => 'UT', 'VT' => 'VT', 'VA' => 'VA', 'WA' => 'WA', 'WV' => 'WV', 'WI' => 'WI',
                                    'WY' => 'WY']) }}
                        <br><br><br>
                        {{ Form::text('add2', NULL, array('placeholder' => 'Address Line 2 (Apt #, suite #, P.O. Box)', 'style' => 'width:50%;')) }}

                        {{Form::text('zip', NULL, array('placeholder' => 'Zip code', 'required' => 'required'))}}
                        <br><br>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="width:80%;">
                        @if($data->ADDRESS != NULL)
                            Current address: {{ $data->ADDRESS }}
                        @endif
                    </td>
                </tr>
        </table>
        {!! Form::submit('Update', array('class' => 'btn btn-success')) !!}
        {!! Form::close() !!}
        @endforeach
    </div>
@endsection
</body>
</html>