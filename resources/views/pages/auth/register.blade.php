@extends('layout.default')

@section('content')
    <main class="form-signin w-100 m-auto">

        <form method="POST" action="{{ url('/register') }}">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Please register</h1>
            <div class="form-floating mb-4">
                <input type="email" class="form-control" placeholder="name@example.com" name="email">
                <label>Email address</label>
            </div>
            <div class="form-floating mb-4">
                <input type="text" class="form-control" placeholder="Username" name="name">
                <label>Name</label>
            </div>
            <div class="form-floating mb-4">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <label>Password</label>
            </div>
            <div class="form-floating mb-4">
                <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                <label>Confirm Password</label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
        </form>
        @include('components.status')
        @include('components.errors')
    </main>
@endsection
