@extends('layout.default')

@section('content')
    <main class="form-signin w-100 m-auto">

        <form method="GET" action="{{ url('/auth') }}">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Please login</h1>
            <div class="form-floating mb-4">
                <input type="email" class="form-control" placeholder="name@example.com" name="email">
                <label>Email address</label>
            </div>
            <div class="form-floating mb-4">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <label>Password</label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
        </form>
        @include('components.status')
        @include('components.errors')
    </main>
@endsection
