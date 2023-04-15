<?php

namespace App\Support;

use App\Models\Product;

class Payload
{
    public function control($orders)
    {
        foreach ($orders as $order) {
            $product =  Product::find($order['product_id']);
            if(empty($product) || $product->price != $order['product_price'])
            {
                return true;
            }
        }
    }
}
