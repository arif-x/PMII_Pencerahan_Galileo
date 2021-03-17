<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	@foreach ($data as $pasphoto)
	<img src="{{ asset('storage/pasphoto/'.$pasphoto->pasphoto) }}" alt="">
	@endforeach
</body>
</html>