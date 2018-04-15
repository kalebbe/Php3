<!--
   -@Authors:      Kaleb Eberhart, Mick Torres, Will Bierer
   -@Project Name: Phlick Project
   -@Professor:    James Gordon
   -@Course:       CST-256
   -@Date:         03/04/18
 -->
<?php
if (Session::get('ACCESS') < 2) {
    Session::flush();
    return view('Guest/welcome');
}

$resume = DB::table('resumecart')->orderBy('DATE_APPLIED', 'desc')->get();
?>
@extends('Layouts.MasterLayout')
<html>
<body style="background-color:#cccccc;">
@section('content')
    <div style="min-height:86vh;" align="center">
        <h1>{{ Session::get('NAME') }} Home</h1>
        <table class="table" style="width:80vw;">
            <thead>
            <tr>
                <th><strong>Applicant Name</strong></th>
                <th><strong>Position Applied</strong></th>
                <th><strong>Position Location</strong></th>
                <th><strong>Date Received</strong></th>
                <th><strong>Last Viewed</strong></th>
                <th><strong>Resume</strong></th>
            </tr>
            </thead>
            <tbody>
            @foreach($resume as $key => $data)
                <?php
                $date = date("F jS, Y", strtotime($data->DATE_APPLIED));
                if ($data->DATE_LAST_VIEWED != NULL) {
                    $date2 = date("F jS, Y", strtotime($data->DATE_LAST_VIEWED));
                } else {
                    $date2 = NULL;
                }
                ?>
                <tr>
                    <td>
                        <?php
                        $user = DB::table('users')->where('ID', $data->USER_ID)->get();
                        ?>
                        @foreach($user as $key2 => $data2)
                            {{$data2->LAST_NAME}}, {{$data2->FIRST_NAME}}
                        @endforeach
                    </td>
                    <?php
                    $job = DB::table('jobs')->where('ID', $data->JOB_ID)->get();
                    ?>
                    @foreach($job as $key2 => $data2)
                        <td>{{$data2->TITLE}}</td>
                        <td>{{$data2->LOCATION}}</td>
                    @endforeach
                    <td>{{$date}}</td>
                    <td>
                        @if($date2 != NULL)
                            {{ $date2 }}
                        @else
                            Unread
                        @endif
                    </td>
                    <td>
                        <form action="/Phlick/PDF/open/{{$data->USER_ID}}/{{$data->ID}}" method="POST" target="_blank">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-success" type="submit">View PDF</button>
                        </form>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="/Phlick/PDF/download/{{$data->USER_ID}}/{{$data->ID}}">Download PDF</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="/Phlick/deleteresume/{{$data->ID}}"
                        onclick="return ConfirmDelete('Are you sure you would like to delete this resume?')">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
<script src="assets/js/Confirm.js"></script>
</body>
</html>
