<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	@foreach ($data as $photo)
	<img src="{{ asset('storage/ktm/'.$photo->ktm) }}" alt="">
	@endforeach
</body>
</html>