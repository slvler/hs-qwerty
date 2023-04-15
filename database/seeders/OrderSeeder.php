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
        Order::create([
            'user_id' => '1',
            'item' => json_encode(
               [
                   [
                       'product_id' => "1",
                       'quantity' => "2",
                       'product_price' => "50",
                       'total' => "100",
                   ]
               ]
            ),
            'total' => "100"
        ]);

        Order::create([
            'user_id' => '1',
            'item' => json_encode(
                [
                    [
                    'product_id' => "1",
                    'quantity' => "2",
                    'product_price' => "50",
                    'total' => "100",
                    ],
                    [
                    'product_id' => "2",
                    'quantity' => "2",
                    'product_price' => "50",
                    'total' => "100",
                    ],
                ]
            ),
            'total' => "200"
        ]);


    }
}
