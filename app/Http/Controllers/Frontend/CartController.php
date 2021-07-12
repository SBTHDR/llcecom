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
        return view('frontend.pages.cart.show');
    }

    public function store(Request $request)
    {
        $cart = [];
        $cart['products'] = [
            'id' => 1,
            'quantity' => 2,
            'price' => 20,
            
        ];
        try {
            $this->validate($request, [
               'product_id' => 'required'
            ]);
        } catch (ValidationException $e) {
            return redirect()->back();
        }


    }
}
