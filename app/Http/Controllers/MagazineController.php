<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class MagazineController extends Controller
{
    public function index(Product $products)
    {
        $products = Product::latest()->get();
        return view('magazine', compact('products'));
    }
}
