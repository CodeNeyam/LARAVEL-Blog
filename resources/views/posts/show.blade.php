@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1 class="mb-4">{{ $post->title }}</h1>
            <p>{{ $post->content }}</p>

            <hr>

            <h4>Comments</h4>

            @if ($post->comments->count() > 0)
                <div class="list-group">
                    @foreach ($comments as $comment)
                    <div class="list-group-item">
                        <h6>{{ $comment->user ? $comment->user->name : $comment->name }}</h6>
                        <p>{{ $comment->comment }}</p>
                        <small>Posted on {{ $comment->created_at->format('F j, Y') }}</small>
                    </div>
                @endforeach
                </div>
            @else
                <p>No comments found.</p>
            @endif

            <hr>

            <h4>Add a comment</h4>

            @if (Auth::check())
                <form action="{{ route('posts.storeComment', $post->id) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="comment" class="form-label">Comment</label>
                        <textarea name="comment" id="comment" rows="3" class="form-control" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            @else
                <p>You must be <a href="{{ route('login') }}">logged in</a> to add a comment.</p>
            @endif

            <hr>
        </div>

        <div class="col-md-4">
            <h4>Existing comments</h4>

            @if ($post->commentsWithUser()->count() > 0)
                <div class="list-group">
                    @foreach ($post->commentsWithUser() as $comment)
    <div class="list-group-item">
        <h5>{{ $comment->user ? $comment->user->name : $comment->name ?? 'Anonymous' }}</h5>
        <p>{{ $comment->user ? $comment->user->email : '' }}</p>
        <p>{{ $comment->comment }}</p>
    </div>
@endforeach

                </div>
            @else
                <p>No comments found.</p>
            @endif
        </div>
    </div>
@endsection
