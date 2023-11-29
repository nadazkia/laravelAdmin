@extends('layouts.user.layout')

@section('container')
    <div class="content-body">
        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Data Users</a></li>
                    <li class="breadcrumb-item"><a href="#">Edit User</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        {{-- @foreach ($users as $user) --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header">
                                <h4 class="card-title float-start">Show User {{ $users->id }}</h4>
                                <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm mb-3 float-end">
                                    <i class="fa fa-arrow-left mr-1"></i>
                                    Back
                                </a>
                            </div>
                        </div>
                        <div class="card-body">

                            <div>
                                <div class="mb-3 row">
                                    <label for="nama" class="col-md-5 col-form-label text-md-end text-start">
                                        <strong>Nama Pemesan:</strong>
                                    </label>
                                    <div class="col-md-6" style="line-height: 35px">
                                        {{ $users->nama }}
                                    </div>
                                </div>
                                <div class="mb-3
                                        row">
                                    <label for="email" class="col-md-5 col-form-label text-md-end text-start">
                                        <strong>Email:</strong>
                                    </label>
                                    <div class="col-md-6" style="line-height: 35px">
                                        {{ $users->email }}
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="roles" class="col-md-5 col-form-label text-md-end text-start">
                                        <strong>Roles:</strong>
                                    </label>
                                    <div class="col-md-6" style="line-height: 35px">
                                        {{ $users->role }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection

{{-- <div class="card-body">
                <div class="mb-3 row">
                    <label for="name" class="col-md-4 col-form-label text-md-end text-start">
                        <strong>Nama:</strong>
                    </label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ old('container', $users->nama) }}
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="email" class="col-md-4 col-form-label text-md-end text-start"><strong>Email
                            Email:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $users->email }}
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="roles"
                        class="col-md-4 col-form-label text-md-end text-start"><strong>Roles:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $users->role }}
                    </div>
                </div>
            </div> --}}
