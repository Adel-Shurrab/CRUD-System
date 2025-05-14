<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>

<body>
    <h1>Welcome, {{ Auth::user()->name }}</h1>
    <p>Your email is: {{ Auth::user()->email }}</p>
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-link">Logout</button>
    </form>

    <div style="border: 3px solid black;">
        <h2>Create a New Post</h2>
        for
    </div>

</body>

</html>
