<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($slug)
    {
        $data = [];

        $data['product'] = Product::where('slug', $slug)->first();

        if ($data['product'] === null) {
            return redirect()->route('frontend.home');
        }

        return view('frontend.pages.product.show', $data);
    }
}
