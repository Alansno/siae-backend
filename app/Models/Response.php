<?php

namespace App\Models;

class Response {
    public static function sendResponse($result, $message = '', $code = 200)
    {
        if($code === 204) {
            return response()->noContent();
        }

        $response = [
            'success' => true,
            'data' => $result
        ];

        if(!empty($message)) {
            $response['message'] = $message;
        }

        return response()->json($response, $code);
    }
}