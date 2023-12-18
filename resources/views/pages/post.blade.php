@extends('layout.default')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <div class="container text-align">
        <h1>{{ $post->title }}</h1>
        @if ($post->user)
        <p>Author: {{ $post->user->name }}</p>
    @else
        <p>Author: Unknown</p>
    @endif
        <p>{{ $post->body }}</p>

        @foreach ($post->tags as $tag)
            <a href="/tags/{{ $tag->name }}" class="badge rounded-pill text-bg-secondary">{{ $tag->name }}</a>
        @endforeach
    </div>
    <div class="container">
        @include('components.comment')
        @include('components.createcomment')
        @include('components.errors')
    </div>
@endsection