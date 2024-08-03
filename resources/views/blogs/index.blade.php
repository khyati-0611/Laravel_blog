{{--@extends('layouts.app')--}}

@section('content')
    <div class="container">
        <h1>All Blog Posts</h1>
        <a href="{{ route('blogs.create') }}" class="btn btn-primary">Create New Post</a>
        @foreach ($blogs as $blog)
            <div class="card mt-4">
                <div class="card-header">
                    <h2>{{ $blog->title }}</h2>
{{--                    <small>By {{ $blog->user->name }} | {{ $blog->created_at->diffForHumans() }}</small>--}}
                </div>
                <div class="card-body">
                    <p>{{ $blog->content }}</p>
                    <a href="{{ route('blogs.show', $blog) }}" class="btn btn-info">View</a>
                    <a href="{{ route('blogs.edit', $blog) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('blogs.destroy', $blog) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
