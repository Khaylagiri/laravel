<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pelanggan;
use App\Models\Kategori;
use App\Models\Transaksi;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $products = Product::with('kategori')->orderBy('created_at', 'DESC')->get();
    
        return view('products.index', compact('products'));
    }


    public function create()
    {
        $products = Product::all();
        $pelanggans = Pelanggan::all();
        $categories = Kategori::all();
    
        return view('products.create', compact('products', 'pelanggans', 'categories'));
    }
    
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'kategori_id' => 'required|exists:kategori,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // Adjust the allowed file types and size as needed
            'stok' => 'required|integer',
        ]);
    
        $input = $request->all();
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
    
            $input['image'] = $imageName;
        }
    
        // Create the product
        Product::create($input);
    
        return redirect()->route('products')->with('success', 'Product added successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id_barang)
    {
        $categories = Kategori::all();
        $product = Product::findOrFail($id_barang);
  
        return view('products.show', compact('product'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_barang)
    {
        $categories = Kategori::all();
        $product = Product::findOrFail($id_barang);
  
        return view('products.edit', compact('product','categories'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_barang)
    {
    
        $product = Product::findOrFail($id_barang);
  
        $product->update($request->all());
  
        return redirect()->route('products')->with('success', 'product updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_barang)
    {
        $product = Product::findOrFail($id_barang);
  
        $product->delete();
  
        return redirect()->route('products')->with('success', 'product deleted successfully');
    }


    
    
    
    

}