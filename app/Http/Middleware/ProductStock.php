<?php

namespace App\Http\Middleware;


use App\Response\Response;
use App\Models\Product;
use Closure;
use Illuminate\Http\Request;

class ProductStock
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $product = Product::query()
            ->where('id','=',$request->product_id)
            ->where('stock','>',$request->quantity)
            ->first();

        if (!$product)
            return Response::stockFail('Stock Fail');

        return $next($request);
    }
}
