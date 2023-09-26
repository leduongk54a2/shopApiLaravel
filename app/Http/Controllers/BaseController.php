<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class BaseController extends Controller
{
    public function sendResponse($result, $message): JsonResponse
    {
        return response()->json(self::formatResponse(Response::HTTP_OK, $message, $result), Response::HTTP_OK);
    }

    public function formatResponse(int $statusCode, string $message, array|Collection $data = []): array
    {
        return [
            'statusCode' => $statusCode,
            'message' => $message,
            'data' => $data,
        ];
    }

    public function sendSuccess(
        $data = [],
        string $message = 'OK',
        int $statusCode = Response::HTTP_OK
    ): JsonResponse {
        return \response()->json(self::formatResponse($statusCode, $message, $data), $statusCode);
    }

    public function sendError(
        array $data = [],
        string $message = 'NG',
        int $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR
    ): JsonResponse {
        return \response()->json(self::formatResponse($statusCode, $message, $data), $statusCode);
    }
}


