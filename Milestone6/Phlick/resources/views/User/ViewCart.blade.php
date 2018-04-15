<!--
   -@Authors:      Kaleb Eberhart
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
$cart = DB::table('jobcart')->where('USER_ID', Session::get('ID'))->get();
$resume = DB::table('resume')->where('USER_ID', Session::get('ID'))->get();
foreach ($resume as $key => $data) {
    if ($data->OBJECTIVE != NULL && $data->ADDRESS != NULL && $data->EXPERIENCE != NULL &&
        $data->EDUCATION != NULL && $data->SKILLS != NULL) {
        $res = true;
    } else {
        $res = false;
    }
}
?>
@extends('Layouts.MasterLayout')
<html>
<body style="background-color:#cccccc;">
@section('content')
    <div style="min-height:86vh;" align="center">
        <h1>Saved Jobs</h1>
        <table class="table" style="width:80vw;">
            <thead>
            <tr>
                <th><strong>Job Title</strong></th>
                <th><strong>Company</strong></th>
                <th><strong>Compensation</strong></th>
                <th><strong>Job Type</strong></th>
                <th><strong>Location</strong></th>
            </tr>
            </thead>
            <tbody>
            @foreach($cart as $key => $data)
                <tr>
                    <?php
                    $job = DB::table('jobs')->where('ID', $data->JOB_ID)->get();
                    ?>
                    @foreach($job as $key2 => $data2)
                        <?php
                        if ($data2->SALARY_TYPE == "Yearly") {
                            $comp = "yr";
                        } else {
                            $comp = "hr";
                        }
                        ?>
                        <td>{{$data2->TITLE}}</td>
                        <td>{{$data2->COMPANY}}</td>
                        <td>${{$data2->COMPENSATION}}/{{$comp}}</td>
                        <td>{{$data2->JOB_TYPE}}</td>
                        <td>{{$data2->LOCATION}}</td>
                        <td>
                            @if($res == true)
                                <a class="btn btn-success"
                                   href="/Phlick/submitresume/{{Session::get('ID')}}/{{$data2->ID}}">Submit resume</a>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-danger" href="/Phlick/deletecart/{{Session::get('ID')}}/{{$data2->ID}}"
                               onclick="return ConfirmDelete('Are you sure you want to remove that job from your cart?')">Remove</a>
                        </td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
        @if($res == true)
            <a class="btn btn-success" href="/Phlick/submitcart/{{Session::get('ID')}}">Submit resumes</a>&nbsp&nbsp
        @endif
        <a class="btn btn-danger" href="/Phlick/deletecart/{{Session::get('ID')}}/0"
           onclick="return ConfirmDelete('Are you sure you want to delete all saved jobs?')">Delete saved</a>
        <br><br>
        <p style="font-size:xx-small">*Note: you can only submit resumes if you have fully filled out your resume under
            Edit Profile. It is not recommended that you submit all resumes because you should be adapting your resume
            for each job. That being said, the option is still there if you choose.</p>
    </div>
@endsection
<script src="assets/js/Confirm.js"></script>
</body>
</html>
