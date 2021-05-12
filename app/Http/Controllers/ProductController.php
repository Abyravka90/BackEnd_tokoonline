<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = DB::table('products')->Paginate(4);
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
    public function edit($id)
    {
        $products = Product::find($id);
        return view('products.edit', ['products' => $products]); 
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:2',
            'description' => 'required',
            'price' => 'required'
        ],[
            'name.required' => 'Field Nama Tidak Boleh Kosong',
            'description.required' => 'Field Deskripsi tidak Boleh Kosong',
            'price.required' => 'Field Harga Tidak Boleh Kosong'
        ]);
        // Product::where('id', $id)
        // ->update([
        //     "name" => $request->name,
        //     "description" => $request->description,
        //     "price" => $request->price,
        //     "image_url" => $request->image_url
        // ]);
        $product = Product::find($id);
        $product->update($request->all());
        return redirect('products')->with('status', 'Data Berhasil Dirubah');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('products')->with('status', 'Data Berhasil dihapus');
    }
}
