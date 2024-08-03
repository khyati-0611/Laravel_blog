@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row">
                    <div class="p-6 text-gray-900 col-6 align-center">
                        {{ __("Welcome ") . auth()->user()->name }}
                    </div>
                    <div class="p-6 col-6 text-right">
                        <a href="{{route('blogs.create')}}" class="btn btn-info btn-sm"> <i class="fas fa-plus"></i>
                            Create Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="my-4"><strong>Blogs List</strong></h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Content</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @if($blogs->isNotEmpty())
                @foreach($blogs as $key=>$blog)
                    <tr data-id="{{ $blog->id }}">
                        <td>{{ $key+=1 }}</td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->content }}</td>
                        <td>{{ $blog->created_at->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">                    <i class="fas fa-edit"></i>
                            </a>
                            {{--                            <a href="{{ route('blogs.destroy', $blog->id) }}" class="btn btn-danger btn-sm">Delete</a>--}}
                            <form action="{{ route('blogs.destroy', $blog) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>
                                </button>
                            </form>
                            {{--                            <button class="btn btn-danger btn-sm deleteIcon" data-id="{{ $blog->id }}">Delete</button>--}}
                        </td>
                    </tr>
                @endforeach
            @else
                <td colspan="5" class="text-center">No data available!!!</td>
            @endif
            </tbody>
        </table>
    </div>
@endsection
