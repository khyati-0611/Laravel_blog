@extends('layouts.app')

@section('content')
    <div class="container">
        <p class="text-center"><strong>Create New Post</strong></p>
        <form action="{{ route('blogs.store') }}" method="POST" id="myForm">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" maxlength="500">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control" rows="5" id="content"></textarea>
                @if($errors->has('content'))
                    <span class="text-danger">{{ $errors->first('content') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary mt-2">Create Post</button>
        </form>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('#myForm').on('submit', function (e) {
                e.preventDefault();
                var title = $('#title').val();
                var len = $('#title').val().length;
                if (title == '') {
                    toastr.error('Title field is required.');
                }
                if(len > 500) {
                    toastr.error('Please fill out up to maximum length is 500 character.')
                }

                var content = $('#content').val();
                if (content == '') {
                    toastr.error('Content field is required.');
                }

                if (title != '' && content != '') {
                    this.submit();
                }
            });
        });
    </script>
@endpush
