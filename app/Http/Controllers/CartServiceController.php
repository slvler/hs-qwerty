<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\ProductModel;
use App\Http\Requests\ProductRequest;


class CartServiceController extends Controller
{
    public function cartlist()
    {
        $cartItems = \Cart::getContent();

        print_r($cartItems);

        //return response()->json(['status' => $cartItems->toArray()], 200);
    }

    public function cartproductadd(Request $request)
    {
        $Product = ProductModel::findOrFail($request->id);

        Cart::add(array(
            'id' => 456, // inique row ID
            'name' => 'Sample Item',
            'price' => 67.99,
            'quantity' => 4,
            'attributes' => array()
        ));

        return response()->json(['status' => 'Item Add Successfully !'], 200);

    }
}
