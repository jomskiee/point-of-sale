
@extends('layouts.app')
@section('content')

<main>
    <div class="container-fluid">
        <h1 class="my-4"><i class="fas fa-boxes"></i> Product Management</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('/home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Product Management</li>
        </ol>
        <div class="row mb-4">
            <div class="col-lg-2 col-md-3 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header bg-success d-flex">
                        <a href="{{ route('products.create') }}" class="text-decoration-none text-dark">
                            <h6 class="px-1"> <i class="fas fa-box"></i> +Add Product</h6>
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
                            <tr class="text-center">
                                <th>#</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Alert_stock</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->categories }}</td>
                                <td>{{ Str::limit($product->desc, 45) }}</td>
                                <td>{{ $product->qty_stock }}</td>
                                <td class="text-center">
                                    @if($product->qty_stock <= 0) 
                                        <span class="badge badge-danger">Out of Stock</span>
                                    @elseif($product->alert_stock >= $product->qty_stock)
                                        <span class="badge badge-danger">Low Stock</span>
                                    @else
                                        <span class="badge badge-success">In Stock</span>  
                                    @endif
                                </td>
                                <td>{{ $product->price }}</td>                               
                                <td class="d-inline-flex"> 
                                    <form action="{{ route('products.destroy', $product->id )}}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE')}}
                                        <button type="submit" class="btn btn-sm btn-danger ml-2"><i class="fas fa-trash pr-1" aria-hidden="true"></i>Delete Product</button>
                                    </form>
                                    <a href="{{ route('products.edit', $product->id )}}"><button type="button" class="btn btn-sm btn-info ml-2"><i class="fas fa-pencil-alt pr-1"></i> Edit Product</button></a>
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