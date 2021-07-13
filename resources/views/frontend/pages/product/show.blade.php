@extends('frontend.layouts.master')

@section('content')

    <div class="container py-4">

        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-2">
                <p class="display-6 fw-bold text-muted">Product Details</p>
            </div>
        </div>

        <div class="row align-items-md-stretch">
            <div class="col-md-6">
                <div class="h-100 p-5 text-white bg-dark rounded-3">
                    <img src="{{ $product->getFirstMediaUrl('products') }}" class="bd-placeholder-img card-img-top" width="100%"  alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h2>{{ $product->title }}</h2>
                    <hr>
                    <p>{{ $product->description }}</p>
                    <hr>
                    <p><strong>Price ${{ $product->price }}</strong></p>
                    <form action="{{ route('cart.store') }}" method="post">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary mx-2">Add to cart</button>

                        <a href="{{ route('frontend.home') }}" class="btn btn-outline-secondary" type="button">Back to shop</a>
                    </form>
                </div>
            </div>
        </div>

@endsection
