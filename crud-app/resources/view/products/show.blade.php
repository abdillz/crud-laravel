@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Product Details') }}</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <p>{{ $product->name }}</p>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <p>{{ $product->description ?? 'N/A' }}</p>
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <p>${{ number_format($product->price, 2) }}</p>
                    </div>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
