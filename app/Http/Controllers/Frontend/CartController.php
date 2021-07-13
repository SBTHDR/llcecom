<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show()
    {
        $data = [];
        $data['cart'] = session()->has('cart') ? session()->get('cart') : [];
        $data['total'] = array_sum(array_column($data['cart'], 'price'));

        return view('frontend.pages.cart.show', $data);
    }

    public function store(Request $request)
    {
        $cart = [];

        try {
            $this->validate($request, [
               'product_id' => 'required'
            ]);
        } catch (ValidationException $e) {
            return redirect()->back();
        }

        $product = Product::findOrFail($request->input('product_id'));

        $cart = session()->has('cart') ? session()->get('cart') : [];


        if (array_key_exists($product->id, $cart)) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id ] = [
                'title' => $product->title,
                'quantity' => 1,
                'price' => $product->sale_price ?? $product->price,
            ];
        }

        session(['cart' => $cart]);

        session()->flash('message', $product->title . ' added to the cart');

        return redirect()->route('cart.show');

    }

    public function destroy(Request $request)
    {
        try {
            $this->validate($request, [
                'product_id' => 'required'
            ]);
        } catch (ValidationException $e) {
            return redirect()->back();
        }

        $cart = session()->has('cart') ? session()->get('cart') : [];

        unset($cart[$request->input('product_id')]);
        session(['cart' => $cart]);

        session()->flash('message', 'One Product remove from the cart');

        return redirect()->back();
    }
}
