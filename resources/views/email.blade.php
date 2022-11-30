<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Welcome to DreamUltra</h1>
<p>Your full name {{$name}}</p>
<p>Your number {{$number}}</p>
<a class="btn btn-success" href="{{route('activate', $token)}}">Activate your account</a>
</body>
</html>



