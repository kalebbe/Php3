<!--
   -@Authors:      Kaleb Eberhart, Mick Torres, Will Bierer
   -@Project Name: Phlick Project
   -@Professor:    James Gordon
   -@Course:       CST-256
   -@Date:         03/04/18
 -->
<?php
if(Session::get('ACCESS') < 3){
Session::flush();
return view('welcome');
}

$users = DB::table('users')->get();
?>
@extends('Layouts.MasterLayout')
<html>
<body style="background-color:#cccccc;">
@section('content')
    <div id="HeadingDiv" style="min-height:86vh;background-color:#cccccc;" class="table-responsive" align="center">
        <h1>Admin Home</h1>
        <table class="table" style="width:80vw;">
            <thead>
            <tr>
                <th><strong>First Name</strong></th>
                <th><strong>Last Name</strong></th>
                <th><strong>Email</strong></th>
                <th><strong>Marks</strong></th>
                <th><strong>Suspend</strong></th>
                <th><strong>Delete</strong></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $key => $data)
                @if($data->ACCESS != 3)
                    <tr>
                        <th>{{$data->FIRST_NAME}}</th>
                        <th>{{$data->LAST_NAME}}</th>
                        <th>{{$data->EMAIL}}</th>
                        <th>{{$data->MARKS}}</th>
                        <th><a class="btn btn-warning" href="{{ url('/Suspend/'.$data->ID) }}">Suspend user</a></th>
                        <th><a class="btn btn-danger button" href="{{url('/Delete/'.$data->ID)}}"
                               onclick="return ConfirmDelete('Are you sure you would like to delete that user?')">Delete user</a></th>
                        @if($data->SUS_END_DATE != NULL)
                            <th>Suspended</th>
                        @endif
                        @if($data->MARKS == 3)
                            <th>Banned</th>
                        @endif
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
<script src="assets/js/Confirm.js"></script>
</body>

</html>