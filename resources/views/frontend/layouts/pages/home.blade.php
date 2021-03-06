@extends('frontend.layouts.master')

@section('content')

    @include('frontend.partials._banner')

<div class="album py-5 bg-light">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            @foreach($products as $product)
                <div class="col">
                    <div class="card shadow-sm">

                        <a href="{{ route('product.show', $product->slug) }}">
                            <img src="{{ $product->getFirstMediaUrl('products') }}" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="">
                        </a>

                        <div class="card-body">

                            <p class="card-text">
                                <a href="{{ route('product.show', $product->slug) }}" style="text-decoration: none; color: #2d3748">{{ $product->title }}</a>
                            </p>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('product.show', $product->slug) }}" class="btn btn-sm btn-outline-secondary">View</a>

                                    <form action="{{ route('cart.store') }}" method="post">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-secondary mx-2">Add to cart</button>
                                    </form>

                                </div>
                                <strong class="text-muted">
                                    @if($product->sale_price !== null && $product->sale_price > 0)
                                        Price <strike>${{ $product->price }}</strike> ${{ $product->sale_price }}
                                    @else
                                        Price ${{ $product->price }}
                                    @endif
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{ $products->links() }}

        </div>
    </div>
</div>

@endsection
