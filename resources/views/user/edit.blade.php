@extends('layouts.user.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Edit User
                    </div>
                    <div class="float-end">
                        <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/admin" method="post">
                        @csrf
                        {{-- @method('PUT') --}}
                        <div class="mb-3 row">
                            <label for="nama" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="nama" name="nama" value={{ $user->nama }}>
                                @if ($errors->has('nama'))
                                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email
                                Address</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value={{ $user->email }}>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password" class="col-md-4 col-form-label text-md-end text-start">Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password_confirmation"
                                class="col-md-4 col-form-label text-md-end text-start">Confirm Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="role" class="col-md-4 col-form-label text-md-end text-start">Role</label>
                            <div class="col-md-6">
                                <select class="form-select @error('role') is-invalid @enderror" multiple aria-label="role"
                                    id="role" name="role">
                                    @forelse ($role as $role)
                                        @if ($role != 'Super Admin')
                                            <option value="{{ $role }}"
                                                {{ in_array($role, $userrole ?? []) ? 'selected' : '' }}>
                                                {{ $role }}
                                            </option>
                                        @else
                                            @if (Auth::user()->hasRole('Super Admin'))
                                                <option value="{{ $role }}"
                                                    {{ in_array($role, $userrole ?? []) ? 'selected' : '' }}>
                                                    {{ $role }}
                                                </option>
                                            @endif
                                        @endif

                                    @empty
                                    @endforelse
                                </select>
                                @if ($errors->has('role'))
                                    <span class="text-danger">{{ $errors->first('role') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update User">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
