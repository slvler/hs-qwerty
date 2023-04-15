<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quantity = "4";
        $product_price = "49.50";
        Order::create([
            'user_id' => '1',
            'product_id' => '1',
            'quantity' => $quantity,
            'product_price' => $product_price,
            'total' => $quantity * $product_price
        ]);
    }
}
