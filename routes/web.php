<?php

use Illuminate\Http\Request;
use App\Product;
Route::middleware('auth')->group(function(){
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

Route::delete('products/{id}', function($id){
    $product = Product::findOrFail($id);
    $product->delete();
    return redirect()->route('products.index')->with('info','Producto Eliminado exitosamente');
})->name('product-destroy');

Route::get('products/{id}/edit', function($id){
    $product = Product::findOrFail($id);
    return view('products.edit', compact('product'));
})->name('products-edit');

Route::put('/productos/{id}', function(Request $request, $id){
    
    $product = Product::findOrFail($id);
    $product->description = $request->input('description');
    $product->price = $request->input('price');
    $product->save();
    return redirect()->route('products.index')->with('info','Product Updated!');
})->name('products.update');
});


Auth::routes();