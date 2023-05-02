@extends('layouts.app')

@section('title', 'Admin - Edit Post')

@section('content')
<h1 class="mb-4">Admin - Edit Post</h1>
<form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
@csrf
@method('PUT')
<div class="mb-3">
<label for="title" class="form-label">Title</label>
<input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" required>
</div>
<div class="mb-3">
<label for="content" class="form-label">Content</label>
<textarea name="content" id="content" rows="10" class="form-control" required>{{ $post->content }}</textarea>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection