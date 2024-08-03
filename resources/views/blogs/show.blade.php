@extends('layouts.app')

@section('content')
    <h1>{{ $blog->title }}</h1>
    <p>{{ $blog->content }}</p>
    <small>By {{ $blog->user->name }} | {{ $blog->created_at->diffForHumans() }}</small>

    <h2>Comments</h2>
    @foreach ($blog->comments as $comment)
        <div class="card mt-2">
            <div class="card-body">
                <p>{{ $comment->content }}</p>
                <small>By {{ $comment->user->name }} | {{ $comment->created_at->diffForHumans() }}</small>
            </div>
        </div>
    @endforeach

    @auth
        <form action="{{ route('comments.store', $blog) }}" method="POST">
            @csrf
            <div class="form-group">
                <textarea name="content" class="form-control" rows="3" placeholder="Add a comment"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Post Comment</button>
        </form>
    @endauth
@endsection
