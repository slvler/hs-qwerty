<?php

namespace App\Services;

use App\Repository\OrderRepositoryInterface;
use App\Support\Stock;
use App\Support\Payload;

class OrderService
{
    public function __construct(
        private OrderRepositoryInterface $orderRepository,
        private Stock $stock,
        private Payload $payload
    )
    {
    }

    public function getAll()
    {
        return $this->orderRepository->getAll();
    }

    public function store($data)
    {
        $stock = $this->stock->control($data['item']);
        $payload = $this->payload->control($data['item']);
        if ($stock || $payload)
            return null;
        return $this->orderRepository->store($data);
    }

    public function destroy($id)
    {
        return $this->orderRepository->destroy($id);
    }
}
