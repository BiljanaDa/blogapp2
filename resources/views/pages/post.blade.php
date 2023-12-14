@extends('layout.default')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
<div class="container text-align ">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
</div>

@include('components.errors')
@include('components.status')
@include('components.comment')
@include('components.createcomment')
@endsection
