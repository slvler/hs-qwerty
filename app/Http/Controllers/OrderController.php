<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderIndexResource;
use App\Response\Response;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(private OrderService $orderService)
    {
    }

    public function index()
    {
        return OrderIndexResource::collection($this->orderService->getAll());
    }

    public function store(Request $request)
    {
        $order = $this->orderService->store($request->only('user_id','product_id','quantity','product_price'));
        return Response::store(['id' => $order->id], 'Order Successful');
    }

    public function destroy(Request $request): JsonResponse
    {
        $order = $this->orderService->destroy($request->only('id'));
        return $order
            ? Response::destroy(['id' => $request->id], 'Order Deleted')
            : Response::notRecord('Order Not Record');
    }
}
