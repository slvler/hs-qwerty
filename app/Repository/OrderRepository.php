<?php

namespace App\Repository;

use App\Models\Order;

class OrderRepository implements OrderRepositoryInterface
{
    public function __construct(private Order $order)
    {
    }

    public function getAll()
    {
        return $this->order->all();
    }

    public function getById($id)
    {
        return $this->order->whereId($id)
            ->first();
    }

    public function store($data)
    {
        $data['total'] = $data['quantity'] * $data['product_price'];
        return $this->order->create($data);
    }

    public function destroy($id)
    {
        $order = $this->getById($id);
        return $order->delete();
    }
}
