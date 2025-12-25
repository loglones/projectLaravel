<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index()
    {
        if(auth()->user()->role !== 'admin'){
            return redirect()->route('home')->with('error', 'у вас нет прав!');
        }
        $products = Product::latest()->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        if(auth()->user()->role !== 'admin'){
            return redirect()->route('home')->with('error', 'у вас нет прав!');
        }
        return view('products.create');
    }

    public function store(Request $request)
    {
        if(auth()->user()->role !== 'admin'){
            return redirect()->route('home')->with('error', 'у вас нет прав!');
        }
        $request->validate([
            'name' => 'required|string|max:150',
            'category' => 'required|string|max:150',
            'count' => 'required|integer|min:0',
            'price' => 'required|integer|min:1'
        ]);
        Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'count' => $request->count,
            'price' => $request->price,
            'users_id' => auth()->id()
        ]);
        return redirect()->route('products.index')->with('success','Товар успешно добавлен');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success','Товар удален.');
    }
}
