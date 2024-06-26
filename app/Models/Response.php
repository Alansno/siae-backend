<?php

namespace App\Models;

class Response {
    public static function sendResponse($success, $result, $message = '', $code = 200)
    {
        if($code === 204) {
            return response()->noContent();
        }

        $response = [
            'success' => $success,
            'data' => $result
        ];

        if(!empty($message)) {
            $response['message'] = $message;
        }

        return response()->json($response, $code);
    }
}