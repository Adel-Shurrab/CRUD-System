<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h1 class="display-4">Welcome, {{ Auth::user()->name }}</h1>
            <p class="lead">Your email is: {{ Auth::user()->email }}</p>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>

        <div class="card shadow p-4">
            <h2 class="h4 mb-3">Create a New Post</h2>
            <form action="/" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter post title" required>
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body Content</label>
                    <textarea class="form-control" id="body" name="body" rows="5" placeholder="Enter post content" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Save Post</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
