@extends('frontend.layouts.master')

@section('content')

    <div class="container py-4">
        <h3>Your Cart</h3>
        <hr>

        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session()->get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(empty($cart))
            <div class="alert alert-primary d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <div>
                    No item in the cart!
                </div>
            </div>
        @else
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Serial</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $i = 1 @endphp
                @foreach($cart as $key => $product)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $product['title'] }}</td>
                        <td><input type="number" name="quantity" value="{{ $product['quantity'] }}"></td>
                        <td>{{ $product['price'] }}</td>
                        <td>
                            <form action="{{ route('cart.remove') }}" method="post">
                                <input type="hidden" name="product_id" value="{{ $key }}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger mx-2">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td>{{ number_format($total, 2) }}</td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        @endif

    </div>

@endsection
