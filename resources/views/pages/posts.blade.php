@extends('layout.default')


@section('title')
    Posts
@endsection

@section('content')
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        @foreach ($posts as $post)
            @include('components.postcard')
        @endforeach

        {{ $posts }}
    </div>
@endsection
