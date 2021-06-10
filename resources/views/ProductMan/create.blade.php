
@extends('layouts.app')

@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="my-4"><i class="fas fa-boxes"></i> Product Management</h1>
            <ol class="breadcrumb mb-2">
                <li class="breadcrumb-item"><a href="{{ url('/home')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Product Management</li>
            </ol>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mx-3 my-4">
                            <div class="card-header bg-success text-white ">
                                <h4 class="card-title mr-2"><i class="material-icons">inventory</i>Add Product</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body">
                                <form id="prodForm" action="{{ route('products.store', $product) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Name</label>
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  required>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Categories</label>
                                                <input id="categories" type="text" class="form-control @error('categories') is-invalid @enderror" name="categories"  required>

                                                @error('categories')
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
                                                <label class="bmd-label-floating">Price</label>
                                                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price"  required >

                                                @error('price')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Quantity</label>
                                                <input id="qty_stock" type="number" class="form-control @error('qty_stock') is-invalid @enderror" name="qty_stock" required>

                                                @error('qty_stock')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10 col-lg-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Description</label>
                                                {{-- <input id="desc" type="text" class="form-control  @error('desc') is-invalid @enderror"  name="desc"  required> --}}
                                                <textarea id="desc" name="desc" class="form-control  @error('desc') is-invalid @enderror" form="prodForm" placeholder="Enter description here ..."></textarea>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end mr-3">
                                        <button type="submit" class="btn btn-success ">Add Product</button>
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
