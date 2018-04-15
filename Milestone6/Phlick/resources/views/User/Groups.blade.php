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
$groups = DB::table('groups')->get();

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
                    <h3>{{ $data->TITLE }}</h3>
                    <?php
                    $array = explode(" ", $data->DESCRIPTION);
                    if(count($array)>=100){
                        array_splice($array, 100);
                    }
                    $trimmed = implode(" ", $array);
                    ?>
                    <p style="font-size:small;">{{ $trimmed }} @if(str_word_count($trimmed) == 100) ... @endif</p>
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