<?php

namespace App\Support;

use App\Models\Product;

class Stock
{
    public function control($orders)
    {
       foreach ($orders as $order)
       {
           $product =  Product::find($order['product_id']);
           if(empty($product) || $product->stock < $order['quantity'])
           {
               return true;
           }
       }
    }
}
