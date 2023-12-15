@extends('layout.default')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <div class="container text-align ">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->body }}</p>

        @foreach ($post->tags as $tag)
            <a href="/tags/{{ $tag->name }}" class="badge rounded-pill text-bg-secondary">{{ $tag->name }}</span>
        @endforeach
    </div>
    @include('components.comment')
    @include('components.createcomment')
    @include('components.errors')
    @include('components.status')
@endsection
