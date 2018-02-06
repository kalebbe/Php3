@extends('Layouts.MasterLayout')
<html>

<body style="background-color:#cccccc;">
@section('content')
    <div id="HeadingDiv" style="min-height:86vh;background-color:#cccccc;">
        <h1 style="text-align:center;">Edit Profile</h1>
        <div class="container" style="width:650px;">
            <div class="table-responsive" style="width:100%;">
                <table class="table">
                   
                    <tbody>
                    <tr>
                        <td><input type="text" placeholder="First Name"><input type="text" placeholder="Last Name">
                            <button class="btn btn-default" type="button">Update</button>
                        </td>
                        <td><input type="text" placeholder="New Email Address"><input type="text"
                                                                                      placeholder="Re-enter Email Address">
                            <button class="btn btn-default" type="button">Update</button>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="text" placeholder="Old Password"><input type="text" placeholder="New Password"><input
                                    type="text" placeholder="Confirm New Password">
                            <button class="btn btn-default" type="button">Update</button>
                        </td>
                        <td><input type="text" placeholder="Age">
                            <button class="btn btn-default" type="button">Update</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="radio"><label><input name="gender" type="radio">Male</label></div>
                            <div class="radio"><label><input name="gender" type="radio">Female</label></div>
                            <button class="btn btn-default" type="button">Update</button>
                        </td>
                        <td><input type="text" placeholder="Race / Ethnicity">
                            <button class="btn btn-default" type="button">Update</button>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="text" placeholder="Home Address">
                            <button class="btn btn-default" type="button">Update</button>
                        </td>
                        <td><input type="text" placeholder="Phone Number">
                            <button class="btn btn-default" type="button">Update</button>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="text" placeholder="Education">
                            <button class="btn btn-default" type="button">Update</button>
                        </td>
                        <td><input type="text" placeholder="Profession">
                            <button class="btn btn-default" type="button">Update</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
</body>

</html>