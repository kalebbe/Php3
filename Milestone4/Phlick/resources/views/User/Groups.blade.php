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
    return view('welcome');
}

if (isset($search)) {
    $groups = DB::table('groups')->where('TITLE', 'LIKE', '%' . $search . '%')
        ->orWhere('DESCRIPTION', 'LIKE', '%' . $search . '%')
        ->get();
    $results = count($groups);
} else {
    $groups = DB::table('groups')->get();
}

$count = 0;
?>
@extends('Layouts.MasterLayout')
<html>
<body style="background-color:#cccccc;">
@section('content')
    <div class="table-responsive" align="center" style="min-height:86vh;">
        <h1>Groups</h1>
        @if(Session::get('ACCESS') == 3)
            <br>
            <a class="btn btn-primary" href="addgroup">Add new group</a>
        @endif
        <br><br>
        {!! Form::open(['url' => 'searchgroups']) !!}
        {{ Form::text('search', NULL, array('placeholder' => 'Search Groups', 'required' => 'required')) }}
        {!! Form::submit('Search', array('class' => 'btn btn-success')) !!}
        {!! Form::close() !!}
        @if(isset($search))
            <p style="font-size:x-small">Your search for '{{ $search }}' yielded '{{ $results }}' results</p>
        @endif
        <br><br>
        <table class="table" style="width:80vw;">
            <tbody>
            <tr>
                @foreach($groups as $key => $data)
                    @if($count == 3)
                        <?php
                        $count = 0;
                        ?>
            </tr>
            <tr>
                @endif
                <td align="center" style="width:33%;">
                    @if(Session::get('ACCESS') == 3)
                        <h3>{{ $data->TITLE }}</h3>
                    @else
                        <h3>{{ $data->TITLE }}</h3>
                    @endif
                    <?php
                    $trimmed = preg_replace('/((\w+\W*){100}(\w+))(.*)/', '${1}', $data->DESCRIPTION);
                    ?>
                    <p style="font-size:small;">{{ $trimmed }} @if(str_word_count($trimmed) > 100) ... @endif</p>
                    @if(Session::get('ACCESS') == 3)
                        <a class="btn btn-warning" href="/Phlick/EditGroup?id=<?= $data->ID ?>">Edit</a>
                        &nbsp
                        <a class="btn btn-danger" href="/Phlick/DeleteGroup/<?= $data->ID ?>"
                           onclick="return ConfirmDelete('Are you sure you want to delete that group?')">Delete</a>
                    @else
                        <a class="btn btn-primary" href="/Phlick/viewgroup/<?= $data->ID ?>">View</a>
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