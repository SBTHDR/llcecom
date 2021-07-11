<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [];
        $data['products'] = Product::select(['id', 'title', 'slug', 'price', 'sale_price'])->paginate(9);

        return view('frontend.layouts.pages.home', $data);
    }
}
