@extends('layouts.app')

@section('title', 'Blog Posts')

@section('content')
<div class="container">
    <h1 class="mb-4">Blog Posts</h1>

    <div class="row mb-4">
        <div class="col-md-6">
            <form action="{{ route('posts.index') }}" method="get" class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search for posts" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        <div class="col-md-6 text-md-end">
            @if (auth()->check())
                <p>Welcome, {{ auth()->user()->name }}!</p>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
                <br>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Admin</a>
            @else
                <div>
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-success">Signup</a>
                </div>
            @endif
        </div>
        
    </div>

    @if ($posts->count())
        <div class="list-group">
            @foreach ($posts as $post)
                <a href="{{ url('/posts/'.$post->id) }}" class="list-group-item list-group-item-action">
                    <h5 class="mb-1">{{ $post->title }}</h5>
                    <small>Published on {{ $post->created_at->format('F j, Y') }}</small>
                </a>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    @else
        <p>No posts found.</p>
    @endif
</div>
@endsection
