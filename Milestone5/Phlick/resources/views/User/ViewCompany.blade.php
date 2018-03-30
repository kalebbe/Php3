<?php
if (Session::get('ACCESS') < 1) {
    Session:;
    flush();
    return view('Guest/welcome');
}

if ($id != NULL) {
    $comp = DB::table('users')->where('ID', $id)->get();
    $compJobs = DB::table('jobs')->where('COMPANY_ID', $id)->orderBy('Date_Posted')->get();
    foreach ($comp as $key => $data) {
        $name = $data->FIRST_NAME;
    }
}
?>
@extends('Layouts.MasterLayout')
<html>
<body style="background-color:#cccccc;">
@section('content')
    <div align="center" style="min-height:86vh;">
        <h1>{{ $name }}'s Job Listings</h1>
        <table class="table" style="width:80vw;">
            <thead>
            <tr>
                <th><strong>Job Title</strong></th>
                <th><strong>Compensation</strong></th>
                <th><strong>Location</strong></th>
                <th><strong>Date Posted</strong></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($compJobs as $key => $data)
                <?php
                $date = date("F jS, Y", strtotime($data->DATE_POSTED));
                ?>
                <tr>
                    <th>{{ $data->TITLE }}</th>
                    <th>{{ $data->COMPENSATION }}</th>
                    <th>{{ $data->LOCATION }}</th>
                    <th>{{ $date }}</th>
                    @if(Session::get('ACCESS') == 3)
                        <th>
                            <a class="btn btn-danger" href="/Phlick/DeleteJob/{{ $data->ID }}"
                               onclick="return ConfirmDelete('Are you sure you want to delete that job?')">Delete</a>
                        </th>
                    @endif
                    @if(Session::get('ACCESS') == 1)
                        <th>
                            <a class="btn btn-primary" href="/Phlick/viewjob/<?= $data->ID ?>">View</a>
                        </th>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
</body>
</html>
