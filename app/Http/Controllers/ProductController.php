<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function showOne()
    {
        return view('products', [
            "title" => "Semua Produk",
            "products" => Product::all(),
            // // "products" => Product::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString(),
            // 'kecamatan' => $this->WebModel->DataKecamatan(),
            // 'categories' => Category::all()
        ]);
    }

    public function index()
    {
        return view('dashboard.products.index', [
            'products' => Product::all(),
        ]);
    }

    public function add(Request $request)
    {
        Product::create($request->all());

        return redirect('/dashboard/products')->with('sukses', 'Produk baru telah ditambahkan!');
    }

    public function edit(Request $request)
    {
        $datatabel = Product::findOrFail($request->id);
        $datatabel->update($request->all());

        return redirect('/dashboard/products')->with('edit', 'Produk telah diedit!');
    }

    public function delete(Request $request)
    {
        $datatabel = Product::findOrFail($request->id);
        $datatabel->delete();
        
        return redirect('/dashboard/products')->with('delete', 'Produk telah didelete!');
    }
}
