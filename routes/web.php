<?php

use Illuminate\Http\Request;
use App\Product;

Route::get('/', function () {
    $products = Product::orderBy('description')->get();
    return view('products.products', compact('products'));
})->name('products.index');

Route::get('/create', function(){
    return view('products.create');
})->name('products.create');

Route::post('products', function(Request $request){
    // $request->all();
    $newProduct = new Product;
    $newProduct->description = $request->input('description');
    $newProduct->price = $request->input('price');
    $newProduct->save();
    return redirect()->route('products.index')->with('info','Producto guardado correctamente!');
})->name('products.store');
