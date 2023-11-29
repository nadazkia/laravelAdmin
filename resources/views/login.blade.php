@extends('layouts.home.layout')

@section('container')
    <main class="container d-flex flex min-vh-100 align-items-center">
        <div class="w-50 card center border rounded px-3 py-3 mx-auto">
            <h2 class="text-center mt-3 mb-2">Login</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mx-4">
                <form action="" method="POST">
                    @csrf
                    <div class="form-outline form mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" value="{{ old('email') }}" name="email" class="form-control"
                            placeholder="Email">
                    </div>
                    <div class="form-outline mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="d-grid">
                        <button name="submit" type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
                <div class="mb-3 mt-4 d-grid align-items-center">
                    <div>Belum punya akun?</div>
                    <a href="/register" class="btn btn-outline-primary w-full"> Register </a>
                </div>
            </div>
        </div>
    </main>
@endsection
