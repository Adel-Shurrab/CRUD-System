<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>

<body>
    @auth
        <h1>Welcome, {{ Auth::user()->name }}</h1>
        <p>Your email is: {{ Auth::user()->email }}</p>
        <a href="{{ route('logout') }}">Logout</a>
    @else
    @endauth
</body>

</html>
