<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;


use App\Models\ProductModel;
use App\Http\Requests\ProductRequest;


class ProductServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Product = ProductModel::all();

        return $Product;
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
            $ProductModel->title  = $request->title;
            $ProductModel->price  = $request->price;
            $ProductModel->number  = $request->number;
            $ProductModel->stok = $request->stock;
            $ProductModel->discount  = $request->discount;

            $ProductModel->save();

            return response()->json(['status' => 'success'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ProductModel::findOrFail($id);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ProductModel = ProductModel::findOrFail($id);
        $ProductModel->title  = $request->title;
        $ProductModel->price  = $request->price;
        $ProductModel->number  = $request->number;
        $ProductModel->stok = $request->stock;
        $ProductModel->discount  = $request->discount;

        $ProductModel->save();

        return response()->json(['status' => 'success'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ProductModel = ProductModel::findOrFail($id);
        $ProductModel->delete();

        return response()->json(['status' => 'success'], 200);

    }
}
