<html>
<head>
	<meta charset="utf-8">
	<title>Activity 5</title>
</head>
<body>

{!! Form::open(['url' => 'login']) !!}

{{ Form::text('username', NULL, array('placeholder' => 'Username')) }}
{{ Form::password('password', array('placeholder' => 'Password')) }}
{{ Form::submit('Log in') }}

</body>
</html>