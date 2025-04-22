<?php

namespace SeavSeyla\ApiResponse\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    protected function successResponse($data, $message = null, $code = 200): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => $message ?? config('api-response.messages.success'),
            'data' => $data
        ], $code);
    }

    protected function errorResponse($message, $code): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => $message ?? config('api-response.messages.error'),
        ], $code);
    }

    protected function tokenResponse($tokenData, $message = null, $refreshToken = null, $code = 200): JsonResponse
    {
        $config = config('api-response.token.refresh_cookie');
        
        $response = response()->json([
            'status' => 'success',
            'message' => $message ?? config('api-response.messages.token'),
            'data' => [
                'token_type' => $tokenData['token_type'],
                'expires_in' => $tokenData['expires_in'],
                'access_token' => $tokenData['access_token'],
            ]
        ], $code);

        if ($refreshToken) {
            $response->cookie(
                $config['name'],
                $refreshToken,
                $config['minutes'],
                null,
                null,
                $config['secure'],
                $config['http_only']
            );
        }

        return $response;
    }
}