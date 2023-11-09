@extends('layouts.user.layout')

@section('container')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="#">Home</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if (Auth::user()->role == 'operator')
                                <h4 class="card-title">Data Table</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Herrod Chandler</td>
                                                <td>aa@gmail.com</td>
                                                <td>Admin</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endif

                            @if (Auth::user()->role == 'keuangan')
                                <li class="list-group-item">Menu keuangan</li>
                            @endif

                            @if (Auth::user()->role == 'marketing')
                                <li class="list-group-item">Menu Marketing</li>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection
