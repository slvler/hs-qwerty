<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;


use App\Cart;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        //return view('cart', compact('cartItems'));
    }

    public function addcart(Request $request)
    {
        $discount = 10;
        $subtotal = 0;
        $total = 0;
        $qty = 0;
        $price = 0;
        $quant = 0;
        $message = "";

        $discount = 10;
        $total = 0;

        if ($request->price >= 1000 && $request->category != 5)
        {
          $dis = ($request->price / 100) * $discount;
          $subtotal = $request->price;
          $total = $request->price - $dis;
          $message = "10% Discount";
          $price = $total;
          $qty = $request->quantity;
          $quant = $request->quantity;

        }else {
            $subtotal = 0;
            $total = 0;
            $price = $request->price;
            $qty = $request->quantity;
            $quant = $request->quantity;

        }

        if ($request->id == 2 && $request->quantity >= 6 )
        {

            $qty = $request->quantity - 1;
            $quant = $request->quantity;
            $price = $request->price;
            $total = $request->price;
            $message = "One Free -- Discount";

        }


        if ($request->category == 5 )
        {

            $items = \Cart::getContent();
            foreach($items as $row) {


                if ( $row->attributes->category == $request->category)
                {
                    if ( $row->price > $request->price)
                    {

                        $dis = ($request->price / 100) * 20;
                        $price = $request->price - $dis;
                        $quant = $request->quantity;
                        $message = "%20 -- Discount";
                    }else{

                        $dis = ($row->price / 100) * 20;
                        $price = $row->price - $dis;
                        $quant = $request->quantity;
                        $message = "%20 -- Discount";

                        \Cart::update($row->id, array(

                            'price' => $price,
                        ));

                        $price = $request->price;
                    }
                }

            }

        }


        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $price,
            'quantity' => $qty,
            'attributes' => array(
                'image' => $request->image,
                'subtotal' => $subtotal,
                'total' => $total,
                'message' => $message,
                'quant' => $quant,
                'category' => $request->category,
            )
        ]);
        session()->flash('success', 'Item Add Successfully !');

        return redirect()->route('productcontroller.index');
    }

    public function removecart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Remove Successfully !');

        return redirect()->route('productcontroller.index');
    }

    public function updateCart(Request $request)
    {


        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Updated Successfully !');

        return redirect()->route('productcontroller.index');
    }

    public function addcartlist()
    {

        $userId  = 123;

        $row = 456;
        $b = \Cart::session($userId)->get($row);

        dd($b);

    }

    public function addcartservice(Request $request)
    {

        $cart = Cart::create([
            'id' => "1",
            'key' => "1",
            'userID' => "1"

        ]);

        return response()->json(['status' => 'Item Add Successfully !'], 200);

    }


}
