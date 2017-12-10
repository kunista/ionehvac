<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;
use App\Cart;

class ProductController extends Controller
{
    /**
     * GET /
     */
    public function index()
    {
        $products = Product::orderBy('name')->get();

        # Get from collection

        $newProducts = $products->sortByDesc('createad_at')->take(1);
        return view('product.index')->with([
            'products' => $products,
            'newProducts' => $newProducts,
        ]);
    }


    /**
     * GET /product/{$id}
     */
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect('/product')->with('alert', 'Product not found');
        }

        return view('product.show')->with([
            'product' => $product
        ]);
    }



    /**
     *
     */
    public function create()
    {
        return view('product.create')->with([
            'name' => session('name')
        ]);
    }


    /**
     *
     */
    public function store(Request $request)
    {


        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric'

        ]);

        # Add new product to the database
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->save();

        return redirect('/product')->with('alert', 'The product '.$request->input('name').' was added.');

    }


    public function edit($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect('/product')->with('alert', 'Product not found');
        }

        return view('product.edit')->with([
            'product' => $product
        ]);


    }



    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric'

        ]);

        $product = Product::find($id);

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->save();

        return redirect('/product/'.$id.'/edit')->with('alert', 'Your changes were saved.');
    }


    public function delete($id) {

        $product = Product::find($id);

        if (!$product) {
            return redirect('/product')->with('alert', 'Product not found');
        }

        return view('product.delete')->with('product', $product);
    }


    public function destroy($id)
    {

        $product = Product::find($id);

        if (!$product) {
            return redirect('/product')->with('alert', 'Product not found');
        }
        $product->delete();
        return redirect('/product')->with('alert', 'The product '.$product->title.' was deleted.');
    }



}
