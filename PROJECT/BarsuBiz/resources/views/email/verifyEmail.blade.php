<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="h2">Welcome to Website {{$user->name}}</div>
    <p>Click <a href="/user/verify/{{$user->verifyUser->token}}"></a> here to verify your email</p>
</body>
</html>