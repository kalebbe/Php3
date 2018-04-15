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
$count = 0;
?>
@extends('Layouts.MasterLayout')
<html>
<body style="background-color:#cccccc;">
@section('content')
    <div class="table-responsive" align="center" style="min-height:86vh;">
        <h1>Search Results</h1>

        <?php
        $jobs = NULL;
        $companies = NULL;
        $groups = NULL;
        if (!isset($category)) {
        $jobs = DB::table('jobs')->where('TITLE', 'LIKE', '%' . $search . '%')
            ->orWhere('DESCRIPTION', 'LIKE', '%' . $search . '%')
            ->orWhere('COMPANY', 'LIKE', '%' . $search . '%')
            ->orderBy('DATE_POSTED', 'desc')
            ->get();
        $groups = DB::table('groups')->where('TITLE', 'LIKE', '%' . $search . '%')
            ->orWhere('DESCRIPTION', 'LIKE', '%' . $search . '%')
            ->get();
        $companies = DB::table('users')->where('ACCESS', '=', '2')
            ->where('FIRST_NAME', 'LIKE', '%' . $search . '%')
            ->get();
        $results = count($groups) + count($jobs) + count($companies);

        ?>
        <div class="btn-group">
            <a class="btn btn-primary" href="/Phlick/searchall/{{ $search }}">All</a>
            <a class="btn btn-default" href="/Phlick/searchjobs/{{ $search }}">Jobs</a>
            <a class="btn btn-default" href="/Phlick/searchcomp/{{ $search }}">Companies</a>
            <a class="btn btn-default" href="/Phlick/searchgroups/{{ $search }}">Groups</a>
        </div>
        <?php
        } else if ($category == "jobs") {
        $jobs = DB::table('jobs')->where('TITLE', 'LIKE', '%' . $search . '%')
            ->orWhere('DESCRIPTION', 'LIKE', '%' . $search . '%')
            ->orWhere('COMPANY', 'LIKE', '%' . $search . '%')
            ->get();
        $results = count($jobs);
        ?>
        <div class="btn-group">
            <a class="btn btn-default" href="/Phlick/searchall/{{ $search }}">All</a>
            <a class="btn btn-primary" href="/Phlick/searchjobs/{{ $search }}">Jobs</a>
            <a class="btn btn-default" href="/Phlick/searchcomp/{{ $search }}">Companies</a>
            <a class="btn btn-default" href="/Phlick/searchgroups/{{ $search }}">Groups</a>
        </div>
        <?php
        } else if ($category == "companies") {
        $companies = DB::table('users')->where('ACCESS', '=', '2')
            ->where('FIRST_NAME', 'LIKE', '%' . $search . '%')
            ->get();
        $results = count($companies);
        ?>
        <div class="btn-group">
            <a class="btn btn-default" href="/Phlick/searchall/{{ $search }}">All</a>
            <a class="btn btn-default" href="/Phlick/searchjobs/{{ $search }}">Jobs</a>
            <a class="btn btn-primary" href="/Phlick/searchcomp/{{ $search }}">Companies</a>
            <a class="btn btn-default" href="/Phlick/searchgroups/{{ $search }}">Groups</a>
        </div>
        <?php
        } else if ($category == "groups") {
        $groups = DB::table('groups')->where('TITLE', 'LIKE', '%' . $search . '%')
            ->orWhere('DESCRIPTION', 'LIKE', '%' . $search . '%')
            ->get();
        $results = count($groups);
        ?>
        <div class="btn-group">
            <a class="btn btn-default" href="/Phlick/searchall/{{ $search }}">All</a>
            <a class="btn btn-default" href="/Phlick/searchjobs/{{ $search }}">Jobs</a>
            <a class="btn btn-default" href="/Phlick/searchcomp/{{ $search }}">Companies</a>
            <a class="btn btn-primary" href="/Phlick/searchgroups/{{ $search }}">Groups</a>
        </div>
        <?php
        }
        ?>
        <p style="font-size:x-small">Your search for '{{ $search }}' yielded {{ $results }} results</p>
        <br><br>
        <table class="table" style="width:80vw;">
            <tbody>
            <tr>
                @if($jobs != NULL)
                    @foreach($jobs as $key => $data)
                        @if($count == 3)
                            <?php
                            $count = 0;
                            ?>
            </tr>
            <tr>
                @endif
                <td align="center" style="width:33%;">
                    <h3><a href="/Phlick/viewjob/{{ $data->ID }}">{{ $data->TITLE }}</a></h3>
                    <?php
                    $array = explode(" ", $data->DESCRIPTION);
                    if(count($array)>=100){
                        array_splice($array, 100);
                    }
                    $trimmed = implode(" ", $array);
                    ?>
                    <p style="font-size:small;">{{ $trimmed }} @if(str_word_count($trimmed) == 100)... @endif</p>
                    @if(Session::get('ID') == $data->COMPANY_ID)
                        <a class="btn btn-warning" href="/Phlick/EditJob?id={{ $data->ID }}">Edit</a>
                        &nbsp
                    @endif
                    @if(Session::get('ACCESS') == 3 || Session::get('ID') == $data->COMPANY_ID)
                        <a class="btn btn-danger" href="/Phlick/DeleteJob/{{ $data->ID }}"
                           onclick="return ConfirmDelete('Are you sure you want to delete that job?')">Delete</a>
                    @endif
                    @if(Session::get('ACCESS') == 1)
                        <a class="btn btn-success" href="#">Save</a>
                        @endif
                </td>
                <?php
                $count++;
                ?>
                @endforeach
                @endif
                @if($companies != NULL)
                    @foreach($companies as $key => $data)
                        @if($count == 3)
                            <?php
                            $count = 0;
                            ?>
            </tr>
            <tr>
                @endif
                <td align="center" style="width:33%;">
                    <h3><a href="/Phlick/viewcompany/{{ $data->ID }}">{{ $data->FIRST_NAME }}</a></h3>
                    @if(Session::get('ACCESS') == 3)
                        <a class="btn btn-warning" href="{{ url('/Suspend/' . $data->ID) }}"
                           onclick="return ConfirmDelete('Are you sure you would like to suspend that user?')">Suspend
                            company</a>
                        &nbsp
                        <a class="btn btn-danger" href="{{ url('/Delete/' . $data->ID) }}"
                           onclick="return ConfirmDelete('Are you sure you would like to delete that user?')">Delete
                            company</a>
                    @endif
                </td>
                <?php
                $count++;
                ?>
                @endforeach
                @endif
                @if($groups != NULL)
                    @foreach($groups as $key => $data)
                        @if($count == 3)
                            <?php
                            $count = 0;
                            ?>
            </tr>
            <tr>
                @endif
                <td align="center" style="width:33%;">
                    <h3><a href="/Phlick/viewgroup/{{ $data->ID }}">{{ $data->TITLE }}</a></h3>
                    <?php
                    $trimmed = preg_replace('/((\w+\W*){100}(\w+))(.*)/', '${1}', $data->DESCRIPTION);
                    ?>
                    <p style="font-size:small;">{{ $trimmed }} @if(str_word_count($trimmed) == 100) ... @endif</p>
                    @if(Session::get('ACCESS') == 3)
                        <a class="btn btn-warning" href="/Phlick/EditGroup?id={{ $data->ID }}">Edit</a>
                        &nbsp
                        <a class="btn btn-danger" href="/Phlick/DeleteGroup/{{ $data->ID }}"
                           onclick="return ConfirmDelete('Are you sure you want to delete that group?')">Delete</a>
                    @endif
                </td>
                <?php
                $count++;
                ?>
                @endforeach
                @endif
            </tr>
            </tbody>
        </table>
    </div>
@endsection
<script src="assets/js/Confirm.js"></script>
</body>
</html>