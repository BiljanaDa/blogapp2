@extends('layout.default')


@section('title')
    Create Post
@endsection


@section('content')
    <form action="{{ url('posts') }}" method="POST">
        @csrf
        <h1>Create new post</h1>
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input class="form-control" type="text" name="title" placeholder="Enter title" required />
        </div>
        <div class="mb-3">
            <label class="form-label">Body</label>
            <textarea class="form-control" type="text" name="body" placeholder="Enter body" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Tags</label>
            <select name="tags[]" class="form-control" multiple>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save Post</button>
    </form>

    @include('components.errors')
    @include('components.status')
@endsection
