@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to right,rgb(41, 38, 45),rgb(38, 71, 128));
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .card {
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        animation: fadeIn 0.6s ease-in-out;
    }

    .card-header {
        background-color:rgb(14, 33, 67);
        color: white;
        font-weight: bold;
        font-size: 1.25rem;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    .btn {
        border-radius: 8px;
        font-weight: 500;
    }

    .btn-primary {
        background-color:rgb(10, 35, 77);
        border: none;
    }

    .btn-primary:hover {
        background-color: #1a5edb;
    }

    .btn-info {
        background-color: #17a2b8;
        border: none;
    }

    .btn-info:hover {
        background-color: #138496;
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
    }

    .btn-danger:hover {
        background-color: #bb2d3b;
    }

    .table th {
        background-color: #f0f0f0;
        text-align: center;
        vertical-align: middle;
    }

    .table td {
        text-align: center;
        vertical-align: middle;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .alert-success {
        border-radius: 8px;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Products') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Create New Product</a>

                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>
                                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                    {!! $products->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
