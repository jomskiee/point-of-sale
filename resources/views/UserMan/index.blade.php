@extends('layouts.app')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="my-4"><i class="fas fa-users"></i> User Management</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ url('/home')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">User Management</li>
            </ol>
            <div class="row mb-4">
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header bg-success d-flex">
                            <div class="card-icon">
                                <i class="material-icons">person</i>      
                            </div>
                            <a href="{{ route('users.create') }}" class="text-decoration-none text-dark mx-2">
                                <span class="hidden-xs hidden-sm"><h5>+Add User</h5></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Position</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                                        <td class="d-inline-flex">
                                            <a href="{{ route('users.show', $user->id )}}"><button type="button" class="btn btn-sm btn-primary"><i class="fas fa-eye pr-1"></i> View User</button></a>
                                            <a href="{{ route('users.edit', $user->id )}}"><button type="button" class="btn btn-sm btn-success ml-2"><i class="fas fa-pencil-alt pr-1"></i> Edit User</button></a>
                                            <form action="{{ route('users.destroy', $user->id )}}" method="post">
                                                @csrf
                                                {{ method_field('DELETE')}}
                                                <button type="submit" class="btn btn-sm btn-danger ml-2"><i class="fas fa-trash pr-1" aria-hidden="true"></i>Delete User</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection