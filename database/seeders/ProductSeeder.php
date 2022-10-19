<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_models')->insert([
            'title' => "joe doe",
            'price' => "joe doe",
            'number' => "joe doe",
            'stok' => "joe doe",
            'stok1' => "joe doe",
            'discount' => "joe doe",
        ]);
    }
}
