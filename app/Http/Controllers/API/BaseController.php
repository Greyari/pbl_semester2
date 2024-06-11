<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendResponse($result, $massage)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'massage' => $massage
        ];
        return response()->json($response, 200);
    }

    public function sendError($error, $errorMasage = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];
        if(!empty($errorMasage)){
            $response ['data'] = $errorMasage;
        }
        return response()->json($response, $code);
    }
}
