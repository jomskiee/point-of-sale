@extends('layouts.app')
@section('content')
<main>

        <div class="container-fluid">
            <h1 class="my-4"><i class="fas fa-users"></i> User Detials</h1>
            <ol class="breadcrumb mb-2">
                <li class="breadcrumb-item"><a href="{{ url('/home')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">User Details</li>
            </ol>
            <div class="container-fluid">
                <div class="row">
                  <div class="col-md-8">
                    <div class="card mx-3 my-4">
                      <div class="card-header bg-success text-white ">
                        <h4 class="card-title"><i class="fa fa-user" aria-hidden="true"></i> User Details</h4>
                        <p class="card-category">{{ $user->username }}</p>
                      </div>
                      <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                              <span class="bmd-label-floating"><strong>Username</strong></span>

                                
                                        <p class="text-muted">
                                            <strong>{{$user->username}}</strong>
                                        </p>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                              <span class="bmd-label-floating"><strong>Name</strong></span>

                                
                                    <p class="text-muted">
                                        <strong>{{$user->name}}</strong>
                                    </p>
                           
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                              <span class="bmd-label-floating"><strong>Email Address</strong></span>
                          
                                    <p class="text-muted">
                                        <strong>{{$user->email}}</strong>
                                    </p>
                           
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                               <span class="bmd-label-floating"><strong>Password</strong></span>
                             
                                    <p class="text-muted">
                                        <strong>**********</strong>
                                    </p>
                               
                              </div>
                          </div>
                      </div>
                      <div class="row">
                            <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">Roles</label>
                                    @foreach($roles as $role)
                                        <div class=" form-check d-flex">
                                            <input type="radio" disabled name="roles[]" value="{{ $role->id }}"
                                            @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                            <label>{{ $role->name }}</label>
                                        </div>
                                    @endforeach
                                  </div>
                                </div>
                            </div>
                          </div>
                          <div class="row justify-content-end mr-3">
                            <a href="{{ route('users.index', $user) }}" class="btn btn-success ">Back to User Management</a>
                            <div class="clearfix"></div>
                          </div>
                 
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </main>
@endsection