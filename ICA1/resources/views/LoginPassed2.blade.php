<html>
<head>
	<title>blank</title>
</head>
<body>
	@if($model->getUsername() == 'kaleb')
		<h3>Kaleb has logged in successfully</h3>
	@else{
		<h3>Someone besides Kaleb has logged in</h3>
	@endif
</body>
</html>