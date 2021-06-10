@extends('layouts.app')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="my-4"><i class="fas fa-users"></i> User Management</h1>
            <ol class="breadcrumb mb-2">
                <li class="breadcrumb-item"><a href="{{ url('/home')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">User Management</li>
            </ol>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mx-3 my-4">
                            <div class="card-header bg-success text-white ">
                                <h4 class="card-title"><i class="fa fa-user" aria-hidden="true"></i> Add User</h4>
                                <p class="card-category">Complete the data</p>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('users.store', $user) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Username</label>
                                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="{{ $user->username }}" required>

                                                @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Name</label>
                                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{ $user->name }}" required>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Email address</label>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ $user->email }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Password</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">{{ __('Confirm Password') }}</label>
                                                <input id="password-confirm" type="password" class="form-control"  name="password_confirmation" aria-describedby="basic-addon2" required autocomplete="new-password">
                
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Roles</label>
                                    @foreach($roles as $role)
                                        <div class=" form-check d-flex">
                                            <input type="radio" name="roles[]" value="{{ $role->id }}"
                                            @if($user->roles->pluck('id')->contains($role->id)) @endif>
                                            <label>{{ $role->name }}</label>
                                        </div>
                                    @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end mr-3">
                                        <button type="submit" class="btn btn-success ">Add User</button>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
