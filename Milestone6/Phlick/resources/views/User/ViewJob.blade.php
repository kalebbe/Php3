<?php
if (Session::get('ACCESS') < 1) {
    Session::flush();
    return view('Guest/welcome');
}

if ($id != NULL) {
    $job = DB:: table('jobs')->where('ID', $id)->get();
    foreach ($job as $key => $data) {
        $title = $data->TITLE;
        $des = $data->DESCRIPTION;
        $company = $data->COMPANY;
        $pay = $data->COMPENSATION;
        $loc = $data->LOCATION;
        $date = date("F jS, Y", strtotime($data->DATE_POSTED));
        $type = $data->JOB_TYPE;
        $sal = $data->SALARY_TYPE;
        if($sal == "Yearly"){
            $salType = "/yr";
        }
        else{
            $salType = "/hr";
        }
    }
}
$resume = DB::table('resume')->where('USER_ID', Session::get('ID'))->get();
?>
@extends('Layouts.MasterLayout')
<html>
<body style="background-color:#cccccc;">
@section('content')
    <div align="center" style="min-height:86vh;">
        <h1>{{ $title }}</h1>
        <p>Company: {{ $company }}</p>
        <br>
        <p style="font-size:x-small; opacity:0.5;">Posted on: {{ $date }}</p>
        <br>
        <p>Salary: ${{ $pay . $salType }}</p>
        <br>
        <p>Job Type: {{ $type }}</p>
        <p>{{ $des }}</p>
        @foreach($resume as $key => $data)
            @if($data->OBJECTIVE != NULL && $data->ADDRESS != NULL && $data->EXPERIENCE != NULL &&
                $data->EDUCATION != NULL && $data->SKILLS != NULL)
                <br>
                <a class="btn btn-success" href="/Phlick/submitresume/{{Session::get('ID')}}/{{$id}}">Submit Resume</a>
            @endif
        @endforeach
        <br><br><br><p style="font-size:xx-small">*You can apply to this company if you have a fully filled out resume!</p>
    </div>
@endsection
</body>
</html>