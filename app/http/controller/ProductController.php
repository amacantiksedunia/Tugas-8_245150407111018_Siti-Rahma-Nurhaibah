<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
     public function index()
    {
        $products = Product::all();  // Mengambil semua produk
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
        ]);

        Product::create($validatedData); // Menyimpan produk ke database

        return redirect()->route('products.index'); // Mengarahkan ke halaman daftar produk
    }
public function edit($id_produk)
    {
        $product = Product::findOrFail($id_produk);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id_produk)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $product = Product::findOrFail($id_produk);
        $product->update([
            'nama' => $validated['name'],
            'deskripsi' => $validated['description'],
            'harga' => $validated['price'],
        ]);

        return redirect()->route('products.index');
    }    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('products.index');
    }
}
