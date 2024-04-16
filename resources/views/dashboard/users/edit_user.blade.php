@extends('dashboard.layouts.app')

@section('title', $auth_user->name . ' dashboard')

@section('dash_active', 'active')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit {{ $user->name }}</h1>
    <p class="mb-4">you can create new user <span class="text-warning">only Super Admin can do it</span></p>

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create new user!</h1>
                        </div>
                        <form class="user" action="{{ route('dash.users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group">
                                <input name="name" value="{{ old('name') ?? $user->name }}" type="text" class="form-control form-control-user" placeholder="User name">
                            </div>
                            @error('name')<div class="text-danger mb-3">{{ $message }}</div>@enderror

                            <div class="form-group">
                                <input name="phone" value="{{ old('phone') ?? $user->phone }}" type="phone" class="form-control form-control-user" placeholder="Phone number">
                            </div>
                            @error('phone')<div class="text-danger mb-3">{{ $message }}</div>@enderror

                            <div class="form-group">
                                <input name="email" value="{{ old('email') ?? $user->email }}" type="email" class="form-control form-control-user" placeholder="Email Address">
                            </div>
                            @error('email')<div class="text-danger mb-3">{{ $message }}</div>@enderror

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input name="password" type="password" class="form-control form-control-user" placeholder="Password">
                                </div>
                                <div class="col-sm-6">
                                    <input name="password_confirmation" type="text" class="form-control form-control-user" placeholder="Repeat Password">
                                </div>
                            </div>
                            @error('password')<div class="text-danger mb-3">{{ $message }}</div>@enderror
                            
                            <select name="role" class="form-select" aria-label="Default select example">
                                <option selected>Select Role</option>
                                @foreach ($roles as $role)
                                    <option @selected((old('role') ?? $user->roles->first()->id) == $role->id) value="{{ $role->id }}">{{ $role->display_name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <div class="text-danger mb-3">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Default file input example</label>
                                <input name="image" class="form-control" type="file" onchange="showPriview(event)">
                            </div>
                            @error('image')<div class="text-danger mb-3">{{ $message }}</div>@enderror

                            <img id="img" src="{{ asset('storage/'. ($user->image->name ?? 'img/users/default.png')) }}" width="100" class="mb-3" alt="user_image">

                            <button class="btn btn-primary btn-user btn-block">
                                Update Account
                            </button>
                        </form>
                        <script>
                            function showPriview (e)
                            {
                                if (e.target.files.length > 0) {
                                    let src = URL.createObjectURL(e.target.files[0]);
                                    let img = document.getElementById('img');
                                    img.src = src;
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
