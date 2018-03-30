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
$resume = DB::table('resume')->where('USER_ID', Session::get('ID'))->get();
?>
@extends('Layouts.MasterLayout')
<html>
<body style="background-color:#cccccc;">
@section('content')
    <div align="center">
        <h1>Resume</h1>
        <p style="font-size:xx-small">You can make your resume into a pdf when it's complete!</p>
    </div>
    <div style="min-height:86vh;background-color:#cccccc;">
        @foreach($users as $key => $data)
            @foreach($profile as $key2 => $data2)
                @foreach($resume as $key3 => $data3)

                    <table class="table" align="center" border="0">
                        <tr>
                            <td align="left">
                                <div class="btn-group-vertical" role="group">
                                    <a class="btn btn-primary" href="#">Overview</a>
                                    <a class="btn btn-default" href="/Phlick/Resume/Objective">Objective</a>
                                    <a class="btn btn-default" href="/Phlick/Resume/Address">Address</a>
                                    <a class="btn btn-default" href="/Phlick/Resume/Education">Education</a>
                                    <a class="btn btn-default" href="/Phlick/Resume/Experience">Experience</a>
                                    <a class="btn btn-default" href="/Phlick/Resume/Skills">Skills</a>
                                </div>
                            </td>
                            <td style="width:40%;">
                                <h2>Full Name</h2>
                                {{ $data->FIRST_NAME}} {{$data->LAST_NAME}}
                            </td>

                            <td style="width:40%">
                                <h2>Email Address</h2>
                                {{ $data->EMAIL }}
                            </td>
                        </tr>
                        <tr>
                            <td align="left"></td>
                            <td style="width:40%;">
                                <h2>Phone Number</h2>
                                {{ $data2->NUMBER }}
                            </td>
                            @if($data3->OBJECTIVE != NULL)
                                <td style="width:40%;">
                                    <h2>Objective</h2>
                                    {{ $data3->OBJECTIVE }}
                                </td>
                            @endif
                        </tr>
                        @if($data3->ADDRESS != NULL && $data3->SKILLS != NULL)
                            <tr>
                                <td align="left"></td>
                                <td style="width:40%;">
                                    <h2>Address</h2>
                                    {{ $data3->ADDRESS }}
                                </td>
                                <td style="width:40%;">
                                    <h2>Skills</h2>
                                    <?php
                                    $unsData = unserialize($data3->SKILLS);
                                    ?>

                                    @for($i = 0; $i < count($unsData); $i++)
                                        @if($unsData[$i] != NULL)
                                            <?php
                                            $arrayData = explode(",", $unsData[$i]);
                                            ?>
                                            <b>{{ $arrayData[0] }}</b>- {{ $arrayData[1] }}<br>
                                        @endif
                                    @endfor
                                </td>
                            </tr>
                        @endif
                        @if($data3->EXPERIENCE != NULL && $data3->EDUCATION != NULL)
                            <tr>
                                <td align="left"></td>
                                <td style="width:40%">
                                    <h2>Work Experience</h2>
                                    <?php
                                    $unsData = unserialize($data3->EXPERIENCE);
                                    ?>
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
                                </td>
                                <td style="width:40%;">
                                    <h2>Education</h2>
                                    <?php
                                    $unsExp = unserialize($data3->EDUCATION);
                                    ?>
                                    @for($i = 0; $i < count($unsExp); $i++)
                                        @if($unsExp[$i] != NULL)
                                            <?php
                                            $arrayData = explode(",", $unsExp[$i]);
                                            ?>
                                            <b>School name:</b> {{ $arrayData[0] }}<br>
                                            <b>Graduation year:</b> {{ $arrayData[1] }}<br>
                                            <b>Degree of study:</b> {{ $arrayData[2] }}<br><br>
                                        @endif
                                    @endfor
                                </td>
                            </tr>
                        @endif
                    </table>
                    @if($data3->OBJECTIVE != NULL && $data3->ADDRESS != NULL && $data3->EXPERIENCE != NULL &&
                        $data3->EDUCATION != NULL && $data3->SKILLS != NULL)
                        <div align="center">
                            <form action="/Phlick/PDF/open" method="POST" target="_blank">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button class="btn btn-success" type="submit">View PDF</button>
                                <a class="btn btn-primary" href="/Phlick/PDF/download">Download PDF</a>
                            </form>
                            <br><br>
                        </div>
                    @endif
                @endforeach
            @endforeach
        @endforeach
    </div>
@endsection
</body>
</html>