<?php

namespace App\Response;

use Illuminate\Http\JsonResponse;


class Response
{
    public static function store(array $parameters, $message): JsonResponse
    {
        return self::result(200, $message, $parameters);
    }

    public static function update(array $parameters = [], $message): JsonResponse
    {
        return self::result(200, $message, $parameters);
    }

    public static function destroy(array $parameters = [], $message): JsonResponse
    {
        return self::result(200, $message , $parameters);
    }

    public static function notRecord($message = null, array $parameters = []): JsonResponse
    {
        return self::result(404, $message, $parameters);
    }

    public static function result($statusCode = 200, $message, $data = null): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ])->setStatusCode($statusCode);
    }
}
