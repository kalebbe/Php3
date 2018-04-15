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
$groupMem = DB::table('groupmembers')->where('USER_ID', Session::get('ID'))->get();
?>
@extends('Layouts.MasterLayout')
<html>
<body style="background-color:#cccccc;">
@section('content')
    <div id="HeadingDiv" style="min-height:86vh;background-color:#cccccc;" align="center">
        @if(count($groupMem) == 0)
            <h1>Looks like you haven't joined any groups :(</h1>
        @else
            <h1>Your Groups</h1>
            <hr>
            <table class="table" style="width:80vw;">
                <thead>
                <tr>
                    <th>Group Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($groupMem as $key => $data)
                    <?php
                    $groups = DB::table('groups')->where('ID', $data->GROUP_ID)->get();
                    ?>
                    @foreach($groups as $key2 => $data2)
                        <tr>
                            <th>
                                <h4>{{ $data2->TITLE }}</h4>
                            </th>
                            <th>
                                &nbsp &nbsp
                                <a class="btn btn-warning" href="/Phlick/leavegroup/{{ $data2->ID }}"
                                   onclick="return ConfirmDelete('Are you sure you want to leave this group?')">Leave
                                    Group</a>
                            </th>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
<script src="assets/js/Confirm.js"></script>
</body>
</html>