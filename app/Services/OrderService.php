<?php

namespace App\Services;

use App\Repository\OrderRepositoryInterface;

class OrderService
{
    public function __construct(
        private OrderRepositoryInterface $orderRepository
    )
    {
    }

    public function getAll()
    {
        return $this->orderRepository->getAll();
    }

    public function store($data)
    {
        return $this->orderRepository->store($data);
    }

    public function destroy($id)
    {
        return $this->orderRepository->destroy($id);
    }
}
