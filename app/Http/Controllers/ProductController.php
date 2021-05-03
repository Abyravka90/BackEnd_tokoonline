<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
       return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('products.add');
    }
    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required|min:2',
            'description' => 'required',
            'price' => 'required'
        ], [
            'name.required' => 'Field Nama Tidak Boleh Kosong',
            'description.required' => 'Field Deskripsi tidak Boleh Kosong',
            'price.required' => 'Field Harga Tidak Boleh Kosong'
        ]) ;
        Product::create($request->all());
        return redirect('products')->with('status','Data Product berhasil ditambahkan!');
    }
}
