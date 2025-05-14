<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | CRUD System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        .navbar {
            background: linear-gradient(135deg, #007bff, #0056b3);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            border-radius: 15px 15px 0 0 !important;
            border-bottom: none;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            font-weight: 600;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #dee2e6;
            background-color: #f8f9fa;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
        }

        .btn-primary {
            background: linear-gradient(135deg, #007bff, #0056b3);
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
        }

        .btn-danger {
            background: linear-gradient(135deg, #dc3545, #b02a37);
            border: none;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
        }

        .post-card {
            margin-bottom: 1.5rem;
        }

        .post-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .post-actions {
            display: flex;
            gap: 10px;
        }

        .user-welcome {
            background: linear-gradient(135deg, #fff, #f8f9fa);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .nav-tabs .nav-link {
            color: #495057;
            font-weight: 600;
            border: none;
            border-radius: 0;
            padding: 10px 20px;
        }

        .nav-tabs .nav-link.active {
            color: #007bff;
            background-color: transparent;
            border-bottom: 3px solid #007bff;
        }

        .tab-pane {
            padding: 20px 0;
        }

        .author-badge {
            font-size: 0.8rem;
            padding: 0.2rem 0.6rem;
            border-radius: 50px;
            background-color: #e9ecef;
            color: #495057;
            margin-left: 10px;
        }

        .author-badge.you {
            background-color: #cff4fc;
            color: #055160;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-cube me-2"></i>CRUD System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <span class="dropdown-item-text text-muted"><i class="fas fa-envelope me-1"></i>
                                    {{ Auth::user()->email }}</span>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger"><i
                                            class="fas fa-sign-out-alt me-1"></i> Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-4 mb-4">
                <!-- Create Post Card -->
                <div class="card shadow">
                    <div class="card-header d-flex align-items-center">
                        <i class="fas fa-plus-circle me-2 text-primary"></i>
                        <span>Create a New Post</span>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('posts.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label fw-bold">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" placeholder="Enter post title" required>
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="body" class="form-label fw-bold">Content</label>
                                <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="5"
                                    placeholder="What's on your mind?" required></textarea>
                                @error('body')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-paper-plane me-2"></i>Publish Post
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <!-- Posts Tabs -->
                <ul class="nav nav-tabs mb-4" id="postsTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="my-posts-tab" data-bs-toggle="tab"
                            data-bs-target="#my-posts" type="button" role="tab" aria-controls="my-posts"
                            aria-selected="true">
                            <i class="fas fa-user-edit me-2"></i>My Posts
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="all-posts-tab" data-bs-toggle="tab" data-bs-target="#all-posts"
                            type="button" role="tab" aria-controls="all-posts" aria-selected="false">
                            <i class="fas fa-globe me-2"></i>All Posts
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="postsTabContent">
                    <!-- My Posts Tab -->
                    <div class="tab-pane fade show active" id="my-posts" role="tabpanel"
                        aria-labelledby="my-posts-tab">
                        <h2 class="h4 mb-4"><i class="fas fa-list-alt me-2"></i>Your Posts</h2>

                        @if (count($user_posts ?? []) == 0)
                            <div class="card shadow text-center p-5">
                                <div class="mb-3">
                                    <i class="fas fa-file-alt text-muted" style="font-size: 3rem;"></i>
                                </div>
                                <h3 class="h5">No Posts Yet</h3>
                                <p class="text-muted">Create your first post using the form on the left.</p>
                            </div>
                        @else
                            <!-- Display user posts -->
                            @foreach ($user_posts ?? [] as $post)
                                <div class="card shadow post-card">
                                    <div class="card-body">
                                        <div class="post-header mb-3">
                                            <h3 class="h5 mb-0">{{ is_object($post) ? $post->title : 'Untitled Post' }}
                                            </h3>
                                            <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                        </div>
                                        <p>{{ $post->body }}</p>
                                        <div class="post-actions">
                                            <a href="{{ route('posts.edit', $post->id) }}"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-edit me-1"></i>Edit
                                            </a>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Are you sure you want to delete this post?')">
                                                    <i class="fas fa-trash me-1"></i>Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <!-- All Posts Tab -->
                    <div class="tab-pane fade" id="all-posts" role="tabpanel" aria-labelledby="all-posts-tab">
                        <h2 class="h4 mb-4"><i class="fas fa-globe me-2"></i>Community Posts</h2>

                        @if (count($all_posts ?? []) == 0)
                            <div class="card shadow text-center p-5">
                                <div class="mb-3">
                                    <i class="fas fa-globe text-muted" style="font-size: 3rem;"></i>
                                </div>
                                <h3 class="h5">No Posts Available</h3>
                                <p class="text-muted">Be the first to create a post in the community!</p>
                            </div>
                        @else
                            <!-- Display all posts -->
                            @foreach ($all_posts ?? [] as $post)
                                <div class="card shadow post-card">
                                    <div class="card-body">
                                        <div class="post-header mb-3">
                                            <div>
                                                <h3 class="h5 mb-0 d-inline">
                                                    {{ is_object($post) && property_exists($post, 'title') ? $post->title : 'Untitled Post' }}
                                                </h3>
                                                <span
                                                    class="author-badge {{ Auth::id() == $post->user_id ? 'you' : '' }}">
                                                    <i
                                                        class="fas {{ Auth::id() == $post->user_id ? 'fa-user-circle' : 'fa-user' }} me-1"></i>
                                                    {{ $post->user->name }}
                                                    {{ Auth::id() == $post->user_id ? '(You)' : '' }}
                                                </span>
                                            </div>
                                            <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                        </div>
                                        <p>{{ $post->body }}</p>

                                        @if (Auth::id() == $post->user_id)
                                            <div class="post-actions">
                                                <a href="{{ route('posts.edit', $post->id) }}"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit me-1"></i>Edit
                                                </a>
                                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Are you sure you want to delete this post?')">
                                                        <i class="fas fa-trash me-1"></i>Delete
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto dismiss alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(function(alert) {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                });
            }, 5000);
        });
    </script>
</body>

</html>
