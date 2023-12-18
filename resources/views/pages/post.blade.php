@extends('layout.default')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h2>{{ $post->title }}</h2>
                        <p>Author: {{ $post->user ? $post->user->name : 'Unknown' }}</p>
                    </div>
                    <div class="card-body">
                        <p>{{ $post->body }}</p>
                        <hr>
                        <h4>Tags:</h4>
                        <div class="tags">
                            @foreach ($post->tags as $tag)
                                <a href="/tags/{{ $tag->name }}" class="badge rounded-pill text-bg-secondary">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    @if(Auth::check() && $post->user_id === Auth::id())
                        <div class="card-footer">
                            <form method="POST" action="/posts/{{ $post->id }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="body">Body</label>
                                    <textarea name="body" class="form-control">{{ $post->body }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Update Post</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
         
                @include('components.comment')
                @include('components.createcomment')
                @include('components.errors')
            </div>
        </div>
    </div>
@endsection

