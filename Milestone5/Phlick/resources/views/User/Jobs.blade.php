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

if (isset($search)) {
    $jobs = DB::table('jobs')->where('TITLE', 'LIKE', '%' . $search . '%')
        ->orWhere('DESCRIPTION', 'LIKE', '%' . $search . '%')
        ->orderBy('DATE_POSTED')
        ->get();
    $results = count($jobs);
} else {
    $jobs = DB::table('jobs')->get();
}

$count = 0;
?>
@extends('Layouts.MasterLayout')
<html>
<body style="background-color:#cccccc;">
@section('content')
    <div class="table-responsive" align="center" style="min-height:86vh;">
        <h1>Jobs</h1>
        @if(Session::get('ACCESS') == 2)
            <br>
            <a class="btn btn-primary" href="addjob">Add new job</a>
        @endif
        <br><br>
        <table class="table" style="width:80vw;">
            <tbody>
            <tr>
                @foreach($jobs as $jey => $data)
                    <?php
                    $date = date("F jS, Y", strtotime($data->DATE_POSTED));
                    ?>
                    @if($count == 3)
                        <?php
                        $count = 0;
                        ?>
            </tr>
            <tr>
                @endif
                <td align="center" style="width:33%;">
                    <h3>{{ $data->TITLE }}</h3>
                    <p> Company: {{ $data->COMPANY }} </p>
                    <br>
                    <p style="font-size:x-small; opacity:0.5;">Posted on: {{ $date }}</p>
                    <?php
                        $array = explode(" ", $data->DESCRIPTION);
                        if(count($array)>=100){
                            array_splice($array, 100);
                        }
                        $trimmed = implode(" ", $array);
                    ?>
                    <p style="font-size:small;">{{ $trimmed }} @if(str_word_count($trimmed) >= 100) ... @endif</p>
                    @if(Session::get('ACCESS') == 2)
                        <a class="btn btn-warning" href="/Phlick/EditJob?id={{ $data->ID }}">Edit</a>
                        &nbsp
                    @endif
                    @if(Session::get('ACCESS') >= 2)
                        <a class="btn btn-danger" href="/Phlick/DeleteJob/{{ $data->ID }}"
                           onclick="return ConfirmDelete('Are you sure you want to delete that job?')">Delete</a>
                    @endif
                    @if(Session::get('ACCESS') == 1)
                        <a class="btn btn-primary" href="/Phlick/viewjob/<?= $data->ID ?>">View</a>
                    @endif
                </td>
                <?php
                $count++;
                ?>
                @endforeach
            </tr>
            </tbody>
        </table>
    </div>
@endsection
<script src="assets/js/Confirm.js"></script>
</body>
</html>
