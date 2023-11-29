@extends('layouts.home.layout')

@section('container')
    <main class="container d-flex flex min-vh-100 align-items-center">
        <div class="w-50 card center border rounded px-3 py-3 mx-auto">
            <h2 class="text-center mt-3 mb-2">Buat Akun</h2>

            @if (Session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

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
                        <label class="form-label">Nama Pemesan</label>
                        <input type="nama" value="{{ old('nama') }}" name="nama"
                            class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Lengkap">
                        @error('nama')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-outline form mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" value="{{ old('email') }}" name="email"
                            class="form-control @error('email') is-invalid @enderror" placeholder="contoh@gmail.com">
                        @error('email')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-outline mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Password">
                        @error('password')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 d-grid">
                        <button name="submit" type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
