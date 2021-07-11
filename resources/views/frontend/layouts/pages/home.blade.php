@extends('frontend.layouts.master')

@section('content')

    @include('frontend.partials._banner')

<div class="album py-5 bg-light">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            @foreach($products as $product)
                <div class="col">
                    <div class="card shadow-sm">
{{--                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>--}}
                        <img src="{{ $product->getFirstMediaUrl('products') }}" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="">

                        <div class="card-body">
                            <p class="card-text">
                                {{ $product->title }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Add to cart</button>
                                </div>
                                <strong class="text-muted">Price ${{ $product->price }}</strong>
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
