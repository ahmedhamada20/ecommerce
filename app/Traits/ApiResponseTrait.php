<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

trait ApiResponseTrait
{
    protected function apiResponse(bool $success, $data = null, ?string $message = null, int $statusCode = 200): JsonResponse
    {
        $response = ['status' => $success,];
        if (!$success) {
            if ($message !== null)
                $response['ErrorCode'] = $message;

            if ($data !== null)
                $response['data'] = $data;

            return response()->json($response, $statusCode);
        }
        if ($message !== null)
            $response['message'] = $message;

        if ($data !== null)
            $response['data'] = $data;

        return response()->json($response, $statusCode);
    }

    protected function successResponse($data = null, ?string $message = null, int $statusCode = 200): JsonResponse
    {
        return $this->apiResponse(true, $data, $message, $statusCode);
    }


    protected function errorResponse($message = null, int $statusCode = 500): JsonResponse
    {
        if (is_array($message)) {
            $formattedErrors = [];
            foreach ($message as $field => $errors) {
                $formattedErrors[$field] = implode(", ", $errors);
            }
            return $this->apiResponse(false, $formattedErrors, $statusCode);
        }

        return $this->apiResponse(false, $message, $statusCode);
    }
    protected function notFoundResponse(?string $message = null): JsonResponse
    {
        return $this->errorResponse($message, 404);
    }
}
