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

if (isset($filter) && !isset($pay1, $pay2)) {
    $jobs = DB::table('jobs')->where('JOB_TYPE', "=", $filter)->orderBy('DATE_POSTED', 'desc')->get();
    $pay1 = null;
    $pay2 = null;
} else if (!isset($filter) && isset($pay1, $pay2)) {
    $jobs = DB::table('jobs')->whereBetween('COMPENSATION', [$pay1, $pay2])->orderBy('DATE_POSTED', 'desc')->get();
    $filter = null;
} else if (isset($filter, $pay1, $pay2)) {
    $jobs = DB::table('jobs')->where('JOB_TYPE', $filter)->whereBetween('COMPENSATION', [$pay1, $pay2])->
        orderBy('DATE_POSTED', 'desc')->get();
} else {
    $jobs = DB::table('jobs')->orderBy('DATE_POSTED', 'desc')->get();
    $filter = null;
    $pay1 = null;
    $pay2 = null;
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
        @if(Session::get('ACCESS') == 1)
            <hr>
            <div class="btn-group">
                <a class="btn btn-default" href="/Phlick/filterfull/{{ $pay1 }}/{{ $pay2 }}">Full-Time</a>
                <a class="btn btn-default" href="/Phlick/filterpart/{{ $pay1 }}/{{ $pay2 }}">Part-Time</a>
                <a class="btn btn-default" href="/Phlick/filterseas/{{ $pay1 }}/{{ $pay2 }}">Seasonal</a>
                <a class="btn btn-default" href="/Phlick/filterinter/{{ $pay1 }}/{{ $pay2 }}">Internship</a>
                <br><br>
            </div>
            {!! Form::open(['url' => 'filterpay/' . $filter]) !!}
            {{ Form::text('min', NULL, array('placeholder' => 'Minimum', 'required' => 'required', 'style' => 'width:65px;'))  }}
            -
            {{ Form::text('max', NULL, array('placeholder' => 'Maximum', 'required' => 'required', 'style' => 'width:65px;')) }}
            &nbsp{{ Form::select('comp', ['Yearly' => 'Yearly', 'Hourly' => 'Hourly']) }}&nbsp
            {{ Form::submit('Apply filter', array('class' => 'btn btn-default')) }}
            {!! Form::close() !!}
            @if(isset($filter) || isset($pay1, $pay2))
                Active filters:
                @if(isset($filter))
                    {{ $filter }}
                @endif
                @if(isset($filter, $pay1, $pay2))
                    ,
                @endif
                @if(isset($pay1, $pay2))
                    ${{$pay1}}-${{$pay2}}
                @endif
                <a class="btn btn-danger btn-sm" href="/Phlick/Jobs">Remove</a>
            @endif
        @endif
        <table class="table" style="width:80vw;">
            <tbody>
            <tr>
                @foreach($jobs as $key => $data)
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
                    <p style="font-size:x-small;">Pay: ${{ $data->COMPENSATION }}
                        @if($data->SALARY_TYPE == 'Yearly')
                            /yr
                        @else
                            /hr
                        @endif
                    </p>
                    <p style="font-size:x-small; opacity:0.5;">Posted on: {{ $date }}</p>
                    <?php
                    $array = explode(" ", $data->DESCRIPTION);
                    if (count($array) >= 100) {
                        array_splice($array, 100);
                    }
                    $trimmed = implode(" ", $array);
                    ?>
                    <p style="font-size:small;">{{ $trimmed }} @if(str_word_count($trimmed) >= 100)
                            ... @endif</p>
                    @if(Session::get('ACCESS') == 2)
                        <a class="btn btn-warning"
                           href="/Phlick/EditJob?id={{ $data->ID }}">Edit</a>
                        &nbsp
                    @endif
                    @if(Session::get('ACCESS') >= 2)
                        <a class="btn btn-danger" href="/Phlick/DeleteJob/{{ $data->ID }}"
                           onclick="return ConfirmDelete('Are you sure you want to delete that job?')">Delete</a>
                    @endif
                    @if(Session::get('ACCESS') == 1)
                        <a class="btn btn-primary" href="/Phlick/viewjob/<?= $data->ID ?>">View</a>
                        <a class="btn btn-success" href="/Phlick/addtocart/{{Session::get('ID')}}/{{$data->ID}}">Save</a>
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