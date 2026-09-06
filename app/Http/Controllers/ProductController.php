<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Menuju ke halaman form tambah produk
    public function create_product() {
        return view('create_product');
    }
    // Logika tambah produk
    public function store_product(Request $request) {
        // validasi inputan
        $request->validate([
            'name' => 'required', 
            'price' => 'required', 
            'description' => 'required', 
            'stock' => 'required', 
            'image' => 'required|image|mimes:png,jpg, jpeg|max: 2048'
        ]);
        // atur file gambar
        $file = $request->file('image');
        $path = time() .'_'. $request->name .'.' . $file->getClientOriginalExtension();
        $file->storeAs('public', $path);
        // tambah inputan data ke database
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'stock' => $request->stock,
            'image' => $path,
        ]);
        // kembali ke halaman sendiri jika prosesnya sudah selesai
        return Redirect::back();
    }
    // menampilkan data
    public function index_product() {
        // query semua data Produk
        $products = Product::all();
        return view('index_product', compact('products'));
    }
    // Menampilkan data produk
    public function show_product(Product $product) {
        return view('show_product', compact('product'));
    }
    // Menuju Halaman Edit
    public function edit_product(Product $product) {
        return view('edit_product', compact('product'));
    }
    // Update Produk
    public function update_product(Product $product, Request $request) {
        // validasi data
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'image' => 'nullable|image|mimes:png,jpg, jpeg|max: 2048',
        ]);
        // Kondisi jika Inputan File gambar di akses
        $path = $product->image;
        if($request->hasFile('image')) {
            if($product->image) {
                Storage::disk('local')->delete('public/' . $product->image);
            }
            $file = $request->file('image');
            $path = time() .'_'. $request->name .'.' . $file->getClientOriginalExtension();
            $file->storeAs('public', $path);
            
        }
        // update product di database
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $path
        ]);
        // kembali ke halaman show data
        return Redirect::route('show_product', compact('product'));
    }
    // Hapus Produk di web dan database
    public function delete_product(Product $product) {
        $product->delete();
        // hapus gambar di storage
        Storage::disk('local')->delete('public/'. $product->image);
        return Redirect::route('index_product');
    }
}
