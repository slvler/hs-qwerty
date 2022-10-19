<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;


use App\Models\ProductModel;





class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Product List";
        $product = ProductModel::all();
        $cartItems = \Cart::getContent();


        return view('product.list', ['title' => $title, 'product' => $product,'cartItems' => $cartItems]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Product Create";
        return view('product.create', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $ProductModel = new ProductModel();

        $ProductModel->title = $request->title;
        $ProductModel->price = $request->price;
        $ProductModel->number = $request->number;
        $ProductModel->stok = $request->stock;
        $ProductModel->discount = $request->discount;

        $ProductModel->save();


        return redirect()->route('productcontroller.create')->with('success','Success');



        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         // $id
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = ProductModel::findOrFail($id);
        $title = "Product Edit";

        return view('product.edit', ['title' => $title, 'product' => $product]);



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {

        $ProductModel = ProductModel::findOrFail($id);
        $ProductModel->title = $request->title;
        $ProductModel->price = $request->price;
        $ProductModel->number = $request->number;
        $ProductModel->stok = $request->stock;
        $ProductModel->discount = $request->discount;

        $ProductModel->save();


        return redirect()->route('productcontroller.edit', $id)->with('success','Success');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ProductModel = ProductModel::findOrFail($id);
        $ProductModel->delete();

        return redirect()->route('productcontroller.index')->with('success','Success');


    }
}
