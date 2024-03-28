@extends('dashboard.layouts.app')

@section('title', 'users')

@section('users_active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">All users</h1>
    <p class="mb-4">God willing, in this table you will find everything you need to add, modify, and delete users</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="" class="btn btn-link">Add new user</a></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Salary</th>
                            <th>Category</th>
                            <th>Control</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>role</th>
                            <th>Control</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td><img src="{{ asset('storage/img/users/' . ($user->image->name ?? '../default.jpg')) }}" width="50" alt="image"></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                {{-- @dd($user->roles->first()->name) --}}
                                <td>{{ $user->roles->first()->name ?? 'no role' }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        <button type="button" class="btn btn-outline-primary">Update</button>
                                        <button type="button" class="btn btn-outline-danger">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
